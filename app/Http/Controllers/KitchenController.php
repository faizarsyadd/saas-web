<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class KitchenController extends Controller
{
    public function index()
    {
        // Ambil order yang masih memiliki item dengan status pending/cooking
        $orders = Order::with(['table', 'orderItems.menu'])
            ->whereHas('orderItems', function ($query) {
                $query->whereIn('kitchen_status', ['pending', 'cooking']);
            })
            ->orderBy('created_at', 'asc')
            ->get();

        return view('admin.dapur', compact('orders'));
    }

    // AJAX: Update status checklist item (pending <-> completed)
    public function updateItemStatus(Request $request, $id)
    {
        $item = OrderItem::findOrFail($id);
        $item->kitchen_status = $request->status;
        $item->save();

        return response()->json(['success' => true, 'status' => $item->kitchen_status]);
    }

    // AJAX: Tandai seluruh item di pesanan ini selesai
    public function completeOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->orderItems()->update(['kitchen_status' => 'completed']);

        return response()->json(['success' => true]);
    }
}