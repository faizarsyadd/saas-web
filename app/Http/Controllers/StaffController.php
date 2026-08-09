<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StaffController extends Controller
{
    public function index(Request $request): View
    {
        $department = $request->query('dept', 'BOH'); // Default ke BOH jika query kosong
        $search = $request->query('search');

        $staffs = User::where('status', 'active')
            ->where('department', $department) // Filter departemen dikunci di awal
            ->when($search, function ($query, $s) {
                // Bungkus kondisi OR di dalam sub-query agar tidak merusak filter department
                return $query->where(function ($q) use ($s) {
                    $q->where('name', 'like', "%{$s}%")
                      ->orWhere('role', 'like', "%{$s}%");
                });
            })
            ->get();

        $bohCount = User::where('department', 'BOH')->where('status', 'active')->count();
        $fohCount = User::where('department', 'FOH')->where('status', 'active')->count();

        return view('admin.staff', compact('staffs', 'department', 'bohCount', 'fohCount'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6',
            'department' => 'required|in:BOH,FOH',
            'role'       => 'required|string|max:255',
        ]);

        User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => bcrypt($request->password),
            'department' => $request->department,
            'role'       => $request->role,
            'status'     => 'active',
        ]);

        // Redirect kembali ke tab departemen yang baru saja ditambahkan
        return redirect()->route('admin.staff', ['dept' => $request->department])
            ->with('success', "Staff {$request->department} baru berhasil ditambahkan!");
    }
    public function destroy(int|string $id): RedirectResponse
{
    $staff = User::findOrFail($id);
    $staffName = $staff->name;
    
    // Opsi A: Hapus permanen dari database
    $staff->delete();

    // Opsi B: Jika ingin soft delete (rekomendasi untuk riwayat transaksi/penggajian):
    // $staff->update(['status' => 'resigned']);

    return redirect()->back()->with('success', "Staff {$staffName} berhasil dihapus.");
}

    public function updateShift(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'shift_senin'  => 'nullable|string|max:50',
            'shift_selasa' => 'nullable|string|max:50',
            'shift_rabu'   => 'nullable|string|max:50',
            'shift_kamis'  => 'nullable|string|max:50',
            'shift_jumat'  => 'nullable|string|max:50',
        ]);

        $staff = User::findOrFail($id);
        $staff->update([
            'shift_senin'  => $request->shift_senin,
            'shift_selasa' => $request->shift_selasa,
            'shift_rabu'   => $request->shift_rabu,
            'shift_kamis'  => $request->shift_kamis,
            'shift_jumat'  => $request->shift_jumat,
        ]);

        return redirect()->back()->with('success', "Jadwal shift untuk {$staff->name} berhasil diperbarui!");
    }
}