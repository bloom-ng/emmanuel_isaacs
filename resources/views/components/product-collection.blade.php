<section class="bg-white my-18">
    <div class="max-w-screen-xl px-4 py-8 mx-auto sm:px-6 sm:py-12 lg:px-8">
      <header class="text-center py-4">
        <h2 class="lg:text-4xl font-bold text-gray-700 sm:text-3xl">
          Book Collection
        </h2>
  
        <p class="max-w-md mx-auto mt-4 text-gray-500">
         
        </p>
      </header>
  
      <ul class="grid gap-4 mt-8 sm:grid-cols-1 lg:grid-cols-3">
      
  
       @foreach ($products as $product )
       <li class="block overflow-hidden group shadow-xl p-2">
        <a href="#" >
          <img
            src="storage/{{$product->thumbnail}}"
            alt=""
            class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]"
          />

          <div class="relative pt-3 bg-white">
            <h3
              class="text-sm text-gray-700 group-hover:underline group-hover:underline-offset-4"
            >
              {{$product->name}}
            </h3>

            <p class="mt-2">
              <span class="sr-only"> Regular Price </span>
{{-- Add sale logic later --}}
              <span class="tracking-wider text-gray-900 font-semibold"> &#8358;{{$product->price}} </span>
            </p>
          </div>
        </a>
        <p class="mt-2">
          <span class="sr-only"> Add to cart </span>
          @livewire('add-to-cart', ['product' => $product->id])
        </p>
      </li>
       @endforeach
  
        
      </ul>
    </div>
  </section>