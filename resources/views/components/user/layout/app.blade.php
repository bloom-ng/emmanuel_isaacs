<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Emmanuel Isaacs</title>
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        
        <!-- Styles -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
        
        <!-- Icons -->
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

        
        @livewireStyles

        {{-- Preloader styles --}}
        <style>
            /* Add any additional custom styles for the preloader here */
    
            /* Example of a stylish preloader */
            .preloader {
                display: flex;
                align-items: center;
                justify-content: center;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: #f5f5f5;
                z-index: 9999;
            }
    
            .preloader .spinner {
                width: 90px;
                height: 80px;
                border: 18px solid #f19a17;
                border-top-color: #fdfdfb;
                border-radius: 50%;
                transform-style: preserve-3d;
                animation: spin 1s infinite cubic-bezier(0.48, -1.05, 0.465, -0.25);
            }
    
            
        .preloader .spinner:before,
        .preloader .spinner:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 10px solid #a36609;
            border-top-color: #c7a86e;
            border-radius: 50%;
        }

        .preloader .spinner:before {
            animation: rotate-z 2s infinite linear;
        }

        .preloader .spinner:after {
            animation: rotate-y 3s infinite cubic-bezier(0.39, -0.575, 0.565, 1);
        }

        @keyframes spin {
            0% {
                transform: rotateX(0) rotateY(0) rotateZ(0);
            }
            100% {
                transform: rotateX(1turn) rotateY(1turn) rotateZ(1turn);
            }
        }

        @keyframes rotate-z {
            0% {
                transform: rotateZ(0);
            }
            100% {
                transform: rotateZ(1turn);
            }
        }

        @keyframes rotate-y {
            0% {
                transform: rotateY(0);
            }
            100% {
                transform: rotateY(1turn);
            }
        }
        </style>
    </head>
    
    <body class="min-h-screen">
        <div class="preloader">
            <div class="spinner"></div>
        </div>
        <div id="app">
            @include('components.user.layout.nav')
        
            <main class="mb-48">
                {{ $slot }}
            </main>

            @include('components.user.layout.footer')
        </div>

        @stack('modals')
        
        @livewireScripts
        
        @stack('scripts')

        {{-- Preloader script --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(function() {
                document.querySelector('.preloader').style.display = 'none';
            }, 5000);
            });
        </script>
        
        <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
        
        @if (session()->has('success')) 
        <script>
            var notyf = new Notyf({dismissible: true})
            notyf.success('{{ session('success') }}')
        </script> 
        @endif
        
        <script>
            /* Simple Alpine Image Viewer */
            document.addEventListener('alpine:init', () => {
               
            })
        </script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    cssMode: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
    },
    mousewheel: true,
    keyboard: true,
    autoplay: {
        delay: 5000
    },
    
  });
</script>
    </body>
</html>