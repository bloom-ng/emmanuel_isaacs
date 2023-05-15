<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Requests\OrderItemStoreRequest;
use App\Http\Requests\OrderItemUpdateRequest;

class OrderItemController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', OrderItem::class);

        $search = $request->get('search', '');

        $orderItems = OrderItem::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.order_items.index', compact('orderItems', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', OrderItem::class);

        return view('app.order_items.create');
    }

    /**
     * @param \App\Http\Requests\OrderItemStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderItemStoreRequest $request)
    {
        $this->authorize('create', OrderItem::class);

        $validated = $request->validated();

        $orderItem = OrderItem::create($validated);

        return redirect()
            ->route('order-items.edit', $orderItem)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OrderItem $orderItem
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, OrderItem $orderItem)
    {
        $this->authorize('view', $orderItem);

        return view('app.order_items.show', compact('orderItem'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OrderItem $orderItem
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, OrderItem $orderItem)
    {
        $this->authorize('update', $orderItem);

        return view('app.order_items.edit', compact('orderItem'));
    }

    /**
     * @param \App\Http\Requests\OrderItemUpdateRequest $request
     * @param \App\Models\OrderItem $orderItem
     * @return \Illuminate\Http\Response
     */
    public function update(
        OrderItemUpdateRequest $request,
        OrderItem $orderItem
    ) {
        $this->authorize('update', $orderItem);

        $validated = $request->validated();

        $orderItem->update($validated);

        return redirect()
            ->route('order-items.edit', $orderItem)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OrderItem $orderItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, OrderItem $orderItem)
    {
        $this->authorize('delete', $orderItem);

        $orderItem->delete();

        return redirect()
            ->route('order-items.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
