<x-user-app-layout>
  <section>
    <h1 class="sr-only">Checkout</h1>

    <div class="mx-auto grid max-w-screen-2xl grid-cols-1 md:grid-cols-2">

      <livewire:checkout />

      <div class="bg-white py-12 md:py-24">
        <div class="mx-auto max-w-lg px-4 lg:px-8">
          <form action="{{ route('pay') }}" method="POST" class="grid grid-cols-6 gap-4">
            <div class="col-span-3">
              <label for="FirstName" class="block text-xs font-medium text-gray-700">
                First Name
              </label>

              <input type="text" id="FirstName" class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm" />
            </div>

            <div class="col-span-3">
              <label for="LastName" class="block text-xs font-medium text-gray-700">
                Last Name
              </label>

              <input type="text" id="LastName" class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm" />
            </div>

            <div class="col-span-6">
              <label for="Email" class="block text-xs font-medium text-gray-700">
                Email
              </label>

              <input type="email" id="Email" class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm" />
            </div>

            <div class="col-span-6">
              <label for="Phone" class="block text-xs font-medium text-gray-700">
                Phone
              </label>

              <input type="tel" id="Phone" class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm" />
            </div>
            <div class="col-span-6">
              <label for="address_1" class="block text-xs font-medium text-gray-700">
                address_1
              </label>

              <input type="text" id="address_1" class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm" />
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

            <fieldset class="col-span-6">
              <legend class="block text-sm font-medium text-gray-700">
                Card Details
              </legend>

              <div class="mt-1 -space-y-px rounded-md bg-white shadow-sm">
                <div>
                  <label for="CardNumber" class="sr-only"> Card Number </label>

                  <input type="text" id="CardNumber" placeholder="Card Number"
                    class="relative mt-1 w-full rounded-t-md border-gray-200 focus:z-10 sm:text-sm" />
                </div>

                <div class="flex">
                  <div class="flex-1">
                    <label for="CardExpiry" class="sr-only"> Card Expiry </label>

                    <input type="text" id="CardExpiry" placeholder="Expiry Date"
                      class="relative w-full rounded-es-md border-gray-200 focus:z-10 sm:text-sm" />
                  </div>

                  <div class="-ms-px flex-1">
                    <label for="CardCVC" class="sr-only"> Card CVC </label>

                    <input type="text" id="CardCVC" placeholder="CVC"
                      class="relative w-full rounded-ee-md border-gray-200 focus:z-10 sm:text-sm" />
                  </div>
                </div>
              </div>
            </fieldset>

            <fieldset class="col-span-6">
              <legend class="block text-sm font-medium text-gray-700">
                Billing Address
              </legend>

              <div class="mt-1 -space-y-px rounded-md bg-white shadow-sm">
                <div>
                  <label for="Country" class="sr-only">Country</label>

                  <select id="Country" class="relative w-full rounded-t-md border-gray-200 focus:z-10 sm:text-sm">
                    <option>Nigeria</option>
                    <option>England</option>
                    <option>Wales</option>
                    <option>Scotland</option>
                    <option>France</option>
                    <option>Belgium</option>
                    <option>Japan</option>
                  </select>
                </div>

                <div>
                  <label class="sr-only" for="PostalCode"> ZIP/Post Code </label>

                  <input type="text" id="PostalCode" placeholder="ZIP/Post Code"
                    class="relative w-full rounded-b-md border-gray-200 focus:z-10 sm:text-sm" />
                </div>
              </div>
            </fieldset>

            <div class="col-span-6">
              <button class="block w-full rounded-md bg-black p-2.5 text-sm text-white transition hover:shadow-lg">
                Pay Now
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</x-user-app-layout>