<x-user-app-layout>
    
    <section class="">
        <div
          class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center"
        >
          <div class="mx-auto max-w-xl text-center">
            <h1 class="text-3xl font-extrabold sm:text-5xl">
              Order Completed Successfully
              <strong class="font-extrabold text-red-700 sm:block">
                
              </strong>
            </h1>
      
            <p class="mt-4 sm:text-xl/relaxed">
             Thank you for your Order.
            </p>
      
            <div class="mt-8 flex flex-wrap justify-center gap-4">
              <a
                class="block w-full rounded bg-green-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-green-700 focus:outline-none focus:ring active:bg-red-500 sm:w-auto"
                href="/get-started"
              >
               View Order Details
              </a>
      
              <a
                class="block w-full rounded px-12 py-3 text-sm font-medium text-green-600 shadow hover:text-green-800 focus:outline-none focus:ring active:text-red-500 sm:w-auto"
                href="{{route('home')}}"
              >
                Home
              </a>
            </div>
          </div>
        </div>
      </section>

</x-user-app-layout>