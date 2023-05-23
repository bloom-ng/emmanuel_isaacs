<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Cart;

class ShoppingCart extends Component
{
    public $session;
    public $items;
    public $subtotal;
    public $total;
    public $shippingTotal;

    protected $listeners = [
        'cartUpdated' => '$refresh',
        'cartUpdated' => 'resetTotal',
    ];

    // lifecycle hook
    public function mount(Request $request)
    {
        $this->session = $request->ip();
        $user_ip = $this->session;
        $this->items = $this->fetchUserCart($user_ip);

        $this->resetTotal();

    }

    // Lifecycle hook
    public function updated()
    {
        $this->items = $this->fetchUserCart($user_ip);

        $this->resetTotal();
    }

    public function removeCartItem($itemId)
    {
        $cart = Cart::find($itemId);
        $cart->delete();
        
        // $this->resetTotal();
        $this->emit('cartUpdated');
    }

    public function incrementCartItem($itemId)
    {
        $cart = Cart::find($itemId);
        $cart->update([
            'quantity' => $cart->quantity + 1
        ]);
       
        // $this->resetTotal();
        $this->emit('cartUpdated');
    }

    public function decrementCartItem($itemId)
    {
        $cart = Cart::find($itemId);
        if($cart->quantity <= 1) return;

        $cart->update([
            'quantity' => $cart->quantity - 1
        ]);
        
        // $this->resetTotal();
        $this->emit('cartUpdated');
    }
    
    public function resetTotal()
    {
        $this->calculateSubtotal();
        $this->calculateShippingtotal();
        $this->calculateTotal();

    }

    

    private function calculateSubtotal()
    {
        $this->subtotal = 0;
        foreach ($this->items as $key => $value) {
            $this->subtotal += ($value->product->price * $value->quantity);
        }
    }

    private function calculateShippingtotal()
    {
        $this->shippingTotal = 0;
        foreach ($this->items as $key => $value) {
            $this->shippingTotal += $value->product->shipping_price;
        }
    }

    private function calculateTotal()
    {
        $this->total = $this->subtotal + $this->shippingTotal;
    }


    private function fetchUserCart($user_ip)
    {
        $user_cart = Cart::query()
                            ->when(auth()->guest(), function ($query) use($user_ip) {
                                $query->where('session', $user_ip);
                            }, function ($query) {
                                $query->where('user_id', auth()->id());
                            })
                            ->get();
        return $user_cart;
    }

    public function render()
    {
        return view('livewire.shopping-cart');
    }
}
