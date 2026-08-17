<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CrmController extends Controller
{
    /**
     * Menampilkan Dashboard CRM dengan Data Dinamis dari Database
     */
    public function index(Request $request): View
    {
        $search = $request->input('search');

        // 1. STATISTIK SEGMENTASI PELANGGAN (LTV)
        // Hitung total belanja dan total order per pelanggan
        $customerStats = Order::select('user_id', 
                DB::raw('COUNT(id) as total_visits'), 
                DB::raw('SUM(total_amount) as total_ltv'),
                DB::raw('MAX(created_at) as last_visit')
            )
            ->whereNotNull('user_id')
            ->groupBy('user_id')
            ->get();

        // Segmen VIP: Pelanggan dengan LTV > Rp 1.000.000 atau Kunjungan > 5 kali
        $vipGuests = $customerStats->filter(fn($c) => $c->total_ltv >= 1000000 || $c->total_visits >= 5);
        $vipCount = $vipGuests->count();
        $vipAvgLtv = $vipGuests->avg('total_ltv') ?? 0;
        $vipAvgVisits = $vipGuests->avg('total_visits') ?? 0;

        // Segmen Baru: Terdaftar atau transaksi pertama kurang dari 30 hari
        $thirtyDaysAgo = Carbon::now()->subDays(30);
        $newCount = User::where('created_at', '>=', $thirtyDaysAgo)->count();
        $newAvgSpend = Order::where('created_at', '>=', $thirtyDaysAgo)->avg('total_amount') ?? 0;

        // Segmen Beresiko (At-Risk): Tidak berkunjung/transaksi > 90 hari
        $ninetyDaysAgo = Carbon::now()->subDays(90);
        $atRiskCount = $customerStats->filter(fn($c) => Carbon::parse($c->last_visit)->lt($ninetyDaysAgo))->count();

        // 2. PELANGGAN UNGGULAN (TOP GUESTS)
        $topGuestsQuery = User::select('users.*', 
                DB::raw('COUNT(orders.id) as total_visits'), 
                DB::raw('COALESCE(SUM(orders.total_amount), 0) as total_ltv')
            )
            ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
            ->groupBy('users.id');

        if ($search) {
            $topGuestsQuery->where('users.name', 'like', "%{$search}%")
                           ->orWhere('users.email', 'like', "%{$search}%");
        }

        $topGuests = $topGuestsQuery->orderByDesc('total_ltv')
                                    ->take(10)
                                    ->get();

        // 3. KAMPANYE AKTIF (Dummy Structure / Bisa dihubungkan ke tabel campaigns jika ada)
        $campaigns = [
            [
                'name' => 'Promo Brunch Akhir Pekan',
                'channel' => 'Email',
                'sent' => 4500,
                'conversion_rate' => '8.4%',
                'revenue' => 3240000,
                'status' => 'active'
            ],
            [
                'name' => 'Win-back Otomatis (30hr)',
                'channel' => 'SMS',
                'sent' => 1200,
                'conversion_rate' => '12.1%',
                'revenue' => 1850000,
                'status' => 'active'
            ],
            [
                'name' => 'Pengumuman Menu Baru',
                'channel' => 'Email',
                'sent' => 8900,
                'conversion_rate' => '2.3%',
                'revenue' => 890000,
                'status' => 'inactive'
            ],
        ];

       return view('admin.crm', compact(
    'vipCount',
    'vipAvgLtv',
    'vipAvgVisits',
    'newCount',
    'newAvgSpend',
    'atRiskCount',
    'topGuests',
    'campaigns',
    'search'
));
    }
}