<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>DineFlow - Pusat Komando Admin</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
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
                        "on-secondary-container": "#666260"
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
                        "display": ["Inter"],
                        "label-md": ["Inter"],
                        "title-lg": ["Inter"],
                        "body-lg": ["Inter"],
                        "headline-md": ["Inter"],
                        "tabular-nums": ["Inter"],
                        "headline-lg": ["Inter"],
                        "body-md": ["Inter"]
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
        body {
            font-family: 'Inter', sans-serif;
            background-color: #FAFAFA;
        }
        .shadow-stripe-card {
            box-shadow: 0 2px 5px -1px rgba(50, 50, 93, 0.25), 0 1px 3px -1px rgba(0, 0, 0, 0.3);
        }
        .shadow-stripe-ambient {
            box-shadow: 0 13px 27px -5px rgba(50, 50, 93, 0.25), 0 8px 16px -8px rgba(0, 0, 0, 0.3);
        }
        .sparkline-up {
            stroke: #059669;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
        }
        .sparkline-down {
            stroke: #D62828;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
        }
    </style>
</head>
<body class="bg-background text-on-background flex h-screen overflow-hidden">

@include('layouts.sidebar1')

<!-- Main Content Area -->
<main class="flex-1 ml-0 md:ml-[280px] flex flex-col h-screen overflow-hidden">
    <!-- TopNavBar -->
    <header class="sticky top-0 w-full z-40 bg-surface/80 dark:bg-surface/80 backdrop-blur-md border-b border-outline-variant shadow-sm flex justify-between items-center px-container-margin py-md">
        <div class="flex items-center gap-md md:hidden">
            <h1 class="font-display text-headline-sm font-bold text-primary">DineFlow</h1>
        </div>
        <div class="hidden md:block">
            <h2 class="font-title-lg text-title-lg text-on-surface">Pusat Komando</h2>
        </div>
        <div class="flex items-center gap-lg">
            <button class="bg-primary-container text-on-primary px-md py-sm rounded-lg font-label-md text-label-md active:opacity-80 transition-opacity">
                Shift Aktif
            </button>
            <div class="flex items-center gap-md text-on-surface-variant">
                <button class="hover:text-primary transition-colors">
                    <span class="material-symbols-outlined">notifications</span>
                </button>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" title="Keluar" class="hover:text-error transition-colors flex items-center">
                        <span class="material-symbols-outlined">logout</span>
                    </button>
                </form>
                <div class="flex items-center gap-2 ml-sm">
                    <div class="w-8 h-8 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-bold text-xs">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 2)) }}
                    </div>
                    <span class="text-xs font-semibold text-on-surface hidden sm:inline">{{ Auth::user()->name ?? 'Admin' }}</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Canvas -->
    <div class="flex-1 overflow-y-auto p-container-margin flex gap-gutter">
        <!-- Left/Main Column -->
        <div class="flex-1 flex flex-col gap-xl max-w-6xl">
            <!-- Hero Metrics (Bento Style) -->
            <section class="grid grid-cols-1 md:grid-cols-3 gap-lg">
                <!-- Metric 1: Revenue -->
                <div class="bg-surface-container-lowest p-lg rounded-[18px] shadow-stripe-card flex flex-col justify-between">
                    <div class="flex justify-between items-start mb-md">
                        <span class="font-label-md text-label-md text-secondary uppercase tracking-wider">Pendapatan Kotor</span>
                        <span class="bg-surface-container-high text-on-surface px-2 py-1 rounded text-xs font-medium flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">arrow_upward</span> 12%
                        </span>
                    </div>
                    <div>
                        <div class="font-headline-lg text-headline-lg text-on-surface mb-sm">Rp 12.450.000</div>
                        <div class="font-body-md text-body-md text-secondary">vs Rp 11.116.000 kemarin</div>
                    </div>
                </div>

                <!-- Metric 2: Avg Ticket -->
                <div class="bg-surface-container-lowest p-lg rounded-[18px] shadow-stripe-card flex flex-col justify-between">
                    <div class="flex justify-between items-start mb-md">
                        <span class="font-label-md text-label-md text-secondary uppercase tracking-wider">Rata-rata Pesanan</span>
                        <span class="bg-surface-container-high text-on-surface px-2 py-1 rounded text-xs font-medium flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">arrow_upward</span> 3%
                        </span>
                    </div>
                    <div>
                        <div class="font-headline-lg text-headline-lg text-on-surface mb-sm">Rp 42.500</div>
                        <div class="font-body-md text-body-md text-secondary">vs Rp 41.200 kemarin</div>
                    </div>
                </div>

                <!-- Metric 3: Labor Cost -->
                <div class="bg-surface-container-lowest p-lg rounded-[18px] shadow-stripe-card flex flex-col justify-between">
                    <div class="flex justify-between items-start mb-md">
                        <span class="font-label-md text-label-md text-secondary uppercase tracking-wider">Biaya Tenaga Kerja %</span>
                        <span class="bg-error-container text-on-error-container px-2 py-1 rounded text-xs font-medium flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">arrow_upward</span> 1.2%
                        </span>
                    </div>
                    <div>
                        <div class="font-headline-lg text-headline-lg text-on-surface mb-sm">24.8%</div>
                        <div class="font-body-md text-body-md text-secondary">Target: 22.0%</div>
                    </div>
                </div>
            </section>

            <!-- Main Chart Area -->
            <section class="bg-surface-container-lowest p-lg rounded-[18px] shadow-stripe-ambient flex flex-col h-[400px]">
                <div class="flex justify-between items-center mb-lg">
                    <h3 class="font-title-lg text-title-lg text-on-surface">Performa 24 Jam</h3>
                    <div class="flex gap-2">
                        <button class="px-3 py-1 rounded border border-outline-variant font-label-md text-label-md text-secondary hover:text-on-surface">Semua Cabang</button>
                        <button class="px-3 py-1 rounded border border-outline-variant font-label-md text-label-md text-secondary hover:text-on-surface">Pendapatan</button>
                    </div>
                </div>
                <!-- Chart Area SVG -->
                <div class="flex-1 relative w-full h-full rounded border border-surface-variant flex items-end p-4">
                    <svg class="absolute inset-0 w-full h-full" preserveaspectratio="none" viewbox="0 0 1000 300">
                        <line stroke="#f0eded" stroke-width="1" x1="0" x2="1000" y1="50" y2="50"></line>
                        <line stroke="#f0eded" stroke-width="1" x1="0" x2="1000" y1="150" y2="150"></line>
                        <line stroke="#f0eded" stroke-width="1" x1="0" x2="1000" y1="250" y2="250"></line>
                        
                        <path d="M0 250 L0 180 Q 100 200, 200 150 T 400 120 T 600 80 T 800 110 T 1000 40 L1000 250 Z" fill="url(#gradientPrimary)" opacity="0.1"></path>
                        <path d="M0 180 Q 100 200, 200 150 T 400 120 T 600 80 T 800 110 T 1000 40" fill="none" stroke="#d62828" stroke-linecap="round" stroke-width="3"></path>
                        <path d="M0 200 Q 100 220, 200 180 T 400 160 T 600 120 T 800 140 T 1000 90" fill="none" stroke="#ccc5c3" stroke-dasharray="5,5" stroke-linecap="round" stroke-width="2"></path>
                        <defs>
                            <lineargradient id="gradientPrimary" x1="0" x2="0" y1="0" y2="1">
                                <stop offset="0%" stop-color="#d62828"></stop>
                                <stop offset="100%" stop-color="#ffffff" stop-opacity="0"></stop>
                            </lineargradient>
                        </defs>
                    </svg>
                </div>
            </section>

            <!-- Top Performing Locations Table -->
            <section class="bg-surface-container-lowest rounded-[18px] shadow-stripe-card overflow-hidden">
                <div class="p-lg border-b border-surface-variant flex justify-between items-center">
                    <h3 class="font-title-lg text-title-lg text-on-surface">Cabang Performa Terbaik</h3>
                    <a class="font-label-md text-label-md text-primary hover:underline" href="#">Lihat Semua</a>
                </div>
                <table class="w-full text-left font-tabular-nums text-tabular-nums">
                    <thead class="bg-surface-container-low font-label-md text-label-md text-secondary uppercase tracking-wider">
                        <tr>
                            <th class="py-sm px-lg font-medium">Cabang</th>
                            <th class="py-sm px-lg font-medium">Pendapatan (Hari Ini)</th>
                            <th class="py-sm px-lg font-medium">Pesanan</th>
                            <th class="py-sm px-lg font-medium">Tren</th>
                            <th class="py-sm px-lg font-medium text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-variant">
                        <tr class="hover:bg-[#FFF7F5] transition-colors">
                            <td class="py-md px-lg font-body-md text-body-md text-on-surface">Cabang Margonda Utama</td>
                            <td class="py-md px-lg font-medium">Rp 6.450.000</td>
                            <td class="py-md px-lg text-secondary">312</td>
                            <td class="py-md px-lg">
                                <svg height="20" viewbox="0 0 60 20" width="60">
                                    <path class="sparkline-up" d="M0 15 Q 15 5, 30 10 T 60 2"></path>
                                </svg>
                            </td>
                            <td class="py-md px-lg text-right">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Online</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-[#FFF7F5] transition-colors">
                            <td class="py-md px-lg font-body-md text-body-md text-on-surface">Cabang Mall Depok</td>
                            <td class="py-md px-lg font-medium">Rp 4.200.000</td>
                            <td class="py-md px-lg text-secondary">245</td>
                            <td class="py-md px-lg">
                                <svg height="20" viewbox="0 0 60 20" width="60">
                                    <path class="sparkline-up" d="M0 18 Q 15 15, 30 8 T 60 5"></path>
                                </svg>
                            </td>
                            <td class="py-md px-lg text-right">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Online</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-[#FFF7F5] transition-colors">
                            <td class="py-md px-lg font-body-md text-body-md text-on-surface">Cabang Kelapa Dua</td>
                            <td class="py-md px-lg font-medium">Rp 1.800.000</td>
                            <td class="py-md px-lg text-secondary">110</td>
                            <td class="py-md px-lg">
                                <svg height="20" viewbox="0 0 60 20" width="60">
                                    <path class="sparkline-down" d="M0 5 Q 15 10, 30 5 T 60 15"></path>
                                </svg>
                            </td>
                            <td class="py-md px-lg text-right">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Online</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>

        <!-- Right Sidebar: Live Incidents -->
        <aside class="hidden xl:flex flex-col w-[320px] gap-lg">
            <div class="bg-surface-container-lowest p-lg rounded-[18px] shadow-stripe-card flex-1 flex flex-col">
                <div class="flex justify-between items-center mb-lg pb-sm border-b border-surface-variant">
                    <h3 class="font-title-lg text-title-lg text-on-surface flex items-center gap-sm">
                        <span class="material-symbols-outlined text-primary">warning</span>
                        Insiden Langsung
                    </h3>
                    <span class="bg-primary-container text-on-primary px-2 py-0.5 rounded-full text-xs font-bold">3</span>
                </div>
                <div class="flex flex-col gap-md overflow-y-auto">
                    <!-- Incident 1 -->
                    <div class="p-sm rounded border border-outline-variant hover:border-primary transition-colors cursor-pointer group">
                        <div class="flex justify-between items-start mb-xs">
                            <span class="font-label-md text-label-md text-error font-semibold uppercase">Peringatan Stok</span>
                            <span class="text-xs text-secondary">2m lalu</span>
                        </div>
                        <h4 class="font-body-md text-body-md text-on-surface font-medium mb-xs">Stok Menipis: Alpukat</h4>
                        <p class="text-xs text-secondary">Cabang Mall Depok sangat kekurangan alpukat (Est. 1 jam tersisa).</p>
                    </div>
                    <!-- Incident 2 -->
                    <div class="p-sm rounded border border-outline-variant hover:border-primary transition-colors cursor-pointer group">
                        <div class="flex justify-between items-start mb-xs">
                            <span class="font-label-md text-label-md text-[#d97706] font-semibold uppercase">Kepegawaian</span>
                            <span class="text-xs text-secondary">15m lalu</span>
                        </div>
                        <h4 class="font-body-md text-body-md text-on-surface font-medium mb-xs">Terlambat Masuk</h4>
                        <p class="text-xs text-secondary">2 koki persiapan belum masuk untuk shift makan siang di Margonda Utama.</p>
                    </div>
                    <!-- Incident 3 -->
                    <div class="p-sm rounded border border-outline-variant hover:border-primary transition-colors cursor-pointer group">
                        <div class="flex justify-between items-start mb-xs">
                            <span class="font-label-md text-label-md text-secondary font-semibold uppercase">Sistem</span>
                            <span class="text-xs text-secondary">1j lalu</span>
                        </div>
                        <h4 class="font-body-md text-body-md text-on-surface font-medium mb-xs">Kasir (POS) Offline</h4>
                        <p class="text-xs text-secondary">Terminal 2 di Cabang Kelapa Dua dilaporkan offline. Memulai ulang otomatis.</p>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</main>

</body>
</html>