<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>DineFlow - Order History</title>
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
        body { background-color: theme('colors.background'); color: theme('colors.on-background'); }
        /* Custom scrollbar for web */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: theme('colors.surface-variant'); border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: theme('colors.outline'); }
    </style>
<style>
    body {
      min-height: max(884px, 100dvh);
    }
  </style>
  </head>
<body class="antialiased min-h-screen flex flex-col relative pb-[100px] md:pb-0">
<!-- TopAppBar (Hidden on mobile, visible on md+) -->
<header class="hidden md:flex bg-surface dark:bg-on-background shadow-sm docked full-width top-0 sticky z-50 flex justify-between items-center w-full px-margin-mobile py-sm">
<div class="flex items-center gap-sm cursor-pointer hover:opacity-80 transition-opacity active:scale-95 duration-200">
<span class="material-symbols-outlined text-primary dark:text-primary-fixed" style="font-variation-settings: 'FILL' 1;">table_restaurant</span>
<span class="font-display-sm text-display-sm font-bold text-primary dark:text-primary-fixed">DineFlow</span>
</div>
<!-- Navigation Links for Web -->
<nav class="flex gap-lg">
<a class="text-on-surface-variant dark:text-surface-variant hover:opacity-80 transition-opacity font-label-lg text-label-lg flex items-center gap-xs" href="#"><span class="material-symbols-outlined text-[20px]">restaurant_menu</span>Menu</a>
<a class="text-on-surface-variant dark:text-surface-variant hover:opacity-80 transition-opacity font-label-lg text-label-lg flex items-center gap-xs" href="#"><span class="material-symbols-outlined text-[20px]">shopping_basket</span>Cart</a>
<a class="text-primary dark:text-primary-fixed font-label-lg text-label-lg flex items-center gap-xs" href="#"><span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">receipt_long</span>Status</a>
</nav>
<button class="hover:opacity-80 transition-opacity active:scale-95 duration-200">
<span class="material-symbols-outlined text-primary dark:text-primary-fixed">shopping_cart</span>
</button>
</header>
<!-- Mobile Header (Simplified) -->
<div class="md:hidden bg-surface shadow-sm sticky top-0 z-40 px-margin-mobile py-md flex justify-between items-center border-b border-surface-variant/30">
<div class="flex items-center gap-sm">
<span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">history</span>
<h1 class="font-headline-md text-headline-md text-on-surface">Order History</h1>
</div>
</div>
<main class="flex-1 w-full max-w-3xl mx-auto px-margin-mobile py-lg flex flex-col gap-lg">
<!-- Page Title (Web only) -->
<div class="hidden md:block mb-sm">
<h1 class="font-display-sm text-display-sm text-on-surface">Order History</h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-xs">Review your past orders and quickly reorder your favorites.</p>
</div>
<!-- Filters/Sort (Optional, adding for premium feel) -->
<div class="flex gap-sm overflow-x-auto pb-xs snap-x scrollbar-hide">
<button class="snap-start shrink-0 bg-primary-container text-on-primary-container font-label-sm text-label-sm px-4 py-2 rounded-full border border-transparent shadow-sm whitespace-nowrap active:scale-95 transition-transform">All Orders</button>
<button class="snap-start shrink-0 bg-surface text-on-surface-variant font-label-sm text-label-sm px-4 py-2 rounded-full border border-outline-variant whitespace-nowrap active:scale-95 transition-transform">Completed</button>
<button class="snap-start shrink-0 bg-surface text-on-surface-variant font-label-sm text-label-sm px-4 py-2 rounded-full border border-outline-variant whitespace-nowrap active:scale-95 transition-transform">Cancelled</button>
<button class="snap-start shrink-0 bg-surface text-on-surface-variant font-label-sm text-label-sm px-4 py-2 rounded-full border border-outline-variant whitespace-nowrap flex items-center gap-xs active:scale-95 transition-transform">
<span class="material-symbols-outlined text-[16px]">calendar_month</span> Date
             </button>
