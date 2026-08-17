<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /**
     * Memuat halaman Pusat Komando Admin (resources/views/admin/index.blade.php)
     */
    public function index(): View
    {
        $data = $this->getDashboardData();

        return view('admin.index', $data);
    }

    /**
     * Endpoint API untuk Sinkronisasi Real-time / Auto Refresh via AJAX
     */
    public function syncData(): JsonResponse
    {
        return response()->json(array_merge([
            'status'    => 'success',
            'timestamp' => now()->toIso8601String(),
        ], $this->getDashboardData()));
    }

    /**
     * Memproses permintaan Cetak Laporan dari Modal Form
     */
    public function printReport(Request $request)
{
    $date = $request->input('report_date', Carbon::today()->toDateString());
    $type = $request->input('type', 'summary');
    $branchId = $request->input('branch_id', 'all');

    // Query transaksi berdasarkan tanggal
    $ordersQuery = Order::whereDate('created_at', $date);

    if ($branchId !== 'all') {
        $ordersQuery->where('branch_id', $branchId);
    }

    $orders = $ordersQuery->get();
    $totalRevenue = $orders->sum('total_amount');
    $totalOrders = $orders->count();

    // Mengembalikan view Blade untuk dicetak
    return view('admin.reports.print', compact(
        'orders', 
        'date', 
        'type', 
        'branchId', 
        'totalRevenue', 
        'totalOrders'
    ));
}
    

    /**
     * Hitung akumulasi metrik Pusat Komando dari Database
     */
    private function getDashboardData(): array
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        // 1. Metrik Pendapatan Kotor (Hari Ini vs Kemarin)
        $grossRevenue = (float) Order::whereDate('created_at', $today)->sum('total_amount');
        $yesterdayRevenue = (float) Order::whereDate('created_at', $yesterday)->sum('total_amount');
        
        $revenuePercentageChange = $yesterdayRevenue > 0 
            ? round((($grossRevenue - $yesterdayRevenue) / $yesterdayRevenue) * 100, 1) 
            : 0;

        // 2. Metrik Rata-rata Nilai Pesanan (AOV)
        $averageOrderValue = (float) (Order::whereDate('created_at', $today)->avg('total_amount') ?? 0);
        $yesterdayAvgOrderValue = (float) (Order::whereDate('created_at', $yesterday)->avg('total_amount') ?? 0);
        
        $avgOrderPercentageChange = $yesterdayAvgOrderValue > 0 
            ? round((($averageOrderValue - $yesterdayAvgOrderValue) / $yesterdayAvgOrderValue) * 100, 1) 
            : 0;

        // 3. Data Grafik Performa 24 Jam (Breakdown Rentang 4 Jam)
        $hourlyLabels = ['00:00', '04:00', '08:00', '12:00', '16:00', '20:00', '24:00'];
        $hourlyRevenue = [];
        
        $timeRanges = [
            [0, 3],   // 00:00 - 03:59
            [4, 7],   // 04:00 - 07:59
            [8, 11],  // 08:00 - 11:59
            [12, 15], // 12:00 - 15:59
            [16, 19], // 16:00 - 19:59
            [20, 23], // 20:00 - 23:59
        ];

        foreach ($timeRanges as [$start, $end]) {
            $hourlyRevenue[] = (float) Order::whereDate('created_at', $today)
                ->whereBetween(DB::raw('HOUR(created_at)'), [$start, $end])
                ->sum('total_amount');
        }
        $hourlyRevenue[] = 0; // Untuk titik 24:00

        // 4. Cabang Performa Terbaik Hari Ini
        $topBranches = collect(); 

        // 5. Insiden Terkini
        $incidents = Incident::latest()->take(5)->get();

        // Return array disesuaikan dengan variabel tunggal yang dibaca di view index.blade.php
        return [
            'grossRevenue'             => $grossRevenue,
            'yesterdayRevenue'         => $yesterdayRevenue,
            'revenuePercentageChange'  => $revenuePercentageChange,
            'averageOrderValue'        => $averageOrderValue,
            'yesterdayAvgOrderValue'   => $yesterdayAvgOrderValue,
            'avgOrderPercentageChange' => $avgOrderPercentageChange,
            'laborCostPercentage'      => 24.8,
            'hourlyLabels'             => $hourlyLabels,
            'hourlyRevenue'            => $hourlyRevenue,
            'topBranches'              => $topBranches,
            'incidents'                => $incidents,
        ];
    }
}