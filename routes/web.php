<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\KasirController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\KitchenController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Authentication Routes
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login']);

// Alias Route /login
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// 2. Modul Admin & Kasir (Protected Auth)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Halaman Utama Admin & Dashboard
    Route::get('/', function () { return view('admin.index'); })->name('index');
    Route::get('/dashboard', function () { return view('admin.index'); })->name('dashboard');

    // Halaman Staff
    Route::get('/staff', [StaffController::class, 'index'])->name('staff');
    Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');
    Route::put('/staff/{id}/shift', [StaffController::class, 'updateShift'])->name('staff.updateShift');
    Route::delete('/staff/{id}', [StaffController::class, 'destroy'])->name('staff.destroy');

    // Halaman Utama Kasir / Floor Plan
    Route::get('/kasir', [TableController::class, 'index'])->name('kasir');

    // CRUD Management Meja & Posisi
    Route::post('/kasir/tables', [TableController::class, 'store'])->name('kasir.tables.store');
    Route::post('/kasir/tables/positions', [TableController::class, 'updatePositions'])->name('kasir.tables.positions');
    Route::patch('/kasir/tables/{id}/position', [TableController::class, 'updatePosition'])->name('kasir.tables.updatePosition');
    Route::delete('/kasir/tables/{id}', [TableController::class, 'destroy'])->name('kasir.tables.destroy');

    // Pembayaran / Transaksi Kasir
    Route::post('/kasir/pay/{orderId}', [KasirController::class, 'pay'])->name('kasir.pay');
    Route::post('/orders/{order}/pay', [OrderController::class, 'processPayment'])->name('orders.pay');

    // Modul Dapur (KDS)
    Route::get('/dapur', [KitchenController::class, 'index'])->name('dapur');
    Route::post('/dapur/item/{id}/status', [KitchenController::class, 'updateItemStatus'])->name('dapur.item.status');
    Route::post('/dapur/order/{id}/complete', [KitchenController::class, 'completeOrder'])->name('dapur.order.complete');
    
    // Modul Inventory (Lengkap dengan Index, Store, Update, Destroy)
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
    Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');
    Route::put('/inventory/{id}', [InventoryController::class, 'update'])->name('inventory.update');
    Route::delete('/inventory/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy');

    // CRM DineFlow
    Route::get('/crm', [DashboardController::class, 'index'])->name('crm');
});


// 3. API / Public Routes
Route::get('/api/dashboard/sync', [DashboardController::class, 'syncData'])->name('api.dashboard.sync');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');