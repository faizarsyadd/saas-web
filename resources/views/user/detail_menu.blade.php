<!DOCTYPE html>

<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>DineFlow - Menu Item Detail</title>
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
        /* Custom scrollbar for horizontal scrolling areas */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        body {
            -webkit-tap-highlight-color: transparent;
        }
    </style>
<style>
    body {
      min-height: max(884px, 100dvh);
    }
  </style>
  </head>
<body class="bg-background text-on-background min-h-screen font-body-md relative pb-[100px]">
<!-- Top App Bar (Modified for Item Detail - Back Button instead of Nav) -->
<header class="bg-surface/80 backdrop-blur-md shadow-sm sticky top-0 z-50 flex justify-between items-center w-full px-margin-mobile py-sm h-[64px]">
<button class="w-[48px] h-[48px] flex items-center justify-center rounded-full hover:bg-surface-container-high active:scale-95 transition-all text-on-surface-variant">
<span class="material-symbols-outlined">arrow_back</span>
</button>
<!-- Item detail doesn't typically show full brand anchor in top bar, keeping clean -->
<button class="w-[48px] h-[48px] flex items-center justify-center rounded-full hover:bg-surface-container-high active:scale-95 transition-all text-on-surface-variant relative">
<span class="material-symbols-outlined">favorite_border</span>
</button>
</header>
<main class="w-full max-w-md mx-auto bg-surface md:rounded-2xl md:shadow-lg md:mt-4 overflow-hidden">
<!-- Hero Image -->
<div class="w-full aspect-[4/3] relative bg-surface-container-low">
<img alt="Wagyu Signature Burger" class="w-full h-full object-cover" data-alt="A mouth-watering, high-resolution close-up of an artisan Wagyu beef burger. The burger features a perfectly seared thick patty, melting aged cheddar cheese, fresh crisp lettuce, and a glossy brioche bun. The lighting is warm and dramatic, highlighting the textures and juiciness of the ingredients against a clean, modern minimalist restaurant setting. Subtle hints of a signature red brand color appear in the background napkin." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB6jn4s__W2JbArvCcrOS88B0U4pM3PeHA2cDf27rv5FBAhqDcgkLGa3O5fbBiioiPUgMOERhZ8oP-dpwhDMrcxiiCvwaQ1Qg4GH9Smn_TgIQmYHX1p--YDxxxzeUB2g-eGEY0GMq9V3zG_jeqDg1MOAc1ObXiZZAtO6prMonFVBTFg9_N5MfYl2dmA5uNB48nCDJ9IaKLYWBk5AvMKadHSZvRcbxVU3EVZIcBHAdxsWdrQGc9oRSQwxg"/>
<div class="absolute top-sm right-sm bg-surface-container/90 backdrop-blur-sm px-sm py-xs rounded-full flex items-center gap-1 shadow-sm">
<span class="material-symbols-outlined text-[16px] text-tertiary" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="font-label-sm text-label-sm text-on-surface font-semibold">4.8</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">(120)</span>
</div>
</div>
<!-- Item Info -->
<div class="px-margin-mobile py-lg border-b border-surface-variant">
<div class="flex justify-between items-start mb-sm">
<h1 class="font-headline-lg text-headline-lg text-on-background w-3/4">Wagyu Signature Burger</h1>
<div class="text-right">
<span class="font-headline-md text-headline-md text-primary">Rp 125.000</span>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant">
                Premium 200g Wagyu beef patty cooked to perfection, topped with melted aged cheddar, caramelized onions, house-made truffle mayo, fresh lettuce, and tomato, served in a toasted artisan brioche bun.
            </p>
