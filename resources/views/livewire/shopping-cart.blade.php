<div class="mt-8">

    @if (count($items) < 1)
        <p class="text-gray-600 font-bold text-center">Cart is empty</p>
        <div class="flex justify-center">
            <a
              href="{{route('home')}}"
              class="block rounded bg-gray-700 px-5 py-3 text-sm text-gray-100 transition hover:bg-gray-600"
            >
              Home
            </a>
          </div>
        
    @endif
    <ul class="space-y-4">

        @foreach ($items as $item )
            

      <li class="flex items-center gap-4">
        <img
          src="storage/{{$item->product->thumbnail}}"
          alt="{{$item->product->name}}"
          class="h-16 w-16 rounded object-cover"
        />

        <div>
          <h3 class="text-sm text-gray-900">{{$item->product->name}}</h3>

          <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
            <div>
              <dt class="inline">Price</dt>
              <dd class="inline">&#8358; {{$item->product->price}}</dd>
            </div>

            <div>
              <dt class="inline"></dt>
              <dd class="inline"></dd>
            </div>
          </dl>
        </div>

        <div class="flex flex-1 items-center justify-end gap-2">
            <button 
            wire:click="decrementCartItem({{$item->id}})"
            wire:loading.attr="disabled"
            class="text-gray-600 transition hover:text-red-600"
            wire:loading.class="animate-pulse text-red-400"
            >
            
            <span class="sr-only">Decrement item</span>
            -
          </button>
          <form>
            <label for="Line3Qty" class="sr-only"> Quantity </label>
            <input
              type="number"
              readonly
              min="1"
              value="{{$item->quantity}}"
              id="Line3Qty"
              class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none"
            />
          </form>

          <button 
            wire:click="incrementCartItem({{$item->id}})"
            wire:loading.attr="disabled"
            class="text-gray-600 transition hover:text-red-600"
            wire:loading.class="animate-pulse text-red-400"
            >
            
            <span class="sr-only">Increment item</span>
            +
          </button>
          <button 
            wire:click="removeCartItem({{$item->id}})"
            wire:loading.attr="disabled"
            class="ml-2 text-gray-600 transition hover:text-red-600"
            wire:loading.class="animate-pulse text-red-400"
            >
            
            <span class="sr-only">Remove item</span>

            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="h-4 w-4"
             
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
              />
            </svg>
          </button>
        </div>
      </li>
      @endforeach

    </ul>

    @if (count($items) >= 1)

    <div class="mt-8 flex justify-end border-t border-gray-100 pt-8">
      <div class="w-screen max-w-lg space-y-4">
        <dl class="space-y-0.5 text-sm text-gray-700">
          <div class="flex justify-between">
            <dt>Subtotal</dt>
            <dd>&#8358; {{$subtotal}}</dd>
          </div>

          <div class="flex justify-between">
            <dt>Shipping Total</dt>
            <dd>&#8358; {{$shippingTotal}}</dd>
          </div>

         

          <div class="flex justify-between !text-base font-medium">
            <dt>Total</dt>
            <dd>&#8358;{{$total}}</dd>
          </div>
        </dl>

        <div class="flex justify-end">
          <a
            href="{{route('store.checkout')}}"
            class="block rounded bg-gray-700 px-5 py-3 text-sm text-gray-100 transition hover:bg-gray-600"
          >
            Checkout
          </a>
        </div>
      </div>
    </div>
    @endif
  </div>