<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
<title>DineFlow - Cart &amp; Checkout</title>
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
                    "label-sm": ["12px", {"lineHeight": "16px", "letterSpacing": "0.04em", "fontWeight": "500"}],
                    "headline-lg": ["24px", {"lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                    "body-lg": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                    "headline-md": ["20px", {"lineHeight": "28px", "fontWeight": "600"}],
                    "display-sm": ["30px", {"lineHeight": "38px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "body-md": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                    "label-lg": ["14px", {"lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "600"}]
            }
          }
        }
      }
    </script>
<style>
        body { -webkit-tap-highlight-color: transparent; }
        .ambient-shadow { box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); }
    </style>
<style>
    body {
      min-height: max(884px, 100dvh);
    }
  </style>
  </head>
<body class="bg-background text-on-background min-h-screen pb-[120px]">
<!-- TopAppBar -->
<header class="bg-surface dark:bg-on-background shadow-sm docked full-width top-0 sticky z-50">
<div class="flex justify-between items-center w-full px-margin-mobile py-sm">
<button class="w-12 h-12 flex items-center justify-center text-primary dark:text-primary-fixed hover:opacity-80 transition-opacity active:scale-95 duration-200">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">table_restaurant</span>
</button>
<h1 class="font-display-sm text-display-sm font-bold text-primary dark:text-primary-fixed">DineFlow</h1>
<button class="w-12 h-12 flex items-center justify-center text-primary dark:text-primary-fixed hover:opacity-80 transition-opacity active:scale-95 duration-200">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">shopping_cart</span>
</button>
</div>
</header>
<main class="px-margin-mobile pt-lg flex flex-col gap-lg">
<!-- Cart Items -->
<section class="flex flex-col gap-sm">
<h2 class="font-headline-md text-headline-md">Your Order</h2>
<div class="bg-surface-container rounded-xl p-md flex gap-md items-center ambient-shadow">
<img class="w-20 h-20 rounded-lg object-cover bg-surface-variant flex-shrink-0" data-alt="A beautifully plated Wagyu beef steak with truffle mashed potatoes, perfectly lit in a modern, bright light-mode restaurant setting. The aesthetic is clean, premium, and appetizing with subtle red garnish accents." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB6bKH6qLM0PZfeWz-X0dvZU9KijB3afNZ5agkKPBQsyrLEvWkeUnTNQ7QagybMqNPABFYJ1rtZcDrO6dcRvRg1z3ULjc46bcmZQT_OMseWooTkSzIy0p49fs1mMnvv3saIyEVAAKXMKXVDyfUOC7AhHfwaIJwCXcrFs8sExcZ-OYmAvpisXJSZ7pzBBhjrl_BEUa11e12hreNAbXxSbyZ5B8Ci7ltmFl33LqiKTU3gV1WWJ-lRPeW3_A"/>
<div class="flex-1 flex flex-col">
<span class="font-label-lg text-label-lg text-on-surface">Signature Wagyu Steak</span>
<span class="font-body-md text-body-md text-on-surface-variant mt-1">Medium Rare, Extra Truffle</span>
<span class="font-label-lg text-label-lg text-primary mt-2">Rp 450.000</span>
</div>
<div class="flex flex-col items-end gap-2">
<button class="w-8 h-8 rounded-full bg-error-container text-on-error-container flex items-center justify-center active:scale-95 transition-transform">
<span class="material-symbols-outlined text-[20px]">delete</span>
</button>
<div class="flex items-center gap-2 bg-surface rounded-lg px-2 py-1 shadow-sm mt-1">
<button class="text-on-surface-variant p-1"><span class="material-symbols-outlined text-[16px]">remove</span></button>
<span class="font-label-lg text-label-lg w-4 text-center">1</span>
<button class="text-primary p-1"><span class="material-symbols-outlined text-[16px]">add</span></button>
</div>
</div>
</div>
<div class="bg-surface-container rounded-xl p-md flex gap-md items-center ambient-shadow">
<img class="w-20 h-20 rounded-lg object-cover bg-surface-variant flex-shrink-0" data-alt="A refreshing artisanal mocktail with crushed ice, fresh mint, and a slice of lime, served in a highball glass. The background is a minimalist, brightly lit cafe setting, enhancing the light-mode premium aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCWCO7FK8Ahfvth47EhoCsuJht2sJiMuzeNVC9Eu4A9Jz2NUucSdUotVA2VLqZ9EL-MYYiqY5TGx2FP63QiUzXGGuNan2r-yVFdvEZIqVB9uxn3htazig7tWKBB4WUKt-gEJCOcW6FNliyPVA7qSM9Tdutdj7Kqu7EBFUnZpRYcf5kSEOkNU4sxj7mYs27wHIH6AYkc5UHcKZd8mDEOmIKLHnSMGWHvFF85lXRsOE77SeMJr5ldUBTLJA"/>
<div class="flex-1 flex flex-col">
<span class="font-label-lg text-label-lg text-on-surface">Artisan Mojito</span>
<span class="font-body-md text-body-md text-on-surface-variant mt-1">Less Ice</span>
<span class="font-label-lg text-label-lg text-primary mt-2">Rp 55.000</span>
</div>
<div class="flex flex-col items-end gap-2">
<button class="w-8 h-8 rounded-full bg-error-container text-on-error-container flex items-center justify-center active:scale-95 transition-transform">
<span class="material-symbols-outlined text-[20px]">delete</span>
</button>
<div class="flex items-center gap-2 bg-surface rounded-lg px-2 py-1 shadow-sm mt-1">
<button class="text-on-surface-variant p-1"><span class="material-symbols-outlined text-[16px]">remove</span></button>
<span class="font-label-lg text-label-lg w-4 text-center">2</span>
<button class="text-primary p-1"><span class="material-symbols-outlined text-[16px]">add</span></button>
</div>
</div>
</div>
</section>
<!-- Promo Code -->
<section class="bg-surface-container-low rounded-xl p-md border border-surface-variant">
<div class="flex gap-sm">
<div class="relative flex-1">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">local_offer</span>
<input class="w-full pl-10 pr-4 h-[48px] bg-surface rounded-lg border-none focus:ring-2 focus:ring-primary font-body-md text-body-md placeholder:text-on-surface-variant" placeholder="Add promo code" type="text"/>
</div>
<button class="h-[48px] px-sm bg-primary-container text-on-primary-container rounded-lg font-label-lg text-label-lg active:scale-95 transition-transform whitespace-nowrap">Apply</button>
</div>
</section>
<!-- Payment Method -->
<section class="flex flex-col gap-sm">
<h3 class="font-headline-md text-headline-md">Payment Method</h3>
<div class="grid grid-cols-2 gap-sm">
<label class="relative cursor-pointer">
<input checked="" class="peer sr-only" name="payment" type="radio"/>
<div class="h-16 bg-surface-container rounded-xl flex items-center justify-center gap-2 border-2 border-transparent peer-checked:border-primary peer-checked:bg-primary-fixed transition-colors">
<span class="material-symbols-outlined text-primary">qr_code_scanner</span>
<span class="font-label-lg text-label-lg text-on-surface peer-checked:text-on-primary-fixed">QRIS</span>
</div>
</label>
<label class="relative cursor-pointer">
<input class="peer sr-only" name="payment" type="radio"/>
<div class="h-16 bg-surface-container rounded-xl flex items-center justify-center gap-2 border-2 border-transparent peer-checked:border-primary peer-checked:bg-primary-fixed transition-colors">
<span class="material-symbols-outlined text-on-surface-variant">payments</span>
<span class="font-label-lg text-label-lg text-on-surface peer-checked:text-on-primary-fixed">Cash</span>
</div>
</label>
</div>
</section>
<!-- Summary -->
<section class="bg-surface-container rounded-xl p-md flex flex-col gap-sm mb-lg">
<h3 class="font-headline-md text-headline-md border-b border-surface-variant pb-sm">Summary</h3>
<div class="flex justify-between items-center font-body-md text-body-md text-on-surface-variant mt-sm">
<span>Subtotal</span>
<span>Rp 560.000</span>
</div>
<div class="flex justify-between items-center font-body-md text-body-md text-on-surface-variant">
<span>Service Charge (5%)</span>
<span>Rp 28.000</span>
</div>
<div class="flex justify-between items-center font-body-md text-body-md text-on-surface-variant">
<span>PB1 Tax (10%)</span>
<span>Rp 58.800</span>
</div>
<div class="flex justify-between items-center font-headline-lg text-headline-lg text-on-surface mt-sm pt-sm border-t border-surface-variant">
<span>Total</span>
<span class="text-primary">Rp 646.800</span>
</div>
</section>
</main>
<!-- Sticky Checkout Button (Replaces BottomNavBar for this transactional screen) -->
<div class="fixed bottom-0 left-0 w-full bg-surface/80 backdrop-blur-md border-t border-outline-variant p-margin-mobile pb-[max(20px,env(safe-area-inset-bottom))] z-50">
<button class="w-full min-h-[56px] bg-primary text-on-primary rounded-xl font-label-lg text-label-lg flex items-center justify-center gap-2 shadow-lg active:scale-95 transition-transform">
<span>Bayar Sekarang</span>
<span class="material-symbols-outlined text-[20px]">arrow_forward</span>
</button>
</div>
</body></html>