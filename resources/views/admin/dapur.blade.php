<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>DineFlow - Sistem Tampilan Dapur (KDS)</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
                        "success": "#16a34a",
                        "warning": "#ca8a04",
                        "danger": "#D62828"
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
                        "display": ["48px", { "lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "label-md": ["12px", { "lineHeight": "16px", "letterSpacing": "0.02em", "fontWeight": "500" }],
                        "title-lg": ["20px", { "lineHeight": "28px", "fontWeight": "600" }],
                        "body-lg": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
                        "headline-md": ["24px", { "lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "600" }],
                        "tabular-nums": ["14px", { "lineHeight": "20px", "fontWeight": "500" }],
                        "headline-lg": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "600" }],
                        "body-md": ["14px", { "lineHeight": "20px", "fontWeight": "400" }]
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .icon-fill {
            font-variation-settings: 'FILL' 1;
        }
        
        /* Tactical Card Shadows */
        .kds-card {
            box-shadow: 0 1px 2px rgba(0,0,0,0.05), 0 4px 12px rgba(0,0,0,0.03);
            transition: transform 0.1s ease-out, box-shadow 0.1s ease-out;
        }
        .kds-card:active {
            transform: scale(0.98);
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }
        
        /* Grid Layout for Cards */
        .kds-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 16px;
        }
    </style>
</head>
<body class="bg-background text-on-background flex h-screen overflow-hidden">

    <!-- Include Sidebar Utama -->
    @include('layouts.sidebar1')

    <!-- Main Content Area -->
    <main class="flex-1 ml-0 md:ml-[280px] flex flex-col h-screen overflow-hidden">
        
        <!-- TopNavBar -->
        <header class="sticky top-0 w-full z-40 bg-surface/95 backdrop-blur-md border-b border-outline-variant shadow-sm flex justify-between items-center px-lg py-md">
            <div class="flex items-center gap-md">
                <h1 class="font-title-lg text-title-lg text-on-surface">Dapur (KDS)</h1>
            </div>

            <!-- Station Tabs -->
            <nav class="hidden md:flex bg-surface-container-low p-xs rounded-lg border border-outline-variant">
                <button class="px-md py-sm rounded-md font-label-md bg-surface shadow-sm border border-outline-variant text-on-surface font-semibold">Panggangan</button>
                <button class="px-md py-sm rounded-md font-label-md text-on-surface-variant hover:text-on-surface transition-colors">Persiapan</button>
                <button class="px-md py-sm rounded-md font-label-md text-on-surface-variant hover:text-on-surface transition-colors">Tumis</button>
                <button class="px-md py-sm rounded-md font-label-md text-on-surface-variant hover:text-on-surface transition-colors">Ekspo</button>
            </nav>

            <div class="flex items-center gap-md">
                <div class="flex items-center gap-sm bg-surface-container rounded-full px-md py-sm">
                    <span class="material-symbols-outlined text-success text-body-lg">fiber_manual_record</span>
                    <span class="font-label-md text-on-surface font-semibold">Sistem Normal</span>
                </div>
                <button class="w-10 h-10 rounded-full flex items-center justify-center text-on-surface-variant hover:bg-surface-container transition-colors">
                    <span class="material-symbols-outlined">notifications</span>
                </button>
            </div>
        </header>

        <!-- KDS Main Layout -->
        <div class="flex flex-1 overflow-hidden">
            <!-- Stasiun Navigation Panel (Left Side Panel) -->
            <aside class="hidden xl:flex flex-col bg-surface border-r border-outline-variant shadow-sm w-[260px] p-md">
                <div class="mb-lg">
                    <p class="font-label-md text-on-surface-variant uppercase tracking-wider mb-sm">Metrik Dapur</p>
                    <div class="bg-surface-container-low rounded-lg p-md border border-outline-variant flex flex-col gap-sm">
                        <div class="flex justify-between items-center">
                            <span class="font-body-md text-on-surface-variant">Rata-rata Tiket</span>
                            <span class="font-tabular-nums text-title-lg font-semibold text-on-surface">12:45</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="font-body-md text-on-surface-variant">Tertunda</span>
                            <span class="font-tabular-nums text-title-lg font-semibold text-primary">14</span>
                        </div>
                    </div>
                </div>

                <p class="font-label-md text-on-surface-variant uppercase tracking-wider mb-sm">Stasiun Kerja</p>
                <div class="flex flex-col gap-xs flex-1">
                    <button class="w-full flex items-center gap-md p-md rounded-lg text-primary font-bold bg-primary-container/10 border-l-4 border-primary transition-colors text-left">
                        <span class="material-symbols-outlined icon-fill">local_fire_department</span>
                        <span>Panggangan</span>
                        <span class="ml-auto bg-primary text-on-primary rounded-full px-2 py-0.5 text-xs font-bold">5</span>
                    </button>
                    <button class="w-full flex items-center gap-md p-md rounded-lg text-secondary font-medium hover:bg-surface-container-high transition-colors text-left">
                        <span class="material-symbols-outlined">kitchen</span>
                        <span>Persiapan</span>
                    </button>
                    <button class="w-full flex items-center gap-md p-md rounded-lg text-secondary font-medium hover:bg-surface-container-high transition-colors text-left">
                        <span class="material-symbols-outlined">skillet</span>
                        <span>Tumis</span>
                    </button>
                    <button class="w-full flex items-center gap-md p-md rounded-lg text-secondary font-medium hover:bg-surface-container-high transition-colors text-left">
                        <span class="material-symbols-outlined">conveyor_belt</span>
                        <span>Ekspo</span>
                    </button>
                </div>
            </aside>

            <!-- Main KDS Tickets Canvas -->
            <div class="flex-1 p-md md:p-lg lg:p-xl bg-surface-container-lowest overflow-y-auto">
                <div class="flex justify-between items-end mb-lg">
                    <h2 class="font-headline-lg text-headline-lg text-on-surface">Stasiun Panggangan</h2>
                    <div class="flex gap-sm">
                        <button class="px-md py-sm border border-outline-variant rounded-md font-label-md text-on-surface hover:bg-surface-container transition-colors">Urutkan: Terlama</button>
                        <button class="px-md py-sm bg-surface-container-high rounded-md font-label-md text-on-surface hover:bg-surface-variant transition-colors flex items-center gap-xs">
                            <span class="material-symbols-outlined text-[18px]">filter_list</span> Saring
                        </button>
                    </div>
                </div>

                <div class="kds-grid">
                    <!-- Ticket 1: Danger (Overdue) -->
                    <article class="kds-card bg-surface rounded-xl border-t-8 border-t-danger border-x border-b border-outline-variant flex flex-col h-full">
                        <div class="p-md border-b border-outline-variant bg-surface-container-lowest rounded-t-lg">
                            <div class="flex justify-between items-start mb-sm">
                                <div>
                                    <span class="font-headline-md text-headline-md font-bold text-on-surface block">#1402</span>
                                    <span class="font-label-md text-on-surface-variant">Meja 12 • Sarah</span>
                                </div>
                                <div class="text-right">
                                    <span class="font-tabular-nums text-headline-md font-bold text-danger animate-pulse">18:45</span>
                                </div>
                            </div>
                            <div class="flex gap-xs">
                                <span class="px-2 py-1 bg-surface-container text-on-surface-variant rounded text-xs font-semibold uppercase">MAKAN DI TEMPAT</span>
                                <span class="px-2 py-1 bg-primary-container/10 text-primary rounded text-xs font-semibold">VIP</span>
                            </div>
                        </div>
                        <div class="p-md flex-1 flex flex-col gap-md">
                            <!-- Item -->
                            <div class="flex items-start gap-md border-b border-outline-variant pb-sm last:border-0 last:pb-0">
                                <button class="mt-1 w-6 h-6 border-2 border-outline-variant rounded flex items-center justify-center hover:border-primary transition-colors focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 shrink-0 bg-surface"></button>
                                <div class="flex-1">
                                    <p class="font-title-lg text-title-lg font-bold text-on-surface leading-tight">Ribeye Steak</p>
                                    <p class="font-label-md text-primary font-bold mt-1 uppercase tracking-wide bg-primary-container/10 inline-block px-1 rounded">SETENGAH MATANG</p>
                                    <ul class="mt-2 space-y-1 font-body-md text-on-surface-variant">
                                        <li class="flex items-center gap-xs text-danger font-semibold"><span class="material-symbols-outlined text-[16px]">remove</span> TANPA Bawang</li>
                                        <li class="flex items-center gap-xs"><span class="material-symbols-outlined text-[16px]">add</span> Ganti Truffle Fries</li>
                                    </ul>
                                </div>
                                <span class="font-title-lg text-title-lg font-bold text-on-surface-variant">1x</span>
                            </div>
                            <!-- Item -->
                            <div class="flex items-start gap-md border-b border-outline-variant pb-sm last:border-0 last:pb-0">
                                <button class="mt-1 w-6 h-6 border-2 border-outline-variant rounded flex items-center justify-center hover:border-primary transition-colors focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 shrink-0 bg-surface"></button>
                                <div class="flex-1">
                                    <p class="font-title-lg text-title-lg font-bold text-on-surface leading-tight">Salmon Filet</p>
                                </div>
                                <span class="font-title-lg text-title-lg font-bold text-on-surface-variant">1x</span>
                            </div>
                        </div>
                        <div class="p-sm bg-surface-container-low rounded-b-xl border-t border-outline-variant mt-auto">
                            <button class="w-full py-lg bg-surface border border-outline-variant text-on-surface font-title-lg font-bold rounded-lg shadow-sm hover:bg-success hover:text-on-primary hover:border-success transition-colors flex items-center justify-center gap-sm uppercase tracking-wider">
                                <span class="material-symbols-outlined">done_all</span> Selesaikan Pesanan
                            </button>
                        </div>
                    </article>

                    <!-- Ticket 2: Warning -->
                    <article class="kds-card bg-surface rounded-xl border-t-8 border-t-warning border-x border-b border-outline-variant flex flex-col h-full">
                        <div class="p-md border-b border-outline-variant bg-surface-container-lowest rounded-t-lg">
                            <div class="flex justify-between items-start mb-sm">
                                <div>
                                    <span class="font-headline-md text-headline-md font-bold text-on-surface block">#1405</span>
                                    <span class="font-label-md text-on-surface-variant">Bar 4 • Mike</span>
                                </div>
                                <div class="text-right">
                                    <span class="font-tabular-nums text-headline-md font-bold text-warning">12:10</span>
                                </div>
                            </div>
                            <div class="flex gap-xs">
                                <span class="px-2 py-1 bg-surface-container text-on-surface-variant rounded text-xs font-semibold uppercase">MAKAN DI TEMPAT</span>
                            </div>
                        </div>
                        <div class="p-md flex-1 flex flex-col gap-md">
                            <!-- Completed Item -->
                            <div class="flex items-start gap-md border-b border-outline-variant pb-sm last:border-0 last:pb-0 opacity-50">
                                <button class="mt-1 w-6 h-6 border-2 border-success bg-success rounded flex items-center justify-center shrink-0">
                                    <span class="material-symbols-outlined text-white text-[18px]">check</span>
                                </button>
                                <div class="flex-1 line-through decoration-2">
                                    <p class="font-title-lg text-title-lg font-bold text-on-surface leading-tight">Classic Burger</p>
                                    <p class="font-label-md text-on-surface-variant font-bold mt-1 uppercase tracking-wide">SEDANG</p>
                                </div>
                                <span class="font-title-lg text-title-lg font-bold text-on-surface-variant">1x</span>
                            </div>
                            <!-- Pending Item -->
                            <div class="flex items-start gap-md border-b border-outline-variant pb-sm last:border-0 last:pb-0">
                                <button class="mt-1 w-6 h-6 border-2 border-outline-variant rounded flex items-center justify-center hover:border-primary transition-colors focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 shrink-0 bg-surface"></button>
                                <div class="flex-1">
                                    <p class="font-title-lg text-title-lg font-bold text-on-surface leading-tight">BBQ Brisket Sandwich</p>
                                    <ul class="mt-2 space-y-1 font-body-md text-on-surface-variant">
                                        <li class="flex items-center gap-xs"><span class="material-symbols-outlined text-[16px]">add</span> Ekstra Acar</li>
                                    </ul>
                                </div>
                                <span class="font-title-lg text-title-lg font-bold text-on-surface-variant">1x</span>
                            </div>
                        </div>
                        <div class="p-sm bg-surface-container-low rounded-b-xl border-t border-outline-variant mt-auto">
                            <button class="w-full py-lg bg-surface border border-outline-variant text-on-surface font-title-lg font-bold rounded-lg shadow-sm hover:bg-success hover:text-on-primary hover:border-success transition-colors flex items-center justify-center gap-sm uppercase tracking-wider">
                                <span class="material-symbols-outlined">done_all</span> Selesaikan Pesanan
                            </button>
                        </div>
                    </article>

                    <!-- Ticket 3: Success (New) -->
                    <article class="kds-card bg-surface rounded-xl border-t-8 border-t-success border-x border-b border-outline-variant flex flex-col h-full">
                        <div class="p-md border-b border-outline-variant bg-surface-container-lowest rounded-t-lg">
                            <div class="flex justify-between items-start mb-sm">
                                <div>
                                    <span class="font-headline-md text-headline-md font-bold text-on-surface block">#1408</span>
                                    <span class="font-label-md text-on-surface-variant">Bawa Pulang • App</span>
                                </div>
                                <div class="text-right">
                                    <span class="font-tabular-nums text-headline-md font-bold text-success">03:45</span>
                                </div>
                            </div>
                            <div class="flex gap-xs">
                                <span class="px-2 py-1 bg-tertiary-container/20 text-tertiary rounded text-xs font-semibold uppercase">BAWA PULANG</span>
                            </div>
                        </div>
                        <div class="p-md flex-1 flex flex-col gap-md">
                            <div class="flex items-start gap-md border-b border-outline-variant pb-sm last:border-0 last:pb-0">
                                <button class="mt-1 w-6 h-6 border-2 border-outline-variant rounded flex items-center justify-center hover:border-primary transition-colors focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 shrink-0 bg-surface"></button>
                                <div class="flex-1">
                                    <p class="font-title-lg text-title-lg font-bold text-on-surface leading-tight">Grilled Chicken Caesar</p>
                                    <ul class="mt-2 space-y-1 font-body-md text-on-surface-variant">
                                        <li class="flex items-center gap-xs"><span class="material-symbols-outlined text-[16px]">info</span> Saus di samping</li>
                                    </ul>
                                </div>
                                <span class="font-title-lg text-title-lg font-bold text-on-surface-variant">2x</span>
                            </div>
                        </div>
                        <div class="p-sm bg-surface-container-low rounded-b-xl border-t border-outline-variant mt-auto">
                            <button class="w-full py-lg bg-surface border border-outline-variant text-on-surface font-title-lg font-bold rounded-lg shadow-sm hover:bg-success hover:text-on-primary hover:border-success transition-colors flex items-center justify-center gap-sm uppercase tracking-wider">
                                <span class="material-symbols-outlined">done_all</span> Selesaikan Pesanan
                            </button>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </main>

</body>
</html>