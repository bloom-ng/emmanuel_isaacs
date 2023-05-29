<x-user-app-layout>

    @if (session()->has('success')) 
    <div id="announcement" class="bg-green-600 px-4 py-3 text-white">
        <p class="text-center text-sm font-medium">
          {{session("success")}}
        </p>
      </div>
    @endif
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <section  class="mx-auto max-w-screen-2xl px-4 py-6 sm:px-6 lg:px-12 mt-2">
            

        <form method="POST" action="{{route('user.profile-update')}}">
            @csrf
            @method("PUT")
            <div class="space-y-6">
                <div class="border-b border-gray-900/10 pb-4">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
                </div>

                <div class="border-b border-gray-900/10 pb-8">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
                    </p>

                    <div class="mt-10 grid grid-cols-1 gap-x-2 gap-y-2 sm:grid-cols-6">
                        <div class="sm:col-span-2">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Full
                                name</label>
                            <div class="mt-2">
                                <input type="text" name="name" id="first-name" 
                                    value="{{$user->name}}"
                                    class="block w-full  px-1.5 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                                address</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email"
                                value="{{$user->email}}"
                                    class="block w-full  px-1.5 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Phone
                                </label>
                            <div class="mt-2">
                                <input id="phone" name="phone" type="tel" autocomplete="phone"
                                value="{{$user->phone}}"
                                    class="block w-full  px-1.5 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>


                        <div class="col-span-full">
                            <label for="street-address"
                                class="block text-sm font-medium leading-6 text-gray-900"> Address</label>
                            <div class="mt-2">
                                <input type="text" name="address" id="address"
                                    autocomplete="street-address"
                                    value="{{$user->address}}"
                                    class="block w-full  px-1.5 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="city"
                                class="block text-sm font-medium leading-6 text-gray-900">City</label>
                            <div class="mt-2">
                                <input type="text" name="city" id="city" autocomplete="address-level2"
                                value="{{$user->city}}"
                                    class="block w-full  px-1.5 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="region" class="block text-sm font-medium leading-6 text-gray-900">State /
                                Province</label>
                            <div class="mt-2">
                                <input type="text" name="state" id="region" autocomplete="address-level1"
                                value="{{$user->state}}"
                                    class="block w-full px-1.5 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="submit"
                    class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    </section>

    {{-- PASSSWORD SECTION --}}
    <section class="mx-auto max-w-screen-2xl px-4 py-2 sm:px-6 lg:px-12 mt-2">
        <form method="POST" action="{{route('user.password.update')}}">
            @csrf
            @method("PUT")
            <div class="space-y-2">
               

                <div class="border-b border-gray-900/10 pb-8">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Account Information</h2>
                    </p>

                    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-6">
                        <div class="sm:col-span-2">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Old Password
                                </label>
                            <div class="mt-2">
                                <input type="password" name="old_password"
                                    class="block w-full  px-1.5 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">New
                                Password</label>
                            <div class="mt-2">
                                <input type="password" name="password" 
                                    class="block w-full  px-1.5 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Confirm
                                Password</label>
                            <div class="mt-2">
                                <input type="password" name="password_confirmation" 
                                    class="block w-full  px-1.5 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="submit"
                    class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>
        </form>
    </section>

</x-user-app-layout>

<script>
    setTimeout(() => {
            document.getElementById("announcement").style.display = "none";
    }, 5000);
</script>
