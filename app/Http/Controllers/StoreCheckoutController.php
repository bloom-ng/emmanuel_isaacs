<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Services\Payment\Payment as PaymentService;

class StoreCheckoutController extends Controller
{
    
    public function index(Request $request)
    {
        $user_cart = Cart::query()
                            ->where('user_id', Auth::id())
                            ->get();
        if(count($user_cart) < 1) return redirect()->route('home');

        $user = Auth::user();

        return view('store.checkout', compact('user_cart', 'user'));
    }

    public function initiatePayment(Request $request)
    {
        $validated = $request->validate([
            "name" =>          ["required", "string"],
            "contact_email" => ["required", "email"],
            "contact_phone" => ["required", "string"],
            "address_line_1" => ["required", "string"],
            "address_line_2" => ["nullable", "string"],
            "city" =>           ["nullable", "string"],
            "state" =>          ["nullable", "string"],
            "country" =>        ["nullable", "string"],
            "sub_total" =>      ["required", "numeric"],
            "shipping_total" => ["required", "numeric"],
        ]);

        $validated['payment_ref']   = PaymentService::generateRef();
        $validated['user_id']       = Auth::id();
        $validated['order_status']   = Order::ORDER_STATUS_PENDING;
        $validated['payment_status'] = Order::PAYMENT_STATUS_INITIATED;

        $cart_items = Cart::query()
                            ->where('user_id', Auth::id())
                            ->get();

        
        $order = DB::transaction(function () use( $validated, $cart_items ) {
           $order = Order::create($validated);

           foreach ($cart_items as $key => $item) {
                OrderItem::create([
                    "order_id"      => $order->id,
                    "product_id"    => $item->product_id,
                    "quantity"      => $item->quantity,
                    "price"      => $item->product->price
                ]);
           }

           return $order;
        }, 5);

        return view('store.complete-checkout', [
            'order' => $order,
            'order_total' => $order->sub_total + $order->shipping_total,
            'currency' => PaymentService::CURRENCY_NGN,
            'paystackProviderId' => PaymentService::PROVIDER_PAYSTACK,
            'raveProviderId' => PaymentService::PROVIDER_RAVE,
        ]);

    }

    public function verify(Request $request)
    {
        $data = request()->validate([
            'ref' => ['required', 'string'],
            'provider' => ['required', 'string'],
        ]);
        $verified = false;

        $verified = PaymentService::verify($data['ref'], $data['provider']);

        return response()->json([
            'verified' => $verified
        ]);
    }

    public function paymentSuccess(Request $request, Order $order)
    {
        // clear cart
        Cart::where('user_id', Auth::id())->delete();
        return view('store.order-success', ['order' => $order]);
    }

    public function paymentFailed(Request $request, Order $order)
    {
        return view('store.order-failed', ['order' => $order]);
    }

    

}
