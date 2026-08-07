<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>DineFlow - Staff</title>
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
        .material-symbols-outlined[data-weight="fill"] {
            font-variation-settings: 'FILL' 1;
        }
        .shadow-ambient {
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 10px 15px -3px rgba(0, 0, 0, 0.02);
        }
    </style>
</head>
<body class="bg-background text-on-background min-h-screen font-body-md">
<div class="flex flex-col h-screen overflow-hidden">
<!-- TopNavBar -->
<header class="sticky top-0 w-full z-40 bg-surface/80 backdrop-blur-md border-b border-outline-variant shadow-sm flex justify-between items-center px-container-margin py-md hidden md:flex">
<div class="flex items-center gap-md">
<span class="font-display text-headline-sm font-bold text-primary">DineFlow</span>
<div class="relative ml-xl">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-sm">search</span>
<input class="pl-10 pr-4 py-2 bg-surface-container-low border border-outline-variant rounded-md text-sm focus:border-primary focus:ring-1 focus:ring-primary/20 outline-none w-64 transition-all" placeholder="Search staff, shifts..." type="text"/>
</div>
</div>
<div class="flex items-center gap-lg">
<button class="bg-primary-container text-on-primary-container px-4 py-2 rounded-lg font-label-md hover:opacity-90 transition-opacity">Shift Active</button>
<div class="flex gap-4">
<button class="text-on-surface-variant hover:text-primary transition-colors">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
</button>
<button class="text-on-surface-variant hover:text-primary transition-colors">
<span class="material-symbols-outlined" data-icon="help_outline">help_outline</span>
</button>
</div>
<div class="h-8 w-8 rounded-full bg-surface-variant overflow-hidden border border-outline-variant">
<img alt="User Profile Avatar" class="w-full h-full object-cover" data-alt="A professional headshot of a restaurant manager in a modern, well-lit environment. Crisp lighting, shallow depth of field, neutral background. High-quality corporate portrait style fitting a modern light-mode enterprise software application." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA9Fri8DNVuJqOmOz9v3KQ84U6TANsukQk9cWSnGI46GWmHIV5HqGoFDsErLKQzrC_pfla0qN27RRdwTcNPNRbC7crV1xCMAKlKNOVgDMVghDIEbScEhQtz40llhWeFna1e3biWOKzhn3Mut8cEHObWV3eylJx3R4pmnH96u-DPkB0TqhQZ4jSFBuT86O0pnQ8GJ2ZyGw-NgaMcvWINkN-8qceGtaHfuUkmH6tpDbRkAuAFyyK9s6g82Q"/>
</div>
</div>
</header>
<div class="flex flex-1 overflow-hidden">
<!-- SideNavBar -->
<nav class="hidden md:flex flex-col h-full w-[280px] bg-surface shadow-sm shadow-md p-lg shrink-0 border-r border-outline-variant">
<div class="flex items-center gap-3 mb-xl">
<div class="h-10 w-10 rounded-lg bg-surface-container-high flex items-center justify-center overflow-hidden">
<img alt="Franchise Logo" class="w-full h-full object-cover" data-alt="A minimalist geometric logo design for a restaurant franchise. Clean lines, abstract shapes, utilizing deep reds and stark whites. Modern corporate identity suitable for an enterprise dashboard. High contrast, clean vector style." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAKSv-IlwAROP4QLDxrxz3dNf3CbRciX6UXVkI6GpDOsuzOieyd5PGp2zS1f9TWoIVPT-5cigCiPiw_v1ZYx0Z2Avg32hJ_N9XmlRaaAvaHzzxXAUKJ3V8bcFQN8FBFBM4FS50tnnisBxd3XhIRNHwBZrvTLKikbkE4KRu5EQzgJ272I5oAc34sfd752FdjgAlM8CzG_cwCKWMSDP0IobTLvaAD43ppE1MUZqepysKs_kkg_bq3-mUq6A"/>
</div>
<div>
<div class="font-display text-headline-md font-bold text-primary">DineFlow</div>
<div class="text-xs text-on-surface-variant font-medium">Franchise Admin</div>
</div>
</div>
<div class="flex-1 flex flex-col gap-2">
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-secondary font-medium hover:bg-surface-container-high transition-colors duration-200" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
<span>Command Center</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-secondary font-medium hover:bg-surface-container-high transition-colors duration-200" href="#">
<span class="material-symbols-outlined" data-icon="point_of_sale">point_of_sale</span>
<span>POS</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-secondary font-medium hover:bg-surface-container-high transition-colors duration-200" href="#">
<span class="material-symbols-outlined" data-icon="inventory_2">inventory_2</span>
<span>Inventory</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-secondary font-medium hover:bg-surface-container-high transition-colors duration-200" href="#">
<span class="material-symbols-outlined" data-icon="restaurant">restaurant</span>
<span>Kitchen</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-primary font-bold border-r-4 border-primary bg-primary-container/10" href="#">
<span class="material-symbols-outlined" data-icon="group" data-weight="fill">group</span>
<span>Staff</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-secondary font-medium hover:bg-surface-container-high transition-colors duration-200" href="#">
<span class="material-symbols-outlined" data-icon="query_stats">query_stats</span>
<span>CRM</span>
</a>
</div>
<button class="w-full bg-primary-container text-on-primary-container py-3 rounded-lg font-label-md mb-6 hover:bg-surface-tint transition-colors">
                    Quick Order
                </button>
