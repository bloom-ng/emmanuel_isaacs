<x-user-app-layout>
  
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://js.paystack.co/v1/inline.js"></script>
    <section>
        <h1 class="sr-only">Confirm Order</h1>

        <div class="mx-auto grid max-w-screen-2xl grid-cols-1 md:grid-cols-2">

            <livewire:checkout />

            <div class="bg-white py-6 md:py-12">
                <div class="mx-auto max-w-lg px-4 lg:px-8">
                    <form action="" method="POST" class="">
                        <div>
                            <div class=" sm:px-0">
                                <h3 class="text-base font-semibold leading-7 text-gray-900">Order Information</h3>
                            </div>
                            <div class="mt-2 border-t border-gray-100">
                                <dl class="divide-y divide-gray-100">
                                    <div class="px-2 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Full Name</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            {{ $order->name }}</dd>
                                    </div>

                                    <div class="px-2 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Email</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            {{ $order->contact_email }}</dd>
                                    </div>
                                    <div class="px-2 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Phone</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            {{ $order->contact_phone }}</dd>
                                    </div>
                                    <div class="px-2 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Address</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            {{ $order->address_line_1 }} <br>
                                            {{ $order->address_line_2 }} {{empty($order->address_line_2) ?? "<br>"}}
                                            {{ $order->city }} <br>
                                            {{ $order->state }} <br>
                                            {{ $order->country }}. <br>
                                        </dd>
                                    </div>
                                    <div class="px-2 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-bold leading-6 text-gray-900 uppercase">Subtotal - &#8358;{{ $order->sub_total }}</dt>
                                        <dd class="mt-1 font-semibold text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"></dd>
                                    </div>
                                    <div class="px-2 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-bold leading-6 text-gray-900 uppercase">Shipping - &#8358;{{ $order->shipping_total }}</dt>
                                        <dd class="mt-1 font-semibold text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"></dd>
                                    </div>
                                    <div class="px-2 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-bold leading-6 text-gray-900 uppercase">Order Total - &#8358;{{ $order_total }}</dt>
                                        <dd class="mt-1 font-semibold text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"></dd>
                                    </div>



                                </dl>
                            </div>
                        </div>

                        <input type="hidden" id="email" name="email" value="{{ $order->contact_email }}">
                        <input type="hidden" id="phone" name="phone" value="{{ $order->contact_phone }}">
                        <input type="hidden" id="amount" name="amount" value="{{ $order_total }}">
                        
                        
                        <input type="hidden" id="button_text" name="button_text" value="Pay with Paystack &#8358;{{ $order_total }}">

                        <div class="col-span-6">
                            
                          <button id="paystack-button" type="button" onclick="payWithPaystack()" class="block w-full rounded-md bg-gray-800 p-2.5 text-sm text-gray-50 font-bold transition hover:opacity-75 hover:shadow-lg">
                            Pay with Paystack &#8358;{{ $order_total }}
              </button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    
    <script>
        function payWithPaystack() {
            var handler = PaystackPop.setup({
                key: "{{ config('payment.paystack-public') }}",
                email: document.getElementById('email').value,
                amount: document.getElementById('amount').value * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
                currency: "{{ $currency }}",
                ref: "{{ $order->payment_ref }}",
    
                callback: function(response) {
                    //this happens after the payment is completed successfully
                    //set loading
                    setPaystackProcessing();
                    var reference = response.reference;
                    let res = fetch(`/payment/verify?ref=${reference}&provider={{ $paystackProviderId }}`)
                        .then(res => res.json())
                        .then(res => {
                            console.log(res);
                            if (res.verified) {
                                swal("Payment Recieved!", "Thanks for your order.", "success")
                                    .then((value) => {
                                        setInterval(() => {window.location.href = "{{route('order.success', ['order' => $order->id])}}" }, 500);
                                    });
                            } else {
                                swal(`Hi ${document.getElementById('name').value}!`, "Something went wrong. We could not complete your order", "error")
                                .then((value) => {
                                        setInterval(() => { window.location.href = "{{ route('order.failed', ['order' => $order->id]) }}" }, 500);
                                    });
                            }
                            setPaystackProcessingStop()
    
                        })
                        .catch(err => {
                            setPaystackProcessingStop();
                            swal(`Hi ${document.getElementById('name').value}!`, "Something went wrong. We could not complete your order","error")
                            .then((value) => {
                                        setInterval(() => { window.location.href = "{{ route('order.failed', ['order' => $order->id]) }}" }, 500);
                                    });
                            console.log(err)
                        })
    
    
                },
    
                onClose: function() {
                    // swal("Hi There!", "Transaction was not completed", "error");
                    setPaystackProcessingStop();
                },
            });
            handler.openIframe();
        }
    
        function setPaystackProcessing() {
            document.querySelector('#paystack-button').innerHTML = 'Processing...';
        }
    
        function setPaystackProcessingStop() {
            document.querySelector('#paystack-button').innerHTML = document.getElementById('button_text').value;
        }
    </script>

</x-user-app-layout>



