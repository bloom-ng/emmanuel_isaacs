<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class StoreCartController extends Controller
{
    public function index(Request $request)
    {
        // $userCart = Cart::getUserCart();

        // dd($userCart);
        return view('store.cart');
    }
}
