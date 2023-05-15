<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.orders.index_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title"> @lang('crud.orders.index_title') </x-slot>

                <div class="mb-5 mt-4">
                    <div class="flex flex-wrap justify-between">
                        <div class="md:w-1/2">
                            <form>
                                <div class="flex items-center w-full">
                                    <x-inputs.text
                                        name="search"
                                        value="{{ $search ?? '' }}"
                                        placeholder="{{ __('crud.common.search') }}"
                                        autocomplete="off"
                                    ></x-inputs.text>

                                    <div class="ml-1">
                                        <button
                                            type="submit"
                                            class="button button-primary"
                                        >
                                            <i class="icon ion-md-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="md:w-1/2 text-right">
                            @can('create', App\Models\Order::class)
                            <a
                                href="{{ route('orders.create') }}"
                                class="button button-primary"
                            >
                                <i class="mr-1 icon ion-md-add"></i>
                                @lang('crud.common.create')
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="block w-full overflow-auto scrolling-touch">
                    <table class="w-full max-w-full mb-4 bg-transparent">
                        <thead class="text-gray-700">
                            <tr>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.orders.inputs.user_id')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.orders.inputs.contact_email')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.orders.inputs.contact_phone')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.orders.inputs.name')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.orders.inputs.payment_ref')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.orders.inputs.transaction_id')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.orders.inputs.address_line_1')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.orders.inputs.address_line_2')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.orders.inputs.state')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.orders.inputs.city')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.orders.inputs.country')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.orders.inputs.sub_total')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.orders.inputs.discount')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.orders.inputs.shipping_total')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.orders.inputs.order_status')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.orders.inputs.payment_status')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.orders.inputs.payment_response')
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @forelse($orders as $order)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-left">
                                    {{ optional($order->user)->name ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $order->contact_email ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $order->contact_phone ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $order->name ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $order->payment_ref ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $order->transaction_id ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $order->address_line_1 ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $order->address_line_2 ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $order->state ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $order->city ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $order->country ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $order->sub_total ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $order->discount ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $order->shipping_total ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $order->order_status ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $order->payment_status ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $order->payment_response ?? '-' }}
                                </td>
                                <td
                                    class="px-4 py-3 text-center"
                                    style="width: 134px;"
                                >
                                    <div
                                        role="group"
                                        aria-label="Row Actions"
                                        class="
                                            relative
                                            inline-flex
                                            align-middle
                                        "
                                    >
                                        @can('update', $order)
                                        <a
                                            href="{{ route('orders.edit', $order) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i
                                                    class="icon ion-md-create"
                                                ></i>
                                            </button>
                                        </a>
                                        @endcan @can('view', $order)
                                        <a
                                            href="{{ route('orders.show', $order) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i class="icon ion-md-eye"></i>
                                            </button>
                                        </a>
                                        @endcan @can('delete', $order)
                                        <form
                                            action="{{ route('orders.destroy', $order) }}"
                                            method="POST"
                                            onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                        >
                                            @csrf @method('DELETE')
                                            <button
                                                type="submit"
                                                class="button"
                                            >
                                                <i
                                                    class="
                                                        icon
                                                        ion-md-trash
                                                        text-red-600
                                                    "
                                                ></i>
                                            </button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="18">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="18">
                                    <div class="mt-10 px-4">
                                        {!! $orders->render() !!}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
