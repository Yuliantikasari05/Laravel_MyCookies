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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">My Orders</h1>

                    <?php if($orders->isEmpty()): ?>
                        <p class="text-center text-gray-600">You haven't placed any orders yet.</p>
                        <div class="mt-4 text-center">
                            <a href="<?php echo e(route('products.index')); ?>" class="text-brown-600 hover:text-brown-800">
                                Browse Products
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="space-y-6">
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="bg-white border rounded-lg overflow-hidden">
                                    <div class="p-4 sm:p-6">
                                        <div class="flex items-center justify-between mb-4">
                                            <div>
                                                <h3 class="text-lg font-semibold">
                                                    Order #<?php echo e($order->order_number); ?>

                                                </h3>
                                                <p class="text-sm text-gray-600">
                                                    Placed on <?php echo e($order->created_at->format('M d, Y')); ?>

                                                </p>
                                            </div>
                                            <span class="px-4 py-2 rounded-full text-sm font-semibold 
                                                <?php if($order->status === 'completed'): ?> bg-green-100 text-green-800
                                                <?php elseif($order->status === 'processing'): ?> bg-blue-100 text-blue-800
                                                <?php elseif($order->status === 'cancelled'): ?> bg-red-100 text-red-800
                                                <?php else: ?> bg-yellow-100 text-yellow-800
                                                <?php endif; ?>">
                                                <?php echo e(ucfirst($order->status)); ?>

                                            </span>
                                        </div>

                                        <div class="border-t pt-4">
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <p class="text-sm text-gray-600">
                                                        <?php echo e($order->items->count()); ?> 
                                                        <?php echo e(Str::plural('item', $order->items->count())); ?>

                                                    </p>
                                                    <p class="font-medium">
                                                        Total: Rp <?php echo e(number_format($order->total_amount, 0, ',', '.')); ?>

                                                    </p>
                                                </div>
                                                <a href="<?php echo e(route('orders.show', $order)); ?>" 
                                                   class="inline-flex items-center px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700">
                                                    View Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="mt-6">
                            <?php echo e($orders->links()); ?>

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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\my_cookies\resources\views/orders/index.blade.php ENDPATH**/ ?>