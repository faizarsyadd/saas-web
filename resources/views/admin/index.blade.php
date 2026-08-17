@extends('layouts.app')

@section('title', 'DineFlow - Pusat Komando')

@section('content')
<!-- Membungkus container utama dengan x-data untuk kontrol modal -->
<div class="max-w-7xl mx-auto space-y-8" x-data="{ openReportModal: false }">

    <!-- Header Top Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Pusat Komando Admin</h1>
            <p class="text-sm text-gray-500 mt-1">Monitoring real-time transaksi, grafik performa, dan status operasional cabang</p>
        </div>

        <div class="flex items-center gap-3">
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                Shift Aktif
            </span>
            
            <!-- Tombol untuk membuka Modal Form Cetak Laporan -->
            <button @click="openReportModal = true" type="button" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-lg shadow-sm transition-colors flex items-center gap-2 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                Cetak Laporan Hari Ini
            </button>
        </div>
    </div>

    <!-- 1. Key Metrics Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card 1: Pendapatan -->
        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Pendapatan Kotor Hari Ini</span>
                <span class="p-2 bg-red-50 text-red-600 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
            </div>
            <div>
                <h3 class="text-2xl font-black text-gray-900">
                    Rp {{ number_format($grossRevenue ?? 0, 0, ',', '.') }}
                </h3>
                <div class="flex items-center gap-2 mt-2">
                    <span class="text-xs font-bold px-2 py-0.5 rounded {{ ($revenuePercentageChange ?? 0) >= 0 ? 'bg-emerald-50 text-emerald-600' : 'bg-red-50 text-red-600' }}">
                        {{ ($revenuePercentageChange ?? 0) >= 0 ? '+' : '' }}{{ $revenuePercentageChange ?? 0 }}%
                    </span>
                    <span class="text-xs text-gray-400">vs Rp {{ number_format($yesterdayRevenue ?? 0, 0, ',', '.') }} kemarin</span>
                </div>
            </div>
        </div>

        <!-- Card 2: AOV -->
        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Rata-rata Nilai Pesanan</span>
                <span class="p-2 bg-red-50 text-red-600 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </span>
            </div>
            <div>
                <h3 class="text-2xl font-black text-gray-900">
                    Rp {{ number_format($averageOrderValue ?? 0, 0, ',', '.') }}
                </h3>
                <div class="flex items-center gap-2 mt-2">
                    <span class="text-xs font-bold px-2 py-0.5 rounded {{ ($avgOrderPercentageChange ?? 0) >= 0 ? 'bg-emerald-50 text-emerald-600' : 'bg-red-50 text-red-600' }}">
                        {{ ($avgOrderPercentageChange ?? 0) >= 0 ? '+' : '' }}{{ $avgOrderPercentageChange ?? 0 }}%
                    </span>
                    <span class="text-xs text-gray-400">vs Rp {{ number_format($yesterdayAvgOrderValue ?? 0, 0, ',', '.') }} kemarin</span>
                </div>
            </div>
        </div>

        <!-- Card 3: Biaya Tenaga Kerja -->
        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Estimasi Biaya Tenaga Kerja</span>
                <span class="p-2 bg-amber-50 text-amber-600 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </span>
            </div>
            <div>
                <h3 class="text-2xl font-black text-gray-900">
                    {{ $laborCostPercentage ?? '24.8' }}%
                </h3>
                <div class="flex items-center gap-2 mt-2">
                    <span class="text-xs font-bold px-2 py-0.5 rounded bg-amber-50 text-amber-700">Target ≤ 22%</span>
                    <span class="text-xs text-gray-400">Rasio operasional</span>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Middle Grid: Chart & Ringkasan Kritis -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Grafik Performa -->
        <div class="lg:col-span-2 bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="text-base font-bold text-gray-900">Variansi Pendapatan 24 Jam</h2>
                    <p class="text-xs text-gray-500">Persentase & akumulasi estimasi omset harian</p>
                </div>
            </div>
            <div class="w-full h-64">
                <canvas id="performanceChart"></canvas>
            </div>
        </div>

        <!-- Ringkasan Kritis -->
        <div class="bg-white p-6 rounded-xl border-l-4 border-l-red-600 border-y border-r border-gray-100 shadow-sm flex flex-col justify-between">
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span class="text-xs font-extrabold text-red-600 uppercase tracking-wider">Ringkasan Kritis</span>
                </div>

                <h3 class="text-xl font-bold text-gray-900 mb-1">
                    {{ count($incidents ?? []) }} Insiden Terdeteksi
                </h3>
                <p class="text-xs text-gray-500 mb-4">
                    Beberapa catatan penting memerlukan perhatian langsung dari administrator.
                </p>

                <div class="space-y-3 max-h-44 overflow-y-auto pr-1">
                    @forelse($incidents ?? [] as $incident)
                        <div class="p-3 bg-red-50/50 rounded-lg border border-red-100">
                            <p class="text-xs font-bold text-gray-800">{{ $incident->title }}</p>
                            <p class="text-[11px] text-gray-500 mt-0.5 line-clamp-1">{{ $incident->description }}</p>
                        </div>
                    @empty
                        <div class="text-center py-6">
                            <p class="text-xs text-gray-400">Sistem berjalan normal tanpa kendala.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="pt-4 mt-4 border-t border-gray-100 flex items-center justify-between">
                <span class="text-xs font-medium text-gray-500">Total Status Restoran</span>
                <span class="text-xs font-bold text-gray-900">Normal</span>
            </div>
        </div>
    </div>

    <!-- 3. Bottom Table Section -->
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="p-5 border-b border-gray-100 flex items-center justify-between bg-white">
            <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-red-600"></span>
                <h2 class="text-base font-bold text-gray-900">Performa Cabang Utama</h2>
            </div>
            <span class="px-3 py-1 bg-red-50 text-red-600 rounded-full text-xs font-bold">
                {{ count($topBranches ?? []) }} Cabang Aktif
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-gray-50 text-gray-500 font-bold uppercase border-b border-gray-100">
                    <tr>
                        <th class="py-3.5 px-6">Nama Cabang / ID</th>
                        <th class="py-3.5 px-6">Total Pendapatan Hari Ini</th>
                        <th class="py-3.5 px-6 text-center">Jumlah Pesanan</th>
                        <th class="py-3.5 px-6 text-center">Indikator Sisa Capaian</th>
                        <th class="py-3.5 px-6 text-right">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 font-medium text-gray-700">
                    @forelse($topBranches ?? [] as $branch)
                        <tr class="hover:bg-gray-50/60 transition-colors">
                            <td class="py-4 px-6">
                                <p class="font-bold text-gray-900 text-sm">{{ $branch->name ?? 'Cabang Pusat' }}</p>
                                <p class="text-[11px] text-gray-400">ID: #{{ $branch->id ?? '1' }}</p>
                            </td>
                            <td class="py-4 px-6 font-bold text-red-600 text-sm">
                                Rp {{ number_format($branch->today_revenue ?? 0, 0, ',', '.') }}
                            </td>
                            <td class="py-4 px-6 text-center font-semibold">
                                {{ $branch->orders_count ?? 0 }} Transaksi
                            </td>
                            <td class="py-4 px-6 text-center">
                                <div class="w-36 bg-gray-200 h-2 rounded-full mx-auto overflow-hidden">
                                    <div class="bg-red-600 h-full rounded-full" style="width: 70%;"></div>
                                </div>
                                <span class="text-[10px] font-bold text-red-600 mt-1 inline-block">TARGET 70%</span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    Online
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-xs text-gray-400">
                                Belum ada data cabang yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- MODAL FORM CETAK LAPORAN -->
    <div x-show="openReportModal" 
         x-cloak
         class="fixed inset-0 z-50 overflow-y-auto bg-gray-900/50 backdrop-blur-sm flex items-center justify-center p-4"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">

        <div @click.away="openReportModal = false" 
             class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6 border border-gray-100 space-y-5 transform transition-all">
            
            <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                <div class="flex items-center gap-2.5">
                    <div class="p-2 bg-red-50 text-red-600 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-gray-900">Cetak Laporan Transaksi</h3>
                        <p class="text-xs text-gray-500">Pilih parameter pencetakan laporan harian</p>
                    </div>
                </div>
                <button @click="openReportModal = false" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Form Ekspor / Cetak -->
            <form action="{{ route('admin.report.print') }}" method="GET" target="_blank" class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Tanggal Laporan</label>
                    <input type="date" name="report_date" value="{{ date('Y-m-d') }}" class="w-full text-xs px-3 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 outline-none">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Tipe Laporan</label>
                    <select name="type" class="w-full text-xs px-3 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 outline-none">
                        <option value="summary">Ringkasan Eksekutif (PDF)</option>
                        <option value="detailed">Detail Transaksi Lengkap (PDF)</option>
                        <option value="excel">Ekspor Data Raw (Excel/CSV)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Opsi Cabang</label>
                    <select name="branch_id" class="w-full text-xs px-3 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-red-500 focus:border-red-500 outline-none">
                        <option value="all">Semua Cabang Utama</option>
                        @foreach($topBranches ?? [] as $b)
                            <option value="{{ $b->id }}">{{ $b->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="pt-3 flex items-center justify-end gap-3 border-t border-gray-100">
                    <button type="button" @click="openReportModal = false" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-semibold rounded-lg transition-colors">
                        Batal
                    </button>
                    <button type="submit" @click="openReportModal = false" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold rounded-lg shadow-sm transition-colors flex items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>
                        Cetak Laporan
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('performanceChart');
        if (!ctx) return;

        const chartLabels = {!! json_encode($hourlyLabels ?? ['00:00', '04:00', '08:00', '12:00', '16:00', '20:00', '24:00']) !!};
        const chartValues = {!! json_encode($hourlyRevenue ?? [0, 0, 0, 0, 0, 0, 0]) !!};

        const gradient = ctx.getContext('2d').createLinearGradient(0, 0, 0, 250);
        gradient.addColorStop(0, 'rgba(220, 38, 38, 0.15)');
        gradient.addColorStop(1, 'rgba(220, 38, 38, 0.0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartLabels,
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: chartValues,
                    borderColor: '#dc2626',
                    borderWidth: 2,
                    backgroundColor: gradient,
                    fill: true,
                    tension: 0.3,
                    pointRadius: 3,
                    pointBackgroundColor: '#dc2626',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: {
                        grid: { color: '#f3f4f6' },
                        ticks: { font: { size: 11 }, color: '#9ca3af' }
                    },
                    y: {
                        grid: { color: '#f3f4f6' },
                        ticks: {
                            font: { size: 11 },
                            color: '#9ca3af',
                            callback: value => 'Rp ' + (value >= 1000 ? (value/1000) + 'k' : value)
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endpush