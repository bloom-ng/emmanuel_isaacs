<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderCollection;

class UserOrdersController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $orders = $user
            ->orders()
            ->search($search)
            ->latest()
            ->paginate();

        return new OrderCollection($orders);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('create', Order::class);

        $validated = $request->validate([
            'contact_email' => ['required', 'max:255', 'string'],
            'contact_phone' => ['required', 'max:255', 'string'],
            'name' => ['required', 'max:255', 'string'],
            'payment_ref' => ['required', 'max:255', 'string'],
            'transaction_id' => ['required', 'max:255', 'string'],
            'address_line_1' => ['required', 'max:255', 'string'],
            'address_line_2' => ['nullable', 'max:255', 'string'],
            'state' => ['required', 'max:255', 'string'],
            'city' => ['required', 'max:255', 'string'],
            'country' => ['required', 'max:255', 'string'],
            'sub_total' => ['required', 'numeric'],
            'discount' => ['required', 'numeric'],
            'shipping_total' => ['required', 'numeric'],
            'order_status' => ['required', 'max:255'],
            'payment_status' => ['required', 'max:255'],
            'payment_response' => ['required', 'max:255', 'string'],
        ]);

        $order = $user->orders()->create($validated);

        return new OrderResource($order);
    }
}