</div>
<!-- Order List -->
<div class="flex flex-col gap-md">
<!-- Order Card 1 (Completed) -->
<article class="bg-surface rounded-xl shadow-[0_2px_12px_rgba(0,0,0,0.06)] border border-surface-variant overflow-hidden flex flex-col">
<!-- Header -->
<div class="p-md border-b border-surface-variant flex justify-between items-start bg-surface-container-low/50">
<div>
<div class="flex items-center gap-xs mb-1">
<span class="material-symbols-outlined text-[18px] text-tertiary-container">storefront</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Table 12 • Dine-in</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface">Oct 24, 2023 <span class="font-body-md text-body-md text-on-surface-variant ml-2 font-normal">19:30</span></h3>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-1">Order #DF-8492-XL</p>
</div>
<div class="bg-secondary-container/30 text-secondary border border-secondary-container px-3 py-1 rounded-full font-label-sm text-label-sm flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">check_circle</span> Completed
                    </div>
</div>
<!-- Body (Items Preview) -->
<div class="p-md flex flex-col gap-sm">
<div class="flex justify-between items-start">
<div class="flex gap-3">
<div class="w-12 h-12 rounded-lg overflow-hidden shrink-0 bg-surface-container-high border border-outline-variant/30">
<img class="w-full h-full object-cover" data-alt="A close up, highly detailed photograph of a premium Wagyu beef burger on a wooden board, shot with dramatic lighting in a modern high-end restaurant setting. The aesthetic is clean, appetizing, and fits a premium light-mode dining application UI." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCHzGCclxVvUSLX7x7BfBA2D9jAlVkYMKNId2MjZD9u80F4Vlgmh7o0eUSQRxhodnHlu_BKCFhAfy9ikFUuZDqdpE7iFkGsZvrMGPNtarVFa415tgERClPKUo-Ws7SZfihdoSJbJECSGG_1sceYw6moFi3z015lhCLgFkURj4JWbPy2PKSgdgjYJ0fr01EbZR8G7xkwW6Q4H7592szEB-r7As3orVx2bmuuzEsbXqdKXvL5FT4sdQSS6A"/>
</div>
<div>
<p class="font-label-lg text-label-lg text-on-surface">Truffle Wagyu Burger x1</p>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-1">Medium rare, extra truffle mayo, no onions</p>
</div>
</div>
<span class="font-label-lg text-label-lg text-on-surface whitespace-nowrap">$28.00</span>
</div>
<div class="flex justify-between items-start">
<div class="flex gap-3">
<div class="w-12 h-12 rounded-lg overflow-hidden shrink-0 bg-surface-container-high border border-outline-variant/30 flex items-center justify-center">
<span class="material-symbols-outlined text-outline-variant">fastfood</span>
</div>
<div>
<p class="font-label-lg text-label-lg text-on-surface">Parmesan Truffle Fries x1</p>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-1">Standard portion</p>
</div>
</div>
<span class="font-label-lg text-label-lg text-on-surface whitespace-nowrap">$12.00</span>
</div>
<div class="text-center pt-2">
<button class="font-label-sm text-label-sm text-primary hover:opacity-80 transition-opacity flex items-center justify-center gap-1 mx-auto">
                            + 1 more item <span class="material-symbols-outlined text-[16px]">expand_more</span>
</button>
</div>
</div>
<!-- Footer (Total & Actions) -->
<div class="p-md bg-surface border-t border-surface-variant flex items-center justify-between">
<div>
<p class="font-label-sm text-label-sm text-on-surface-variant">Total Amount</p>
<p class="font-headline-md text-headline-md text-on-surface">$45.50</p>
</div>
<button class="bg-primary hover:bg-primary-container text-on-primary font-label-lg text-label-lg px-6 py-3 rounded-[16px] shadow-sm active:scale-95 transition-all duration-200 flex items-center gap-2">
<span class="material-symbols-outlined text-[20px]">replay</span>
                        Pesan Lagi
                    </button>
