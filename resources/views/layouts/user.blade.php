<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'DineFlow')</title>

    <!-- Tailwind Play CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <!-- Google Fonts & Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    <!-- Tailwind Custom Configuration -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary": "#b20112",
                        "primary-container": "#d62828",
                        "on-primary-container": "#fff1ef",
                        "background": "#fcf9f8",
                        "on-background": "#1c1b1b",
                        "on-surface-variant": "#5c403d",
                        "surface": "#fcf9f8",
                        "surface-container": "#f0eded",
                        "surface-container-high": "#eae7e7",
                        "surface-container-highest": "#e5e2e1",
                        "surface-variant": "#e5e2e1",
                        "outline-variant": "#e5bdb9"
                    },
                    "spacing": {
                        "xs": "4px",
                        "sm": "8px",
                        "md": "16px",
                        "lg": "24px",
                        "xl": "32px",
                        "margin-mobile": "20px",
                        "gutter": "16px"
                    }
                }
            }
        }
    </script>
    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        body { min-height: max(884px, 100dvh); }
    </style>
    @stack('styles')
</head>
<body class="bg-background text-on-background font-sans min-h-screen pb-24 md:pb-0">

    <!-- TopAppBar -->
    <header class="bg-surface shadow-sm sticky top-0 z-50">
        <div class="flex justify-between items-center w-full px-margin-mobile py-sm">
            <a href="{{ route('user.table') }}" class="text-primary hover:opacity-80 transition-opacity active:scale-95 duration-200 p-2 rounded-full">
                <span class="material-symbols-outlined">table_restaurant</span>
            </a>
            <h1 class="text-2xl font-bold text-primary">DineFlow</h1>
            <a href="{{ route('user.keranjang') }}" class="text-primary hover:opacity-80 transition-opacity active:scale-95 duration-200 p-2 rounded-full relative">
                <span class="material-symbols-outlined">shopping_cart</span>
            </a>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-margin-mobile pt-sm">
        @yield('content')
    </main>

    <!-- BottomNavBar (Mobile Only) -->
    <nav class="md:hidden bg-surface/80 backdrop-blur-md border-t border-outline-variant shadow-lg fixed bottom-0 left-0 w-full flex justify-around items-center px-lg pb-lg pt-sm z-50 rounded-t-xl">
        <a class="flex flex-col items-center justify-center bg-primary-container text-on-primary-container rounded-xl px-4 py-1 transition-colors active:scale-90 duration-150" href="{{ route('user.menu') }}">
            <span class="material-symbols-outlined mb-1">restaurant_menu</span>
            <span class="text-xs">Menu</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-surface-variant px-4 py-1 hover:bg-surface-container-high transition-colors active:scale-90 duration-150" href="{{ route('user.keranjang') }}">
            <div class="relative">
                <span class="material-symbols-outlined mb-1">shopping_basket</span>
                <span class="absolute -top-1 -right-2 bg-primary text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full leading-none">2</span>
            </div>
            <span class="text-xs">Keranjang</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-surface-variant px-4 py-1 hover:bg-surface-container-high transition-colors active:scale-90 duration-150" href="{{ route('user.status_pesanan') }}">
            <span class="material-symbols-outlined mb-1">receipt_long</span>
            <span class="text-xs">Status</span>
        </a>
    </nav>

    @stack('scripts')
</body>
</html>