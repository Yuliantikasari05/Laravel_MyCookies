<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">Order Details</h1>
                        <span class="px-4 py-2 rounded-full text-sm font-semibold 
                            @if($order->status === 'completed') bg-green-100 text-green-800
                            @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                            @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                            @else bg-yellow-100 text-yellow-800
                            @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Order Information -->
                        <div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h2 class="font-semibold text-lg mb-4">Order Information</h2>
                                <dl class="space-y-2">
                                    <div class="flex justify-between">
                                        <dt class="text-gray-600">Order Number:</dt>
                                        <dd class="font-medium">{{ $order->order_number }}</dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt class="text-gray-600">Order Date:</dt>
                                        <dd>{{ $order->created_at->format('d M Y H:i') }}</dd>
                                    </div>
                                    <div class="flex justify-between">
                                        <dt class="text-gray-600">Total Amount:</dt>
                                        <dd class="font-medium">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</dd>
                                    </div>
                                </dl>
                            </div>

                            <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                                <h2 class="font-semibold text-lg mb-4">Shipping Address</h2>
                                <p class="whitespace-pre-line">{{ $order->shipping_address }}</p>
                            </div>

                            @if($order->notes)
                                <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                                    <h2 class="font-semibold text-lg mb-4">Order Notes</h2>
                                    <p class="whitespace-pre-line">{{ $order->notes }}</p>
                                </div>
                            @endif
                        </div>

                        <!-- Order Items -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h2 class="font-semibold text-lg mb-4">Order Items</h2>
                            <div class="space-y-4">
                                @foreach($order->items as $item)
                                    <div class="flex items-center gap-4">
                                        <img src="{{ asset('storage/' . $item->product->image) }}" 
                                             alt="{{ $item->product->name }}" 
                                             class="w-16 h-16 object-cover rounded">
                                        <div class="flex-1">
                                            <h3 class="font-medium">{{ $item->product->name }}</h3>
                                            <p class="text-sm text-gray-600">
                                                {{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}
                                            </p>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-medium">
                                                Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="border-t pt-4 mt-4">
                                    <div class="flex justify-between font-semibold">
                                        <span>Total</span>
                                        <span>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <a href="{{ route('orders.index') }}" class="text-brown-600 hover:text-brown-800">
                            ← Back to Orders
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>