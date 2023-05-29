<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Cart;

class Checkout extends Component
{
    public $session;
    public $items;
    public $subtotal;
    public $total;
    public $shippingTotal;

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
                            ->where('user_id', auth()->id())
                            ->get();
        return $user_cart;
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
