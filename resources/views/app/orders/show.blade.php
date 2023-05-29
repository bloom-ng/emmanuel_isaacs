<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.orders.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('orders.index') }}" class="mr-4"><i class="mr-1 icon ion-md-arrow-back"></i></a>
                    @lang('crud.orders.show_title')
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.orders.inputs.user_id')
                        </h5>
                        <span>{{ optional($order->user)->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.orders.inputs.contact_email')
                        </h5>
                        <span>{{ $order->contact_email ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.orders.inputs.contact_phone')
                        </h5>
                        <span>{{ $order->contact_phone ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.orders.inputs.name')
                        </h5>
                        <span>{{ $order->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.orders.inputs.payment_ref')
                        </h5>
                        <span>{{ $order->payment_ref ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.orders.inputs.transaction_id')
                        </h5>
                        <span>{{ $order->transaction_id ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.orders.inputs.address_line_1')
                        </h5>
                        <span>{{ $order->address_line_1 ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.orders.inputs.address_line_2')
                        </h5>
                        <span>{{ $order->address_line_2 ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.orders.inputs.state')
                        </h5>
                        <span>{{ $order->state ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.orders.inputs.city')
                        </h5>
                        <span>{{ $order->city ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.orders.inputs.country')
                        </h5>
                        <span>{{ $order->country ?? '-' }}</span>
                    </div>

                    


                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.orders.inputs.sub_total')
                        </h5>
                        <span>{{ $order->sub_total ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.orders.inputs.discount')
                        </h5>
                        <span>{{ $order->discount ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.orders.inputs.shipping_total')
                        </h5>
                        <span>{{ $order->shipping_total ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.orders.inputs.order_status')
                        </h5>
                        <span>{{ App\Models\Order::getOrderStatusMapping()[$order->order_status] ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.orders.inputs.payment_status')
                        </h5>
                        <span>{{ App\Models\Order::getPaymentStatusMapping()[$order->payment_status] ?? '-' }}</span>
                    </div>
                    <div class="mb-4 hidden">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.orders.inputs.payment_response')
                        </h5>
                        <span>{{ $order->payment_response ?? '-' }}</span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                            <thead class="text-left">
                                <tr>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                        Product
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                        Qty
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                        Amount (&#8358;)
                                    </th>
                                </tr>
                            </thead>
        
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($order->orderItems as $item)
                                    <tr>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                            {{ $item->product->name }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                            {{ $item->quantity }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                            {{ $item->price }}
                                        </td>
                                    </tr>
                                @endforeach
        
                            </tbody>
                        </table>
                    </div>
                </div>

              
                <div class="mt-10">
                    <a href="{{ route('orders.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Order::class)
                        <a href="{{ route('orders.create') }}" class="button">
                            <i class="mr-1 icon ion-md-add"></i>
                            @lang('crud.common.create')
                        </a>
                    @endcan
                </div>
            </x-partials.card>

        </div>
    </div>
</x-app-layout>
