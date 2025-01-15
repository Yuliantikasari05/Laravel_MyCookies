<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Sidebar -->
                <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <h2 class="text-xl font-bold text-amber-900 mb-6 pb-2 border-b-2 border-amber-100">Categories</h2>
                    <ul class="space-y-3">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(route('products.index', ['category' => $category->slug])); ?>" 
                                   class="flex items-center text-amber-700 hover:text-amber-500 hover:bg-amber-50 p-2 rounded-lg transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <?php echo e($category->name); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <!-- Price Filter -->
                    <form action="<?php echo e(route('products.index')); ?>" method="GET" class="mt-8">
                        <h3 class="text-lg font-semibold text-amber-900 mb-4">Price Range</h3>
                        <div class="space-y-2">
                            <input type="range" name="min_price" min="0" max="1000000" value="<?php echo e(request('min_price', 0)); ?>" class="w-full accent-amber-600">
                            <input type="range" name="max_price" min="0" max="1000000" value="<?php echo e(request('max_price', 1000000)); ?>" class="w-full accent-amber-600">
                            <div class="flex justify-between text-sm text-amber-600">
                                <span>Rp <span id="min-price"><?php echo e(request('min_price', 0)); ?></span></span>
                                <span>Rp <span id="max-price"><?php echo e(request('max_price', 1000000)); ?></span></span>
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
                                <option value="latest" <?php echo e(request('sort') == 'latest' ? 'selected' : ''); ?>>Latest</option>
                                <option value="price_asc" <?php echo e(request('sort') == 'price_asc' ? 'selected' : ''); ?>>Price: Low to High</option>
                                <option value="price_desc" <?php echo e(request('sort') == 'price_desc' ? 'selected' : ''); ?>>Price: High to Low</option>
                            </select>
                        </div>
                        <div class="text-amber-700">
                            Showing <?php echo e($products->firstItem()); ?> - <?php echo e($products->lastItem()); ?> of <?php echo e($products->total()); ?> products
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg overflow-hidden hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                                <div class="relative group">
                                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" 
                                         alt="<?php echo e($product->name); ?>" 
                                         class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                                    <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                                </div>
                                <div class="p-5">
                                    <h3 class="text-lg font-semibold text-amber-900 mb-2"><?php echo e($product->name); ?></h3>
                                    <p class="text-amber-700 font-medium mb-4">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></p>
                                    
                                    <?php if($product->discount): ?>
                                        <div class="inline-block bg-red-500 text-white text-sm px-2 py-1 rounded-lg mb-3">
                                            <?php echo e($product->discount); ?>% OFF
                                        </div>
                                    <?php endif; ?>

                                    <div class="flex space-x-2">
                                        <a href="<?php echo e(route('products.show', $product)); ?>" 
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="mt-8">
                        <?php echo e($products->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Sidebar -->
                <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <h2 class="text-xl font-bold text-amber-900 mb-6 pb-2 border-b-2 border-amber-100">Categories</h2>
                    <ul class="space-y-3">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(route('products.index', ['category' => $category->slug])); ?>" 
                                   class="flex items-center text-amber-700 hover:text-amber-500 hover:bg-amber-50 p-2 rounded-lg transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <?php echo e($category->name); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <!-- Price Filter -->
                    <form action="<?php echo e(route('products.index')); ?>" method="GET" class="mt-8">
                        <h3 class="text-lg font-semibold text-amber-900 mb-4">Price Range</h3>
                        <div class="space-y-2">
                            <input type="range" name="min_price" min="0" max="1000000" value="<?php echo e(request('min_price', 0)); ?>" class="w-full accent-amber-600">
                            <input type="range" name="max_price" min="0" max="1000000" value="<?php echo e(request('max_price', 1000000)); ?>" class="w-full accent-amber-600">
                            <div class="flex justify-between text-sm text-amber-600">
                                <span>Rp <span id="min-price"><?php echo e(request('min_price', 0)); ?></span></span>
                                <span>Rp <span id="max-price"><?php echo e(request('max_price', 1000000)); ?></span></span>
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
                                <option value="latest" <?php echo e(request('sort') == 'latest' ? 'selected' : ''); ?>>Latest</option>
                                <option value="price_asc" <?php echo e(request('sort') == 'price_asc' ? 'selected' : ''); ?>>Price: Low to High</option>
                                <option value="price_desc" <?php echo e(request('sort') == 'price_desc' ? 'selected' : ''); ?>>Price: High to Low</option>
                            </select>
                        </div>
                        <div class="text-amber-700">
                            Showing <?php echo e($products->firstItem()); ?> - <?php echo e($products->lastItem()); ?> of <?php echo e($products->total()); ?> products
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg overflow-hidden hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                                <div class="relative group">
                                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" 
                                         alt="<?php echo e($product->name); ?>" 
                                         class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                                    <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                                </div>
                                <div class="p-5">
                                    <h3 class="text-lg font-semibold text-amber-900 mb-2"><?php echo e($product->name); ?></h3>
                                    <p class="text-amber-700 font-medium mb-4">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></p>
                                    
                                    <?php if($product->discount): ?>
                                        <div class="inline-block bg-red-500 text-white text-sm px-2 py-1 rounded-lg mb-3">
                                            <?php echo e($product->discount); ?>% OFF
                                        </div>
                                    <?php endif; ?>

                                    <div class="flex space-x-2">
                                        <a href="<?php echo e(route('products.show', $product)); ?>" 
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="mt-8">
                        <?php echo e($products->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\my_cookies\resources\views/products/index.blade.php ENDPATH**/ ?>