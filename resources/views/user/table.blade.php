<!DOCTYPE html>

<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
<title>DineFlow - Table Selection</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-secondary": "#ffffff",
                        "error-container": "#ffdad6",
                        "on-error-container": "#93000a",
                        "inverse-on-surface": "#f3f0ef",
                        "surface-tint": "#bd1119",
                        "surface-container-highest": "#e5e2e1",
                        "on-primary": "#ffffff",
                        "surface-container-high": "#eae7e7",
                        "surface-variant": "#e5e2e1",
                        "outline-variant": "#e5bdb9",
                        "inverse-primary": "#ffb4ab",
                        "tertiary-container": "#ae5800",
                        "primary-fixed-dim": "#ffb4ab",
                        "background": "#fcf9f8",
                        "on-tertiary-fixed": "#301400",
                        "on-secondary-fixed-variant": "#244a64",
                        "on-tertiary": "#ffffff",
                        "surface-container": "#f0eded",
                        "primary-container": "#d62828",
                        "primary": "#b20112",
                        "on-primary-container": "#fff1ef",
                        "inverse-surface": "#313030",
                        "on-error": "#ffffff",
                        "tertiary-fixed-dim": "#ffb784",
                        "on-primary-fixed-variant": "#93000d",
                        "secondary-fixed": "#cae6ff",
                        "tertiary": "#8a4400",
                        "outline": "#906f6b",
                        "on-primary-fixed": "#410002",
                        "on-secondary-container": "#3e637e",
                        "surface": "#fcf9f8",
                        "on-surface-variant": "#5c403d",
                        "surface-container-low": "#f6f3f2",
                        "on-tertiary-container": "#fff1ea",
                        "surface-bright": "#fcf9f8",
                        "primary-fixed": "#ffdad6",
                        "error": "#ba1a1a",
                        "secondary": "#3d627d",
                        "secondary-fixed-dim": "#a5cbea",
                        "tertiary-fixed": "#ffdcc6",
                        "surface-container-lowest": "#ffffff",
                        "secondary-container": "#b9dffe",
                        "on-tertiary-fixed-variant": "#713700",
                        "surface-dim": "#dcd9d9",
                        "on-secondary-fixed": "#001e2f",
                        "on-background": "#1c1b1b",
                        "on-surface": "#1c1b1b"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "base": "4px",
                        "xs": "4px",
                        "sm": "8px",
                        "touch-target-min": "48px",
                        "lg": "24px",
                        "margin-mobile": "20px",
                        "xl": "32px",
                        "gutter": "16px",
                        "md": "16px"
                    },
                    "fontFamily": {
                        "label-sm": ["Inter"],
                        "headline-lg": ["Inter"],
                        "body-lg": ["Inter"],
                        "headline-md": ["Inter"],
                        "display-sm": ["Inter"],
                        "body-md": ["Inter"],
                        "label-lg": ["Inter"]
                    },
                    "fontSize": {
                        "label-sm": ["12px", { "lineHeight": "16px", "letterSpacing": "0.04em", "fontWeight": "500" }],
                        "headline-lg": ["24px", { "lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "600" }],
                        "body-lg": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
                        "headline-md": ["20px", { "lineHeight": "28px", "fontWeight": "600" }],
                        "display-sm": ["30px", { "lineHeight": "38px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "body-md": ["14px", { "lineHeight": "20px", "fontWeight": "400" }],
                        "label-lg": ["14px", { "lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "600" }]
                    }
                }
            }
        }
    </script>
<style>
        body {
            -webkit-tap-highlight-color: transparent;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .material-symbols-outlined.fill {
            font-variation-settings: 'FILL' 1;
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
<style>
    body {
      min-height: max(884px, 100dvh);
    }
  </style>
  </head>
<body class="bg-background text-on-background font-body-lg antialiased min-h-screen flex flex-col">
<!-- TopAppBar -->
<header class="bg-surface dark:bg-on-background shadow-sm docked full-width top-0 sticky z-50 px-margin-mobile py-sm flex justify-between items-center w-full">
<button aria-label="Leading icon" class="hover:opacity-80 transition-opacity active:scale-95 duration-200 text-primary dark:text-primary-fixed flex items-center justify-center w-touch-target-min h-touch-target-min">
<span class="material-symbols-outlined">table_restaurant</span>
</button>
<h1 class="font-display-sm text-display-sm font-bold text-primary dark:text-primary-fixed">DineFlow</h1>
<button aria-label="Trailing icon" class="hover:opacity-80 transition-opacity active:scale-95 duration-200 text-on-surface-variant dark:text-surface-variant flex items-center justify-center w-touch-target-min h-touch-target-min">
<span class="material-symbols-outlined">shopping_cart</span>
</button>
</header>
<!-- Main Content -->
<main class="flex-grow px-margin-mobile py-lg pb-32">
<!-- Known Table Banner -->
<div class="bg-surface-container rounded-xl p-lg mb-xl ambient-shadow flex flex-col md:flex-row items-center justify-between gap-md border border-outline-variant/30">
<div class="flex items-center gap-md">
<div class="w-12 h-12 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center">
<span class="material-symbols-outlined fill">check_circle</span>
</div>
<div>
<h2 class="font-headline-md text-headline-md text-on-background">Anda berada di Meja 07</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-xs">Pindai berhasil. Siap untuk memesan.</p>
</div>
</div>
<button class="w-full md:w-auto h-[56px] px-xl rounded-xl bg-primary-container text-on-primary-container font-label-lg text-label-lg hover:bg-primary transition-colors active:scale-95 flex items-center justify-center whitespace-nowrap">
                Lanjutkan
            </button>
</div>
<!-- Section Header -->
<div class="mb-md flex justify-between items-end">
<div>
<h3 class="font-headline-md text-headline-md text-on-background">Pilih Meja Lain</h3>
<p class="font-body-md text-body-md text-on-surface-variant mt-xs">Jika Anda ingin pindah meja</p>
</div>
<div class="flex gap-sm">
<div class="flex items-center gap-xs">
<div class="w-3 h-3 rounded-full bg-surface-container-highest border border-outline-variant"></div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Tersedia</span>
</div>
<div class="flex items-center gap-xs">
<div class="w-3 h-3 rounded-full bg-surface-dim"></div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Terisi</span>
</div>
</div>
</div>
<!-- Table Grid -->
<div class="table-grid">
<!-- Table 1 - Available -->
<button class="aspect-square rounded-xl bg-surface-container-lowest border border-outline-variant hover:bg-surface-container-low active:scale-95 transition-all flex flex-col items-center justify-center gap-sm relative overflow-hidden group">
<span class="material-symbols-outlined text-outline text-opacity-50 text-3xl group-hover:text-primary transition-colors">chair_alt</span>
<span class="font-headline-md text-headline-md text-on-background">01</span>
</button>
<!-- Table 2 - Available -->
<button class="aspect-square rounded-xl bg-surface-container-lowest border border-outline-variant hover:bg-surface-container-low active:scale-95 transition-all flex flex-col items-center justify-center gap-sm relative overflow-hidden group">
<span class="material-symbols-outlined text-outline text-opacity-50 text-3xl group-hover:text-primary transition-colors">chair_alt</span>
<span class="font-headline-md text-headline-md text-on-background">02</span>
</button>
<!-- Table 3 - Occupied -->
<div class="aspect-square rounded-xl bg-surface-dim border border-transparent flex flex-col items-center justify-center gap-sm relative overflow-hidden opacity-60">
<span class="material-symbols-outlined text-on-surface-variant text-3xl fill">person</span>
<span class="font-headline-md text-headline-md text-on-surface-variant">03</span>
</div>
<!-- Table 4 - Occupied -->
<div class="aspect-square rounded-xl bg-surface-dim border border-transparent flex flex-col items-center justify-center gap-sm relative overflow-hidden opacity-60">
<span class="material-symbols-outlined text-on-surface-variant text-3xl fill">person</span>
<span class="font-headline-md text-headline-md text-on-surface-variant">04</span>
</div>
<!-- Table 5 - Available -->
<button class="aspect-square rounded-xl bg-surface-container-lowest border border-outline-variant hover:bg-surface-container-low active:scale-95 transition-all flex flex-col items-center justify-center gap-sm relative overflow-hidden group">
<span class="material-symbols-outlined text-outline text-opacity-50 text-3xl group-hover:text-primary transition-colors">chair_alt</span>
<span class="font-headline-md text-headline-md text-on-background">05</span>
</button>
<!-- Table 6 - Available -->
<button class="aspect-square rounded-xl bg-surface-container-lowest border border-outline-variant hover:bg-surface-container-low active:scale-95 transition-all flex flex-col items-center justify-center gap-sm relative overflow-hidden group">
<span class="material-symbols-outlined text-outline text-opacity-50 text-3xl group-hover:text-primary transition-colors">chair_alt</span>
<span class="font-headline-md text-headline-md text-on-background">06</span>
</button>
<!-- Table 7 - Current (Selected) -->
<div class="aspect-square rounded-xl bg-primary-container text-on-primary-container shadow-sm border border-primary flex flex-col items-center justify-center gap-sm relative overflow-hidden">
<div class="absolute inset-0 bg-white/10 pointer-events-none"></div>
<span class="material-symbols-outlined text-3xl fill">star</span>
<span class="font-headline-md text-headline-md">07</span>
</div>
<!-- Table 8 - Available -->
<button class="aspect-square rounded-xl bg-surface-container-lowest border border-outline-variant hover:bg-surface-container-low active:scale-95 transition-all flex flex-col items-center justify-center gap-sm relative overflow-hidden group">
<span class="material-symbols-outlined text-outline text-opacity-50 text-3xl group-hover:text-primary transition-colors">chair_alt</span>
<span class="font-headline-md text-headline-md text-on-background">08</span>
</button>
<!-- Table 9 - Occupied -->
<div class="aspect-square rounded-xl bg-surface-dim border border-transparent flex flex-col items-center justify-center gap-sm relative overflow-hidden opacity-60">
<span class="material-symbols-outlined text-on-surface-variant text-3xl fill">person</span>
<span class="font-headline-md text-headline-md text-on-surface-variant">09</span>
</div>
</div>
</main>
<!-- Navigation suppressed for transactional/selection screen flow as per rules -->
</body></html>