</div>
<!-- Customization Options -->
<div class="px-margin-mobile py-lg border-b border-surface-variant">
<div class="flex justify-between items-center mb-md">
<h2 class="font-headline-md text-headline-md text-on-background">Pilih Ukuran</h2>
<span class="font-label-sm text-label-sm bg-surface-container px-2 py-1 rounded text-on-surface-variant">Wajib</span>
</div>
<div class="flex flex-col gap-sm">
<!-- Option 1 -->
<label class="flex items-center justify-between p-md border border-outline-variant rounded-lg cursor-pointer hover:bg-surface-container-low transition-colors bg-surface-container-lowest">
<div class="flex items-center gap-md">
<input class="w-5 h-5 text-primary border-outline-variant focus:ring-primary focus:ring-offset-surface" name="size" type="radio" value="regular"/>
<span class="font-body-lg text-body-lg text-on-background">Regular</span>
</div>
<span class="font-body-md text-body-md text-on-surface-variant">Free</span>
</label>
<!-- Option 2 -->
<label class="flex items-center justify-between p-md border border-primary bg-primary-fixed/10 rounded-lg cursor-pointer hover:bg-surface-container-low transition-colors relative overflow-hidden">
<div class="absolute left-0 top-0 bottom-0 w-1 bg-primary"></div>
<div class="flex items-center gap-md">
<input checked="" class="w-5 h-5 text-primary border-outline-variant focus:ring-primary focus:ring-offset-surface" name="size" type="radio" value="large"/>
<span class="font-body-lg text-body-lg text-on-background font-medium">Large (Double Patty)</span>
</div>
<span class="font-body-md text-body-md text-on-surface-variant">+Rp 45.000</span>
</label>
</div>
</div>
<!-- Toppings -->
<div class="px-margin-mobile py-lg border-b border-surface-variant">
<div class="flex justify-between items-center mb-md">
<h2 class="font-headline-md text-headline-md text-on-background">Extra Toppings</h2>
<span class="font-label-sm text-label-sm text-on-surface-variant">Opsional</span>
</div>
<div class="flex flex-col gap-sm">
<!-- Checkbox 1 -->
<label class="flex items-center justify-between py-xs cursor-pointer">
<div class="flex items-center gap-md">
<input class="w-5 h-5 rounded text-primary border-outline-variant focus:ring-primary focus:ring-offset-surface" type="checkbox"/>
<span class="font-body-lg text-body-lg text-on-background">Extra Cheese</span>
</div>
<span class="font-body-md text-body-md text-on-surface-variant">+Rp 15.000</span>
</label>
<!-- Checkbox 2 -->
<label class="flex items-center justify-between py-xs cursor-pointer">
<div class="flex items-center gap-md">
<input class="w-5 h-5 rounded text-primary border-outline-variant focus:ring-primary focus:ring-offset-surface" type="checkbox"/>
<span class="font-body-lg text-body-lg text-on-background">Beef Bacon</span>
</div>
<span class="font-body-md text-body-md text-on-surface-variant">+Rp 25.000</span>
</label>
<!-- Checkbox 3 -->
<label class="flex items-center justify-between py-xs cursor-pointer">
<div class="flex items-center gap-md">
<input class="w-5 h-5 rounded text-primary border-outline-variant focus:ring-primary focus:ring-offset-surface" type="checkbox"/>
<span class="font-body-lg text-body-lg text-on-background">Truffle Mayo Dip</span>
</div>
<span class="font-body-md text-body-md text-on-surface-variant">+Rp 10.000</span>
</label>
</div>
</div>
<!-- Special Instructions -->
<div class="px-margin-mobile py-lg mb-xl">
<h2 class="font-headline-md text-headline-md text-on-background mb-sm">Catatan untuk Dapur</h2>
<textarea class="w-full border border-outline-variant rounded-lg p-md font-body-md text-body-md text-on-background focus:border-primary focus:ring-1 focus:ring-primary bg-surface resize-none min-h-[100px]" placeholder="Misal: Tanpa bawang, minta saus dipisah..."></textarea>
</div>
</main>
<!-- Sticky Footer CTA -->
<div class="fixed bottom-0 left-0 w-full bg-surface/90 backdrop-blur-md border-t border-surface-variant px-margin-mobile py-md z-50 flex gap-md items-center shadow-[0_-4px_20px_rgba(0,0,0,0.08)]">
<!-- Quantity Selector -->
<div class="flex items-center justify-between border border-outline-variant rounded-xl w-[120px] h-[56px] bg-surface-container-lowest">
<button class="w-[40px] h-full flex items-center justify-center text-primary active:bg-surface-container-high rounded-l-xl transition-colors">
<span class="material-symbols-outlined">remove</span>
</button>
<span class="font-headline-md text-headline-md text-on-background">1</span>
<button class="w-[40px] h-full flex items-center justify-center text-primary active:bg-surface-container-high rounded-r-xl transition-colors">
<span class="material-symbols-outlined">add</span>
</button>
</div>
<!-- Add to Cart Button -->
<button class="flex-1 bg-primary-container text-on-primary h-[56px] rounded-xl font-label-lg text-label-lg flex items-center justify-between px-lg active:scale-95 transition-transform duration-200">
<span>Tambah ke Keranjang</span>
<span class="font-bold">Rp 170.000</span>
</button>
</div>
</body></html>