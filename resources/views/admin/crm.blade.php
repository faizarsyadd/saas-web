@extends('layouts.app')

@section('title', 'CRM Hub - DineFlow')

@section('content')
<div class="flex-1 overflow-y-auto bg-background flex flex-col min-h-screen">
    
    <!-- Top Bar / Header -->
    <div class="hidden md:flex justify-between items-center px-8 py-6 border-b border-outline-variant bg-white sticky top-0 z-30 shadow-sm">
        <div>
            <h2 class="text-2xl font-bold text-on-surface">Pertumbuhan Pelanggan & CRM</h2>
            <p class="text-sm text-secondary mt-1">Kelola hubungan tamu, lacak kampanye, dan optimalkan nilai seumur hidup.</p>
        </div>
        <div class="flex items-center gap-4">
            <form action="{{ route('admin.crm') }}" method="GET" class="flex items-center bg-gray-50 border border-outline-variant rounded-lg px-3 py-1.5 w-64 focus-within:ring-2 focus-within:ring-primary/20">
                <span class="material-symbols-outlined text-secondary mr-2">search</span>
                <input name="search" value="{{ $search ?? '' }}" class="bg-transparent border-none focus:ring-0 text-sm w-full outline-none text-on-surface" placeholder="Cari tamu..." type="text"/>
            </form>
            <button class="bg-primary text-white px-4 py-2 rounded-lg text-xs font-bold shadow-sm hover:opacity-90 flex items-center gap-2">
                <span class="material-symbols-outlined text-[18px]">campaign</span>
                Kampanye Baru
            </button>
        </div>
    </div>

    <!-- Dashboard Main Content -->
    <div class="p-8 flex flex-col gap-6">
        
        <!-- Segmentasi LTV -->
        <section>
            <div class="flex justify-between items-end mb-4">
                <h3 class="text-lg font-bold text-on-surface">Segmentasi Nilai Seumur Hidup Tamu</h3>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                
                <!-- VIP Segment -->
                <div class="bg-white rounded-xl p-6 border border-outline-variant flex flex-col shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined text-[18px]">star</span>
                            </div>
                            <h4 class="text-base font-bold text-on-surface">VIP</h4>
                        </div>
                        <span class="bg-gray-100 text-on-surface px-2 py-1 rounded text-xs font-medium">Prioritas</span>
                    </div>
                    <div class="mt-auto">
                        <div class="text-3xl font-bold text-on-surface mb-1">{{ number_format($vipCount ?? 0) }}</div>
                        <p class="text-sm text-secondary">Tamu</p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center text-xs">
                        <div>
                            <div class="font-bold text-on-surface">Rp {{ number_format($vipAvgLtv ?? 0, 0, ',', '.') }}</div>
                            <div class="text-secondary">Rata-rata LTV</div>
                        </div>
                        <div class="h-6 border-l border-gray-200"></div>
                        <div>
                            <div class="font-bold text-on-surface">{{ number_format($vipAvgVisits ?? 0, 1) }}x</div>
                            <div class="text-secondary">Kunjungan/Bln</div>
                        </div>
                    </div>
                </div>

                <!-- New Segment -->
                <div class="bg-white rounded-xl p-6 border border-outline-variant flex flex-col shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-700">
                                <span class="material-symbols-outlined text-[18px]">person_add</span>
                            </div>
                            <h4 class="text-base font-bold text-on-surface">Baru</h4>
                        </div>
                        <span class="bg-gray-100 text-on-surface px-2 py-1 rounded text-xs font-medium">&lt; 30 Hari</span>
                    </div>
                    <div class="mt-auto">
                        <div class="text-3xl font-bold text-on-surface mb-1">{{ number_format($newCount ?? 0) }}</div>
                        <p class="text-sm text-secondary">Tamu Baru</p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center text-xs">
                        <div>
                            <div class="font-bold text-on-surface">Rp {{ number_format($newAvgSpend ?? 0, 0, ',', '.') }}</div>
                            <div class="text-secondary">Rata-rata Belanja</div>
                        </div>
                    </div>
                </div>

                <!-- At-Risk Segment -->
                <div class="bg-white rounded-xl p-6 border border-outline-variant flex flex-col shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center text-red-600">
                                <span class="material-symbols-outlined text-[18px]">warning</span>
                            </div>
                            <h4 class="text-base font-bold text-on-surface">Beresiko</h4>
                        </div>
                        <span class="bg-gray-100 text-on-surface px-2 py-1 rounded text-xs font-medium">&gt; 90 Hari Pasif</span>
                    </div>
                    <div class="mt-auto">
                        <div class="text-3xl font-bold text-on-surface mb-1">{{ number_format($atRiskCount ?? 0) }}</div>
                        <p class="text-sm text-secondary">Tamu Perlu Dirangkul</p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <button class="w-full bg-gray-50 hover:bg-gray-100 border border-gray-200 py-2 rounded-lg text-xs font-medium transition-colors flex justify-center items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">bolt</span>
                            Picu Win-back
                        </button>
                    </div>
                </div>

            </div>
        </section>

        <!-- Performa Kampanye & Top Guests -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
            
            <!-- Kampanye Aktif -->
            <section class="xl:col-span-2 flex flex-col">
                <h3 class="text-lg font-bold text-on-surface mb-4">Performa Kampanye Aktif</h3>
                <div class="bg-white rounded-xl border border-outline-variant flex-1 overflow-hidden shadow-sm">
                    <div class="grid grid-cols-12 gap-2 px-6 py-3 border-b border-gray-100 bg-gray-50 text-xs text-secondary font-bold uppercase tracking-wider">
                        <div class="col-span-5">Nama Kampanye</div>
                        <div class="col-span-2 text-center">Saluran</div>
                        <div class="col-span-2 text-right">Terkirim</div>
                        <div class="col-span-3 text-right">Pendapatan</div>
                    </div>
                    <div class="flex flex-col">
                        @forelse($campaigns ?? [] as $campaign)
                            <div class="grid grid-cols-12 gap-2 px-6 py-3 border-b border-gray-100 hover:bg-red-50/30 transition-colors items-center text-xs">
                                <div class="col-span-5 flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full {{ ($campaign['status'] ?? '') === 'active' ? 'bg-green-500' : 'bg-gray-300' }}"></div>
                                    <span class="font-medium text-on-surface">{{ $campaign['name'] }}</span>
                                </div>
                                <div class="col-span-2 text-center">
                                    <span class="px-2 py-0.5 bg-gray-100 rounded text-[10px] font-medium">{{ $campaign['channel'] }}</span>
                                </div>
                                <div class="col-span-2 text-right text-secondary">{{ number_format($campaign['sent'] ?? 0) }}</div>
                                <div class="col-span-3 text-right font-bold text-on-surface">Rp {{ number_format($campaign['revenue'] ?? 0, 0, ',', '.') }}</div>
                            </div>
                        @empty
                            <div class="p-4 text-center text-xs text-gray-400">Tidak ada kampanye aktif.</div>
                        @endforelse
                    </div>
                </div>
            </section>

            <!-- Tamu Unggulan -->
            <section class="flex flex-col">
                <h3 class="text-lg font-bold text-on-surface mb-4">Tamu Unggulan</h3>
                <div class="bg-white rounded-xl border border-outline-variant flex-1 overflow-hidden flex flex-col shadow-sm">
                    <div class="p-4 flex flex-col gap-2 overflow-y-auto max-h-[320px]">
                        @forelse($topGuests ?? [] as $guest)
                            <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-red-50/30 transition-colors border border-transparent hover:border-gray-200">
                                <div class="w-10 h-10 rounded-full bg-red-100 text-primary font-bold flex items-center justify-center flex-shrink-0 text-sm">
                                    {{ strtoupper(substr($guest->name ?? 'G', 0, 2)) }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h5 class="text-xs font-bold text-on-surface truncate">{{ $guest->name }}</h5>
                                    <p class="text-[11px] text-secondary truncate">{{ $guest->total_visits }} Kunjungan • Rp {{ number_format($guest->total_ltv, 0, ',', '.') }} LTV</p>
                                </div>
                                <span class="material-symbols-outlined text-[16px] text-secondary">chevron_right</span>
                            </div>
                        @empty
                            <div class="p-4 text-center text-xs text-gray-400">Belum ada data pelanggan.</div>
                        @endforelse
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
@endsection