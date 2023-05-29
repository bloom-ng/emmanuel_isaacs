<div class="bg-amber-50 py-12 md:py-24">
    <div class="mx-auto max-w-lg space-y-8 px-4 lg:px-8">
        <div class="flex items-center gap-4">

        </div>

        <div>
            <p class="text-2xl font-medium tracking-tight text-gray-900">
                &#8358; {{$total}}
            </p>

            <p class="mt-1 text-sm text-gray-600">For the purchase of</p>
        </div>

        <div>
            <div class="flow-root">
                <ul class="-my-4 divide-y divide-gray-100">
                    @foreach ($items as $item )
                    <li class="flex items-center gap-4 py-4">
                        <img src="storage/{{$item->product->thumbnail}}" class="h-16 w-16 rounded object-cover" />

                        <div>
                            <h3 class="text-sm text-gray-900">{{$item->product->name}} &times;{{$item->quantity}}</h3>

                            <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                                <div>
                                    <dt class="inline">Price: </dt>
                                    <dd class="inline">&#8358; {{$item->product->price}}</dd>
                                </div>

                                <div>
                                    <dt class="inline">Shipping:</dt>
                                    <dd class="inline">&#8358; {{$item->product->shipping_price}}</dd>
                                </div>
                            </dl>
                        </div>
                    </li>
                    @endforeach
                   
                </ul>
            </div>
        </div>
    </div>
</div>