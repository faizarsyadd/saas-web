<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Guest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Membuat pesanan baru (dari halaman user / scan QR meja).
     */
    public function store(Request $request)
    {
        $request->validate([
            'table_id'     => 'required|exists:tables,id',
            'guest_name'   => 'required|string|max:255',
            'guest_phone'  => 'nullable|string|max:20',
            'guest_email'  => 'nullable|email|max:255',
            'items'        => 'required|array|min:1',
            'items.*.id'   => 'required|exists:menus,id',
            'items.*.qty'  => 'required|integer|min:1',
        ]);

        return DB::transaction(function () use ($request) {
            // 1. Sinkronkan / Buat data Guest untuk CRM DineFlow
            $guest = null;
            if ($request->filled('guest_phone')) {
                $guest = Guest::firstOrCreate(
                    ['phone' => $request->guest_phone],
                    [
                        'name'  => $request->guest_name,
                        'email' => $request->guest_email,
                    ]
                );
            }

            // 2. Buat Order Utama
            $order = Order::create([
                'table_id'     => $request->table_id,
                'guest_id'     => $guest?->id,
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'status'       => 'pending',
                'total_amount' => 0,
            ]);

            $totalAmount = 0;

            // 3. Simpan Item Pesanan
            foreach ($request->items as $item) {
                $menu = Menu::findOrFail($item['id']);
                $subtotal = $menu->price * $item['qty'];

                OrderItem::create([
                    'order_id'   => $order->id,
                    'menu_id'    => $menu->id,
                    'quantity'   => $item['qty'],
                    'price'      => $menu->price,
                    'subtotal'   => $subtotal,
                ]);

                $totalAmount += $subtotal;
            }

            // 4. Update Total Nilai Pesanan
            $order->update(['total_amount' => $totalAmount]);

            return response()->json([
                'status'  => 'success',
                'message' => 'Pesanan berhasil dibuat.',
                'data'    => $order->load('items.menu', 'guest'),
            ], 201);
        });
    }

    /**
     * Memproses Pembayaran dan otomatis Mensingkronkan Metrik CRM.
     */
    public function processPayment(Request $request, $orderId)
    {
        $request->validate([
            'payment_method' => 'required|string|in:cash,qris,debit,credit',
            'amount_paid'    => 'required|numeric|min:0',
        ]);

        return DB::transaction(function () use ($request, $orderId) {
            $order = Order::findOrFail($orderId);

            if ($order->status === 'completed') {
                return response()->json(['message' => 'Pesanan ini sudah lunas.'], 400);
            }

            // 1. Simpan Transaksi Pembayaran
            $payment = Payment::create([
                'order_id'       => $order->id,
                'payment_method' => $request->payment_method,
                'amount'         => $request->amount_paid,
                'status'         => 'completed',
            ]);

            // 2. Perbarui Status Pesanan
            $order->update(['status' => 'completed']);

            // 3. SINKRONISASI OTOMATIS KE CRM DINEFLOW (Metrik Pelanggan & LTV)
            if ($order->guest_id) {
                $this->syncGuestCrmData($order->guest_id, $order->total_amount);
            }

            return response()->json([
                'status'  => 'success',
                'message' => 'Pembayaran berhasil diselesaikan dan data CRM telah disinkronkan.',
                'payment' => $payment,
            ]);
        });
    }

    /**
     * Helper Function: Logika pembaruan metrik LTV Guest di CRM.
     */
    private function syncGuestCrmData($guestId, $amountSpent)
    {
        $guest = Guest::find($guestId);
        if (!$guest) return;

        // Akumulasi belanja dan total kunjungan
        $guest->total_spent += $amountSpent;
        $guest->total_visits += 1;
        $guest->last_visit_at = now();

        // Kategori Segmentasi LTV Otomatis
        if ($guest->total_spent >= 1000000) {
            $guest->ltv_segment = 'High LTV';
        } elseif ($guest->total_spent >= 300000) {
            $guest->ltv_segment = 'Medium LTV';
        } else {
            $guest->ltv_segment = 'New Customer';
        }

        $guest->save();
    }
}