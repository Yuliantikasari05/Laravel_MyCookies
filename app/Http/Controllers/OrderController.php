<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        // Pastikan user hanya bisa melihat ordernya sendiri
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        return view('orders.show', compact('order')); // Perbaiki ini dari 'orders.index' menjadi 'orders.show'
    }

    public function process(Order $order)
    {
        $order->status = 'processing';
        $order->save();

        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Order status updated to Processing.');
    }

    public function complete(Order $order)
    {
        $order->status = 'completed';
        $order->save();

        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Order status updated to Completed.');
    }
}