<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>DineFlow - CRM Hub</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
        body { font-family: 'Inter', sans-serif; background-color: #fcf9f8; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; }
        .icon-fill { font-variation-settings: 'FILL' 1; }
        
        /* Custom Shadows for depth as requested */
        .shadow-stripe {
            box-shadow: 0 2px 5px rgba(0,0,0,0.02), 0 8px 16px rgba(0,0,0,0.04), 0 16px 32px rgba(0,0,0,0.02);
        }
        
        /* Input Focus Glow */
        .input-glow:focus-within {
            box-shadow: 0 0 0 2px rgba(214, 40, 40, 0.2);
            border-color: #d62828;
        }

        /* Glassmorphism */
        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
        }

        /* Card Hover */
        .pos-card { transition: transform 0.1s ease-in-out; }
        .pos-card:active { transform: scale(0.98); }
    </style>
</head>
<body class="text-on-background antialiased flex h-screen overflow-hidden">
<!-- SideNavBar (Shared Component) -->
<nav class="hidden md:flex flex-col h-screen p-lg bg-surface shadow-sm fixed left-0 top-0 w-[280px] z-50 shadow-md">
<!-- Brand/Header -->
<div class="flex items-center gap-md mb-xl">
<div class="w-10 h-10 rounded-lg overflow-hidden bg-surface-container-high flex items-center justify-center flex-shrink-0">
<img class="w-full h-full object-cover" data-alt="A clean, minimalist abstract logo design suitable for a modern enterprise restaurant software company. The logo uses geometric shapes and a refined color palette of deep red and soft gray on a stark white background. The aesthetic is highly professional, crisp, and high-tech, avoiding any literal representations of food." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBUKoBsBr5nI8-lu_TT09T1dpTPMOEqqWVKhNChpa6Rs4JWD5gK2QTMwy7AV5YJ5Jbh0TwhILzFnPsR4B0z-ZHcqYe9uhg93d2izwL3sphEVb8MN6-BELuni2KWs5J8eap_DXKLBx10_KtDQ2Ifr85S1jR5hGm2W0FNtwHieJFxNDJc-wTaVkFnHlf9bPcrn5s3kIGZRbx_E5Z4VdYMK3ETD8F9H6dYtpr9vUn5hkiYVHQt6BWsuyepGg"/>
</div>
<div>
<h1 class="font-display text-headline-md font-bold text-primary">DineFlow</h1>
<p class="font-body-md text-body-md text-secondary">Admin Waralaba</p>
</div>
</div>
<!-- Main Navigation Tabs -->
<div class="flex flex-col gap-sm flex-grow">
<a class="flex items-center gap-md px-md py-sm rounded-lg hover:bg-surface-container-high transition-colors duration-200 text-secondary font-medium font-body-md text-body-md" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
<span>Pusat Komando</span>
</a>
<a class="flex items-center gap-md px-md py-sm rounded-lg hover:bg-surface-container-high transition-colors duration-200 text-secondary font-medium font-body-md text-body-md" href="#">
<span class="material-symbols-outlined" data-icon="point_of_sale">point_of_sale</span>
<span>POS</span>
</a>
<a class="flex items-center gap-md px-md py-sm rounded-lg hover:bg-surface-container-high transition-colors duration-200 text-secondary font-medium font-body-md text-body-md" href="#">
<span class="material-symbols-outlined" data-icon="inventory_2">inventory_2</span>
<span>Inventaris</span>
</a>
<a class="flex items-center gap-md px-md py-sm rounded-lg hover:bg-surface-container-high transition-colors duration-200 text-secondary font-medium font-body-md text-body-md" href="#">
<span class="material-symbols-outlined" data-icon="restaurant">restaurant</span>
<span>Dapur</span>
</a>
<a class="flex items-center gap-md px-md py-sm rounded-lg hover:bg-surface-container-high transition-colors duration-200 text-secondary font-medium font-body-md text-body-md" href="#">
<span class="material-symbols-outlined" data-icon="group">group</span>
<span>Staf</span>
</a>
<a class="flex items-center gap-md px-md py-sm rounded-lg text-primary font-bold border-r-4 border-primary bg-primary-container/10 font-body-md text-body-md Active: scale-95 transition-transform duration-150" href="#">
<span class="material-symbols-outlined icon-fill" data-icon="query_stats" data-weight="fill">query_stats</span>
<span>CRM</span>
</a>
</div>
<!-- CTA -->
<div class="mt-auto mb-lg">
<button class="w-full bg-primary-container text-on-primary py-sm rounded-lg font-label-md text-label-md font-bold shadow-sm hover:opacity-90 transition-opacity flex items-center justify-center gap-sm">
<span class="material-symbols-outlined text-[18px]">add</span>
                Pesanan Cepat
            </button>
