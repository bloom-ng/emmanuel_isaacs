<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class UserOrderController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->get('search', '');

        $orders = $user
            ->orders()
            ->with(['orderItems'])
            ->whereNot("payment_status", Order::PAYMENT_STATUS_INITIATED)
            ->search($search)
            ->latest()
            ->paginate();

        return view('user-orders', ['orders' => $orders]);
    }
}
