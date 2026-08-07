<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StaffController extends Controller
{
    
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'department' => 'required|in:BOH,FOH',
        'role' => 'required|string|max:255',
    ]);

    \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'department' => $request->department,
        'role' => $request->role,
    ]);

    return redirect()->back()->with('success', 'Staff baru berhasil ditambahkan!');
}public function index(Request $request): View
    {
        $department = $request->query('dept', 'BOH');
        $search = $request->query('search');

        $staffs = User::when($department, function ($query, $dept) {
                return $query->where('department', $dept);
            })
            ->when($search, function ($query, $s) {
                return $query->where('name', 'like', "%{$s}%")
                             ->orWhere('role', 'like', "%{$s}%");
            })
            ->where('status', 'active')
            ->get();

        $bohCount = User::where('department', 'BOH')->where('status', 'active')->count();
        $fohCount = User::where('department', 'FOH')->where('status', 'active')->count();

        return view('admin.staff', compact('staffs', 'department', 'bohCount', 'fohCount'));
    }
    public function updateShift(Request $request, $id)
{
    $request->validate([
        'shift_senin' => 'nullable|string|max:50',
        'shift_selasa' => 'nullable|string|max:50',
        'shift_rabu' => 'nullable|string|max:50',
        'shift_kamis' => 'nullable|string|max:50',
        'shift_jumat' => 'nullable|string|max:50',
    ]);

    $staff = \App\Models\User::findOrFail($id);
    $staff->update([
        'shift_senin' => $request->shift_senin,
        'shift_selasa' => $request->shift_selasa,
        'shift_rabu' => $request->shift_rabu,
        'shift_kamis' => $request->shift_kamis,
        'shift_jumat' => $request->shift_jumat,
    ]);

    return redirect()->back()->with('success', "Jadwal shift untuk {$staff->name} berhasil diperbarui!");
}
}