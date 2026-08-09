<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::all();
        $criticalInventories = Inventory::whereColumn('stock', '<=', 'min_stock')->get();
        
        $chartLabels = ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'];
        $chartDatasets = [];

        return view('admin.inventory', compact(
            'inventories',
            'criticalInventories',
            'chartLabels',
            'chartDatasets'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'stock'     => 'required|numeric|min:0',
            'unit'      => 'required|string|max:50',
            'min_stock' => 'required|numeric|min:0',
        ]);

        Inventory::create($validated);

        return redirect()->route('admin.inventory.index')->with('success', 'Bahan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'stock'     => 'required|numeric|min:0',
            'unit'      => 'required|string|max:50',
            'min_stock' => 'required|numeric|min:0',
        ]);

        $inventory = Inventory::findOrFail($id);
        $inventory->update($validated);

        return redirect()->route('admin.inventory.index')->with('success', 'Bahan berhasil diperbarui.');
    }

    // Method ini yang menyebabkan error karena sebelumnya tidak ada
    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return redirect()->route('admin.inventory.index')->with('success', 'Bahan berhasil dihapus.');
    }
}