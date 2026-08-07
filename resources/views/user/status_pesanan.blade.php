<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
<title>Order Status - DineFlow</title>
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
                        "on-surface": "#1c1b1b",
                        "success": "#16a34a",
                        "success-container": "#dcfce7",
                        "on-success-container": "#166534"
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
        .pulse-ring {
            animation: pulse-ring 2s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
        }
        @keyframes pulse-ring {
            0% { transform: scale(0.8); opacity: 0.5; }
            100% { transform: scale(2.4); opacity: 0; }
        }
        .progress-bar-fill {
            transition: width 1s ease-in-out;
        }
    </style>
<style>
    body {
      min-height: max(884px, 100dvh);
    }
  </style>
  </head>
<body class="bg-background text-on-background font-body-md min-h-screen flex flex-col pb-24 selection:bg-primary-container selection:text-on-primary-container">
<!-- TopAppBar -->
<header class="docked full-width top-0 sticky z-50 bg-surface shadow-sm">
<div class="flex justify-between items-center w-full px-margin-mobile py-sm h-[64px]">
<button aria-label="Menu" class="flex items-center justify-center w-touch-target-min h-touch-target-min rounded-full hover:bg-surface-container-high active:scale-95 duration-200 transition-colors">
<span class="material-symbols-outlined text-primary" data-icon="table_restaurant" style="font-variation-settings: 'FILL' 0;">table_restaurant</span>
</button>
<div class="flex-1 flex justify-center">
<h1 class="font-display-sm text-display-sm font-bold text-primary truncate">DineFlow</h1>
</div>
<button aria-label="Cart" class="flex items-center justify-center w-touch-target-min h-touch-target-min rounded-full hover:bg-surface-container-high active:scale-95 duration-200 transition-colors relative">
<span class="material-symbols-outlined text-primary" data-icon="shopping_cart" style="font-variation-settings: 'FILL' 0;">shopping_cart</span>
</button>
</div>
</header>
<!-- Main Content Canvas -->
<main class="flex-1 flex flex-col px-margin-mobile py-lg gap-lg max-w-3xl mx-auto w-full relative z-10">
<!-- Order Header Status -->
<section class="bg-surface-container rounded-xl p-md shadow-sm border border-outline-variant flex flex-col gap-md relative overflow-hidden">
<div class="absolute -right-8 -top-8 w-32 h-32 bg-primary/5 rounded-full blur-2xl"></div>
<div class="flex justify-between items-start z-10">
<div class="flex flex-col gap-xs">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">Order #DF-4892</span>
<h2 class="font-headline-lg text-headline-lg text-on-background">Dimasak</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Est. 15 mins • Meja 12</p>
</div>
<div class="flex flex-col items-center justify-center bg-surface w-16 h-16 rounded-xl border border-outline-variant shadow-sm z-10">
<span class="font-label-sm text-label-sm text-on-surface-variant">Antrian</span>
<span class="font-headline-md text-headline-md text-primary font-bold">04</span>
</div>
</div>
<!-- Vertical Stepper -->
<div class="flex flex-col mt-sm z-10">
<!-- Step 1: Diterima (Completed) -->
<div class="flex items-start gap-md relative pb-lg">
<div class="absolute left-[11px] top-[24px] bottom-0 w-[2px] bg-primary"></div>
<div class="w-6 h-6 rounded-full bg-primary flex items-center justify-center z-10 flex-shrink-0 mt-1 shadow-sm">
<span class="material-symbols-outlined text-on-primary text-[14px]" data-icon="check" style="font-variation-settings: 'FILL' 1;">check</span>
</div>
<div class="flex flex-col pt-1">
<span class="font-label-lg text-label-lg text-on-background">Diterima</span>
<span class="font-body-md text-body-md text-on-surface-variant">Pesanan telah diterima kasir (12:30 PM)</span>
</div>
</div>
<!-- Step 2: Dimasak (Active) -->
<div class="flex items-start gap-md relative pb-lg">
<div class="absolute left-[11px] top-[24px] bottom-0 w-[2px] bg-surface-dim"></div>
<div class="relative w-6 h-6 flex-shrink-0 mt-1 z-10">
<div class="absolute inset-0 rounded-full bg-primary/30 pulse-ring"></div>
<div class="absolute inset-0 rounded-full bg-surface border-2 border-primary flex items-center justify-center">
<div class="w-2 h-2 rounded-full bg-primary"></div>
</div>
</div>
<div class="flex flex-col pt-1">
<span class="font-label-lg text-label-lg text-on-background font-bold">Dimasak</span>
<span class="font-body-md text-body-md text-primary">Chef sedang menyiapkan hidangan...</span>
</div>
</div>
<!-- Step 3: Siap (Pending) -->
<div class="flex items-start gap-md relative">
<div class="w-6 h-6 rounded-full bg-surface-container-highest border border-outline-variant flex items-center justify-center z-10 flex-shrink-0 mt-1">
</div>
<div class="flex flex-col pt-1">
<span class="font-label-lg text-label-lg text-on-surface-variant">Siap Disajikan</span>
<span class="font-body-md text-body-md text-on-surface-variant">Pesanan akan diantar ke meja</span>
</div>
</div>
</div>
</section>
<!-- Order Summary Card -->
<section class="bg-surface rounded-xl p-md shadow-[0_2px_10px_rgba(0,0,0,0.04)] border border-surface-container-high flex flex-col gap-md">
<h3 class="font-headline-md text-headline-md border-b border-surface-container pb-sm">Ringkasan Pesanan</h3>
<div class="flex flex-col gap-sm">
<!-- Item 1 -->
<div class="flex justify-between items-start py-sm border-b border-surface-container-low last:border-0">
<div class="flex gap-md">
<span class="font-label-lg text-label-lg text-primary bg-primary/10 px-2 py-1 rounded-md h-fit">1x</span>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-on-background">Truffle Ribeye Steak</span>
<span class="font-body-md text-body-md text-on-surface-variant">Medium Rare, Extra Sauce</span>
</div>
</div>
<span class="font-body-md text-body-md text-on-background">Rp 450.000</span>
</div>
<!-- Item 2 -->
<div class="flex justify-between items-start py-sm border-b border-surface-container-low last:border-0">
<div class="flex gap-md">
<span class="font-label-lg text-label-lg text-primary bg-primary/10 px-2 py-1 rounded-md h-fit">2x</span>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-on-background">Lychee Iced Tea</span>
<span class="font-body-md text-body-md text-on-surface-variant">Less Sugar</span>
</div>
</div>
<span class="font-body-md text-body-md text-on-background">Rp 70.000</span>
</div>
</div>
<div class="flex justify-between items-center pt-md border-t border-surface-container mt-xs">
<span class="font-label-lg text-label-lg text-on-background">Total Pembayaran</span>
<span class="font-headline-md text-headline-md text-primary font-bold">Rp 520.000</span>
</div>
<div class="flex items-center gap-sm bg-success-container/30 px-md py-sm rounded-lg mt-xs">
<span class="material-symbols-outlined text-success text-[18px]" data-icon="verified" style="font-variation-settings: 'FILL' 1;">verified</span>
<span class="font-label-sm text-label-sm text-on-success-container">Pembayaran QRIS Berhasil</span>
</div>
</section>
</main>
<!-- BottomNavBar -->
<nav class="fixed bottom-0 left-0 w-full z-50 rounded-t-xl bg-surface/80 backdrop-blur-md border-t border-outline-variant shadow-[0_-4px_20px_rgba(0,0,0,0.08)] hidden md:hidden flex justify-around items-center px-lg pb-lg pt-sm md:flex">
<!-- Menu -->
<a aria-label="Menu" class="flex flex-col items-center justify-center text-on-surface-variant px-4 py-1 hover:bg-surface-container-high transition-colors active:scale-90 duration-150 rounded-xl" href="#">
<span class="material-symbols-outlined mb-1" data-icon="restaurant_menu" style="font-variation-settings: 'FILL' 0;">restaurant_menu</span>
<span class="font-label-sm text-label-sm">Menu</span>
</a>
<!-- Cart -->
<a aria-label="Cart" class="flex flex-col items-center justify-center text-on-surface-variant px-4 py-1 hover:bg-surface-container-high transition-colors active:scale-90 duration-150 rounded-xl relative" href="#">
<span class="material-symbols-outlined mb-1" data-icon="shopping_basket" style="font-variation-settings: 'FILL' 0;">shopping_basket</span>
<span class="font-label-sm text-label-sm">Cart</span>
</a>
<!-- Status (Active) -->
<a aria-label="Status" class="flex flex-col items-center justify-center bg-primary-container text-on-primary-container rounded-xl px-4 py-1 active:scale-90 transition-transform duration-150" href="#">
<span class="material-symbols-outlined mb-1" data-icon="receipt_long" style="font-variation-settings: 'FILL' 1;">receipt_long</span>
<span class="font-label-sm text-label-sm font-bold">Status</span>
</a>
</nav>
<!-- Mobile only bottom nav -->
<nav class="fixed bottom-0 left-0 w-full flex justify-around items-center px-lg pb-lg pt-sm bg-surface/90 backdrop-blur-md shadow-[0_-4px_20px_rgba(0,0,0,0.08)] z-50 md:hidden border-t border-outline-variant">
<!-- Menu -->
<a class="flex flex-col items-center justify-center text-on-surface-variant px-4 py-1 hover:bg-surface-container-high transition-colors active:scale-90 duration-150 rounded-xl" href="#">
<span class="material-symbols-outlined mb-1" data-icon="restaurant_menu" style="font-variation-settings: 'FILL' 0;">restaurant_menu</span>
<span class="font-label-sm text-label-sm">Menu</span>
</a>
<!-- Cart -->
<a class="flex flex-col items-center justify-center text-on-surface-variant px-4 py-1 hover:bg-surface-container-high transition-colors active:scale-90 duration-150 rounded-xl" href="#">
<span class="material-symbols-outlined mb-1" data-icon="shopping_basket" style="font-variation-settings: 'FILL' 0;">shopping_basket</span>
<span class="font-label-sm text-label-sm">Cart</span>
</a>
<!-- Status (Active) -->
<a class="flex flex-col items-center justify-center bg-primary-container text-on-primary-container rounded-xl px-4 py-1 active:scale-90 transition-transform duration-150" href="#">
<span class="material-symbols-outlined mb-1" data-icon="receipt_long" style="font-variation-settings: 'FILL' 1;">receipt_long</span>
<span class="font-label-sm text-label-sm">Status</span>
</a>
</nav>
</body></html>