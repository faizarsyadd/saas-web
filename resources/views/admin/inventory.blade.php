<!DOCTYPE html>

<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>DineFlow Pusat Inventaris &amp; Rantai Pasok</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    "success": "#2A9D8F",
                    "danger": "#E63946"
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
                    "display": [
                            "Inter"
                    ],
                    "label-md": [
                            "Inter"
                    ],
                    "title-lg": [
                            "Inter"
                    ],
                    "body-lg": [
                            "Inter"
                    ],
                    "headline-md": [
                            "Inter"
                    ],
                    "tabular-nums": [
                            "Inter"
                    ],
                    "headline-lg": [
                            "Inter"
                    ],
                    "body-md": [
                            "Inter"
                    ]
            },
            "fontSize": {
                    "display": [
                            "48px",
                            {
                                    "lineHeight": "56px",
                                    "letterSpacing": "-0.02em",
                                    "fontWeight": "700"
                            }
                    ],
                    "label-md": [
                            "12px",
                            {
                                    "lineHeight": "16px",
                                    "letterSpacing": "0.02em",
                                    "fontWeight": "500"
                            }
                    ],
                    "title-lg": [
                            "20px",
                            {
                                    "lineHeight": "28px",
                                    "fontWeight": "600"
                            }
                    ],
                    "body-lg": [
                            "16px",
                            {
                                    "lineHeight": "24px",
                                    "fontWeight": "400"
                            }
                    ],
                    "headline-md": [
                            "24px",
                            {
                                    "lineHeight": "32px",
                                    "letterSpacing": "-0.01em",
                                    "fontWeight": "600"
                            }
                    ],
                    "tabular-nums": [
                            "14px",
                            {
                                    "lineHeight": "20px",
                                    "fontWeight": "500"
                            }
                    ],
                    "headline-lg": [
                            "32px",
                            {
                                    "lineHeight": "40px",
                                    "letterSpacing": "-0.02em",
                                    "fontWeight": "600"
                            }
                    ],
                    "body-md": [
                            "14px",
                            {
                                    "lineHeight": "20px",
                                    "fontWeight": "400"
                            }
                    ]
            },
            "boxShadow": {
                'ambient': '0 1px 2px rgba(0, 0, 0, 0.05), 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 10px 15px -3px rgba(0, 0, 0, 0.05)'
            }
          }
        }
      }
    </script>
