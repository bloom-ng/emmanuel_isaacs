<?php

namespace App\Services\Payment;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

use App\Models\Order;

class Payment 
{

    const PROVIDER_PAYSTACK = 1;
    const PROVIDER_RAVE = 2;

    const CURRENCY_NGN = "NGN";

    public static function generateRef()
    {
        $ref = Str::random(12);

        if (Order::where('payment_ref', $ref)->exists()) {
            self::generateRef();
        }

        return $ref;
    }

    public static function verify(string $ref, $provider)
    {
        $order = Order::firstWhere('payment_ref', $ref);
        if(empty($order)) {
            return false;
        }

        $verified = false;
        if($provider == self::PROVIDER_PAYSTACK) {
            $order->payment_provider = self::PROVIDER_PAYSTACK;
            $order->save();
            $verified = self::verifyPaystackPayment($order->payment_ref);
        }
        else if($provider == self::PROVIDER_RAVE) {
            $order->payment_provider = self::PROVIDER_RAVE;
            $order->save();
            $verified = self::verifyRavePayment($Order->transaction_id);
        }else {
            $verified = false;
        }

        return $verified;

    }

    public static function verifyPaystackPayment(string $ref)
    {
        $response = Http::withToken(config('payment.paystack-secret'))
                            ->retry(2, 3000)
                            ->get(config('payment.paystack-endpoints.verify'). $ref);

        if (!$response->successful()) {
            $order = Order::firstWhere('payment_ref', $ref);
            $order->order_status = Order::ORDER_STATUS_PENDING;
            $order->payment_status = Order::PAYMENT_STATUS_PROCESSING;
            $order->save();
            return false;
        }

        if ($response['data']['status'] != 'success') {
            $order = Order::firstWhere('payment_ref', $ref);
            $order->order_status = Order::ORDER_STATUS_PENDING;
            $order->payment_status = Order::PAYMENT_STATUS_FAILED;
            $order->payment_response = $response->json();
            $order->save();

            return false;
        }

        $order = Order::firstWhere('payment_ref', $ref);
        $order->payment_status = Order::PAYMENT_STATUS_VERIFIED;
        $order->payment_response = $response->json();
        $order->save();

        return true;
    }

    public static function verifyRavePayment(string $transaction_id)
    {
        return false;
    }


}
