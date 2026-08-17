<!DOCTYPE html>
<html class="h-full bg-slate-900" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
    <title>DineFlow - Welcome</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1" rel="stylesheet"/>
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
                        "surface": "#fcf9f8"
                    },
                    "fontFamily": {
                        "sans": ["Inter", "sans-serif"]
                    }
                }
            }
        }
    </script>
    <style>
        .glass-panel {
            background: rgba(252, 249, 248, 0.88);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }
        
        .fade-up-enter {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        
        .fade-up-delay-1 { animation-delay: 0.2s; }
        .fade-up-delay-2 { animation-delay: 0.4s; }
        
        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Prevent overscroll bounce on mobile Safari */
        html, body {
            overflow: hidden;
            height: 100%;
        }
    </style>
</head>
<body class="bg-slate-900 text-on-background font-sans antialiased h-full flex items-center justify-center">

    <!-- Container Frame Mobile Viewport (Aman dibuka di Desktop & Mobile) -->
    <div class="relative w-full max-w-md h-full min-h-[100dvh] bg-background shadow-2xl flex flex-col justify-between overflow-hidden">
        
        <!-- Hero Background Image -->
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-background/30 to-background z-10"></div>
            <img alt="Gourmet food" 
                 class="w-full h-full object-cover object-center scale-105 animate-[pulse_15s_ease-in-out_infinite_alternate]" 
                 src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=1000&auto=format&fit=crop" />
        </div>

        <!-- Top Content Area (Logo & Branding) -->
        <div class="relative z-20 pt-16 px-6 flex flex-col items-center text-center fade-up-enter">
            <!-- Brand Icon -->
            <div class="w-20 h-20 bg-surface/90 backdrop-blur-md rounded-full shadow-lg flex items-center justify-center mb-5 border border-white/40">
                <span class="material-symbols-outlined text-[40px] text-primary" style="font-variation-settings: 'FILL' 1;">restaurant</span>
            </div>
            
            <h1 class="text-3xl font-bold text-on-background tracking-tight drop-shadow-sm">
                DineFlow
            </h1>
            <p class="text-base text-on-surface-variant mt-2 font-normal max-w-[260px] leading-relaxed">
                Pengalaman memesan makanan cepat, mudah, dan praktis.
            </p>
        </div>

        <!-- Bottom Action Area -->
        <div class="relative z-20 p-6 pb-8 flex flex-col justify-end">
            <!-- Glassmorphism Container CTA -->
            <div class="glass-panel p-6 rounded-[28px] shadow-2xl border border-white/60 flex flex-col gap-4 fade-up-enter fade-up-delay-2">
                <div>
                    <h2 class="text-xl font-bold text-on-background">
                        Siap untuk Memesan?
                    </h2>
                    <p class="text-xs text-on-surface-variant/80 mt-1">
                        Pilih nomor meja atau langsung jelajahi menu makanan kami.
                    </p>
                </div>

                <!-- Primary CTA: Ke Halaman Pilih Meja / Table -->
                <a href="{{ route('user.table') }}" class="w-full h-[54px] bg-primary-container hover:bg-primary text-on-primary-container font-semibold rounded-2xl flex items-center justify-center gap-2 active:scale-[0.98] transition-all duration-200 shadow-md shadow-primary-container/30">
                    <span>Mulai Pesan</span>
                    <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                </a>

                <!-- Secondary Link (Direct Menu Access) -->
                <div class="text-center">
                    <a href="{{ route('user.menu') }}" class="text-xs font-medium text-primary hover:underline py-1 inline-block">
                        Langsung lihat daftar menu &rarr;
                    </a>
                </div>
            </div>
        </div>

    </div>

</body>
</html>