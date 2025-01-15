<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Sidebar -->
                <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <h2 class="text-xl font-bold text-amber-900 mb-6 pb-2 border-b-2 border-amber-100">Categories</h2>
                    <ul class="space-y-3">
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('products.index', ['category' => $category->slug]) }}" 
                                   class="flex items-center text-amber-700 hover:text-amber-500 hover:bg-amber-50 p-2 rounded-lg transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Price Filter -->
                    <form action="{{ route('products.index') }}" method="GET" class="mt-8">
                        <h3 class="text-lg font-semibold text-amber-900 mb-4">Price Range</h3>
                        <div class="space-y-2">
                            <input type="range" name="min_price" min="0" max="1000000" value="{{ request('min_price', 0) }}" class="w-full accent-amber-600">
                            <input type="range" name="max_price" min="0" max="1000000" value="{{ request('max_price', 1000000) }}" class="w-full accent-amber-600">
                            <div class="flex justify-between text-sm text-amber-600">
                                <span>Rp <span id="min-price">{{ request('min_price', 0) }}</span></span>
                                <span>Rp <span id="max-price">{{ request('max_price', 1000000) }}</span></span>
                            </div>
                        </div>
                        <button type="submit" class="mt-4 w-full bg-amber-500 text-white py-2 rounded-lg hover:bg-amber-600 transition-colors duration-200">Apply Filter</button>
                    </form>
                </div>

                <!-- Products Grid -->
                <div class="md:col-span-3">
                    <!-- Filters Bar -->
                    <div class="bg-white/80 backdrop-blur-sm p-4 rounded-xl shadow-md mb-6 flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <span class="text-amber-900">Sort by:</span>
                            <select name="sort" onchange="this.form.submit()" class="rounded-lg border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50">
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                            </select>
                        </div>
                        <div class="text-amber-700">
                            Showing {{ $products->firstItem() }} - {{ $products->lastItem() }} of {{ $products->total() }} products
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($products as $product)
                            <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg overflow-hidden hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                                <div class="relative group">
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                                    <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                                </div>
                                <div class="p-5">
                                    <h3 class="text-lg font-semibold text-amber-900 mb-2">{{ $product->name }}</h3>
                                    <p class="text-amber-700 font-medium mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                    
                                    @if ($product->discount)
                                        <div class="inline-block bg-red-500 text-white text-sm px-2 py-1 rounded-lg mb-3">
                                            {{ $product->discount }}% OFF
                                        </div>
                                    @endif

                                    <div class="flex space-x-2">
                                        <a href="{{ route('products.show', $product) }}" 
                                           class="flex-1 inline-flex justify-center items-center px-4 py-2 rounded-lg bg-amber-600 text-white font-medium hover:bg-amber-500 transform hover:-translate-y-0.5 transition-all duration-200">
                                            View Details
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

                    <div class="mt-8">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Sidebar -->
                <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <h2 class="text-xl font-bold text-amber-900 mb-6 pb-2 border-b-2 border-amber-100">Categories</h2>
                    <ul class="space-y-3">
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('products.index', ['category' => $category->slug]) }}" 
                                   class="flex items-center text-amber-700 hover:text-amber-500 hover:bg-amber-50 p-2 rounded-lg transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Price Filter -->
                    <form action="{{ route('products.index') }}" method="GET" class="mt-8">
                        <h3 class="text-lg font-semibold text-amber-900 mb-4">Price Range</h3>
                        <div class="space-y-2">
                            <input type="range" name="min_price" min="0" max="1000000" value="{{ request('min_price', 0) }}" class="w-full accent-amber-600">
                            <input type="range" name="max_price" min="0" max="1000000" value="{{ request('max_price', 1000000) }}" class="w-full accent-amber-600">
                            <div class="flex justify-between text-sm text-amber-600">
                                <span>Rp <span id="min-price">{{ request('min_price', 0) }}</span></span>
                                <span>Rp <span id="max-price">{{ request('max_price', 1000000) }}</span></span>
                            </div>
                        </div>
                        <button type="submit" class="mt-4 w-full bg-amber-500 text-white py-2 rounded-lg hover:bg-amber-600 transition-colors duration-200">Apply Filter</button>
                    </form>
                </div>

                <!-- Products Grid -->
                <div class="md:col-span-3">
                    <!-- Filters Bar -->
                    <div class="bg-white/80 backdrop-blur-sm p-4 rounded-xl shadow-md mb-6 flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <span class="text-amber-900">Sort by:</span>
                            <select name="sort" onchange="this.form.submit()" class="rounded-lg border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50">
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                            </select>
                        </div>
                        <div class="text-amber-700">
                            Showing {{ $products->firstItem() }} - {{ $products->lastItem() }} of {{ $products->total() }} products
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($products as $product)
                            <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg overflow-hidden hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                                <div class="relative group">
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                                    <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                                </div>
                                <div class="p-5">
                                    <h3 class="text-lg font-semibold text-amber-900 mb-2">{{ $product->name }}</h3>
                                    <p class="text-amber-700 font-medium mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                    
                                    @if ($product->discount)
                                        <div class="inline-block bg-red-500 text-white text-sm px-2 py-1 rounded-lg mb-3">
                                            {{ $product->discount }}% OFF
                                        </div>
                                    @endif

                                    <div class="flex space-x-2">
                                        <a href="{{ route('products.show', $product) }}" 
                                           class="flex-1 inline-flex justify-center items-center px-4 py-2 rounded-lg bg-amber-600 text-white font-medium hover:bg-amber-500 transform hover:-translate-y-0.5 transition-all duration-200">
                                            View Details
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

                    <div class="mt-8">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