<style>
        body { background-color: #FAFAFA; }
        .glass-header { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); border-bottom: 1px solid #E5E5E5; }
        .card-ambient { background: #FFFFFF; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 10px 15px -3px rgba(0, 0, 0, 0.05); }
        .data-table-row:hover { background-color: #FFF7F5; }
        .input-glow:focus { border-color: #D62828; box-shadow: 0 0 0 2px rgba(214, 40, 40, 0.2); outline: none; }
    </style>
</head>
<body class="font-body-md text-on-surface antialiased flex h-screen overflow-hidden">
<!-- SideNavBar (Shared Component) -->
<nav class="hidden md:flex bg-surface dark:bg-surface fixed left-0 top-0 h-full w-[280px] shadow-md z-30 flex-col p-lg border-r border-outline-variant">
<div class="flex items-center gap-md mb-xl">
<img class="w-10 h-10 rounded-DEFAULT object-cover" data-alt="A minimalist logo for a high-end enterprise restaurant management platform. The logo features a stylized geometric 'D' integrated with a subtle continuous flow line, representing efficient supply chain and POS operations. It uses a clean, bright white background with a vibrant red and deep gray palette. The style is modern, professional, and scalable." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDH2IvJ7oXWahtxuBne5zlZG8L9MO4XYqV5UZQfthWeXF2Ng5dSURJtgpc7wB5kRhPJjr3P2C2YarxNGBPuV54zuKhPO3Vlbh3Lpx2uibFgpbLg2wp2gw0zsvcafeStnKph0ipFVjU6eBJPOGdUtved17WxehXJ88sg-Mg4NduMcAMuOSouTaUAQgY8sLljBB-JbN6z8MWwXB-2thrYbomftM3LVHggTlBWUgnuq5ORhSqUdDRg5uU6gg"/>
<div>
<h1 class="font-display text-headline-md font-bold text-primary">DineFlow</h1>
<p class="font-body-md text-body-md text-secondary">Admin Waralaba</p>
</div>
</div>
<button class="w-full bg-primary-container text-on-primary font-title-lg text-title-lg py-sm px-md rounded-lg mb-lg hover:opacity-90 transition-opacity flex items-center justify-center gap-sm">
<span class="material-symbols-outlined text-[20px]">add</span>
            Pesanan Cepat
        </button>
<ul class="flex-1 flex flex-col gap-sm overflow-y-auto">
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg text-secondary font-medium hover:bg-surface-container-high transition-colors duration-200" href="#">
<span class="material-symbols-outlined">dashboard</span>
                    Pusat Komando
                </a>
</li>
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg text-secondary font-medium hover:bg-surface-container-high transition-colors duration-200" href="#">
<span class="material-symbols-outlined">point_of_sale</span>
                    POS
                </a>
</li>
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg text-primary font-bold border-r-4 border-primary bg-primary-container/10 transition-transform duration-150 scale-95 origin-left" href="#">
<span class="material-symbols-outlined">inventory_2</span>
                    Inventaris
                </a>
</li>
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg text-secondary font-medium hover:bg-surface-container-high transition-colors duration-200" href="#">
<span class="material-symbols-outlined">restaurant</span>
                    Dapur
                </a>
</li>
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg text-secondary font-medium hover:bg-surface-container-high transition-colors duration-200" href="#">
<span class="material-symbols-outlined">group</span>
                    Staf
                </a>
</li>
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg text-secondary font-medium hover:bg-surface-container-high transition-colors duration-200" href="#">
<span class="material-symbols-outlined">query_stats</span>
                    CRM
                </a>
</li>
</ul>
<div class="mt-auto pt-md border-t border-outline-variant">
<ul class="flex flex-col gap-sm">
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg text-secondary font-medium hover:bg-surface-container-high transition-colors duration-200" href="#">
<span class="material-symbols-outlined">settings</span>
                        Pengaturan
                    </a>
</li>
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg text-secondary font-medium hover:bg-surface-container-high transition-colors duration-200" href="#">
<span class="material-symbols-outlined">sync_alt</span>
                        Ganti Waralaba
                    </a>
</li>
</ul>
</div>
</nav>
<!-- Main Content Area -->
<main class="flex-1 md:ml-[280px] h-full overflow-y-auto bg-[#FAFAFA]">
<!-- TopNavBar (Shared Component) -->
<header class="sticky top-0 w-full z-40 bg-surface/80 dark:bg-surface/80 backdrop-blur-md border-b border-outline-variant shadow-sm flex justify-between items-center px-container-margin py-md">
<div class="flex items-center gap-md">
<span class="md:hidden font-display text-headline-sm font-bold text-primary">DineFlow</span>
<div class="hidden md:flex relative w-64">
<span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
<input class="w-full pl-xl pr-sm py-sm rounded-DEFAULT border border-outline-variant input-glow bg-surface-container-lowest font-body-md text-body-md" placeholder="Cari inventaris..." type="text"/>
</div>
</div>
<div class="flex items-center gap-md">
<div class="flex items-center gap-sm">
<button class="text-on-surface-variant hover:text-primary transition-colors p-sm rounded-full hover:bg-surface-container-highest">
<span class="material-symbols-outlined">notifications</span>
</button>
<button class="text-on-surface-variant hover:text-primary transition-colors p-sm rounded-full hover:bg-surface-container-highest">
<span class="material-symbols-outlined">help_outline</span>
</button>
</div>
<div class="h-6 w-px bg-outline-variant mx-sm"></div>
<button class="flex items-center gap-sm text-primary font-title-lg text-title-lg hover:opacity-80 transition-opacity">
                    Sif Aktif
                    <span class="material-symbols-outlined text-[20px] text-success">fiber_manual_record</span>
</button>
<img class="w-10 h-10 rounded-full object-cover border border-outline-variant ml-sm" data-alt="A professional headshot of a restaurant manager in a brightly lit modern office setting. The manager is wearing a crisp dark shirt, smiling subtly. The lighting is soft and natural, emphasizing a clean, approachable, and authoritative executive presence within an enterprise software context." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA2WSg-8nvPbUgjU_fnhyHfnLBupbRRr5LA9BgmvHujxjMOhCA-KRfskVsaBovyAsqYOfj61b1RFJAdbSQqwSg5_mRRKLfr2QcIxyzhhwzlz-JtTAl2NNDcjA6vR9uWfnPwuaH5qk7CXijFgloBU1rqg4YDJWP1y3VbpZM2giKhErJ36qqnlNbF0x1eDsjsRs1e0GHMMwvAS2Zv1mdF-BRKs5zdoB0ao1fK_gtfXNssSCU_9rKyCaFlDQ"/>
</div>
</header>
<!-- Dashboard Canvas -->
<div class="p-container-margin max-w-7xl mx-auto space-y-gutter pb-xl">
<!-- Page Header -->
<div class="flex justify-between items-end mb-xl">
<div>
<h2 class="font-display text-display text-on-surface">Pusat Inventaris</h2>
<p class="font-body-lg text-body-lg text-secondary mt-xs">Pemantauan rantai pasok &amp; pengadaan waktu nyata</p>
</div>
<div class="flex gap-md">
<button class="bg-surface-container-lowest border border-outline-variant text-on-surface font-title-lg text-title-lg py-sm px-lg rounded-lg hover:bg-surface-container-high transition-colors shadow-sm flex items-center gap-sm">
<span class="material-symbols-outlined text-[20px]">receipt_long</span>
                        Catat Pengiriman
                    </button>
<button class="bg-primary-container text-on-primary font-title-lg text-title-lg py-sm px-lg rounded-lg hover:opacity-90 transition-opacity shadow-sm flex items-center gap-sm">
<span class="material-symbols-outlined text-[20px]">shopping_cart_checkout</span>
                        Buat PO
                    </button>
</div>
</div>
<!-- Bento Grid Layout -->
<div class="grid grid-cols-12 gap-gutter">
<!-- Critical Stock Table (Spans 8 columns) -->
<div class="col-span-12 xl:col-span-8 card-ambient rounded-[18px] border border-outline-variant overflow-hidden flex flex-col">
<div class="p-lg border-b border-outline-variant flex justify-between items-center bg-surface-container-lowest">
<div class="flex items-center gap-sm">
<span class="material-symbols-outlined text-danger">warning</span>
<h3 class="font-headline-md text-headline-md text-on-surface">Stok Kritis</h3>
</div>
<span class="bg-error-container text-on-error-container font-label-md text-label-md px-sm py-xs rounded-full uppercase tracking-wider">Butuh Tindakan</span>
</div>
<div class="overflow-x-auto flex-1">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low border-b border-outline-variant">
<th class="py-sm px-lg font-label-md text-label-md text-secondary uppercase tracking-wider">Barang / SKU</th>
<th class="py-sm px-lg font-label-md text-label-md text-secondary uppercase tracking-wider">Kategori</th>
<th class="py-sm px-lg font-label-md text-label-md text-secondary uppercase tracking-wider text-right">Level Saat Ini</th>
<th class="py-sm px-lg font-label-md text-label-md text-secondary uppercase tracking-wider text-right">Ambang Batas</th>
<th class="py-sm px-lg font-label-md text-label-md text-secondary uppercase tracking-wider text-center">Status</th>
</tr>
</thead>
<tbody class="font-tabular-nums text-tabular-nums text-on-surface">
<tr class="border-b border-outline-variant data-table-row transition-colors">
<td class="py-md px-lg">
<div class="font-title-lg text-title-lg">Truffle Oil (White)</div>
<div class="text-secondary text-[12px]">ING-TRF-001</div>
</td>
<td class="py-md px-lg text-secondary">Pantry</td>
<td class="py-md px-lg text-right font-medium text-danger">450 ml</td>
<td class="py-md px-lg text-right text-secondary">1000 ml</td>
<td class="py-md px-lg text-center">
<div class="w-full bg-surface-variant rounded-full h-1.5 mt-2 overflow-hidden">
<div class="bg-danger h-1.5 rounded-full" style="width: 8%"></div>
</div>
<span class="text-[10px] text-danger font-medium uppercase mt-1 inline-block">Sisa 8%</span>
</td>
</tr>
<tr class="border-b border-outline-variant data-table-row transition-colors">
<td class="py-md px-lg">
<div class="font-title-lg text-title-lg">Saffron Threads</div>
<div class="text-secondary text-[12px]">ING-SAF-022</div>
</td>
<td class="py-md px-lg text-secondary">Spices</td>
<td class="py-md px-lg text-right font-medium text-danger">12 g</td>
<td class="py-md px-lg text-right text-secondary">50 g</td>
<td class="py-md px-lg text-center">
<div class="w-full bg-surface-variant rounded-full h-1.5 mt-2 overflow-hidden">
<div class="bg-danger h-1.5 rounded-full" style="width: 5%"></div>
</div>
<span class="text-[10px] text-danger font-medium uppercase mt-1 inline-block">Sisa 5%</span>
</td>
</tr>
<tr class="border-b border-outline-variant data-table-row transition-colors">
<td class="py-md px-lg">
<div class="font-title-lg text-title-lg">Wagyu Ribeye A5</div>
<div class="text-secondary text-[12px]">MT-WGY-005</div>
</td>
<td class="py-md px-lg text-secondary">Proteins</td>
<td class="py-md px-lg text-right font-medium text-danger">4 kg</td>
<td class="py-md px-lg text-right text-secondary">15 kg</td>
<td class="py-md px-lg text-center">
<div class="w-full bg-surface-variant rounded-full h-1.5 mt-2 overflow-hidden">
<div class="bg-danger h-1.5 rounded-full" style="width: 9%"></div>
</div>
<span class="text-[10px] text-danger font-medium uppercase mt-1 inline-block">Sisa 9%</span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Recent Deliveries (Spans 4 columns) -->
<div class="col-span-12 xl:col-span-4 card-ambient rounded-[18px] border border-outline-variant flex flex-col bg-surface-container-lowest">
<div class="p-lg border-b border-outline-variant flex justify-between items-center">
<h3 class="font-headline-md text-headline-md text-on-surface">Pengiriman Terbaru</h3>
<button class="text-secondary hover:text-primary transition-colors">
<span class="material-symbols-outlined text-[20px]">filter_list</span>
</button>
</div>
<div class="p-lg flex-1 overflow-y-auto">
<div class="relative border-l-2 border-surface-variant ml-sm space-y-lg pb-sm">
<!-- Timeline Item -->
<div class="relative pl-lg">
<div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-success border-4 border-surface-container-lowest"></div>
<div class="flex justify-between items-start">
<div>
<h4 class="font-title-lg text-title-lg text-on-surface">Sysco Produce</h4>
<p class="font-body-md text-body-md text-secondary">PO-2023-089 • 12 Items</p>
</div>
<span class="font-tabular-nums text-tabular-nums text-secondary text-right">09:42 AM</span>
</div>
<div class="mt-sm flex gap-xs flex-wrap">
<span class="px-sm py-[2px] bg-surface-container-high rounded text-[11px] font-medium text-on-surface-variant border border-outline-variant">Terverifikasi</span>
</div>
</div>
<!-- Timeline Item -->
<div class="relative pl-lg">
<div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-success border-4 border-surface-container-lowest"></div>
<div class="flex justify-between items-start">
<div>
<h4 class="font-title-lg text-title-lg text-on-surface">Local Dairy Co.</h4>
<p class="font-body-md text-body-md text-secondary">PO-2023-090 • 4 Items</p>
</div>
<span class="font-tabular-nums text-tabular-nums text-secondary text-right">Kemarin</span>
</div>
</div>
<!-- Timeline Item (Partial) -->
<div class="relative pl-lg">
<div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-surface-variant border-4 border-surface-container-lowest"></div>
<div class="flex justify-between items-start">
<div>
<h4 class="font-title-lg text-title-lg text-on-surface">Ocean Catch Seafood</h4>
<p class="font-body-md text-body-md text-secondary">PO-2023-091 • 2 Items</p>
</div>
<span class="font-tabular-nums text-tabular-nums text-secondary text-right">Kemarin</span>
</div>
<div class="mt-sm flex gap-xs flex-wrap">
<span class="px-sm py-[2px] bg-error-container text-on-error-container rounded text-[11px] font-medium border border-outline-variant">Kurang: Salmon (2kg)</span>
</div>
</div>
</div>
</div>
<div class="p-md border-t border-outline-variant bg-surface-container-low text-center rounded-b-[18px]">
<a class="font-label-md text-label-md text-primary font-medium hover:underline uppercase tracking-wide" href="#">Lihat Semua Log</a>
</div>
</div>
<!-- Cost Variance Chart (Spans 12 columns) -->
<div class="col-span-12 card-ambient rounded-[18px] border border-outline-variant p-lg bg-surface-container-lowest">
<div class="flex justify-between items-center mb-lg">
<div>
<h3 class="font-headline-md text-headline-md text-on-surface">Varians Biaya (30 Hari)</h3>
<p class="font-body-md text-body-md text-secondary mt-xs">Melacak 5 bahan baku volatil teratas terhadap garis dasar.</p>
</div>
<div class="flex gap-sm">
<select class="rounded-DEFAULT border border-outline-variant bg-surface-container-low py-xs px-sm font-label-md text-label-md text-secondary focus:border-primary focus:ring-0">
<option>Proteins</option>
<option>Produce</option>
<option>Dairy</option>
</select>
<button class="p-xs border border-outline-variant rounded-DEFAULT text-secondary hover:bg-surface-container-highest transition-colors">
<span class="material-symbols-outlined text-[18px]">more_vert</span>
</button>
</div>
</div>
<div class="w-full h-64 relative">
<canvas id="costVarianceChart"></canvas>
</div>
</div>
</div>
</div>
</main>
<!-- Bottom Navigation Bar (Mobile Only - Based on Shared Component Logic) -->
<nav class="md:hidden fixed bottom-0 left-0 w-full bg-surface-container-lowest border-t border-outline-variant shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] z-40 flex justify-around items-center h-[72px] pb-safe">
<a class="flex flex-col items-center gap-xs p-sm text-secondary hover:text-primary transition-colors" href="#">
<span class="material-symbols-outlined">dashboard</span>
<span class="font-label-md text-[10px] font-medium">Beranda</span>
</a>
<a class="flex flex-col items-center gap-xs p-sm text-secondary hover:text-primary transition-colors" href="#">
<span class="material-symbols-outlined">point_of_sale</span>
<span class="font-label-md text-[10px] font-medium">POS</span>
</a>
<a class="flex flex-col items-center gap-xs p-sm text-primary" href="#">
<div class="bg-primary-container/20 p-[4px] rounded-full">
<span class="material-symbols-outlined font-bold" style="font-variation-settings: 'FILL' 1;">inventory_2</span>
</div>
<span class="font-label-md text-[10px] font-bold">Inventaris</span>
</a>
<a class="flex flex-col items-center gap-xs p-sm text-secondary hover:text-primary transition-colors" href="#">
<span class="material-symbols-outlined">restaurant</span>
<span class="font-label-md text-[10px] font-medium">Dapur</span>
</a>
<a class="flex flex-col items-center gap-xs p-sm text-secondary hover:text-primary transition-colors" href="#">
<span class="material-symbols-outlined">menu</span>
<span class="font-label-md text-[10px] font-medium">Lainnya</span>
</a>
</nav>
<script>
        // Chart.js implementation for Cost Variance
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('costVarianceChart').getContext('2d');
            
            // Defining colors from the system
            const colorSuccess = '#2A9D8F';
            const colorDanger = '#E63946';
            const colorSurfaceVariant = '#e5e2e1';
            const colorSecondary = '#625d5c';
            const colorOnSurface = '#1c1b1b';

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                    datasets: [
                        {
                            label: 'Wagyu Ribeye A5',
                            data: [0, 2.5, 4.1, 7.8], // Percentage variance from baseline
                            borderColor: colorDanger,
                            backgroundColor: 'rgba(230, 57, 70, 0.1)',
                            borderWidth: 2,
                            tension: 0.4,
                            fill: true,
                            pointBackgroundColor: colorDanger,
                            pointRadius: 4
                        },
                        {
                            label: 'Saffron Threads',
                            data: [0, 0.5, 1.2, 3.0],
                            borderColor: '#F4A261', // Warning orange
                            borderWidth: 2,
                            tension: 0.4,
                            pointRadius: 3
                        },
                        {
                            label: 'Chicken Breast (Bulk)',
                            data: [0, -1.2, -2.5, -1.8],
                            borderColor: colorSuccess,
                            borderWidth: 2,
                            borderDash: [5, 5],
                            tension: 0.4,
                            pointRadius: 3
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            align: 'end',
                            labels: {
                                usePointStyle: true,
                                boxWidth: 6,
                                font: {
                                    family: "'Inter', sans-serif",
                                    size: 12
                                },
                                color: colorSecondary
                            }
                        },
                        tooltip: {
                            backgroundColor: colorOnSurface,
                            titleFont: { family: "'Inter', sans-serif", size: 13 },
                            bodyFont: { family: "'Inter', sans-serif", size: 12 },
                            padding: 12,
                            cornerRadius: 4,
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed.y !== null) {
                                        label += (context.parsed.y > 0 ? '+' : '') + context.parsed.y + '%';
                                    }
                                    return label;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            grid: {
                                color: colorSurfaceVariant,
                                drawBorder: false,
                            },
                            ticks: {
                                font: { family: "'Inter', sans-serif", size: 11 },
                                color: colorSecondary,
                                callback: function(value) {
                                    return value + '%';
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false,
                                drawBorder: false,
                            },
                            ticks: {
                                font: { family: "'Inter', sans-serif", size: 11 },
                                color: colorSecondary
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                }
            });
        });
    </script>
</body></html>