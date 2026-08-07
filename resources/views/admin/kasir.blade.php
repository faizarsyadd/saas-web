<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>DineFlow - Terminal Kasir Lantai</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "surface-container-lowest": "#ffffff",
                        "inverse-on-surface": "#f3f0ef",
                        "primary": "#b20112",
                        "on-surface": "#1c1b1b",
                        "on-primary-container": "#fff1ef",
                        "on-tertiary": "#ffffff",
                        "tertiary-fixed-dim": "#83cfff",
                        "on-primary-fixed-variant": "#93000d",
                        "primary-fixed-dim": "#ffb4ab",
                        "error": "#ba1a1a",
                        "tertiary-container": "#0077a6",
                        "surface-container-highest": "#e5e2e1",
                        "secondary-fixed": "#e8e1df",
                        "tertiary-fixed": "#c7e7ff",
                        "surface-container-high": "#eae7e7",
                        "on-primary-fixed": "#410002",
                        "inverse-surface": "#313030",
                        "surface-container-low": "#f6f3f2",
                        "on-secondary-fixed": "#1e1b1a",
                        "primary-container": "#d62828",
                        "surface-dim": "#dcd9d9",
                        "primary-fixed": "#ffdad6",
                        "surface-bright": "#fcf9f8",
                        "on-secondary": "#ffffff",
                        "background": "#fcf9f8",
                        "surface-tint": "#bd1119",
                        "on-secondary-fixed-variant": "#4a4645",
                        "secondary": "#625d5c",
                        "tertiary": "#005d83",
                        "secondary-fixed-dim": "#ccc5c3",
                        "on-error-container": "#93000a",
                        "surface": "#fcf9f8",
                        "on-background": "#1c1b1b",
                        "inverse-primary": "#ffb4ab",
                        "surface-container": "#f0eded",
                        "on-tertiary-fixed": "#001e2e",
                        "secondary-container": "#e5dedc",
                        "surface-variant": "#e5e2e1",
                        "on-primary": "#ffffff",
                        "outline-variant": "#e5bdb9",
                        "on-surface-variant": "#5c403d",
                        "outline": "#906f6b",
                        "on-tertiary-fixed-variant": "#004c6c",
                        "on-tertiary-container": "#ebf5ff",
                        "on-error": "#ffffff",
                        "error-container": "#ffdad6",
                        "on-secondary-container": "#666260",
                        "success-green": "#2E7D32",
                        "accent-orange": "#F57C00",
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "xl": "32px",
                        "container-margin": "40px",
                        "gutter": "24px",
                        "unit": "8px",
                        "md": "16px",
                        "lg": "24px",
                        "sm": "8px",
                        "xs": "4px"
                    },
                    "fontFamily": {
                        "display": ["Inter", "sans-serif"],
                        "label-md": ["Inter", "sans-serif"],
                        "title-lg": ["Inter", "sans-serif"],
                        "body-lg": ["Inter", "sans-serif"],
                        "headline-md": ["Inter", "sans-serif"],
                        "tabular-nums": ["Inter", "sans-serif"],
                        "headline-lg": ["Inter", "sans-serif"],
                        "body-md": ["Inter", "sans-serif"]
                    },
                    "fontSize": {
                        "display": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "label-md": ["12px", {"lineHeight": "16px", "letterSpacing": "0.02em", "fontWeight": "500"}],
                        "title-lg": ["20px", {"lineHeight": "28px", "fontWeight": "600"}],
                        "body-lg": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                        "headline-md": ["24px", {"lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                        "tabular-nums": ["14px", {"lineHeight": "20px", "fontWeight": "500"}],
                        "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "600"}],
                        "body-md": ["14px", {"lineHeight": "20px", "fontWeight": "400"}]
                    }
                }
            }
        }
    </script>
    <style>
        .ambient-shadow {
            box-shadow: 0 2px 4px rgba(0,0,0,0.05), 0 4px 12px rgba(0,0,0,0.05), 0 16px 32px rgba(0,0,0,0.02);
        }
        .squishy-btn:active {
            transform: scale(0.97);
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
        }
        .drag-cursor { cursor: grab; }
        .drag-cursor:active { cursor: grabbing; }
        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="bg-background text-on-background font-body-md h-screen w-full overflow-hidden flex flex-col selection:bg-primary-container selection:text-on-primary-container" x-data="dineFlowKasir()" x-init="initKasir()">

