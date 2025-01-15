<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Cookies') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" /> 

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .nav-blur {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        
        .gradient-border {
            border-bottom: 2px solid;
            border-image: linear-gradient(to right, #f59e0b, #d97706) 1;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gradient-to-br from-amber-50 via-orange-50 to-yellow-50">
        <!-- Modern Navbar -->
        <nav class="sticky top-0 z-50 bg-white/80 nav-blur border-b border-amber-100 shadow-sm">
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="/" class="flex items-center space-x-2">
                            <!-- Tambahkan gambar logo -->
                            <img src="{{ asset('assets/logo.png') }}" alt="Logo My Cookies" class="h-10 w-10 object-contain">
                            <span class="text-amber-800 font-bold text-xl">My Cookies</span>
                        </a>
                    </div>


                    <!-- Desktop Navigation -->
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="/" class="text-amber-900 hover:text-amber-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Home</a>
                        <a href="/products" class="text-amber-900 hover:text-amber-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Shop</a>
                        <a href="/about" class="text-amber-900 hover:text-amber-600 px-3 py-2 text-sm font-medium transition-colors duration-200">About</a>
                        <a href="/contact" class="text-amber-900 hover:text-amber-600 px-3 py-2 text-sm font-medium transition-colors duration-200">Contact</a>
                    </div>

                    <!-- Right Navigation -->
                    <div class="flex items-center space-x-4">
                        <!-- Cart Icon - Updated to link to /cart -->
                        <a href="/cart" class="relative p-2 text-amber-900 hover:text-amber-600 transition-colors duration-200">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="absolute -top-1 -right-1 bg-amber-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">0</span>
                        </a>
                        
                        <!-- Dropdown Container -->
                        <div class="relative" x-data="{ isOpen: false }">
                            <!-- User Button -->
                            <button @click="isOpen = !isOpen" class="p-2 text-amber-900 hover:text-amber-600 transition-colors duration-200">
                                <i class="fas fa-user"></i>
                            </button>

                            <!-- Dropdown Menu -->
                            <div x-show="isOpen" 
                                @click.away="isOpen = false"
                                class="absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5"
                                style="display: none;">
                                @auth
                                    <!-- Profile Link -->
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50">
                                        <i class="fas fa-user-circle mr-2"></i>Profile
                                    </a>

                                    <!-- Logout Form -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" 
                                                class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-amber-50">
                                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                        </button>
                                    </form>
                                @else
                                    <!-- Login Link -->
                                    <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50">
                                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                                    </a>

                                    <!-- Register Link -->
                                    <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-amber-50">
                                        <i class="fas fa-user-plus mr-2"></i>Register
                                    </a>
                                @endauth
                            </div>
                        </div>

                        <!-- Add Alpine.js if not already included -->
                        <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
                        <button class="md:hidden p-2 text-amber-900 hover:text-amber-600" onclick="toggleMobileMenu()">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div id="mobileMenu" class="hidden md:hidden border-t border-amber-100">
                    <div class="px-2 pt-2 pb-3 space-y-1">
                        <a href="/" class="block px-3 py-2 text-amber-900 hover:bg-amber-100 rounded-md transition-colors duration-200">Home</a>
                        <a href="/shop" class="block px-3 py-2 text-amber-900 hover:bg-amber-100 rounded-md transition-colors duration-200">Shop</a>
                        <a href="/about" class="block px-3 py-2 text-amber-900 hover:bg-amber-100 rounded-md transition-colors duration-200">About</a>
                        <a href="/contact" class="block px-3 py-2 text-amber-900 hover:bg-amber-100 rounded-md transition-colors duration-200">Contact</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Header -->
        @if (isset($header))
            <header class="bg-white/50 nav-blur shadow-sm">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-bold text-amber-900">
                        {{ $header }}
                    </h1>
                </div>
            </header>
        @endif

        <!-- Main Content -->
        <main class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300">
                    {{ $slot }}
                </div>
            </div>
        </main>

        <!-- Modern Footer -->
        <footer class="bg-amber-900 text-amber-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <!-- Brand Info -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-bold">My Cookies</h3>
                        <p class="text-amber-300">Making every bite magical since 2024</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-amber-300 hover:text-white transition-colors duration-200">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="#" class="text-amber-300 hover:text-white transition-colors duration-200">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="text-amber-300 hover:text-white transition-colors duration-200">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Links -->
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-amber-300 hover:text-white transition-colors duration-200">Our Story</a></li>
                            <li><a href="#" class="text-amber-300 hover:text-white transition-colors duration-200">Menu</a></li>
                            <li><a href="#" class="text-amber-300 hover:text-white transition-colors duration-200">Reviews</a></li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                        <ul class="space-y-2">
                            <li class="flex items-center">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                123 Cookie Street
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-phone mr-2"></i>
                                +62 123 456 789
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-envelope mr-2"></i>
                                hello@mycookies.com
                            </li>
                        </ul>
                    </div>

                    <!-- Newsletter -->
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Newsletter</h4>
                        <form class="space-y-4">
                            <input type="email" placeholder="Your email" 
                                class="w-full px-4 py-2 rounded-lg bg-amber-800 text-amber-100 placeholder-amber-400 border border-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500">
                            <button class="w-full px-4 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-400 transition-colors duration-200">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Bottom Footer -->
                <div class="mt-12 pt-8 border-t border-amber-800">
                    <p class="text-center text-amber-400">&copy; 2024 My Cookies. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
    </script>
</body>
</html>