</div>
</article>
<!-- Order Card 2 (Completed) -->
<article class="bg-surface rounded-xl shadow-[0_2px_12px_rgba(0,0,0,0.06)] border border-surface-variant overflow-hidden flex flex-col">
<div class="p-md border-b border-surface-variant flex justify-between items-start bg-surface-container-low/50">
<div>
<div class="flex items-center gap-xs mb-1">
<span class="material-symbols-outlined text-[18px] text-tertiary-container">takeout_dining</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Pickup</span>
</div>
<h3 class="font-headline-md text-headline-md text-on-surface">Oct 15, 2023 <span class="font-body-md text-body-md text-on-surface-variant ml-2 font-normal">12:15</span></h3>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-1">Order #DF-3321-AB</p>
</div>
<div class="bg-secondary-container/30 text-secondary border border-secondary-container px-3 py-1 rounded-full font-label-sm text-label-sm flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">check_circle</span> Completed
                    </div>
</div>
<div class="p-md flex flex-col gap-sm">
<div class="flex justify-between items-start">
<div class="flex gap-3">
<div class="w-12 h-12 rounded-lg overflow-hidden shrink-0 bg-surface-container-high border border-outline-variant/30 flex items-center justify-center">
<span class="material-symbols-outlined text-outline-variant">ramen_dining</span>
</div>
<div>
<p class="font-label-lg text-label-lg text-on-surface">Spicy Miso Ramen x2</p>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-1">Extra chashu, soft boiled egg</p>
</div>
</div>
<span class="font-label-lg text-label-lg text-on-surface whitespace-nowrap">$36.00</span>
</div>
</div>
<div class="p-md bg-surface border-t border-surface-variant flex items-center justify-between">
<div>
<p class="font-label-sm text-label-sm text-on-surface-variant">Total Amount</p>
<p class="font-headline-md text-headline-md text-on-surface">$39.60 <span class="font-label-sm text-label-sm text-on-surface-variant font-normal">(inc. tax)</span></p>
</div>
<button class="bg-primary hover:bg-primary-container text-on-primary font-label-lg text-label-lg px-6 py-3 rounded-[16px] shadow-sm active:scale-95 transition-all duration-200 flex items-center gap-2">
<span class="material-symbols-outlined text-[20px]">replay</span>
                        Pesan Lagi
                    </button>
</div>
</article>
</div>
<!-- Load More -->
<div class="flex justify-center mt-sm mb-xl">
<button class="bg-surface text-primary border border-outline-variant hover:bg-surface-container-low font-label-lg text-label-lg px-6 py-3 rounded-full shadow-sm active:scale-95 transition-all duration-200">
                Load Older Orders
            </button>
</div>
</main>
<!-- BottomNavBar (Visible on mobile, hidden on md+) -->
<!-- Applying ACTIVE STATE LOGIC to "Status" based on the context of reviewing past orders/status -->
<nav class="md:hidden bg-surface/80 dark:bg-on-background/80 backdrop-blur-md border-t border-outline-variant shadow-[0_-4px_20px_rgba(0,0,0,0.08)] fixed full-width bottom-0 z-50 rounded-t-xl fixed bottom-0 left-0 w-full flex justify-around items-center px-lg pb-lg pt-sm">
<a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-surface-variant px-4 py-1 hover:bg-surface-container-high dark:hover:bg-surface-container-highest transition-colors active:scale-90 transition-transform duration-150 rounded-xl" href="#">
<span class="material-symbols-outlined mb-1">restaurant_menu</span>
<span class="font-label-sm text-label-sm">Menu</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-surface-variant px-4 py-1 hover:bg-surface-container-high dark:hover:bg-surface-container-highest transition-colors active:scale-90 transition-transform duration-150 rounded-xl" href="#">
<span class="material-symbols-outlined mb-1">shopping_basket</span>
<span class="font-label-sm text-label-sm">Cart</span>
</a>
<!-- Active Navigation State -->
<a class="flex flex-col items-center justify-center bg-primary-container dark:bg-primary text-on-primary-container dark:text-on-primary rounded-xl px-4 py-1 hover:opacity-80 transition-opacity active:scale-90 transition-transform duration-150" href="#">
<span class="material-symbols-outlined mb-1" style="font-variation-settings: 'FILL' 1;">receipt_long</span>
<span class="font-label-sm text-label-sm">Status</span>
</a>
</nav>
</body></html>