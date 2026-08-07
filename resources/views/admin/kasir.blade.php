<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>DineFlow - Terminal Kasir Lantai</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
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
                      "on-secondary-container": "#666260",
                      // Custom semantic colors for floor map based on prompt
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
        /* Multi-layered shadows based on Style Guidance */
        .ambient-shadow {
            box-shadow: 0 2px 4px rgba(0,0,0,0.05), 0 4px 12px rgba(0,0,0,0.05), 0 16px 32px rgba(0,0,0,0.02);
        }
        .squishy-btn:active {
            transform: scale(0.97);
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md h-screen w-full overflow-hidden flex flex-col selection:bg-primary-container selection:text-on-primary-container">
<!-- TopNavBar -->
<header class="sticky top-0 w-full z-40 bg-surface/80 dark:bg-surface/80 backdrop-blur-md border-b border-outline-variant shadow-sm flex justify-between items-center px-container-margin py-md shrink-0">
<div class="flex items-center gap-md">
<span class="font-display text-headline-sm font-bold text-primary tracking-tight">DineFlow</span>
<div class="h-6 w-px bg-outline-variant mx-sm"></div>
<div class="flex items-center gap-sm text-secondary font-medium">
<span class="material-symbols-outlined text-[18px]">schedule</span>
<span class="font-tabular-nums text-tabular-nums">Shift Timer: 04:22:15</span>
</div>
</div>
<div class="flex flex-1 justify-center max-w-md px-lg">
<!-- Search placeholder -->
</div>
<div class="flex items-center gap-lg">
<div class="flex items-center gap-sm">
<span class="material-symbols-outlined hover:text-primary transition-colors cursor-pointer text-on-surface-variant text-[24px]">notifications</span>
<span class="material-symbols-outlined hover:text-primary transition-colors cursor-pointer text-on-surface-variant text-[24px]">help_outline</span>
</div>
<div class="flex items-center gap-sm bg-surface-container py-xs px-sm rounded-full border border-outline-variant">
<img alt="User Profile Avatar" class="w-8 h-8 rounded-full object-cover shadow-sm" data-alt="A small, professional headshot of a restaurant server wearing a dark uniform, brightly lit against a neutral background. The lighting is crisp and modern, fitting an enterprise software interface. The colors are muted with high contrast." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDnZ2cNAwlZHnm-nWVrHJAQVHl2kCGRwM6tedKew3V39BYWhIMYf1NU7R5cmdSnGNTNZh8v_iL1HhcnKWhZsNh4bNbFvQfo4uNL0YT_B6j_1SbWs95MeAbOl7d3ysssqDWtNChmmcg7AOsyIdmI-3xVIOZ6Fj7BMsi2kqlC0UWNVCr27FW4hMXp_WP6ln37vfq_K2jb4KCtf_Ta5mIrytA1yi-JeQlqh-fCYHoCj6zLgjpx_v0svHKrMQ"/>
<div class="flex flex-col pr-sm">
<span class="font-label-md text-label-md text-on-surface leading-tight">Sarah Jenkins</span>
<span class="font-label-md text-label-md text-secondary text-[10px] uppercase leading-tight">Lead Server</span>
</div>
</div>
<button class="bg-primary-container text-on-primary-container px-md py-sm rounded-lg font-label-md text-label-md hover:opacity-90 transition-opacity flex items-center gap-xs squishy-btn">
                Shift Active
                <span class="material-symbols-outlined text-[16px]">power_settings_new</span>
</button>
</div>
</header>
<div class="flex flex-1 overflow-hidden">
<!-- SideNavBar -->
<nav class="fixed left-0 top-0 h-full w-[280px] bg-surface dark:bg-surface shadow-md bg-surface shadow-sm flex flex-col h-screen p-lg z-50 shrink-0 hidden md:flex border-r border-outline-variant">
<div class="flex items-center gap-md mb-xl pt-lg">
<div class="w-10 h-10 bg-primary-container/10 rounded-lg flex items-center justify-center border border-primary/20">
<span class="material-symbols-outlined text-primary text-[24px]">restaurant</span>
</div>
<div>
<h2 class="font-display text-headline-md font-bold text-primary leading-tight">DineFlow</h2>
<p class="font-label-md text-label-md text-secondary uppercase tracking-wider">Franchise Admin</p>
</div>
</div>
<ul class="flex flex-col gap-sm flex-1 mt-md">
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg hover:bg-surface-container-high transition-colors duration-200 text-secondary font-medium active:scale-95 transition-transform duration-150" href="#">
<span class="material-symbols-outlined">dashboard</span>
                        Command Center
                    </a>
</li>
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg text-primary font-bold border-r-4 border-primary bg-primary-container/10 hover:bg-surface-container-high transition-colors duration-200 active:scale-95 transition-transform duration-150" href="#">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">point_of_sale</span>
                        POS
                    </a>
</li>
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg hover:bg-surface-container-high transition-colors duration-200 text-secondary font-medium active:scale-95 transition-transform duration-150" href="#">
<span class="material-symbols-outlined">inventory_2</span>
                        Inventory
                    </a>
</li>
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg hover:bg-surface-container-high transition-colors duration-200 text-secondary font-medium active:scale-95 transition-transform duration-150" href="#">
<span class="material-symbols-outlined">restaurant</span>
                        Kitchen
                    </a>
</li>
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg hover:bg-surface-container-high transition-colors duration-200 text-secondary font-medium active:scale-95 transition-transform duration-150" href="#">
<span class="material-symbols-outlined">group</span>
                        Staff
                    </a>
</li>
<li>
<a class="flex items-center gap-md px-md py-sm rounded-lg hover:bg-surface-container-high transition-colors duration-200 text-secondary font-medium active:scale-95 transition-transform duration-150" href="#">
<span class="material-symbols-outlined">query_stats</span>
                        CRM
                    </a>
</li>
</ul>
<div class="mt-auto pt-lg border-t border-outline-variant flex flex-col gap-sm">
<button class="w-full bg-surface-container-highest text-on-surface px-md py-sm rounded-lg font-label-md text-label-md border border-outline-variant flex items-center justify-center gap-sm squishy-btn mb-md">
<span class="material-symbols-outlined text-[18px]">flash_on</span>
                    Quick Order
                </button>
<a class="flex items-center gap-md px-md py-sm rounded-lg hover:bg-surface-container-high transition-colors duration-200 text-secondary font-medium" href="#">
<span class="material-symbols-outlined">settings</span>
                    Settings
                </a>
<a class="flex items-center gap-md px-md py-sm rounded-lg hover:bg-surface-container-high transition-colors duration-200 text-secondary font-medium" href="#">
<span class="material-symbols-outlined">sync_alt</span>
                    Switch Franchise
                </a>
</div>
</nav>
<!-- Main Workspace Area -->
<main class="flex-1 flex flex-col md:flex-row md:ml-[280px] bg-surface-container-low h-full overflow-hidden">
<!-- Floor Plan (Left) -->
<section class="flex-1 flex flex-col p-lg border-r border-outline-variant h-full overflow-y-auto">
<div class="flex justify-between items-center mb-md">
<div>
<h1 class="font-headline-md text-headline-md text-on-surface">Lantai Utama</h1>
<p class="font-body-md text-body-md text-secondary">Section A • Capacity: 85%</p>
</div>
<div class="flex gap-sm">
<div class="flex items-center gap-xs bg-surface px-sm py-xs border border-outline-variant rounded-md shadow-sm">
<div class="w-3 h-3 rounded-full bg-success-green"></div>
<span class="font-label-md text-label-md text-secondary">Tersedia</span>
</div>
<div class="flex items-center gap-xs bg-surface px-sm py-xs border border-outline-variant rounded-md shadow-sm">
<div class="w-3 h-3 rounded-full bg-primary-container"></div>
<span class="font-label-md text-label-md text-secondary">Terisi</span>
</div>
<div class="flex items-center gap-xs bg-surface px-sm py-xs border border-outline-variant rounded-md shadow-sm">
<div class="w-3 h-3 rounded-full bg-accent-orange"></div>
<span class="font-label-md text-label-md text-secondary">Dipesan</span>
</div>
</div>
</div>
<!-- Interactive Floor Map Grid -->
<div class="flex-1 bg-surface-container-lowest rounded-xl border border-outline-variant ambient-shadow p-lg relative overflow-hidden flex items-center justify-center min-h-[400px]">
<!-- Subtle grid background -->
<div class="absolute inset-0" style="background-image: radial-gradient(#e5e2e1 1px, transparent 1px); background-size: 24px 24px;"></div>
<div class="relative w-full max-w-3xl aspect-[4/3] grid grid-cols-4 grid-rows-3 gap-lg">
<!-- Table 1: Occupied -->
<div class="relative bg-surface border-2 border-primary-container rounded-lg p-sm flex flex-col items-center justify-center cursor-pointer shadow-sm squishy-btn transition-transform">
<div class="absolute top-2 right-2 flex gap-1">
<div class="w-2 h-2 rounded-full bg-primary-container"></div>
</div>
<span class="font-headline-md text-headline-md text-on-surface">T1</span>
<span class="font-tabular-nums text-tabular-nums text-secondary">4 Seats</span>
<div class="mt-2 bg-primary-container/10 text-primary-container px-2 py-0.5 rounded font-label-md text-label-md">$142.50</div>
<div class="absolute -left-3 top-1/2 -translate-y-1/2 w-2 h-6 bg-surface-container-high rounded-full border border-outline-variant"></div>
<div class="absolute -right-3 top-1/2 -translate-y-1/2 w-2 h-6 bg-surface-container-high rounded-full border border-outline-variant"></div>
<div class="absolute left-1/2 -top-3 -translate-x-1/2 w-6 h-2 bg-surface-container-high rounded-full border border-outline-variant"></div>
<div class="absolute left-1/2 -bottom-3 -translate-x-1/2 w-6 h-2 bg-surface-container-high rounded-full border border-outline-variant"></div>
</div>
<!-- Table 2: Available -->
<div class="relative bg-surface border-2 border-success-green/30 hover:border-success-green rounded-lg p-sm flex flex-col items-center justify-center cursor-pointer shadow-sm squishy-btn transition-all">
<span class="font-headline-md text-headline-md text-on-surface opacity-80">T2</span>
<span class="font-tabular-nums text-tabular-nums text-secondary">2 Seats</span>
<div class="mt-2 bg-success-green/10 text-success-green px-2 py-0.5 rounded font-label-md text-label-md opacity-0 group-hover:opacity-100 transition-opacity">Seat</div>
<div class="absolute -left-3 top-1/2 -translate-y-1/2 w-2 h-6 bg-surface-container-high rounded-full border border-outline-variant"></div>
<div class="absolute -right-3 top-1/2 -translate-y-1/2 w-2 h-6 bg-surface-container-high rounded-full border border-outline-variant"></div>
</div>
<!-- Table 3: Reserved -->
<div class="relative bg-surface border-2 border-accent-orange/50 rounded-lg p-sm flex flex-col items-center justify-center cursor-pointer shadow-sm squishy-btn transition-transform col-span-2">
<div class="absolute top-2 right-2">
<span class="material-symbols-outlined text-accent-orange text-[16px]">schedule</span>
</div>
<span class="font-headline-md text-headline-md text-on-surface">T3 (Booth)</span>
<span class="font-tabular-nums text-tabular-nums text-secondary">6 Seats</span>
<div class="mt-2 text-accent-orange font-label-md text-label-md">19:30 - Smith Party</div>
<div class="absolute inset-y-2 -left-3 w-2 bg-surface-container-high rounded-full border border-outline-variant"></div>
<div class="absolute inset-y-2 -right-3 w-2 bg-surface-container-high rounded-full border border-outline-variant"></div>
</div>
<!-- Middle row... simplified for brevity, maintaining pattern -->
<div class="relative bg-surface border-2 border-primary-container rounded-lg p-sm flex flex-col items-center justify-center cursor-pointer shadow-sm squishy-btn transition-transform col-start-2">
<span class="font-headline-md text-headline-md text-on-surface">T4</span>
<div class="mt-2 bg-primary-container/10 text-primary-container px-2 py-0.5 rounded font-label-md text-label-md">$89.00</div>
</div>
<div class="relative bg-surface border-2 border-success-green/30 hover:border-success-green rounded-full p-sm flex flex-col items-center justify-center cursor-pointer shadow-sm squishy-btn transition-all aspect-square">
<span class="font-headline-md text-headline-md text-on-surface opacity-80">R1</span>
</div>
</div>
</div>
</section>
<!-- Active Ticket / POS Terminal (Right) -->
<section class="w-[380px] bg-surface flex flex-col h-full shrink-0 relative z-10 shadow-[-4px_0_12px_rgba(0,0,0,0.02)]">
<!-- Ticket Header -->
<div class="p-md border-b border-outline-variant bg-surface-container-lowest">
<div class="flex justify-between items-center mb-xs">
<h2 class="font-title-lg text-title-lg text-on-surface">Meja 1</h2>
<span class="bg-surface-container-high px-2 py-1 rounded text-secondary font-tabular-nums text-tabular-nums border border-outline-variant">#4892</span>
</div>
<div class="flex items-center gap-sm text-secondary font-label-md text-label-md uppercase tracking-wide">
<span class="material-symbols-outlined text-[14px]">group</span>
<span>4 Tamu</span>
<span class="mx-1">•</span>
<span>Pelayan: S. Jenkins</span>
</div>
</div>
<!-- Ticket Items -->
<div class="flex-1 overflow-y-auto p-sm bg-surface-container-lowest">
<!-- Item 1 -->
<div class="p-sm bg-surface rounded-lg border border-outline-variant mb-xs hover:border-primary-container/30 transition-colors group cursor-pointer">
<div class="flex justify-between items-start">
<div class="flex gap-sm">
<div class="w-6 h-6 bg-surface-container-high rounded flex items-center justify-center font-tabular-nums text-tabular-nums text-on-surface font-medium border border-outline-variant">2</div>
<div>
<h4 class="font-body-lg text-body-lg text-on-surface leading-tight font-medium">Kentang Goreng Truffle</h4>
<p class="font-body-md text-body-md text-secondary text-[12px] mt-xs">Side: Garlic Aioli</p>
</div>
</div>
<span class="font-tabular-nums text-tabular-nums text-on-surface font-medium">$24.00</span>
</div>
</div>
<!-- Item 2 -->
<div class="p-sm bg-surface rounded-lg border border-primary/20 bg-primary/5 mb-xs hover:border-primary-container/40 transition-colors group cursor-pointer relative overflow-hidden">
<div class="absolute left-0 top-0 bottom-0 w-1 bg-primary-container"></div>
<div class="flex justify-between items-start pl-xs">
<div class="flex gap-sm">
<div class="w-6 h-6 bg-surface-container-lowest rounded flex items-center justify-center font-tabular-nums text-tabular-nums text-on-surface font-medium border border-primary/20">1</div>
<div>
<h4 class="font-body-lg text-body-lg text-on-surface leading-tight font-medium">Wagyu Burger</h4>
<p class="font-body-md text-body-md text-error text-[12px] mt-xs font-medium">TANPA BAWANG</p>
<p class="font-body-md text-body-md text-secondary text-[12px]">Temp: Medium Rare</p>
</div>
</div>
<span class="font-tabular-nums text-tabular-nums text-on-surface font-medium">$32.00</span>
</div>
</div>
</div>
<!-- Ticket Totals -->
<div class="p-md bg-surface-container-lowest border-t border-outline-variant">
<div class="flex justify-between items-center mb-xs text-secondary">
<span class="font-body-md text-body-md">Subtotal</span>
<span class="font-tabular-nums text-tabular-nums">$56.00</span>
</div>
<div class="flex justify-between items-center mb-sm text-secondary">
<span class="font-body-md text-body-md">Pajak (8.5%)</span>
<span class="font-tabular-nums text-tabular-nums">$4.76</span>
</div>
<div class="flex justify-between items-end mb-md pt-sm border-t border-outline-variant border-dashed">
<span class="font-title-lg text-title-lg text-on-surface">Total</span>
<span class="font-headline-md text-headline-md text-on-surface font-tabular-nums">$60.76</span>
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
<button class="col-span-2 bg-primary-container text-on-primary-container rounded-xl py-lg font-title-lg text-title-lg flex items-center justify-center gap-sm squishy-btn ambient-shadow hover:opacity-95 transition-opacity">
<span class="material-symbols-outlined text-[24px]" style="font-variation-settings: 'FILL' 1;">credit_card</span>
                        Bayar $60.76
                    </button>
</div>
</section>
</main>
</div>
</body></html>