<header aria-label="Page Header" class="bg-amber-50 shadow-sm ">
    <div class="mx-auto max-w-screen-xl px-4 py-2 sm:px-6 lg:px-8 " data-aos="fade-up" data-aos-delay="300"
        data-aos-duration="800">
        <div class="flex justify-between">
            <div>
                <a href="{{route('home')}}">
                    <img height="30" class="h-[50px]" src="/assets/logo.jpg" alt="">
                </a>
            </div>
            <div class="flex items-center justify-end" data-aos="fade-right" data-aos-delay="400"
                data-aos-duration="800">
                <div class="flex-col items-center gap-4 justify-center">
                    <a href="/about" class="block shrink-0 text-center  px-2 py-2  text-gray-600  hover:text-red-800 ">
                        <span class="sr-only">About</span>
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 ml-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg> --}}
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="ionicon h-6 w-6 inline"
                            viewBox="0 0 512 512">
                            <path
                                d="M160 164s1.44-33 33.54-59.46C212.6 88.83 235.49 84.28 256 84c18.73-.23 35.47 2.94 45.48 7.82C318.59 100.2 352 120.6 352 164c0 45.67-29.18 66.37-62.35 89.18S248 298.36 248 324"
                                fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                stroke-width="40" />
                            <circle cx="248" cy="399.99" r="32" />
                        </svg> --}}
                        <span class="text-xs ">About</span>
                    </a>
                </div>

                <div class="flex-col items-center  justify-center" data-aos="fade-right" data-aos-delay="500"
                    data-aos-duration="1000">
                    <a href="{{route('store.cart')}}"
                        class="block shrink-0  px-2 py-2 text-gray-600  hover:text-red-800 ">
                        <span class="sr-only">Cart</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 inline ">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        <livewire:user-cart
                            classes="font-bold -ml-2 bg-red-500 text-white px-2 rounded-full  inline-block  scale-75 -translate-y-4" />

                        <span class="text-xs"></span>
                    </a>
                </div>

                @guest
                <a href="{{route('login')}}" class="block shrink-0  px-2 py-2 text-gray-600  hover:text-red-800 ">
                    <span class="text-xs">Login</span>
                </a>
                <a href="{{route('register')}}" class="block shrink-0  px-2 py-2 text-gray-600  hover:text-red-800 ">
                    <span class="text-xs">Register</span>
                </a>
                @endguest

                {{-- <span aria-hidden="true" class="block h-6 w-px rounded-full bg-gray-200"></span> --}}
                @auth

                <div class="relative" x-data="{ open: false }">
                    <button x-on:click="open = ! open" class="block shrink-0 hover:text-red-800  p-2 ">
                        <span class="sr-only">Profile</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </button>

                    <div x-show="open"
                        class="flex fixed w-40 border-1 text-xs flex-col mt-2 py-2  -ml-14 backdrop-blur-sm bg-white/40 shadow-sm">

                        <a href="#" class="border-b-2 p-1 flex items-center gap-2 px-4 hover:bg-amber-50">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                            My Orders
                        </a>
                        <a href="#" class="border-b-2 p-1 flex items-center gap-2 px-4 hover:bg-amber-50">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>

                            Profile
                        </a>
                        <a href="{{route('logout')}}"
                            class="border-b-2 p-1 flex items-center gap-2 px-4 hover:bg-amber-50">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>
                            Sign out
                        </a>

                    </div>

                </div>
                @endauth
            </div>

        </div>

    </div>
</header>