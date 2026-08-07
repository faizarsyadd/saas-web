<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Table;
use App\Models\Order;
use App\Models\Menu;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
    public function index()
    {
        $tables = Table::with(['orders' => function($q) {
            $q->whereIn('order_status', ['pending', 'occupied', 'processing'])
              ->with('orderItems.menu');
        }])->get()->map(function($table) {
            $activeOrder = $table->orders->first();
            
            return [
                'id' => $table->id,
                'name' => $table->table_number,
                'capacity' => $table->capacity ?? 4,
                'shape' => $table->shape ?? 'square',
                'x_pos' => $table->x_pos ?? 10,
                'y_pos' => $table->y_pos ?? 10,
                'status' => $activeOrder ? 'occupied' : $table->status,
                'active_order_id' => $activeOrder ? $activeOrder->id : null,
                'order_number' => $activeOrder ? $activeOrder->order_number : null,
                'active_order_total' => $activeOrder ? $activeOrder->total_amount : 0,
                'items' => $activeOrder ? $activeOrder->orderItems->map(function($item) {
                    return [
                        'name' => $item->menu->name ?? 'Menu Item',
                        'qty' => $item->quantity,
                        'price' => $item->price
                    ];
                })->values()->toArray() : []
            ];
        });

        $menus = Menu::all();

        return view('admin.kasir', compact('tables', 'menus'));
    }

    // Tambah Meja Baru
    public function storeTable(Request $request)
    {
        $request->validate([
            'table_number' => 'required|string|unique:tables,table_number',
            'capacity' => 'required|numeric|min:1',
            'shape' => 'required|in:square,circle,rectangle'
        ]);

        $table = Table::create([
            'table_number' => $request->table_number,
            'qr_code_key' => 'table-' . Str::slug($request->table_number),
            'capacity' => $request->capacity,
            'shape' => $request->shape,
            'status' => 'available',
            'x_pos' => 20, // default di tengah/kiri canvas
            'y_pos' => 20
        ]);

        return response()->json(['success' => true, 'table' => $table]);
    }

    // Update Posisi Drag and Drop Meja
    public function updatePositions(Request $request)
    {
        $request->validate([
            'positions' => 'required|array'
        ]);

        foreach ($request->positions as $pos) {
            Table::where('id', $pos['id'])->update([
                'x_pos' => $pos['x_pos'],
                'y_pos' => $pos['y_pos']
            ]);
        }

        return response()->json(['success' => true]);
    }

    // Hapus Meja
    public function destroyTable($id)
    {
        $table = Table::findOrFail($id);
        if ($table->status === 'occupied') {
            return response()->json(['success' => false, 'message' => 'Meja sedang terisi pesanan!'], 422);
        }

        $table->delete();
        return response()->json(['success' => true]);
    }

    public function pay(Request $request, $orderId)
    {
        DB::transaction(function () use ($request, $orderId) {
            $order = Order::findOrFail($orderId);

            Payment::create([
                'order_id' => $order->id,
                'amount' => $request->amount,
                'payment_method' => 'cash',
                'status' => 'success'
            ]);

            $order->update([
                'order_status' => 'completed',
                'payment_status' => 'paid'
            ]);

            if ($order->table_id) {
                Table::where('id', $order->table_id)->update(['status' => 'available']);
            }
        });

        return response()->json(['success' => true]);
    }
}