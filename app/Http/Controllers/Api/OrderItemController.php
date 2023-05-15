<?php

namespace App\Http\Controllers\Api;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderItemResource;
use App\Http\Resources\OrderItemCollection;
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
            ->paginate();

        return new OrderItemCollection($orderItems);
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

        return new OrderItemResource($orderItem);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OrderItem $orderItem
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, OrderItem $orderItem)
    {
        $this->authorize('view', $orderItem);

        return new OrderItemResource($orderItem);
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

        return new OrderItemResource($orderItem);
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

        return response()->noContent();
    }
}