@include('layouts.sidebar1')

<!-- Main Workspace Area -->
<main class="flex-1 flex flex-col md:flex-row md:ml-[280px] bg-surface-container-low h-full overflow-hidden">

    <!-- Floor Plan (Left) -->
    <section class="flex-1 flex flex-col p-lg border-r border-outline-variant h-full overflow-y-auto">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-md mb-md">
            <div>
                <h1 class="font-headline-md text-headline-md text-on-surface">Lantai Utama</h1>
                <p class="font-body-md text-body-md text-secondary">Area Restoran • Kapasitas Terisi: <span x-text="occupancyRate + '%'">0%</span></p>
            </div>
            
            <div class="flex flex-wrap items-center gap-sm">
                <!-- Status Indicators -->
                <div class="flex gap-xs mr-2">
                    <div class="flex items-center gap-xs bg-surface px-sm py-xs border border-outline-variant rounded-md shadow-sm">
                        <div class="w-3 h-3 rounded-full bg-success-green"></div>
                        <span class="font-label-md text-label-md text-secondary">Tersedia</span>
                    </div>
                    <div class="flex items-center gap-xs bg-surface px-sm py-xs border border-outline-variant rounded-md shadow-sm">
                        <div class="w-3 h-3 rounded-full bg-primary-container"></div>
                        <span class="font-label-md text-label-md text-secondary">Terisi</span>
                    </div>
                </div>

                <!-- Mode Control Actions -->
                <button @click="isEditMode = !isEditMode" 
                        :class="isEditMode ? 'bg-accent-orange text-white' : 'bg-surface-container-high text-on-surface'"
                        class="px-3 py-2 rounded-lg font-label-md text-label-md flex items-center gap-1 transition-colors border border-outline-variant squishy-btn">
                    <span class="material-symbols-outlined text-[18px]">design_services</span>
                    <span x-text="isEditMode ? 'Selesai Edit' : 'Edit Layout'"></span>
                </button>

                <button x-show="isEditMode" @click="openAddModal = true" 
                        class="bg-tertiary-container text-on-tertiary-container px-3 py-2 rounded-lg font-label-md text-label-md flex items-center gap-1 transition-colors squishy-btn">
                    <span class="material-symbols-outlined text-[18px]">add</span>
                    Tambah Meja
                </button>

                <button x-show="isEditMode && isPosChanged" @click="savePositions()" 
                        class="bg-success-green text-white px-3 py-2 rounded-lg font-label-md text-label-md flex items-center gap-1 transition-colors animate-pulse squishy-btn">
                    <span class="material-symbols-outlined text-[18px]">save</span>
                    Simpan Layout
                </button>
            </div>
        </div>

        <!-- Interactive Floor Map Canvas -->
        <div id="floorCanvas" 
             @mousemove="drag($event)" 
             @mouseup="stopDrag()"
             @mouseleave="stopDrag()"
             class="flex-1 bg-surface-container-lowest rounded-xl border border-outline-variant ambient-shadow p-lg relative overflow-hidden min-h-[450px]">
            
            <div class="absolute inset-0 opacity-40 pointer-events-none" style="background-image: radial-gradient(#e5e2e1 1px, transparent 1px); background-size: 24px 24px;"></div>

            <template x-for="table in tables" :key="table.id">
                <div 
                    @mousedown="startDrag($event, table)"
                    @click="selectTable(table)"
                    :style="`left: ${table.x_pos}% ; top: ${table.y_pos}% ;`"
                    class="absolute transition-shadow select-none"
                    :class="{
                        'drag-cursor': isEditMode,
                        'ring-2 ring-primary ring-offset-2 z-20': selectedTable && selectedTable.id === table.id,
                        'rounded-full': table.shape === 'circle',
                        'rounded-xl': table.shape === 'square' || table.shape === 'rectangle'
                    }">

                    <!-- Dynamic Card Meja Visual -->
                    <div class="relative border-2 flex flex-col items-center justify-center p-sm shadow-sm bg-surface transition-all"
                         :class="{
                            'w-24 h-24 rounded-full': table.shape === 'circle',
                            'w-24 h-24 rounded-xl': table.shape === 'square',
                            'w-40 h-24 rounded-xl': table.shape === 'rectangle',
                            'border-primary-container bg-primary-container/5': table.status === 'occupied',
                            'border-success-green/40 bg-success-green/5': table.status === 'available',
                            'border-accent-orange/50 bg-accent-orange/5': table.status === 'reserved'
                         }">

                        <!-- Tombol Hapus Meja saat Mode Edit -->
                        <button x-show="isEditMode" @click.stop="deleteTable(table.id)" 
                                class="absolute -top-2 -right-2 bg-error text-white rounded-full w-5 h-5 flex items-center justify-center hover:bg-red-700 shadow-md z-30">
                            <span class="material-symbols-outlined text-[12px]">close</span>
                        </button>

                        <span class="font-headline-md text-headline-md text-on-surface" x-text="table.name || table.table_number"></span>
                        <span class="font-tabular-nums text-tabular-nums text-secondary text-xs" x-text="table.capacity + ' Seats'"></span>

                        <template x-if="table.status === 'occupied'">
                            <div class="mt-1 bg-primary-container/10 text-primary-container px-1.5 py-0.5 rounded font-label-md text-[10px]" x-text="formatRupiah(table.active_order_total)"></div>
                        </template>
                        <template x-if="table.status === 'available'">
                            <div class="mt-1 bg-success-green/10 text-success-green px-1.5 py-0.5 rounded font-label-md text-[10px]">Kosong</div>
                        </template>

                        <!-- Visual Kursi / Chair Decorators -->
                        <div class="absolute -left-2 top-1/2 -translate-y-1/2 w-1.5 h-6 bg-surface-container-high rounded-full border border-outline-variant"></div>
                        <div class="absolute -right-2 top-1/2 -translate-y-1/2 w-1.5 h-6 bg-surface-container-high rounded-full border border-outline-variant"></div>
                    </div>
                </div>
            </template>
        </div>
    </section>

    <!-- Active Ticket / POS Terminal (Right) -->
    <section class="w-full md:w-[380px] bg-surface flex flex-col h-full shrink-0 relative z-10 shadow-[-4px_0_12px_rgba(0,0,0,0.02)] border-l border-outline-variant">

        <!-- Ticket Header -->
        <div class="p-md border-b border-outline-variant bg-surface-container-lowest">
            <div class="flex justify-between items-center mb-xs">
                <h2 class="font-title-lg text-title-lg text-on-surface" x-text="selectedTable ? (selectedTable.name || selectedTable.table_number) : 'Pilih Meja'"></h2>
                <span class="bg-surface-container-high px-2 py-1 rounded text-secondary font-tabular-nums text-tabular-nums border border-outline-variant" x-text="activeOrder ? '#' + activeOrder.order_number : '#----'"></span>
            </div>
            <div class="flex items-center gap-sm text-secondary font-label-md text-label-md uppercase tracking-wide">
                <span class="material-symbols-outlined text-[14px]">group</span>
                <span x-text="selectedTable ? selectedTable.capacity + ' Tamu' : '-'"></span>
                <span class="mx-1">•</span>
                <span x-text="activeOrder ? 'Pelayan: ' + activeOrder.waiter_name : 'Status: Ready'"></span>
            </div>
        </div>

        <!-- Ticket Items -->
        <div class="flex-1 overflow-y-auto p-sm bg-surface-container-lowest">
            <template x-if="activeOrder && activeOrder.items && activeOrder.items.length > 0">
                <div>
                    <template x-for="(item, index) in activeOrder.items" :key="index">
                        <div class="p-sm bg-surface rounded-lg border border-outline-variant mb-xs hover:border-primary-container/30 transition-colors group cursor-pointer"
                             :class="{'border-primary/20 bg-primary/5': item.notes}">
                            <div class="flex justify-between items-start">
                                <div class="flex gap-sm">
                                    <div class="w-6 h-6 bg-surface-container-high rounded flex items-center justify-center font-tabular-nums text-tabular-nums text-on-surface font-medium border border-outline-variant" x-text="item.qty"></div>
                                    <div>
                                        <h4 class="font-body-lg text-body-lg text-on-surface leading-tight font-medium" x-text="item.name"></h4>
                                        <template x-if="item.notes">
                                            <p class="font-body-md text-body-md text-error text-[12px] mt-xs font-medium uppercase" x-text="item.notes"></p>
                                        </template>
                                    </div>
                                </div>
                                <span class="font-tabular-nums text-tabular-nums text-on-surface font-medium" x-text="formatRupiah(item.price * item.qty)"></span>
                            </div>
                        </div>
                    </template>
                </div>
            </template>

            <template x-if="!activeOrder || !activeOrder.items || activeOrder.items.length === 0">
                <div class="h-full flex flex-col items-center justify-center text-secondary p-lg text-center">
                    <span class="material-symbols-outlined text-[48px] text-outline mb-2">receipt_long</span>
                    <p class="font-body-md text-body-md">Pilih meja terisi untuk melihat rincian tagihan atau memproses pembayaran.</p>
                </div>
            </template>
        </div>

        <!-- Ticket Totals -->
        <div class="p-md bg-surface-container-lowest border-t border-outline-variant">
            <div class="flex justify-between items-center mb-xs text-secondary">
                <span class="font-body-md text-body-md">Subtotal</span>
                <span class="font-tabular-nums text-tabular-nums" x-text="formatRupiah(subtotal)">Rp 0</span>
            </div>
            <div class="flex justify-between items-center mb-sm text-secondary">
                <span class="font-body-md text-body-md">Pajak (10%)</span>
                <span class="font-tabular-nums text-tabular-nums" x-text="formatRupiah(tax)">Rp 0</span>
            </div>
            <div class="flex justify-between items-end mb-md pt-sm border-t border-outline-variant border-dashed">
                <span class="font-title-lg text-title-lg text-on-surface">Total</span>
                <span class="font-headline-md text-headline-md text-on-surface font-tabular-nums" x-text="formatRupiah(grandTotal)">Rp 0</span>
            </div>
        </div>

        <!-- POS Action Pad -->
        <div class="p-sm bg-surface-container-low border-t border-outline-variant grid grid-cols-2 gap-sm shrink-0">
            <button class="bg-surface border border-outline-variant text-on-surface rounded-lg py-md font-label-md text-label-md uppercase tracking-wide flex flex-col items-center justify-center gap-xs squishy-btn ambient-shadow hover:bg-surface-container-lowest transition-colors">
                <span class="material-symbols-outlined text-[20px]">print</span>
                Cetak Tagihan
            </button>
            <button class="bg-surface border border-outline-variant text-on-surface rounded-lg py-md font-label-md text-label-md uppercase tracking-wide flex flex-col items-center justify-center gap-xs squishy-btn ambient-shadow hover:bg-surface-container-lowest transition-colors">
                <span class="material-symbols-outlined text-[20px]">splitscreen</span>
                Pisah Bill
            </button>

            <button 
                @click="processPayment()" 
                :disabled="!activeOrder || isProcessing"
                class="col-span-2 bg-primary-container text-on-primary-container rounded-xl py-lg font-title-lg text-title-lg flex items-center justify-center gap-sm squishy-btn ambient-shadow hover:opacity-95 transition-opacity disabled:opacity-50 disabled:cursor-not-allowed">
                <span class="material-symbols-outlined text-[24px]" style="font-variation-settings: 'FILL' 1;">credit_card</span>
                <span x-text="isProcessing ? 'Memproses...' : 'Bayar ' + formatRupiah(grandTotal)"></span>
            </button>
        </div>

    </section>

    <!-- Modal Tambah Meja Baru -->
    <div x-show="openAddModal" class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4" x-cloak>
        <div class="bg-surface rounded-xl shadow-xl max-w-md w-full p-6 border border-outline-variant space-y-4" @click.away="openAddModal = false">
            <h3 class="text-title-lg font-title-lg text-on-surface">Tambah Meja Baru</h3>
            
            <form @submit.prevent="addTable()">
                <div class="space-y-3">
                    <div>
                        <label class="block text-label-md font-label-md text-secondary uppercase mb-1">Nomor/Nama Meja</label>
                        <input type="text" x-model="newTable.table_number" placeholder="Contoh: Meja 11" required class="w-full rounded-lg border-outline-variant text-body-md focus:ring-primary focus:border-primary bg-surface-container-lowest"/>
                    </div>
                    <div>
                        <label class="block text-label-md font-label-md text-secondary uppercase mb-1">Kapasitas Kursi</label>
                        <input type="number" x-model="newTable.capacity" min="1" required class="w-full rounded-lg border-outline-variant text-body-md focus:ring-primary focus:border-primary bg-surface-container-lowest"/>
                    </div>
                    <div>
                        <label class="block text-label-md font-label-md text-secondary uppercase mb-1">Bentuk Meja</label>
                        <select x-model="newTable.shape" class="w-full rounded-lg border-outline-variant text-body-md focus:ring-primary focus:border-primary bg-surface-container-lowest">
                            <option value="square">Persegi (Square)</option>
                            <option value="circle">Lingkaran (Circle)</option>
                            <option value="rectangle">Persegi Panjang (Rectangle)</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end gap-2 mt-6">
                    <button type="button" @click="openAddModal = false" class="px-4 py-2 bg-surface-container-high rounded-lg text-body-md text-on-surface hover:bg-surface-variant">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-primary-container text-on-primary-container rounded-lg text-body-md font-medium hover:opacity-90">Simpan Meja</button>
                </div>
            </form>
        </div>
    </div>

