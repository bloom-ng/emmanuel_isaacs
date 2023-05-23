<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserCart extends Component
{
    public $items = null;
    public $classes;
    public $session = '';

    protected $listeners = ['ItemAdded'=> 'updateItems'];

    public function mount(Request $request)
    {
        $this->session = $request->ip();
        $user_ip = $this->session;
        $this->items = $this->fetchUserCart($user_ip);
    }

    public function updateItems()
    {
        $user_ip = $this->session;
        $this->items = $this->fetchUserCart($user_ip);
    }

    private function fetchUserCart($user_ip)
    {
        $user_cart = Cart::query()
                            ->when(Auth::guest(), function ($query) use($user_ip) {
                                $query->where('session', $user_ip);
                            }, function ($query) {
                                $query->where('user_id', Auth::id());
                            })
                            ->get();
        return $user_cart;
    }

    public function render()
    {
        return view('livewire.user-cart');
    }
}
