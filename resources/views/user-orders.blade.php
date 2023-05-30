<x-user-app-layout>



    <div x-data="{ expandedOrder: null }" class="bg-white shadow overflow-hidden sm:rounded-md px-8 md:px-16 my-8">
        <h2 class="py-8 text-2xl font-bold text-gray-700 ">My Orders</h2>
        <ul>
            @foreach($orders as $order)
                <li class="mb-8 shadow-xl">
                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Order ID
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    #{{ $order->id }}
                                </dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Payment Reference
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $order->payment_ref }}
                                </dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Order Total
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 font-semibold sm:col-span-2">
                                    &#8358;{{ number_format($order->sub_total + $order->shipping_total, 2) }}  (Subtotal: &#8358;{{ $order->sub_total }} | Shipping: &#8358;{{ $order->shipping_total }}) 
                                </dd>
                               
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Ordered At
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $order->created_at->format('Y-m-d H:i:s') }}
                                </dd>
                            </div>
                        </dl>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button @click="expandedOrder === {{ $order->id }} ? expandedOrder = null : expandedOrder = {{ $order->id }}" class="text-amber-700 hover:text-amber-900 font-medium">
                                View Order Details
                            </button>
                        </div>
                        <div x-show="expandedOrder === {{ $order->id }}" class="px-4 py-3 bg-gray-100">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Order Items
                            </h3>
                            <div class="mt-4 divide-y divide-gray-200">
                                @foreach($order->orderItems as $item)
                                    <div class="flex items-center py-4">
                                        <img src="{{ asset('storage/'.$item->product->image) }}" alt="{{ $item->product->name }}" class="h-16 w-16 rounded-md shadow-md">
                                        <div class="ml-4">
                                            <p class="text-lg text-gray-900 font-medium">{{ $item->product->name }}</p>
                                            <p class="text-sm text-gray-600">Quantity: {{ $item->quantity }}</p>
                                            <p class="text-sm text-gray-600">Price: &#8358;{{ $item->price }}</p>
                                            @if($item->product->type === 0)
                                                <a download="" href="{{ asset('storage/'.$item->product->download_link) }}" class="inline-block mt-2 px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">Download</a>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        
{{ $orders->links() }}
    </div>
    
    @push('scripts')
    <script>
        function toggleOrderDetails(orderId) {
            const expandedOrder = document.getElementById('order-' + orderId);
            if (expandedOrder) {
                expandedOrder.classList.toggle('hidden');
            }
        }
    </script>
    @endpush
    
</x-user-app-layout>