</main>

<script>
    function dineFlowKasir() {
        return {
            isProcessing: false,
            isEditMode: false,
            isPosChanged: false,
            openAddModal: false,

            tables: @json($tables ?? []),
            selectedTable: null,
            activeOrder: null,

            draggedTable: null,
            startX: 0,
            startY: 0,
            initialTableX: 0,
            initialTableY: 0,

            newTable: {
                table_number: '',
                capacity: 4,
                shape: 'square'
            },

            initKasir() {
                if (this.tables.length > 0) {
                    const occupied = this.tables.find(t => t.status === 'occupied');
                    if (occupied) {
                        this.selectTable(occupied);
                    } else {
                        this.selectTable(this.tables[0]);
                    }
                }
            },

            get occupancyRate() {
                if (!this.tables || this.tables.length === 0) return 0;
                const occupiedCount = this.tables.filter(t => t.status === 'occupied').length;
                return Math.round((occupiedCount / this.tables.length) * 100);
            },

            selectTable(table) {
                this.selectedTable = table;
                if (table.status === 'occupied' && table.items && table.items.length > 0) {
                    this.activeOrder = {
                        id: table.active_order_id,
                        order_number: table.order_number,
                        waiter_name: table.waiter_name || 'Pelayan',
                        items: table.items
                    };
                } else {
                    this.activeOrder = null;
                }
            },

            // --- Drag & Drop Core Logic Refactored ---
            startDrag(e, table) {
                if (!this.isEditMode) return;
                this.draggedTable = table;
                this.startX = e.clientX;
                this.startY = e.clientY;
                this.initialTableX = parseFloat(table.x_pos) || 0;
                this.initialTableY = parseFloat(table.y_pos) || 0;
            },

            drag(e) {
                if (!this.draggedTable || !this.isEditMode) return;
                
                const canvas = document.getElementById('floorCanvas');
                const rect = canvas.getBoundingClientRect();

                const deltaX = e.clientX - this.startX;
                const deltaY = e.clientY - this.startY;

                let newX = this.initialTableX + (deltaX / rect.width) * 100;
                let newY = this.initialTableY + (deltaY / rect.height) * 100;

                // Batas dynamic berdasarkan bentuk meja
                const maxX = this.draggedTable.shape === 'rectangle' ? 75 : 85;
                const maxY = 82;

                this.draggedTable.x_pos = Math.max(0, Math.min(maxX, newX));
                this.draggedTable.y_pos = Math.max(0, Math.min(maxY, newY));

                this.isPosChanged = true;
            },

            stopDrag() {
                this.draggedTable = null;
            },

            async savePositions() {
                const positions = this.tables.map(t => ({
                    id: t.id,
                    x_pos: t.x_pos,
                    y_pos: t.y_pos
                }));

                try {
                    const res = await fetch("{{ route('admin.kasir.tables.positions') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ positions })
                    });
                    if (res.ok) {
                        this.isPosChanged = false;
                        alert('Posisi tata letak meja berhasil disimpan!');
                    }
                } catch(e) {
                    alert('Gagal menyimpan posisi layout.');
                }
            },

            async addTable() {
                try {
                    const res = await fetch("{{ route('admin.kasir.tables.store') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(this.newTable)
                    });
                    const data = await res.json();
                    if (data.success && data.table) {
                        // Push langsung ke state tanpa reload
                        this.tables.push(data.table);
                        this.openAddModal = false;
                        this.newTable = { table_number: '', capacity: 4, shape: 'square' };
                    } else {
                        alert('Gagal menambah meja: ' + (data.message || 'Periksa kelengkapan input.'));
                    }
                } catch(e) {
                    alert('Terjadi kesalahan server saat menambah meja.');
                }
            },

            async deleteTable(id) {
                if (!confirm('Apakah Anda yakin ingin menghapus meja ini?')) return;
                try {
                    const res = await fetch(`/admin/kasir/tables/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });
                    const data = await res.json();
                    if (data.success) {
                        this.tables = this.tables.filter(t => t.id !== id);
                        if (this.selectedTable && this.selectedTable.id === id) {
                            this.selectedTable = null;
                            this.activeOrder = null;
                        }
                    } else {
                        alert(data.message);
                    }
                } catch(e) {
                    alert('Gagal menghapus meja.');
                }
            },

            // --- Operational & Calculation Logic ---
            get subtotal() {
                if (!this.activeOrder || !this.activeOrder.items) return 0;
                return this.activeOrder.items.reduce((sum, item) => sum + (item.price * item.qty), 0);
            },

            get tax() {
                return this.subtotal * 0.10;
            },

            get grandTotal() {
                return this.subtotal + this.tax;
            },

            async processPayment() {
                if (!this.activeOrder) return;
                this.isProcessing = true;

                try {
                    const response = await fetch(`/admin/orders/${this.activeOrder.id}/pay`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ amount: this.grandTotal })
                    });

                    if (response.ok) {
                        this.selectedTable.status = 'available';
                        this.selectedTable.active_order_total = 0;
                        this.selectedTable.items = [];
                        this.activeOrder = null;
                        alert('Pembayaran berhasil diproses!');
                    } else {
                        alert('Gagal memproses pembayaran.');
                    }
                } catch (e) {
                    alert('Terjadi kesalahan koneksi backend.');
                } finally {
                    this.isProcessing = false;
                }
            },

            formatRupiah(amount) {
                return new Intl.NumberFormat('id-ID', { 
                    style: 'currency', 
                    currency: 'IDR', 
                    maximumFractionDigits: 0 
                }).format(amount || 0);
            }
        }
    }
</script>
</body>
</html>