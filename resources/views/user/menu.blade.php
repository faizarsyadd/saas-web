<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>DineFlow - Menu Home</title>
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
        /* Custom scrollbar for horizontal scrolling containers */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
<style>
    body {
      min-height: max(884px, 100dvh);
    }
  </style>
  </head>
<body class="bg-background text-on-background font-body-md min-h-screen pb-24 md:pb-0">
<!-- TopAppBar -->
<header class="bg-surface dark:bg-on-background shadow-sm docked full-width top-0 sticky z-50">
<div class="flex justify-between items-center w-full px-margin-mobile py-sm">
<button aria-label="Menu" class="text-primary dark:text-primary-fixed hover:opacity-80 transition-opacity active:scale-95 duration-200 p-2 rounded-full">
<span class="material-symbols-outlined" data-icon="table_restaurant">table_restaurant</span>
</button>
<h1 class="font-display-sm text-display-sm font-bold text-primary dark:text-primary-fixed">DineFlow</h1>
<button aria-label="Cart" class="text-primary dark:text-primary-fixed hover:opacity-80 transition-opacity active:scale-95 duration-200 p-2 rounded-full">
<span class="material-symbols-outlined" data-icon="shopping_cart">shopping_cart</span>
</button>
</div>
</header>
<main class="max-w-4xl mx-auto px-margin-mobile pt-sm">
<!-- Search Bar -->
<div class="mb-lg mt-sm">
<div class="relative">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
<span class="material-symbols-outlined text-on-surface-variant">search</span>
</div>
<input class="block w-full pl-10 pr-3 py-3 border-0 rounded-xl bg-surface-container-high text-on-background font-body-lg focus:ring-2 focus:ring-primary focus:bg-surface transition-colors" placeholder="Search dishes, drinks, etc..." type="text"/>
</div>
</div>
<!-- Horizontal Categories -->
<div class="mb-xl overflow-x-auto hide-scrollbar">
<div class="flex space-x-sm pb-2">
<button class="flex-none px-4 py-2 rounded-full bg-primary-container text-on-primary-container font-label-lg text-label-lg transition-colors shadow-sm">All</button>
<button class="flex-none px-4 py-2 rounded-full bg-surface-container-high text-on-surface-variant font-label-lg text-label-lg hover:bg-surface-variant transition-colors">Starters</button>
<button class="flex-none px-4 py-2 rounded-full bg-surface-container-high text-on-surface-variant font-label-lg text-label-lg hover:bg-surface-variant transition-colors">Mains</button>
<button class="flex-none px-4 py-2 rounded-full bg-surface-container-high text-on-surface-variant font-label-lg text-label-lg hover:bg-surface-variant transition-colors">Desserts</button>
<button class="flex-none px-4 py-2 rounded-full bg-surface-container-high text-on-surface-variant font-label-lg text-label-lg hover:bg-surface-variant transition-colors">Drinks</button>
</div>
</div>
<!-- Promo Banner -->
<div class="mb-xl rounded-xl overflow-hidden shadow-sm relative h-48">
<div class="absolute inset-0 bg-cover bg-center" data-alt="A mouth-watering high-end promotional shot of a gourmet burger and fries on a modern wooden table. Soft, warm directional lighting highlights the texture of the toasted brioche bun and melted cheese. The scene is shot from a slight high angle, conveying a premium dining experience. Background is softly blurred with a hint of a modern restaurant interior. The aesthetic is clean, bright, and appetizing." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBQyDpYCcV90V2y5FCJ9UFK7VXj2O39q7wEtCHIOvhgCxrOwL446gqZGY5WNCfdvC97rEyyR5xzLFQ5_xiWWBNvEHdDdtxEaE4-esOsJkpuRoc-7zr2lGWHB3nwFh6ggi_4M4XQDscQOHGhW0cNOAeM_22RP3pT0PdiYB-K5F5BlC-R6yAhBhq9BxFHOOkWAd540huGpcI6kevRDYJh35f2RHQoPPVPO8xRmPeFCGyZ7z0F6_DK3HOf6g')"></div>
<div class="absolute inset-0 bg-gradient-to-r from-background via-background/80 to-transparent"></div>
<div class="relative h-full flex flex-col justify-center px-lg w-2/3">
<span class="font-label-sm text-label-sm text-primary uppercase tracking-wider mb-xs">Special Offer</span>
<h2 class="font-headline-lg text-headline-lg text-on-background mb-sm">20% off Premium Burgers</h2>
<button class="self-start px-4 py-2 bg-on-background text-surface rounded-full font-label-lg text-label-lg hover:opacity-90 transition-opacity">Order Now</button>
</div>
</div>
<!-- Popular Items Section -->
<div>
<h3 class="font-headline-md text-headline-md text-on-background mb-md">Popular Right Now</h3>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-gutter">
<!-- Food Card 1 -->
<div class="bg-surface rounded-xl shadow-sm overflow-hidden border border-surface-variant flex flex-col group hover:shadow-md transition-shadow">
<div class="h-48 w-full bg-cover bg-center relative overflow-hidden" data-alt="A beautifully plated seared salmon fillet resting on a bed of vibrant green asparagus and quinoa. The dish is presented on a minimalist white ceramic plate. The lighting is bright and natural, casting soft shadows that emphasize the texture and freshness of the food. The background is a clean, neutral surface, fitting a modern, high-end restaurant aesthetic." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBk1GqWRDqnlj2y95w2Q4CyTq_2wLiXvYnWAi12ufDjalKV7keiuQNzJnOzRyldvDnWZgP8b19shYHu45gI3JbaYVJf2LKUt50789gtcHstIB2xp7JwUzBQuwf16rFiME7TjoUvS7e40IxsA6bd9XFJ_Q_VFvsGy_zKIkoJ3hZPNahFUHo80eop0bhTrBvMI73VaOoajJxU_t6_Xoux9a5XX2Bl_MYCcXJFedRDSe33TS-0BtaSFHDTCg')">
<div class="absolute top-sm right-sm bg-surface/90 backdrop-blur-sm rounded-full p-1 shadow-sm">
<span class="material-symbols-outlined text-primary text-sm" style="font-variation-settings: 'FILL' 1;">favorite</span>
</div>
</div>
<div class="p-md flex-1 flex flex-col justify-between">
<div>
<div class="flex justify-between items-start mb-xs">
<h4 class="font-body-lg text-body-lg font-semibold text-on-background">Seared Salmon</h4>
<span class="font-body-lg text-body-lg font-semibold text-primary">$24.00</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mb-sm">Fresh Atlantic salmon pan-seared with herb butter, served over a bed of seasonal vegetables.</p>
</div>
<button class="w-full h-[48px] rounded-lg bg-surface-container-high text-primary font-label-lg text-label-lg font-semibold flex items-center justify-center space-x-2 hover:bg-primary hover:text-on-primary transition-colors active:scale-95 duration-200 mt-2">
<span class="material-symbols-outlined" data-icon="add">add</span>
<span>Add to Order</span>
</button>
</div>
</div>
<!-- Food Card 2 -->
<div class="bg-surface rounded-xl shadow-sm overflow-hidden border border-surface-variant flex flex-col group hover:shadow-md transition-shadow">
<div class="h-48 w-full bg-cover bg-center relative overflow-hidden" data-alt="A close-up shot of a classic Margherita pizza on a wooden serving board. The crust is perfectly blistered, with melted fresh mozzarella and bright green basil leaves scattered across a rich tomato sauce. The lighting is warm and inviting, highlighting the glossy textures. The setting implies a rustic yet refined modern pizzeria." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDzQYAjCxVZbW0daPZJDisEVfyrUGBQsK8gfTj5R-5042Bc3Vu1b7DNYy4zEBCKPT4RfBgXlUo0TYHZCLfn7H99Xf7Ghq-AHiqkEDQu8yJA2I3fzalQ6LXeu4IXMLsVT55AoeoV-aBgPyHVeSAd7MG9Ch1gPAJpGT1bcKCo8_q151wNbLnnF43GIBSq090upym45QfPX1IryMv-kg7TlaqIf2p1ndNHhFtD2Ww2662QTtDpIB8iFij4pg')">
<div class="absolute top-sm right-sm bg-surface/90 backdrop-blur-sm rounded-full p-1 shadow-sm">
<span class="material-symbols-outlined text-on-surface-variant text-sm">favorite</span>
</div>
</div>
<div class="p-md flex-1 flex flex-col justify-between">
<div>
<div class="flex justify-between items-start mb-xs">
<h4 class="font-body-lg text-body-lg font-semibold text-on-background">Truffle Pizza</h4>
<span class="font-body-lg text-body-lg font-semibold text-primary">$18.50</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mb-sm">Wood-fired crust with wild mushrooms, truffle oil, mozzarella, and a hint of thyme.</p>
</div>
<button class="w-full h-[48px] rounded-lg bg-surface-container-high text-primary font-label-lg text-label-lg font-semibold flex items-center justify-center space-x-2 hover:bg-primary hover:text-on-primary transition-colors active:scale-95 duration-200 mt-2">
<span class="material-symbols-outlined" data-icon="add">add</span>
<span>Add to Order</span>
</button>
</div>
</div>
<!-- Food Card 3 -->
<div class="bg-surface rounded-xl shadow-sm overflow-hidden border border-surface-variant flex flex-col group hover:shadow-md transition-shadow">
<div class="h-48 w-full bg-cover bg-center relative overflow-hidden" data-alt="An elegant, modern presentation of a colorful mixed green salad in a shallow, wide matte black bowl. The salad includes vibrant cherry tomatoes, sliced radishes, avocado, and crumbled feta cheese, drizzled with a light vinaigrette. The bright, high-key lighting creates a fresh and healthy vibe against a clean, white marble countertop." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDyXKLxnXVTXdKkkmlXQpgnakronqJvyXoUA6dJhDYJ9aZdxEMWLmFaqps2UgM1JMyOIF7grazpZIIp2jLAbr8EP-eGvwRxcXQb5LoMoHlN9RtwGBsahIz13ga0YUyOKopEFqy_SdUXJ9PuPK1S83NkyodZSErM-nKMZsYYkStm_fd_0QAHn2zG9puvgJ6ydVHVP0ro-q2bnfFFG9GRTe2c5ethLGANIQDnoRqQ0PhUZ9fQ05UHW9V7DQ')">
<div class="absolute top-sm right-sm bg-surface/90 backdrop-blur-sm rounded-full p-1 shadow-sm">
<span class="material-symbols-outlined text-on-surface-variant text-sm">favorite</span>
</div>
</div>
<div class="p-md flex-1 flex flex-col justify-between">
<div>
<div class="flex justify-between items-start mb-xs">
<h4 class="font-body-lg text-body-lg font-semibold text-on-background">Avocado Power Bowl</h4>
<span class="font-body-lg text-body-lg font-semibold text-primary">$14.00</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mb-sm">Quinoa, fresh avocado, roasted sweet potato, kale, and tahini dressing.</p>
</div>
<button class="w-full h-[48px] rounded-lg bg-surface-container-high text-primary font-label-lg text-label-lg font-semibold flex items-center justify-center space-x-2 hover:bg-primary hover:text-on-primary transition-colors active:scale-95 duration-200 mt-2">
<span class="material-symbols-outlined" data-icon="add">add</span>
<span>Add to Order</span>
</button>
</div>
</div>
</div>
</div>
</main>
<!-- BottomNavBar (Mobile Only) -->
<nav class="md:hidden bg-surface/80 dark:bg-on-background/80 backdrop-blur-md border-t border-outline-variant shadow-[0_-4px_20px_rgba(0,0,0,0.08)] fixed bottom-0 left-0 w-full flex justify-around items-center px-lg pb-lg pt-sm z-50 rounded-t-xl">
<a class="flex flex-col items-center justify-center bg-primary-container dark:bg-primary text-on-primary-container dark:text-on-primary rounded-xl px-4 py-1 hover:bg-surface-container-high dark:hover:bg-surface-container-highest transition-colors active:scale-90 duration-150 group" href="#">
<span class="material-symbols-outlined mb-1 group-hover:opacity-80 transition-opacity" data-icon="restaurant_menu">restaurant_menu</span>
<span class="font-label-sm text-label-sm">Menu</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-surface-variant px-4 py-1 hover:bg-surface-container-high dark:hover:bg-surface-container-highest transition-colors active:scale-90 duration-150 group" href="#">
<div class="relative">
<span class="material-symbols-outlined mb-1 group-hover:opacity-80 transition-opacity" data-icon="shopping_basket">shopping_basket</span>
<span class="absolute -top-1 -right-2 bg-primary text-on-primary text-[10px] font-bold px-1.5 py-0.5 rounded-full leading-none">2</span>
</div>
<span class="font-label-sm text-label-sm">Cart</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-surface-variant px-4 py-1 hover:bg-surface-container-high dark:hover:bg-surface-container-highest transition-colors active:scale-90 duration-150 group" href="#">
<span class="material-symbols-outlined mb-1 group-hover:opacity-80 transition-opacity" data-icon="receipt_long">receipt_long</span>
<span class="font-label-sm text-label-sm">Status</span>
</a>
</nav>
</body></html>