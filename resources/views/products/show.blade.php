<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-sm shadow-lg rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300">
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                        <!-- Product Image Section -->
                        <div class="space-y-4">
                            <div class="relative group">
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full rounded-xl shadow-md object-cover transform group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10 rounded-xl transition-opacity duration-300"></div>
                            </div>
                            <!-- Thumbnail Gallery -->
                            <div class="grid grid-cols-4 gap-2">
                                <div class="aspect-square rounded-lg bg-amber-50 cursor-pointer hover:ring-2 ring-amber-500 transition-all duration-200"></div>
                                <div class="aspect-square rounded-lg bg-amber-50 cursor-pointer hover:ring-2 ring-amber-500 transition-all duration-200"></div>
                                <div class="aspect-square rounded-lg bg-amber-50 cursor-pointer hover:ring-2 ring-amber-500 transition-all duration-200"></div>
                                <div class="aspect-square rounded-lg bg-amber-50 cursor-pointer hover:ring-2 ring-amber-500 transition-all duration-200"></div>
                            </div>
                        </div>

                        <!-- Product Details Section -->
                        <div class="space-y-6">
                            <div>
                                <h1 class="text-3xl font-bold text-amber-900 mb-2">{{ $product->name }}</h1>
                                <div class="flex items-center space-x-2 mb-4">
                                    <div class="flex text-amber-500">
                                        @for ($i = 0; $i < 5; $i++)
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        @endfor
                                    </div>
                                    <span class="text-amber-700">(4.5/5) from 128 reviews</span>
                                </div>
                                <p class="text-amber-700 leading-relaxed mb-6">{{ $product->description }}</p>
                            </div>

                            <div class="border-t border-amber-100 pt-6">
                                <div class="flex items-baseline mb-4">
                                    <span class="text-3xl font-bold text-amber-900">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    <span class="ml-2 text-green-600 text-sm">In Stock</span>
                                </div>
                                
                                <form action="{{ route('cart.store') }}" method="POST" class="space-y-6">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    
                                    <div>
                                        <label for="quantity" class="block text-sm font-medium text-amber-700 mb-2">Quantity</label>
                                        <div class="flex items-center space-x-3">
                                            <button type="button" class="p-2 rounded-lg bg-amber-100 text-amber-600 hover:bg-amber-200">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                                </svg>
                                            </button>
                                            <input type="number" 
                                                   name="quantity" 
                                                   id="quantity" 
                                                   min="1" 
                                                   value="1" 
                                                   class="w-20 text-center rounded-lg border-amber-200 focus:ring-amber-500 focus:border-amber-500">
                                            <button type="button" class="p-2 rounded-lg bg-amber-100 text-amber-600 hover:bg-amber-200">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="flex space-x-4">
                                        <button type="submit" 
                                                class="flex-1 bg-amber-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-amber-500 transform hover:-translate-y-0.5 transition-all duration-200">
                                            Add to Cart
                                        </button>
                                        <button type="button" 
                                                class="p-3 rounded-lg bg-amber-100 text-amber-600 hover:bg-amber-200 transform hover:-translate-y-0.5 transition-all duration-200">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>