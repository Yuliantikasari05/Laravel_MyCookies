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
            <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-lg rounded-xl transition-all duration-300">
                <div class="p-8">
                    <h1 class="text-2xl font-bold text-amber-900 mb-8">Checkout</h1>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Shipping Form -->
                        <div class="bg-white/80 rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                            <h2 class="text-lg font-semibold text-amber-900 mb-4">Shipping Information</h2>
                            <form action="<?php echo e(route('checkout.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="space-y-6">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-amber-700">Full Name</label>
                                        <input type="text" name="name" id="name" value="<?php echo e(auth()->user()->name); ?>" class="mt-1 block w-full rounded-lg border-amber-300 focus:ring-amber-500 focus:border-amber-500" required>
                                    </div>

                                    <div>
                                        <label for="email" class="block text-sm font-medium text-amber-700">Email Address</label>
                                        <input type="email" name="email" id="email" value="<?php echo e(auth()->user()->email); ?>" class="mt-1 block w-full rounded-lg border-amber-300 focus:ring-amber-500 focus:border-amber-500" required>
                                    </div>

                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-amber-700">Phone Number</label>
                                        <input type="tel" name="phone" id="phone" class="mt-1 block w-full rounded-lg border-amber-300 focus:ring-amber-500 focus:border-amber-500" required>
                                    </div>

                                    <div>
                                        <label for="address" class="block text-sm font-medium text-amber-700">Shipping Address</label>
                                        <textarea name="shipping_address" id="address" rows="3" class="mt-1 block w-full rounded-lg border-amber-300 focus:ring-amber-500 focus:border-amber-500" required></textarea>
                                    </div>

                                    <div>
                                        <label for="notes" class="block text-sm font-medium text-amber-700">Order Notes (Optional)</label>
                                        <textarea name="notes" id="notes" rows="2" class="mt-1 block w-full rounded-lg border-amber-300 focus:ring-amber-500 focus:border-amber-500"></textarea>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <button type="submit" class="w-full bg-amber-600 text-white text-center px-6 py-3 rounded-lg font-medium hover:bg-amber-500 transform hover:-translate-y-0.5 transition-all duration-200">
                                        Place Order
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Order Summary -->
                        <div class="bg-white/80 rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 h-fit">
                            <h2 class="text-lg font-semibold text-amber-900 mb-4">Order Summary</h2>
                            <div class="space-y-4">
                                <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex items-center gap-4">
                                        <img src="<?php echo e(asset('storage/' . $item->product->image)); ?>" alt="<?php echo e($item->product->name); ?>" class="w-16 h-16 object-cover rounded-xl shadow-md">
                                        <div class="flex-1">
                                            <h3 class="font-medium text-amber-900"><?php echo e($item->product->name); ?></h3>
                                            <p class="text-sm text-amber-600">Quantity: <?php echo e($item->quantity); ?></p>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-medium text-amber-700">Rp <?php echo e(number_format($item->product->price * $item->quantity, 0, ',', '.')); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <div class="border-t pt-4 space-y-2">
                                    <div class="flex justify-between text-sm text-amber-700">
                                        <span>Subtotal</span>
                                        <span>Rp <?php echo e(number_format($total, 0, ',', '.')); ?></span>
                                    </div>
                                    <div class="flex justify-between text-sm text-amber-700">
                                        <span>Shipping</span>
                                        <span>Free</span>
                                    </div>
                                    <div class="flex justify-between font-semibold pt-2 border-t text-amber-900">
                                        <span>Total</span>
                                        <span>Rp <?php echo e(number_format($total, 0, ',', '.')); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<?php /**PATH C:\xampp\htdocs\my_cookies\resources\views/checkout/index.blade.php ENDPATH**/ ?>