<div class="border-t border-outline-variant pt-4 flex flex-col gap-2">
<a class="flex items-center gap-3 px-4 py-2 rounded-lg text-secondary font-medium hover:bg-surface-container-high transition-colors text-sm" href="#">
<span class="material-symbols-outlined text-sm" data-icon="settings">settings</span>
<span>Settings</span>
</a>
<a class="flex items-center gap-3 px-4 py-2 rounded-lg text-secondary font-medium hover:bg-surface-container-high transition-colors text-sm" href="#">
<span class="material-symbols-outlined text-sm" data-icon="sync_alt">sync_alt</span>
<span>Switch Franchise</span>
</a>
</div>
</nav>
<!-- Main Canvas -->
<main class="flex-1 overflow-y-auto p-gutter md:p-container-margin bg-surface-container-lowest">
<div class="flex justify-between items-end mb-lg">
<div>
<h1 class="font-headline-lg text-headline-lg text-on-surface mb-1">Personalia &amp; Penggajian</h1>
<p class="font-body-md text-body-md text-on-surface-variant">Kelola jadwal, pantau performa, dan setujui penggajian.</p>
</div>
<div class="flex gap-3">
<button class="px-4 py-2 border border-outline-variant rounded-lg text-on-surface font-label-md text-label-md hover:bg-surface-container-low transition-colors flex items-center gap-2">
<span class="material-symbols-outlined text-sm">download</span> Ekspor
                        </button>
<button class="px-4 py-2 bg-primary-container text-on-primary-container rounded-lg font-label-md text-label-md hover:bg-surface-tint transition-colors flex items-center gap-2">
<span class="material-symbols-outlined text-sm">add</span> Tambah Shift
                        </button>
</div>
</div>
<!-- Dashboard Grid -->
<div class="grid grid-cols-12 gap-gutter">
<!-- Weekly Schedule (Span 8) -->
<div class="col-span-12 xl:col-span-8 bg-surface shadow-ambient rounded-xl border border-outline-variant overflow-hidden flex flex-col h-[600px]">
<div class="p-md border-b border-outline-variant flex justify-between items-center bg-surface-bright">
<div class="flex items-center gap-4">
<h2 class="font-title-lg text-title-lg text-on-surface">Jadwal Mingguan</h2>
<div class="flex items-center bg-surface-container-low rounded-lg p-1 border border-outline-variant">
<button class="px-3 py-1 rounded-md bg-surface text-on-surface shadow-sm text-xs font-medium">BOH</button>
<button class="px-3 py-1 rounded-md text-on-surface-variant text-xs font-medium hover:bg-surface/50">FOH</button>
</div>
</div>
<div class="flex items-center gap-2 text-on-surface-variant">
<button class="p-1 hover:text-primary"><span class="material-symbols-outlined">chevron_left</span></button>
<span class="font-tabular-nums text-tabular-nums">Oct 24 - Oct 30</span>
<button class="p-1 hover:text-primary"><span class="material-symbols-outlined">chevron_right</span></button>
</div>
</div>
<div class="flex-1 overflow-auto bg-surface-container-lowest">
<table class="w-full text-left border-collapse min-w-[800px]">
<thead>
<tr class="border-b border-outline-variant bg-surface-bright">
<th class="p-3 font-label-md text-label-md text-on-surface-variant uppercase w-48 sticky left-0 bg-surface-bright z-10">Staff</th>
<th class="p-3 font-label-md text-label-md text-on-surface-variant uppercase text-center border-l border-outline-variant">Mon 24</th>
<th class="p-3 font-label-md text-label-md text-on-surface-variant uppercase text-center border-l border-outline-variant bg-primary-container/5 text-primary">Tue 25 (Today)</th>
<th class="p-3 font-label-md text-label-md text-on-surface-variant uppercase text-center border-l border-outline-variant">Wed 26</th>
<th class="p-3 font-label-md text-label-md text-on-surface-variant uppercase text-center border-l border-outline-variant">Thu 27</th>
<th class="p-3 font-label-md text-label-md text-on-surface-variant uppercase text-center border-l border-outline-variant">Fri 28</th>
</tr>
</thead>
<tbody>
<tr class="border-b border-outline-variant hover:bg-surface-container-low transition-colors group">
<td class="p-3 sticky left-0 bg-surface-container-lowest group-hover:bg-surface-container-low z-10 flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-tertiary-container text-on-tertiary-container flex items-center justify-center font-bold text-xs">JD</div>
<div>
<div class="font-tabular-nums text-tabular-nums text-on-surface font-medium">John D.</div>
<div class="text-xs text-on-surface-variant">Sous Chef</div>
</div>
</td>
<td class="p-2 border-l border-outline-variant">
<div class="bg-surface-container-high border border-outline-variant rounded p-2 text-xs text-on-surface-variant text-center cursor-move">9:00 - 17:00</div>
</td>
<td class="p-2 border-l border-outline-variant bg-primary-container/5">
<div class="bg-primary-container text-on-primary-container rounded p-2 text-xs text-center font-medium shadow-sm cursor-move flex items-center justify-center gap-1">
<span class="material-symbols-outlined text-[14px]">schedule</span> 9:00 - 17:00
                                            </div>