</div>
<!-- Footer Navigation -->
<div class="flex flex-col gap-sm border-t border-outline-variant pt-md">
<a class="flex items-center gap-md px-md py-sm rounded-lg hover:bg-surface-container-high transition-colors duration-200 text-secondary font-medium font-body-md text-body-md" href="#">
<span class="material-symbols-outlined text-[20px]" data-icon="settings">settings</span>
<span>Pengaturan</span>
</a>
<a class="flex items-center gap-md px-md py-sm rounded-lg hover:bg-surface-container-high transition-colors duration-200 text-secondary font-medium font-body-md text-body-md" href="#">
<span class="material-symbols-outlined text-[20px]" data-icon="sync_alt">sync_alt</span>
<span>Ganti Waralaba</span>
</a>
</div>
</nav>
<!-- Main Content Area -->
<main class="flex-1 md:ml-[280px] h-screen overflow-y-auto bg-background flex flex-col">
<!-- TopNavBar (Shared Component) - Mobile Only basically given SideNav, but keeping structure as requested if used -->
<header class="md:hidden glass-nav sticky top-0 w-full z-40 border-b border-outline-variant shadow-sm flex justify-between items-center px-container-margin py-md">
<div class="flex items-center gap-sm">
<span class="material-symbols-outlined text-primary cursor-pointer">menu</span>
<span class="font-display text-headline-sm font-bold text-primary">DineFlow</span>
</div>
<div class="flex items-center gap-md">
<div class="flex items-center bg-surface-container-low border border-outline-variant rounded-lg px-sm py-xs input-glow">
<span class="material-symbols-outlined text-secondary text-[18px]">search</span>
<input class="bg-transparent border-none focus:ring-0 text-body-md w-32 outline-none" placeholder="Cari..." type="text"/>
</div>
<span class="material-symbols-outlined text-on-surface-variant hover:text-primary transition-colors cursor-pointer" data-icon="notifications">notifications</span>
<span class="material-symbols-outlined text-on-surface-variant hover:text-primary transition-colors cursor-pointer" data-icon="help_outline">help_outline</span>
<button class="bg-surface-container-high text-on-surface px-md py-sm rounded-lg border border-outline-variant font-label-md text-label-md font-medium hover:bg-surface-variant transition-colors">
                    Shift Aktif
                </button>
