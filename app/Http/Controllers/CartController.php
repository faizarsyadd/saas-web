<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class CartController extends Controller
{
    // Tampilkan Halaman Keranjang
    public function index()
    {
        $cart = session()->get('cart', []);
        
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $serviceCharge = $subtotal * 0.05; // 5%
        $tax = $subtotal * 0.10; // 10%
        $total = $subtotal + $serviceCharge + $tax;

        return view('user.keranjang', compact('cart', 'subtotal', 'serviceCharge', 'tax', 'total'));
    }

    // Tambah Item ke Keranjang (Session)
    public function addToCart(Request $request)
    {
        $menuId = $request->input('menu_id');
        $quantity = (int) $request->input('quantity', 1);
        $size = $request->input('size', 'regular');
        $toppings = $request->input('toppings', []);
        $notes = $request->input('notes', '');

        $menu = Menu::find($menuId);

        if (!$menu) {
            if ($request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Menu tidak ditemukan!'], 404);
            }
            return redirect()->back()->with('error', 'Menu tidak ditemukan!');
        }

        $extraPrice = 0;
        if ($size === 'large') {
            $extraPrice += 15000;
        }
        if (in_array('cheese', $toppings)) {
            $extraPrice += 5000;
        }
        if (in_array('sauce', $toppings)) {
            $extraPrice += 3000;
        }

        $finalPrice = $menu->price + $extraPrice;
        $cart = session()->get('cart', []);
        $cartKey = $menuId . '_' . $size . '_' . implode('-', $toppings);

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $quantity;
        } else {
            $cart[$cartKey] = [
                'id' => $menu->id,
                'name' => $menu->name,
                'price' => $finalPrice,
                'quantity' => $quantity,
                'size' => $size,
                'toppings' => $toppings,
                'notes' => $notes,
                'image' => $menu->id . '.jpg'
            ];
        }

        session()->put('cart', $cart);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Menu berhasil ditambahkan!']);
        }

        return redirect()->back()->with('success', 'Menu berhasil ditambahkan ke keranjang!');
    }

    // Update Quantity Item via AJAX
    public function updateQuantity(Request $request)
    {
        $key = $request->input('key');
        $quantity = (int) $request->input('quantity');

        $cart = session()->get('cart', []);

        if (isset($cart[$key])) {
            if ($quantity > 0) {
                $cart[$key]['quantity'] = $quantity;
                session()->put('cart', $cart);
            } else {
                unset($cart[$key]);
                session()->put('cart', $cart);
            }
        }

        return $this->getCartTotalsResponse();
    }

    // Hapus Item dari Keranjang via AJAX
    public function removeItem(Request $request)
    {
        $key = $request->input('key');
        $cart = session()->get('cart', []);

        if (isset($cart[$key])) {
            unset($cart[$key]);
            session()->put('cart', $cart);
        }

        return $this->getCartTotalsResponse();
    }

    // Helper untuk kalkulasi ulang total & return Response JSON
    private function getCartTotalsResponse()
    {
        $cart = session()->get('cart', []);
        $subtotal = 0;

        foreach ($cart as $item) {
            $subtotal += ($item['price'] ?? 0) * ($item['quantity'] ?? 1);
        }

        $serviceCharge = $subtotal * 0.05;
        $tax = $subtotal * 0.10;
        $total = $subtotal + $serviceCharge + $tax;

        return response()->json([
            'success' => true,
            'is_empty' => empty($cart),
            'subtotal' => $subtotal,
            'serviceCharge' => $serviceCharge,
            'tax' => $tax,
            'total' => $total
        ]);
    }
}