<x-user-app-layout>
  <section>
    <h1 class="sr-only">Checkout</h1>

    <div class="mx-auto grid max-w-screen-2xl grid-cols-1 md:grid-cols-2">

      <livewire:checkout />

      <div class="bg-white pt-4 pb-8 md:pb-12">
        <div class="mx-auto max-w-lg px-4 lg:px-8">
          <div class=" pb-2 sm:px-0">
            <h3 class="text-base font-bold leading-7 text-gray-900">Order Information</h3>
        </div>
          <form action="{{ route('payment.initiate') }}" method="POST" class="grid grid-cols-6 gap-4">
            @csrf
            
            <div class="col-span-6">
              <label for="FirstName" class="block text-xs font-medium text-gray-700">
                Name
              </label>

              <input required type="text" id="name" name="name" value="{{$user->name}}" class="mt-1 w-full border-b-2 py-1  border-gray-400 shadow-sm sm:text-sm" />
            </div>

            <div class="col-span-6">
              <label for="Email" class="block text-xs font-medium text-gray-700">
                Email
              </label>

              <input required value="{{auth()->user()->email}}" type="email" id="Email" name="contact_email" 
                  class="mt-1 w-full border-b-2 py-1  border-gray-400 shadow-sm sm:text-sm" />
            </div>

            <div class="col-span-6">
              <label for="Phone" class="block text-xs font-medium text-gray-700">
                Phone
              </label>

              <input required type="tel" id="Phone" name="contact_phone"  value="{{$user->phone}}"
                  class="mt-1 w-full border-b-2 py-1  border-gray-400 shadow-sm sm:text-sm" />
            </div>
            <div class="col-span-6">
              <label for="address_1" class="block text-xs font-medium text-gray-700">
                Address Line 1
              </label>

              <input required type="text" id="address_1" name="address_line_1" value="{{$user->address}}"
                class="mt-1 w-full border-b-2 py-1 border-gray-400 shadow-sm sm:text-sm" />
            </div>
            <div class="col-span-6">
              <label for="address_2" class="block text-xs font-medium text-gray-700">
                Address Line 2
              </label>

              <input type="text" placeholder="Optional" id="address_2" name="address_line_2" 
                class="mt-1 w-full  border-b-2 py-1 border-gray-400 shadow-sm sm:text-sm" />
            </div>

            <div class="col-span-6">
              <label for="city" class="block text-xs font-medium text-gray-700">
                City
              </label>

              <input required type="text" placeholder="" id="city" name="city" value="{{$user->city}}"
                class="mt-1 w-full border-b-2 py-1 border-gray-400 shadow-sm sm:text-sm" />
            </div>

            <div class="col-span-6">
              <label for="state" class="block text-xs font-medium text-gray-700">
                State
              </label>

              <input required type="text" placeholder="" id="state" name="state" value="{{$user->state}}"
                  class="mt-1 w-full border-b-2 py-1 border-gray-400 shadow-sm sm:text-sm" />
            </div>

            <!-- AMOUNT INPUT FIELD HIDDEN -->
            @php
            $sub_total = 0; // Initialize the sub_total variable
            $shipping_fee = 0;
            @endphp

            @foreach ($user_cart as $item)
              @php
                $product = $item->product;
                $price = ($product->price * $item->quantity);
                $sub_total += $price; // Add the price to the total
                $shipping = $product->shipping_price;
                $shipping_fee += $shipping;
              @endphp
            @endforeach

            <input type="hidden" name="amount" value="{{$sub_total + $shipping_fee}}">
            <input type="hidden" name="sub_total" value="{{$sub_total}}">
            <input type="hidden" name="shipping_total" value="{{$shipping_fee}}">

         
          

            <div class="col-span-6">
              <button class="block w-full rounded-md bg-black p-2.5 text-sm text-white transition hover:bg-gray-800 hover:shadow-lg">
                Proceed to Payment
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</x-user-app-layout>