<div class="w-8 h-8 rounded-full overflow-hidden border border-outline-variant">
<img class="w-full h-full object-cover" data-alt="A professional headshot of a young woman with a warm smile, wearing a dark blazer over a crisp white shirt, set against a soft, light gray studio background. The lighting is flattering and even, typical of corporate portrait photography." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAYlhvrm51qJVVDoCdmHXBcfTyHcLgvsDdcGSygKwSfUloMesKAHVFHI1gd2e6d2KWg_eC45lqRHCfjVCPOy_IzHubRRTvf-i17FUOIg5U4XhFmEgfOJazqByLl-XUYoyQxtByHW4tuRNotLvtBQODI-w86YmSV_WiWi5_V-xLIa3zBcuAX_3SvCmuyQMR1YCHSqyxufP87TNs-z7WDl7FQdBbnzwiIjU9KvKRj7l0uK5UifytvzjhtCw"/>
</div>
</div>
</header>
<!-- Desktop Header Replacement (since Sidenav is present) -->
<div class="hidden md:flex justify-between items-center px-container-margin py-lg border-b border-outline-variant bg-surface sticky top-0 z-30">
<div>
<h2 class="font-headline-lg text-headline-lg text-on-surface">Pertumbuhan Pelanggan &amp; CRM</h2>
<p class="font-body-md text-body-md text-secondary mt-1">Kelola hubungan tamu, lacak kampanye, dan optimalkan nilai seumur hidup.</p>
</div>
<div class="flex items-center gap-lg">
<div class="flex items-center bg-surface-container-lowest border border-outline-variant rounded-lg px-md py-sm w-64 input-glow shadow-sm">
<span class="material-symbols-outlined text-secondary mr-2">search</span>
<input class="bg-transparent border-none focus:ring-0 text-body-md w-full outline-none text-on-surface placeholder:text-secondary-fixed-dim" placeholder="Cari tamu, kampanye..." type="text"/>
</div>
<div class="flex gap-sm">
<button class="w-10 h-10 rounded-lg border border-outline-variant flex items-center justify-center text-secondary hover:text-primary hover:border-primary transition-colors bg-surface-container-lowest">
<span class="material-symbols-outlined">notifications</span>
</button>
<button class="bg-primary-container text-on-primary px-lg py-sm rounded-lg font-label-md text-label-md font-bold shadow-sm hover:opacity-90 transition-opacity flex items-center gap-sm">
<span class="material-symbols-outlined text-[18px]">campaign</span>
                        Kampanye Baru
                    </button>
</div>
</div>
</div>
<!-- Dashboard Content -->
<div class="p-container-margin flex flex-col gap-lg">
<!-- Top Row: LTV Segmentation Bento Grid -->
<section>
<div class="flex justify-between items-end mb-md">
<h3 class="font-title-lg text-title-lg text-on-surface">Segmentasi Nilai Seumur Hidup Tamu</h3>
<button class="text-primary font-label-md text-label-md flex items-center gap-xs hover:underline">Lihat Laporan Lengkap <span class="material-symbols-outlined text-[16px]">arrow_forward</span></button>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-md">
<!-- VIP Segment -->
<div class="bg-surface-container-lowest rounded-[18px] p-lg shadow-stripe border border-outline-variant pos-card flex flex-col relative overflow-hidden">
<div class="absolute top-0 right-0 w-32 h-32 bg-primary-container opacity-5 rounded-bl-[100px] pointer-events-none"></div>
<div class="flex justify-between items-start mb-md">
<div class="flex items-center gap-sm">
<div class="w-8 h-8 rounded-full bg-primary-fixed flex items-center justify-center text-on-primary-fixed">
<span class="material-symbols-outlined text-[18px]">star</span>
</div>
<h4 class="font-title-lg text-title-lg text-on-surface">VIP</h4>
</div>
<span class="bg-surface-container-high text-on-surface px-2 py-1 rounded text-[12px] font-medium font-tabular-nums">10% Teratas</span>
</div>
<div class="mt-auto">
<div class="font-display text-[32px] font-bold text-on-surface mb-1">1,245</div>
<p class="font-body-md text-body-md text-secondary">Tamu</p>
</div>
<div class="mt-md pt-md border-t border-surface-variant flex justify-between items-center">
<div>
<div class="font-tabular-nums text-tabular-nums text-on-surface font-medium">$450</div>
<div class="text-[11px] text-secondary">Rata-rata LTV</div>
</div>
<div class="h-6 border-l border-surface-variant"></div>
<div>
<div class="font-tabular-nums text-tabular-nums text-on-surface font-medium">4.2</div>
<div class="text-[11px] text-secondary">Kunjungan/Bln</div>
</div>
<div class="h-6 border-l border-surface-variant"></div>
<div class="text-right">
<div class="font-tabular-nums text-tabular-nums text-[#0077a6] font-medium flex items-center justify-end gap-xs">
<span class="material-symbols-outlined text-[14px]">trending_up</span> +12%
                                </div>
