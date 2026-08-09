@extends('layouts.app')

@section('content')
    <!-- Header -->
    <header class="glass-header sticky top-0 z-10 px-lg py-md flex items-center justify-between">
        <div>
            <h1 class="text-headline-md font-bold text-on-surface">Pusat Inventaris &amp; Rantai Pasok</h1>
            <p class="text-secondary text-body-md">Monitoring ketersediaan stok bahan dan analisis biaya pasar</p>
        </div>
        <div class="flex items-center gap-md">
            <!-- Tombol Buka Modal Tambah -->
            <button type="button" onclick="openModal('create')" class="bg-primary hover:bg-primary-container text-white px-lg py-sm rounded-lg font-bold transition flex items-center gap-xs shadow-md">
                <span class="material-symbols-outlined text-[18px]">add</span>
                Tambah Bahan Baru
            </button>
        </div>
    </header>

    <!-- Content Body -->
    <div class="p-lg space-y-lg max-w-7xl w-full mx-auto">
        
        <!-- Flash Message Notification -->
        @if(session('success'))
            <div class="p-4 bg-green-100 border border-green-400 text-green-700 rounded-xl flex justify-between items-center shadow-sm">
                <span>{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="font-bold">&times;</button>
            </div>
        @endif

        @if($errors->any())
            <div class="p-4 bg-red-100 border border-red-400 text-red-700 rounded-xl shadow-sm">
                <strong class="font-bold">Gagal memproses data:</strong>
                <ul class="mt-1 list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Grid Top: Chart + Critical Alert Panel -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-lg">
            
            <!-- Chart Panel -->
            <div class="lg:col-span-2 card-ambient rounded-xl p-lg flex flex-col">
                <div class="flex justify-between items-center mb-md">
                    <div>
                        <h3 class="font-title-lg text-title-lg font-bold text-on-surface">Variansi Biaya Pasar</h3>
                        <p class="text-secondary text-label-md">Persentase fluktuasi harga beli mingguan</p>
                    </div>
                </div>
                <div class="relative flex-1 min-h-[220px]">
                    <canvas id="costVarianceChart"></canvas>
                </div>
            </div>

            <!-- Summary Info Card -->
            <div class="card-ambient rounded-xl p-lg flex flex-col justify-between border-l-4 border-danger">
                <div>
                    <div class="flex items-center gap-xs text-danger mb-xs">
                        <span class="material-symbols-outlined font-bold">warning</span>
                        <span class="font-bold uppercase tracking-wider text-[11px]">Ringkasan Kritis</span>
                    </div>
                    <h4 class="text-headline-md font-bold text-on-surface mb-xs">{{ $criticalInventories->count() }} Bahan</h4>
                    <p class="text-secondary text-body-md">Item terdeteksi berada di bawah atau mendekati batas stok minimum (`min_stock`).</p>
                </div>
                <div class="mt-lg pt-md border-t border-outline-variant flex justify-between items-center">
                    <span class="text-secondary text-label-md">Total Item Terdaftar</span>
                    <span class="font-bold text-on-surface text-title-lg">{{ $inventories->count() }}</span>
                </div>
            </div>

        </div>

        <!-- Table 1: Stok Kritis -->
        <div class="card-ambient rounded-xl overflow-hidden">
            <div class="p-lg bg-red-50/50 border-b border-outline-variant flex justify-between items-center">
                <div class="flex items-center gap-xs">
                    <span class="w-3 h-3 rounded-full bg-danger animate-pulse inline-block"></span>
                    <h3 class="font-title-lg text-title-lg font-bold text-danger">Peringatan Stok Kritis</h3>
                </div>
                <span class="text-label-md bg-red-100 text-danger px-md py-xs rounded-full font-bold">
                    {{ $criticalInventories->count() }} Item Restok
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-surface-container-low border-b border-outline-variant text-secondary uppercase text-[11px] font-bold tracking-wider">
                        <tr>
                            <th class="py-md px-lg">Nama Bahan / ID</th>
                            <th class="py-md px-lg">Satuan</th>
                            <th class="py-md px-lg text-right">Stok Saat Ini</th>
                            <th class="py-md px-lg text-right">Min. Stok</th>
                            <th class="py-md px-lg text-center w-48">Indikator Sisa</th>
                            <th class="py-md px-lg text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant">
                        @forelse($criticalInventories as $item)
                            @php
                                $percentage = $item->min_stock > 0 ? min(round(($item->stock / $item->min_stock) * 100), 100) : 0;
                            @endphp
                            <tr class="data-table-row transition-colors">
                                <td class="py-md px-lg">
                                    <div class="font-title-lg text-body-lg font-bold text-on-surface">{{ $item->item_name }}</div>
                                    <div class="text-secondary text-[12px]">ID: #{{ $item->id }}</div>
                                </td>
                                <td class="py-md px-lg text-secondary">{{ $item->unit }}</td>
                                <td class="py-md px-lg text-right font-bold text-danger font-tabular-nums">
                                    {{ number_format($item->stock) }} {{ $item->unit }}
                                </td>
                                <td class="py-md px-lg text-right text-secondary font-tabular-nums">
                                    {{ number_format($item->min_stock) }} {{ $item->unit }}
                                </td>
                                <td class="py-md px-lg text-center">
                                    <div class="w-full bg-surface-variant rounded-full h-2 overflow-hidden">
                                        <div class="bg-danger h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                                    </div>
                                    <span class="text-[10px] text-danger font-bold uppercase mt-1 inline-block">Sisa {{ $percentage }}%</span>
                                </td>
                                <td class="py-md px-lg text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button type="button" onclick='openModal("edit", @json($item))' class="p-1 text-secondary hover:text-primary transition" title="Edit Bahan">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <form action="{{ route('admin.inventory.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus bahan ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1 text-secondary hover:text-danger transition" title="Hapus Bahan">
                                                <span class="material-symbols-outlined text-[20px]">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-lg text-center text-secondary">
                                    Tidak ada stok kritis saat ini. Semua bahan dalam batas aman.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Table 2: Semua Data Inventaris -->
        <div class="card-ambient rounded-xl overflow-hidden">
            <div class="p-lg border-b border-outline-variant">
                <h3 class="font-title-lg text-title-lg font-bold text-on-surface">Daftar Keseluruhan Inventaris</h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-surface-container-low border-b border-outline-variant text-secondary uppercase text-[11px] font-bold tracking-wider">
                        <tr>
                            <th class="py-md px-lg">ID</th>
                            <th class="py-md px-lg">Nama Bahan</th>
                            <th class="py-md px-lg text-right">Stok</th>
                            <th class="py-md px-lg">Satuan</th>
                            <th class="py-md px-lg text-right">Batas Min. Stok</th>
                            <th class="py-md px-lg text-center">Tanggal Dibuat</th>
                            <th class="py-md px-lg text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant">
                        @forelse($inventories as $item)
                            <tr class="data-table-row transition-colors">
                                <td class="py-md px-lg font-mono text-xs text-secondary">#{{ $item->id }}</td>
                                <td class="py-md px-lg font-bold text-on-surface">{{ $item->item_name }}</td>
                                <td class="py-md px-lg text-right font-bold font-tabular-nums {{ $item->stock <= $item->min_stock ? 'text-danger' : 'text-on-surface' }}">
                                    {{ number_format($item->stock) }}
                                </td>
                                <td class="py-md px-lg text-secondary">{{ $item->unit }}</td>
                                <td class="py-md px-lg text-right text-secondary font-tabular-nums">{{ number_format($item->min_stock) }}</td>
                                <td class="py-md px-lg text-center text-xs text-secondary">
                                    {{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}
                                </td>
                                <td class="py-md px-lg text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button type="button" onclick='openModal("edit", @json($item))' class="p-1 text-secondary hover:text-primary transition" title="Edit Bahan">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <form action="{{ route('admin.inventory.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus bahan ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1 text-secondary hover:text-danger transition" title="Hapus Bahan">
                                                <span class="material-symbols-outlined text-[20px]">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-lg text-center text-secondary">
                                    Belum ada data inventaris tersimpan di database.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Modal Form (Tambah / Edit Dynamic) -->
    <div id="inventoryModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm hidden">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg mx-4 overflow-hidden transform transition-all">
            
            <div class="px-6 py-4 bg-surface-container-low border-b border-outline-variant flex justify-between items-center">
                <h3 id="modalTitle" class="text-title-lg font-bold text-on-surface flex items-center gap-2">
                    <span id="modalIcon" class="material-symbols-outlined text-primary">add_circle</span>
                    <span id="modalTitleText">Tambah Bahan Baru</span>
                </h3>
                <button type="button" onclick="closeModal()" class="text-secondary hover:text-on-surface text-2xl font-bold">&times;</button>
            </div>

            <form id="inventoryForm" action="{{ route('admin.inventory.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                <div id="methodSpoofing"></div>

                <div>
                    <label for="item_name" class="block text-sm font-semibold text-on-surface mb-1">Nama Bahan</label>
                    <input type="text" name="item_name" id="item_name" placeholder="Contoh: Daging Sapi" required 
                           class="w-full px-4 py-2 border border-outline rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="stock" class="block text-sm font-semibold text-on-surface mb-1">Jumlah Stok</label>
                        <input type="number" step="any" name="stock" id="stock" placeholder="0" required 
                               class="w-full px-4 py-2 border border-outline rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm">
                    </div>

                    <div>
                        <label for="unit" class="block text-sm font-semibold text-on-surface mb-1">Satuan</label>
                        <input type="text" name="unit" id="unit" placeholder="kg, gr, pcs, liter" required 
                               class="w-full px-4 py-2 border border-outline rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm">
                    </div>
                </div>

                <div>
                    <label for="min_stock" class="block text-sm font-semibold text-on-surface mb-1">Batas Stok Minimum (`min_stock`)</label>
                    <input type="number" step="any" name="min_stock" id="min_stock" placeholder="0" required 
                           class="w-full px-4 py-2 border border-outline rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm">
                </div>

                <div class="pt-4 border-t border-outline-variant flex justify-end gap-3">
                    <button type="button" onclick="closeModal()" class="px-5 py-2 border border-outline rounded-lg text-sm font-medium text-secondary hover:bg-surface-container">
                        Batal
                    </button>
                    <button type="submit" id="submitBtn" class="px-5 py-2 bg-primary hover:bg-primary-container text-white rounded-lg text-sm font-bold transition">
                        Simpan Bahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
    function openModal(mode, data = null) {
        const modal = document.getElementById('inventoryModal');
        const form = document.getElementById('inventoryForm');
        const titleText = document.getElementById('modalTitleText');
        const icon = document.getElementById('modalIcon');
        const submitBtn = document.getElementById('submitBtn');
        const methodSpoofing = document.getElementById('methodSpoofing');

        if (mode === 'edit' && data) {
            titleText.innerText = 'Edit Bahan Inventaris';
            icon.innerText = 'edit_note';
            submitBtn.innerText = 'Update Bahan';
            
            form.action = `/admin/inventory/${data.id}`;
            methodSpoofing.innerHTML = '<input type="hidden" name="_method" value="PUT">';

            document.getElementById('item_name').value = data.item_name || '';
            document.getElementById('stock').value = data.stock ?? 0;
            document.getElementById('unit').value = data.unit || '';
            document.getElementById('min_stock').value = data.min_stock ?? 0;
        } else {
            titleText.innerText = 'Tambah Bahan Baru';
            icon.innerText = 'add_circle';
            submitBtn.innerText = 'Simpan Bahan';
            
            form.action = "{{ route('admin.inventory.store') }}";
            methodSpoofing.innerHTML = '';

            form.reset();
        }

        modal.classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('inventoryModal').classList.add('hidden');
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') closeModal();
    });

    @if($errors->any())
        openModal('create');
    @endif

    document.addEventListener('DOMContentLoaded', function() {
        const chartCanvas = document.getElementById('costVarianceChart');
        if (!chartCanvas) return;

        const ctx = chartCanvas.getContext('2d');

        // Parse data dari Laravel
        const rawLabels = {!! json_encode($chartLabels ?? ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4']) !!};
        let rawDatasets = {!! json_encode($chartDatasets ?? []) !!};
        
        // Data dari koleksi database $inventories untuk fallback dinamis
        const dbInventories = {!! json_encode($inventories ?? []) !!};

        // Jika $chartDatasets kosong, generate garis dari data stok database user
        if (!rawDatasets || rawDatasets.length === 0) {
            if (dbInventories.length > 0) {
                // Ambil 3 item pertama dari database untuk dijadikan garis grafik
                const colors = [
                    { border: 'rgb(59, 130, 246)', bg: 'rgba(59, 130, 246, 0.1)' }, // Blue
                    { border: 'rgb(239, 68, 68)', bg: 'rgba(239, 68, 68, 0.1)' },   // Red
                    { border: 'rgb(16, 185, 129)', bg: 'rgba(16, 185, 129, 0.1)' }   // Green
                ];

                rawDatasets = dbInventories.slice(0, 3).map((item, index) => {
                    const color = colors[index % colors.length];
                    const currentStock = parseFloat(item.stock) || 0;
                    
                    // Membuat simulasi tren fluktuasi berdasarkan persentase stok aktual
                    return {
                        label: item.item_name,
                        data: [
                            Math.max(0, currentStock * 0.85),
                            Math.max(0, currentStock * 0.95),
                            Math.max(0, currentStock * 1.10),
                            currentStock
                        ],
                        borderColor: color.border,
                        backgroundColor: color.bg,
                        tension: 0.4,
                        fill: true
                    };
                });
            } else {
                // Fallback default jika database masih kosong total
                rawDatasets = [{
                    label: 'Fluktuasi Stok (%)',
                    data: [2, 5, 3, 8],
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.4,
                    fill: true
                }];
            }
        }

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: rawLabels,
                datasets: rawDatasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { 
                    legend: { 
                        position: 'top', 
                        align: 'end' 
                    } 
                },
                scales: { 
                    y: { 
                        beginAtZero: true,
                        ticks: { 
                            callback: value => value + '%' 
                        } 
                    } 
                }
            }
        });
    });
</script>
@endpush