<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login']);

// Alias route /login (opsional jika dipanggil via route('login'))
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// 2. Area Dashboard & Modul Admin (Proteksi Auth)
Route::middleware(['auth'])->group(function () {
    
    // Halaman Utama Admin (admin/index.blade.php)
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');

    // Route Modul Admin (Sesuai file di folder views/admin)
    Route::get('/admin/kasir', function () { return view('admin.kasir'); })->name('admin.kasir');
    Route::get('/admin/dapur', function () { return view('admin.dapur'); })->name('admin.dapur');
    Route::get('/admin/inventory', function () { return view('admin.inventory'); })->name('admin.inventory');
    Route::get('/admin/staff', function () { return view('admin.staff'); })->name('admin.staff');
    Route::get('/admin/crm', function () { return view('admin.crm'); })->name('admin.crm');
});