<div class="text-[11px] text-secondary">vs Bulan Lalu</div>
</div>
</div>
</div>
<!-- New Segment -->
<div class="bg-surface-container-lowest rounded-[18px] p-lg shadow-stripe border border-outline-variant pos-card flex flex-col">
<div class="flex justify-between items-start mb-md">
<div class="flex items-center gap-sm">
<div class="w-8 h-8 rounded-full bg-tertiary-fixed flex items-center justify-center text-on-tertiary-fixed">
<span class="material-symbols-outlined text-[18px]">person_add</span>
</div>
<h4 class="font-title-lg text-title-lg text-on-surface">Baru</h4>
</div>
<span class="bg-surface-container-high text-on-surface px-2 py-1 rounded text-[12px] font-medium font-tabular-nums">&lt; 30 Hari</span>
</div>
<div class="mt-auto">
<div class="font-display text-[32px] font-bold text-on-surface mb-1">3,892</div>
<p class="font-body-md text-body-md text-secondary">Tamu</p>
</div>
<div class="mt-md pt-md border-t border-surface-variant flex justify-between items-center">
<div>
<div class="font-tabular-nums text-tabular-nums text-on-surface font-medium">$85</div>
<div class="text-[11px] text-secondary">Rata-rata Belanja</div>
</div>
<div class="h-6 border-l border-surface-variant"></div>
<div>
<div class="font-tabular-nums text-tabular-nums text-on-surface font-medium">1.1</div>
<div class="text-[11px] text-secondary">Total Kunjungan</div>
</div>
<div class="h-6 border-l border-surface-variant"></div>
<div class="text-right">
<div class="font-tabular-nums text-tabular-nums text-[#0077a6] font-medium flex items-center justify-end gap-xs">
<span class="material-symbols-outlined text-[14px]">trending_up</span> +5%
                                </div>
<div class="text-[11px] text-secondary">Akuisisi</div>
</div>
</div>
</div>
<!-- At-Risk Segment -->
<div class="bg-surface-container-lowest rounded-[18px] p-lg shadow-stripe border border-outline-variant pos-card flex flex-col">
<div class="flex justify-between items-start mb-md">
<div class="flex items-center gap-sm">
<div class="w-8 h-8 rounded-full bg-error-container flex items-center justify-center text-on-error-container">
<span class="material-symbols-outlined text-[18px]">warning</span>
</div>
<h4 class="font-title-lg text-title-lg text-on-surface">Beresiko</h4>
</div>
<span class="bg-surface-container-high text-on-surface px-2 py-1 rounded text-[12px] font-medium font-tabular-nums">&gt; 90 Hari</span>
</div>
<div class="mt-auto">
<div class="font-display text-[32px] font-bold text-on-surface mb-1">843</div>
<p class="font-body-md text-body-md text-secondary">Tamu</p>
</div>
<div class="mt-md pt-md border-t border-surface-variant flex justify-between items-center">
<div class="flex-1">
<button class="w-full bg-surface text-on-surface border border-outline-variant py-2 rounded-lg font-label-md text-label-md font-medium hover:bg-surface-container-high transition-colors flex justify-center items-center gap-sm">
<span class="material-symbols-outlined text-[16px]">bolt</span>
                                    Picu Win-back
                                </button>
