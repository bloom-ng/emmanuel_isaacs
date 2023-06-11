<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AddToCart extends Component
{
    public $product;
    public $quantity = 1;
    public $session = null;

    public function mount(Request $request, Product $product, )
    {
        $this->product = $product;
        $this->session = $request->ip();
    }

    public function add()
    {
        $user_ip = $this->session;
        $user_product_cart = Cart::where('product_id', $this->product->id)
                                    ->when(Auth::guest(), function ($query) use($user_ip) {
                                        $query->where('session', $user_ip);
                                    }, function ($query) {
                                        $query->where('user_id', Auth::id());
                                    })
                                    ->first();

        if (!empty($user_product_cart)) {
            // update cart item
            $user_product_cart->update([
                'quantity' => $user_product_cart->quantity + 1
            ]);
           
        } else {

            $user_cart_item = [
                'product_id' => $this->product->id,
                'quantity' => $this->quantity,
                'user_id' => Auth::id(),
                'session' => $user_ip
            ];
    
            Cart::create($user_cart_item);
        }
        session()->flash('success', 'Item Added to Cart.');
        $this->emit('ItemAdded');
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
