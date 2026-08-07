<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::all();
        return view('admin.kasir', compact('tables'));
    }

    public function updatePositions(Request $request)
{
    $request->validate([
        'positions' => 'required|array',
        'positions.*.id' => 'required|exists:tables,id',
        'positions.*.x_pos' => 'required|numeric',
        'positions.*.y_pos' => 'required|numeric',
    ]);

    foreach ($request->positions as $item) {
        Table::where('id', $item['id'])->update([
            'x_pos' => $item['x_pos'],
            'y_pos' => $item['y_pos'],
        ]);
    }

    return response()->json([
        'success' => true,
        'message' => 'Posisi layout meja berhasil disimpan!'
    ]);
}


    public function destroy($id)
{
    try {
        $table = Table::findOrFail($id);

        // Opsional: Cek jika meja sedang dipakai atau punya order aktif
        if ($table->status === 'occupied') {
            return response()->json([
                'success' => false,
                'message' => 'Meja sedang digunakan, tidak dapat dihapus!'
            ], 400);
        }

        $table->delete();

        return response()->json([
            'success' => true,
            'message' => 'Meja berhasil dihapus!'
        ]);
    } catch (\Illuminate\Database\QueryException $e) {
        // Menangani jika meja terikat ke transaksi/orders (Foreign Key constraint)
        return response()->json([
            'success' => false,
            'message' => 'Meja tidak dapat dihapus karena memiliki riwayat transaksi.'
        ], 400);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Gagal menghapus meja: ' . $e->getMessage()
        ], 500);
    }
}
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'table_number' => 'nullable|string|max:50',
                'name'         => 'nullable|string|max:50',
                'capacity'     => 'required|integer|min:1',
                'shape'        => 'required|in:square,circle,rectangle',
            ]);

            $tableNumber = $request->input('table_number') ?? $request->input('name') ?? 'Meja Baru';

            $table = Table::create([
                'table_number' => $tableNumber,
                'capacity'     => $validated['capacity'],
                'shape'        => $validated['shape'],
                'status'       => 'available',
                'qr_code_key'  => (string) Str::uuid(),
                'x_pos'        => 10,
                'y_pos'        => 10,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Meja berhasil ditambahkan!',
                'table'   => $table // <-- UBAH 'data' MENJADI 'table'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Kesalahan Server: ' . $e->getMessage()
            ], 500);
        }
    }
}