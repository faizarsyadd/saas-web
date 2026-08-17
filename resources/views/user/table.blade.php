<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
    <title>DineFlow - Table Selection</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary": "#b20112",
                        "primary-container": "#d62828",
                        "on-primary-container": "#fff1ef",
                        "background": "#fcf9f8",
                        "on-background": "#1c1b1b",
                        "on-surface-variant": "#5c403d",
                        "surface": "#fcf9f8",
                        "surface-container": "#f0eded",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-low": "#f6f3f2",
                        "surface-container-highest": "#e5e2e1",
                        "surface-dim": "#dcd9d9",
                        "outline-variant": "#e5bdb9",
                        "outline": "#906f6b"
                    },
                    "spacing": {
                        "xs": "4px",
                        "sm": "8px",
                        "md": "16px",
                        "lg": "24px",
                        "xl": "32px",
                        "margin-mobile": "20px",
                        "touch-target-min": "48px"
                    }
                }
            }
        }
    </script>
    <style>
        body {
            -webkit-tap-highlight-color: transparent;
            min-height: max(884px, 100dvh);
        }
        .table-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }
        @media (min-width: 768px) {
            .table-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }
        .ambient-shadow {
            box-shadow: 0 4px 20px rgba(28, 27, 27, 0.08);
        }
    </style>
</head>
<body class="bg-background text-on-background font-sans antialiased min-h-screen flex flex-col justify-between">

    <div class="w-full max-w-md mx-auto flex-grow flex flex-col min-h-screen">
        <!-- TopAppBar -->
        <header class="bg-surface shadow-sm sticky top-0 z-50 px-margin-mobile py-sm flex justify-between items-center w-full">
            <a href="{{ route('user.index') }}" class="hover:opacity-80 transition-opacity active:scale-95 duration-200 text-primary flex items-center justify-center w-touch-target-min h-touch-target-min">
                <span class="material-symbols-outlined text-2xl">table_restaurant</span>
            </a>
            <h1 class="text-xl font-bold text-primary">DineFlow</h1>
            <a href="{{ route('user.keranjang') }}" class="hover:opacity-80 transition-opacity active:scale-95 duration-200 text-on-surface-variant flex items-center justify-center w-touch-target-min h-touch-target-min">
                <span class="material-symbols-outlined text-2xl">shopping_cart</span>
            </a>
        </header>

        <!-- Main Content -->
        <main class="flex-grow px-margin-mobile py-lg pb-12">
            
            <!-- Known Table Banner (Jika Meja Sudah Terpilih/Aktif) -->
            @if(isset($selectedTableNumber) && $selectedTableNumber)
            <div class="bg-surface-container rounded-xl p-lg mb-xl ambient-shadow flex flex-col items-center justify-between gap-md border border-outline-variant/30 text-center">
                <div class="flex flex-col items-center gap-xs">
                    <div class="w-12 h-12 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center mb-1">
                        <span class="material-symbols-outlined text-2xl" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-on-background">Anda berada di Meja {{ $selectedTableNumber }}</h2>
                        <p class="text-xs text-on-surface-variant mt-1">Siap untuk memesan makanan.</p>
                    </div>
                </div>
                <a href="{{ route('user.menu') }}" class="w-full h-[48px] px-xl rounded-xl bg-primary-container text-on-primary-container font-semibold hover:bg-primary transition-colors active:scale-95 flex items-center justify-center whitespace-nowrap text-sm">
                    Lanjutkan ke Menu
                </a>
            </div>
            @endif

            <!-- Section Header -->
            <div class="mb-md flex justify-between items-end">
                <div>
                    <h3 class="text-lg font-bold text-on-background">Pilih Meja</h3>
                    <p class="text-xs text-on-surface-variant mt-0.5">Silakan pilih nomor meja Anda</p>
                </div>
                <div class="flex gap-sm">
                    <div class="flex items-center gap-xs">
                        <div class="w-3 h-3 rounded-full bg-surface-container-highest border border-outline-variant"></div>
                        <span class="text-xs text-on-surface-variant">Tersedia</span>
                    </div>
                    <div class="flex items-center gap-xs">
                        <div class="w-3 h-3 rounded-full bg-surface-dim"></div>
                        <span class="text-xs text-on-surface-variant">Terisi</span>
                    </div>
                </div>
            </div>

            <!-- Table Grid Dinamis dari Database -->
            <div class="table-grid">
                @forelse($tables as $table)
                    @php
                        // Cek kondisi status meja
                        $isOccupied = in_array(strtolower($table->status ?? ''), ['occupied', 'terisi', 'booked']);
                        $isSelected = isset($selectedTableNumber) && $selectedTableNumber == $table->number;
                    @endphp

                    @if($isSelected)
                        <!-- Table Current / Selected -->
                        <div class="aspect-square rounded-xl bg-primary-container text-on-primary-container shadow-sm border border-primary flex flex-col items-center justify-center gap-1 relative overflow-hidden">
                            <div class="absolute inset-0 bg-white/10 pointer-events-none"></div>
                            <span class="material-symbols-outlined text-2xl" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="font-bold text-lg">{{ $table->number }}</span>
                        </div>

                    @elseif($isOccupied)
                        <!-- Table Occupied -->
                        <div class="aspect-square rounded-xl bg-surface-dim border border-transparent flex flex-col items-center justify-center gap-1 relative overflow-hidden opacity-60">
                            <span class="material-symbols-outlined text-on-surface-variant text-2xl" style="font-variation-settings: 'FILL' 1;">person</span>
                            <span class="font-bold text-lg text-on-surface-variant">{{ $table->number }}</span>
                        </div>

                    @else
                        <!-- Table Available (Dapat Diklik) -->
                        <a href="{{ route('user.select_table', $table->number ?? $table->no_meja ?? $table->id) }}" class="aspect-square rounded-xl bg-surface-container-lowest border border-outline-variant hover:bg-surface-container-low active:scale-95 transition-all flex flex-col items-center justify-center gap-1 relative overflow-hidden group">
                    <span class="material-symbols-outlined text-outline text-opacity-50 text-2xl group-hover:text-primary transition-colors">chair_alt</span>
                    <span class="font-bold text-lg text-on-background">{{ $table->number ?? $table->no_meja ?? $table->id }}</span>
                </a>
                    @endif

                @empty
                    <!-- Tampilan jika belum ada data meja di database -->
                    <div class="col-span-3 text-center py-8 text-on-surface-variant text-sm">
                        Belum ada data meja yang tersedia.
                    </div>
                @endforelse
            </div>

        </main>
    </div>

</body>
</html>