</td>
<td class="p-2 border-l border-outline-variant"></td>
<td class="p-2 border-l border-outline-variant">
<div class="bg-surface-container-high border border-outline-variant rounded p-2 text-xs text-on-surface-variant text-center cursor-move">10:00 - 18:00</div>
</td>
<td class="p-2 border-l border-outline-variant">
<div class="bg-surface-container-high border border-outline-variant rounded p-2 text-xs text-on-surface-variant text-center cursor-move">9:00 - 17:00</div>
</td>
</tr>
<!-- Add more rows as needed for visual density -->
</tbody>
</table>
</div>
</div>
<!-- Right Column (Span 4) -->
<div class="col-span-12 xl:col-span-4 flex flex-col gap-gutter">
<!-- Shift Coverage Heatmap -->
<div class="bg-surface shadow-ambient rounded-xl border border-outline-variant p-md">
<div class="flex justify-between items-center mb-4">
<h3 class="font-title-lg text-title-lg text-on-surface">Cakupan Shift</h3>
<span class="text-xs text-on-surface-variant">vs. Projected Sales</span>
</div>
<div class="space-y-3">
<div>
<div class="flex justify-between text-xs mb-1">
<span class="font-medium">Lunch Rush (11a - 2p)</span>
<span class="text-error font-medium">Understaffed</span>
</div>
<div class="w-full bg-surface-container-high rounded-full h-2">
<div class="bg-error h-2 rounded-full" style="width: 60%"></div>
</div>
</div>
<div>
<div class="flex justify-between text-xs mb-1">
<span class="font-medium">Dinner Prep (3p - 5p)</span>
<span class="text-tertiary-container font-medium">Optimal</span>
</div>
<div class="w-full bg-surface-container-high rounded-full h-2">
<div class="bg-tertiary-container h-2 rounded-full" style="width: 90%"></div>
</div>
</div>
</div>
</div>
<!-- Quick Actions -->
<div class="bg-surface shadow-ambient rounded-xl border border-outline-variant p-md">
<h3 class="font-title-lg text-title-lg text-on-surface mb-4">Tindakan Cepat</h3>
<div class="grid grid-cols-2 gap-3">
<button class="p-3 border border-outline-variant rounded-lg hover:border-primary hover:bg-primary-container/5 transition-all text-left group">
<span class="material-symbols-outlined text-primary mb-2 group-hover:scale-110 transition-transform">how_to_reg</span>
<div class="font-label-md text-label-md text-on-surface">Setujui Gaji</div>
<div class="text-[10px] text-on-surface-variant mt-1">3 Pending</div>
</button>
<button class="p-3 border border-outline-variant rounded-lg hover:border-primary hover:bg-primary-container/5 transition-all text-left group">
<span class="material-symbols-outlined text-tertiary-container mb-2 group-hover:scale-110 transition-transform">timer_off</span>
<div class="font-label-md text-label-md text-on-surface">Koreksi Jam Kerja</div>
<div class="text-[10px] text-on-surface-variant mt-1">1 Request</div>
</button>
</div>
</div>
</div>
</div>
</main>
</div>
</div>
</body></html>