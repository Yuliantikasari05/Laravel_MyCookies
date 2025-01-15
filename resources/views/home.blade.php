<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-lg rounded-xl mb-8 hover:shadow-xl transition-all duration-300">
                <div class="p-8 text-amber-900">
                    <h1 class="text-4xl font-bold text-center mb-4 bg-gradient-to-r from-amber-800 to-amber-600 text-transparent bg-clip-text">Welcome to My Cookies</h1>
                    <p class="text-center text-lg text-amber-700">Discover our delicious homemade cookies!</p>
                    <div class="flex justify-center mt-6">
                        <a href="{{ route('products.index') }}" 
                           class="inline-flex items-center px-6 py-3 rounded-full bg-gradient-to-r from-amber-600 to-amber-500 text-white font-semibold shadow-lg hover:from-amber-500 hover:to-amber-400 transform hover:-translate-y-0.5 transition-all duration-200">
                            <span>Shop Now</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Featured Products -->
            <h2 class="text-2xl font-bold mb-6 text-amber-900 border-b-2 border-amber-200 pb-2">Featured Products</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-md overflow-hidden hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                        <div class="relative group">
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-lg font-semibold text-amber-900 mb-2">{{ $product->name }}</h3>
                            <p class="text-amber-700 font-medium mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <div class="flex space-x-2">
                                <a href="{{ route('products.show', $product) }}" 
                                   class="flex-1 inline-flex justify-center items-center px-4 py-2 rounded-lg bg-amber-600 text-white font-medium hover:bg-amber-500 transform hover:-translate-y-0.5 transition-all duration-200">
                                    <span>View Details</span>
                                </a>
                                <button class="p-2 rounded-lg bg-amber-100 text-amber-600 hover:bg-amber-200 transform hover:-translate-y-0.5 transition-all duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>