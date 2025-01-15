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
            <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-lg rounded-xl hover:shadow-xl transition-all duration-300">
                <div class="p-8">
                    <div class="flex justify-between items-center mb-8">
                        <h1 class="text-2xl font-bold text-amber-900">Shopping Cart</h1>
                        <span class="text-amber-600"><?php echo e($cartItems->count()); ?> items</span>
                    </div>

                    <?php if($cartItems->count() > 0): ?>
                        <div class="divide-y divide-amber-100">
                            <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="py-6 flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
                                    <!-- Product Info -->
                                    <div class="flex items-center space-x-4">
                                        <div class="relative group">
                                            <img src="<?php echo e(asset('storage/' . $item->product->image)); ?>" 
                                                 alt="<?php echo e($item->product->name); ?>" 
                                                 class="w-24 h-24 object-cover rounded-xl shadow-md transform group-hover:scale-105 transition-all duration-200">
                                            <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10 rounded-xl transition-opacity duration-200"></div>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-amber-900"><?php echo e($item->product->name); ?></h3>
                                            <p class="text-amber-600 font-medium">Rp <?php echo e(number_format($item->product->price, 0, ',', '.')); ?></p>
                                            <p class="text-sm text-amber-500">In Stock</p>
                                        </div>
                                    </div>

                                    <!-- Quantity and Actions -->
                                    <div class="flex items-center space-x-6">
                                        <form action="<?php echo e(route('cart.update', $item)); ?>" method="POST" class="flex items-center space-x-2">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <button type="button" class="p-2 rounded-lg bg-amber-100 text-amber-600 hover:bg-amber-200">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                                </svg>
                                            </button>
                                            <input type="number" 
                                                   name="quantity" 
                                                   value="<?php echo e($item->quantity); ?>" 
                                                   min="1" 
                                                   class="w-16 text-center rounded-lg border-amber-200 focus:ring-amber-500 focus:border-amber-500">
                                            <button type="button" class="p-2 rounded-lg bg-amber-100 text-amber-600 hover:bg-amber-200">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                                </svg>
                                            </button>
                                        </form>
                                        <form action="<?php echo e(route('cart.destroy', $item)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="flex items-center text-red-500 hover:text-red-600 transition-colors duration-200">
                                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <!-- Order Summary -->
                            <div class="py-6">
                                <div class="bg-amber-50 rounded-xl p-6">
                                    <h3 class="text-lg font-semibold text-amber-900 mb-4">Order Summary</h3>
                                    <div class="space-y-2">
                                        <div class="flex justify-between text-amber-700">
                                            <span>Subtotal</span>
                                            <span>Rp <?php echo e(number_format($cartItems->sum(function($item) { return $item->product->price * $item->quantity; }), 0, ',', '.')); ?></span>
                                        </div>
                                        <div class="flex justify-between text-amber-700">
                                            <span>Shipping</span>
                                            <span>Free</span>
                                        </div>
                                        <div class="border-t border-amber-200 pt-2 mt-2">
                                            <div class="flex justify-between text-lg font-bold text-amber-900">
                                                <span>Total</span>
                                                <span>Rp <?php echo e(number_format($cartItems->sum(function($item) { return $item->product->price * $item->quantity; }), 0, ',', '.')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php echo e(route('checkout.index')); ?>" 
                                       class="mt-6 block w-full bg-amber-600 text-white text-center px-6 py-3 rounded-lg font-medium hover:bg-amber-500 transform hover:-translate-y-0.5 transition-all duration-200">
                                        Proceed to Checkout
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-12">
                            <div class="mb-6">
                                <svg class="w-16 h-16 text-amber-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <p class="text-amber-700 mb-6">Your cart is empty.</p>
                            <a href="<?php echo e(route('products.index')); ?>" 
                               class="inline-flex items-center px-6 py-3 bg-amber-600 text-white rounded-lg hover:bg-amber-500 transform hover:-translate-y-0.5 transition-all duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                                Continue Shopping
                            </a>
                        </div>
                    <?php endif; ?>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\my_cookies\resources\views/cart/index.blade.php ENDPATH**/ ?>