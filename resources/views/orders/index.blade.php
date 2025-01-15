<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">My Orders</h1>

                    @if($orders->isEmpty())
                        <p class="text-center text-gray-600">You haven't placed any orders yet.</p>
                        <div class="mt-4 text-center">
                            <a href="{{ route('products.index') }}" class="text-brown-600 hover:text-brown-800">
                                Browse Products
                            </a>
                        </div>
                    @else
                        <div class="space-y-6">
                            @foreach($orders as $order)
                                <div class="bg-white border rounded-lg overflow-hidden">
                                    <div class="p-4 sm:p-6">
                                        <div class="flex items-center justify-between mb-4">
                                            <div>
                                                <h3 class="text-lg font-semibold">
                                                    Order #{{ $order->order_number }}
                                                </h3>
                                                <p class="text-sm text-gray-600">
                                                    Placed on {{ $order->created_at->format('M d, Y') }}
                                                </p>
                                            </div>
                                            <span class="px-4 py-2 rounded-full text-sm font-semibold 
                                                @if($order->status === 'completed') bg-green-100 text-green-800
                                                @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                                @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                                                @else bg-yellow-100 text-yellow-800
                                                @endif">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </div>

                                        <div class="border-t pt-4">
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <p class="text-sm text-gray-600">
                                                        {{ $order->items->count() }} 
                                                        {{ Str::plural('item', $order->items->count()) }}
                                                    </p>
                                                    <p class="font-medium">
                                                        Total: Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                                                    </p>
                                                </div>
                                                <a href="{{ route('orders.show', $order) }}" 
                                                   class="inline-flex items-center px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700">
                                                    View Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-6">
                            {{ $orders->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>