<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreCheckoutController extends Controller
{
    public function index()
    {
        return view('store.checkout');
    }
}
