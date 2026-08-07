<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Guest;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Memuat halaman CRM DineFlow (resources/views/admin/crm.blade.php)
     */
    public function index(): View
    {
        $metrics = $this->getDashboardMetrics();
        $campaigns = Campaign::latest()->take(5)->get();
        
        // Diubah: total_spent -> total_spend
        $topGuests = Guest::orderByDesc('total_spend')->take(5)->get();

        return view('admin.crm', compact('metrics', 'campaigns', 'topGuests'));
    }

    /**
     * Endpoint API untuk Sinkronisasi Real-time / Auto Refresh via AJAX (Alpine.js)
     */
    public function syncData(): JsonResponse
    {
        return response()->json([
            'status'     => 'success',
            'timestamp'  => now()->toIso8601String(),
            'metrics'    => $this->getDashboardMetrics(),
            'campaigns'  => Campaign::latest()->take(5)->get(),
            
            // Diubah: total_spent -> total_spend
            'top_guests' => Guest::orderByDesc('total_spend')->take(5)->get(),
        ]);
    }

    /**
     * Hitung akumulasi metrik CRM langsung dari database
     */
    private function getDashboardMetrics(): array
    {
        return [
            'total_guests'           => Guest::count(),
            'high_ltv_count'         => Guest::where('ltv_segment', 'High LTV')->count(),
            'at_risk_count'          => Guest::where('ltv_segment', 'At Risk')->count(),
            
            // Diubah: total_spent -> total_spend
            'total_revenue'          => Guest::sum('total_spend'),
            'active_campaigns_count' => Campaign::where('status', 'Active')->count(),
            'avg_conversion_rate'    => Campaign::where('status', 'Active')->avg('conversion_rate') ?? 0,
        ];
    }
}