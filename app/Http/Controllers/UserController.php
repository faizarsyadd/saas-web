<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Model Kategori
use App\Models\Table;    // Model Meja
use App\Models\Menu;     // Model Menu
use App\Models\Order;    // Model Order

class UserController extends Controller
{
    // Home / Landing Page User
    public function index()
    {
        return view('user.index');
    }

    // Halaman Pilih Meja / Table
    public function table(Request $request)
    {
        // Ambil semua data meja dari database
        $tables = Table::all();

        // Ambil nomor meja yang sedang dipilih dari Session (jika ada)
        $selectedTableNumber = session('table_number', null);

        return view('user.table', compact('tables', 'selectedTableNumber'));
    }

    // Aksi saat user memilih nomor meja
    public function selectTable($number)
    {
        // Simpan nomor meja ke session
        session(['table_number' => $number]);

        // Redirect ke halaman daftar menu
        return redirect()->route('user.menu');
    }

    // Daftar Menu
    public function menu(Request $request)
    {
        $selectedCategoryId = $request->query('category_id', 'all');
        $selectedCategory = $selectedCategoryId;

        $query = Menu::with('category');

        if ($selectedCategoryId !== 'all') {
            $query->where('category_id', $selectedCategoryId);
        }

        $menus = $query->get();
        $categories = Category::all();

        return view('user.menu', compact('menus', 'categories', 'selectedCategoryId', 'selectedCategory'));
    }

    // Detail Menu
    public function detailMenu($id)
    {
        $menu = Menu::findOrFail($id);

        return view('user.detail_menu', compact('menu'));
    }

    // Keranjang Belanja
    public function keranjang()
    {
        return view('user.keranjang');
    }

    // Pembayaran QRIS
    public function payQris()
    {
        return view('user.pay_qris');
    }

    // Status Pesanan
    public function statusPesanan()
    {
        return view('user.status_pesanan');
    }

    // Riwayat Transaksi
    public function riwayat()
    {
        return view('user.riwayat');
    }
}