</div>
</div>
</div>
</div>
</section>
<!-- Middle Row: Campaigns & Top Guests -->
<div class="grid grid-cols-1 xl:grid-cols-3 gap-lg">
<!-- Campaign Performance -->
<section class="xl:col-span-2 flex flex-col">
<div class="flex justify-between items-end mb-md">
<h3 class="font-title-lg text-title-lg text-on-surface">Performa Kampanye Aktif</h3>
<div class="flex gap-sm">
<button class="text-secondary hover:text-primary transition-colors"><span class="material-symbols-outlined text-[20px]">more_horiz</span></button>
</div>
</div>
<div class="bg-surface-container-lowest rounded-[18px] shadow-stripe border border-outline-variant flex-1 overflow-hidden">
<!-- Table Header -->
<div class="grid grid-cols-12 gap-sm px-lg py-md border-b border-surface-variant bg-surface-container-low font-label-md text-label-md text-secondary uppercase tracking-wider">
<div class="col-span-4">Nama Kampanye</div>
<div class="col-span-2 text-center">Saluran</div>
<div class="col-span-2 text-right">Terkirim</div>
<div class="col-span-2 text-right">Tingkat Konversi</div>
<div class="col-span-2 text-right">Pendapatan</div>
</div>
<!-- Table Rows -->
<div class="flex flex-col">
<div class="grid grid-cols-12 gap-sm px-lg py-md border-b border-surface-variant hover:bg-[#FFF7F5] transition-colors items-center">
<div class="col-span-4 flex items-center gap-sm">
<div class="w-2 h-2 rounded-full bg-primary-container"></div>
<span class="font-body-md text-body-md font-medium text-on-surface">Promo Brunch Akhir Pekan</span>
</div>
<div class="col-span-2 flex justify-center">
<span class="px-2 py-1 bg-surface-container-high rounded text-[11px] font-medium text-on-surface">Email</span>
</div>
<div class="col-span-2 text-right font-tabular-nums text-tabular-nums text-secondary">4,500</div>
<div class="col-span-2 text-right font-tabular-nums text-tabular-nums text-on-surface font-medium">8.4%</div>
<div class="col-span-2 text-right font-tabular-nums text-tabular-nums text-on-surface font-medium">$3,240</div>
</div>
<div class="grid grid-cols-12 gap-sm px-lg py-md border-b border-surface-variant hover:bg-[#FFF7F5] transition-colors items-center">
<div class="col-span-4 flex items-center gap-sm">
<div class="w-2 h-2 rounded-full bg-primary-container"></div>
<span class="font-body-md text-body-md font-medium text-on-surface">Win-back Otomatis (30hr)</span>
</div>
<div class="col-span-2 flex justify-center">
<span class="px-2 py-1 bg-surface-container-high rounded text-[11px] font-medium text-on-surface">SMS</span>
</div>
<div class="col-span-2 text-right font-tabular-nums text-tabular-nums text-secondary">1,200</div>
<div class="col-span-2 text-right font-tabular-nums text-tabular-nums text-on-surface font-medium">12.1%</div>
<div class="col-span-2 text-right font-tabular-nums text-tabular-nums text-on-surface font-medium">$1,850</div>
</div>
<div class="grid grid-cols-12 gap-sm px-lg py-md hover:bg-[#FFF7F5] transition-colors items-center">
<div class="col-span-4 flex items-center gap-sm">
<div class="w-2 h-2 rounded-full bg-surface-variant"></div>
<span class="font-body-md text-body-md font-medium text-on-surface">Pengumuman Menu Baru</span>
</div>
<div class="col-span-2 flex justify-center">
<span class="px-2 py-1 bg-surface-container-high rounded text-[11px] font-medium text-on-surface">Email</span>
</div>
<div class="col-span-2 text-right font-tabular-nums text-tabular-nums text-secondary">8,900</div>
<div class="col-span-2 text-right font-tabular-nums text-tabular-nums text-secondary">2.3%</div>
<div class="col-span-2 text-right font-tabular-nums text-tabular-nums text-secondary">$890</div>
</div>
</div>
<div class="px-lg py-sm border-t border-surface-variant bg-surface-container-lowest text-center">
<button class="text-primary font-label-md text-label-md hover:underline">Lihat Semua Kampanye</button>
</div>
</div>
</section>
<!-- Top Guests List -->
<section class="flex flex-col">
<div class="flex justify-between items-end mb-md">
<h3 class="font-title-lg text-title-lg text-on-surface">Tamu Unggulan</h3>
<button class="text-secondary hover:text-primary transition-colors"><span class="material-symbols-outlined text-[20px]">filter_list</span></button>
</div>
<div class="bg-surface-container-lowest rounded-[18px] shadow-stripe border border-outline-variant flex-1 overflow-hidden flex flex-col">
<div class="p-md flex flex-col gap-sm overflow-y-auto max-h-[300px]">
<!-- Guest Item -->
<div class="flex items-center gap-md p-sm rounded-lg hover:bg-[#FFF7F5] transition-colors cursor-pointer border border-transparent hover:border-outline-variant">
<div class="w-10 h-10 rounded-full overflow-hidden flex-shrink-0 bg-surface-variant">
<img class="w-full h-full object-cover" data-alt="A candid, well-lit headshot of a middle-aged man with glasses, smiling warmly. He is wearing a casual blue button-down shirt. The background is a slightly blurred modern cafe setting, indicating a lifestyle context suitable for a generic user avatar in a professional dashboard." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAVOZSp-2V7bcYE4-XT_9Osc2w8pdrjghkhOLAxlnSh0hSqQqWg7FnZfi4HTRueJTImiZ7VBO3V-x0qjVuNc--aEJEYgsqtES9cZjuef4V1iyNh6APRfNw9RXq3v14eY5WYNRI2aeCBbc0qLshJ8ItrgBhCmHP02seOlwBnjYOqPq_EYj-V6ekJXPWrepjFrG50xpX7udM78Z61ZwLA7ooDIKshBPeWuII9NqU3e_0O7t7B2uIGzIEvzA"/>
</div>
<div class="flex-1 min-w-0">
<h5 class="font-body-md text-body-md font-medium text-on-surface truncate">Eleanor Pena</h5>
<p class="font-label-md text-label-md text-secondary truncate">42 Kunjungan • $3,450 LTV</p>
</div>
<div class="flex flex-col gap-xs items-end">
<span class="px-2 py-0.5 bg-[rgba(0,119,166,0.1)] text-tertiary-container text-[10px] font-medium rounded-full uppercase tracking-wide">Bebas Gluten</span>
<span class="material-symbols-outlined text-[16px] text-secondary">chevron_right</span>
</div>
</div>
<!-- Guest Item -->
<div class="flex items-center gap-md p-sm rounded-lg hover:bg-[#FFF7F5] transition-colors cursor-pointer border border-transparent hover:border-outline-variant">
<div class="w-10 h-10 rounded-full overflow-hidden flex-shrink-0 bg-surface-variant">
<img class="w-full h-full object-cover" data-alt="A professional profile photo of a young woman of Asian descent. She has shoulder-length dark hair and is wearing a neat white blouse. The lighting is soft and corporate, set against a plain, light grey background to ensure she stands out clearly." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBicq0Y4W-C3rnGm7nDsADY-CGczWsMq4vk_m4pZI91MQR-ZXXEJv68azNv8uLeBv2ZCJI2yj0BOK6zhSricEV-pkyLTZ7pxdJah8cRStVyuJqxqXed_N9fG2tTzfSs-7wKLzXy1KDl7g9wA-8yBwNCLFZhcesocK5aQ1ODR5ZmMDdNhFT8AWK_PnFOzrOW94WT3fgYrtYy7h-Z7bK-DJILzPbJIpvTLNoN5eCa1cXssYya-qPGZzV6ag"/>
</div>
<div class="flex-1 min-w-0">
<h5 class="font-body-md text-body-md font-medium text-on-surface truncate">Albert Flores</h5>
<p class="font-label-md text-label-md text-secondary truncate">38 Kunjungan • $2,980 LTV</p>
</div>
<div class="flex flex-col gap-xs items-end">
<span class="px-2 py-0.5 bg-surface-container-high text-secondary text-[10px] font-medium rounded-full uppercase tracking-wide">Tanpa Pref</span>
<span class="material-symbols-outlined text-[16px] text-secondary">chevron_right</span>
</div>
</div>
<!-- Guest Item -->
<div class="flex items-center gap-md p-sm rounded-lg hover:bg-[#FFF7F5] transition-colors cursor-pointer border border-transparent hover:border-outline-variant">
<div class="w-10 h-10 rounded-full flex-shrink-0 bg-primary-container/10 flex items-center justify-center text-primary font-bold text-body-lg">
                                    RJ
                                </div>
<div class="flex-1 min-w-0">
<h5 class="font-body-md text-body-md font-medium text-on-surface truncate">Ralph Edwards</h5>
<p class="font-label-md text-label-md text-secondary truncate">35 Kunjungan • $2,100 LTV</p>
</div>
<div class="flex flex-col gap-xs items-end">
<span class="px-2 py-0.5 bg-[rgba(186,26,26,0.1)] text-error text-[10px] font-medium rounded-full uppercase tracking-wide">Alergi Kacang</span>
<span class="material-symbols-outlined text-[16px] text-secondary">chevron_right</span>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</main>
</body></html>