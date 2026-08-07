<!DOCTYPE html>

<html class="h-full" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
<title>DineFlow - Welcome</title>
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
        .glass-panel {
            background: rgba(252, 249, 248, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
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
    </style>
<style>
    body {
      min-height: max(884px, 100dvh);
    }
  </style>
  </head>
<body class="bg-background text-on-background h-full font-sans antialiased overflow-hidden selection:bg-primary-container selection:text-on-primary-container">
<!-- Splash Canvas -->
<main class="relative w-full h-full flex flex-col justify-between">
<!-- Hero Background Image (Fixed) -->
<div class="absolute inset-0 z-0">
<div class="absolute inset-0 bg-gradient-to-b from-transparent via-background/40 to-background z-10"></div>
<img alt="Gourmet food hero image" class="w-full h-full object-cover object-center scale-105 transform origin-center animate-[pulse_20s_ease-in-out_infinite_alternate]" data-alt="A highly detailed, professional food photography shot of an exquisite, gourmet plated dish from a top-tier restaurant. The lighting is dramatic and warm, highlighting the textures of the fresh ingredients. The composition is elegant and minimalist, shot from a slightly elevated angle against a pristine, dark-toned elegant table surface. The aesthetic is modern, high-end hospitality, utilizing a refined color palette that contrasts vibrant natural food colors against deep, rich shadows, evoking a sense of premium culinary excellence and anticipation." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA4pXBN3fYdWy7Pgttr_ykM_N8qWkPuDswqzsKB6IsRGourOMWHgq02oPPsPLC1X3_R1i_zKT8ce3xXNu22ICTgeQAgYxI-C3-X98oWNJl-ImuLpiw0kzgnojuoqVgUTNYFJbHfzLZ-fAX5RVexMBZFakzO7rn6QbjqQCGH72UaBatm6cqTVffrMX1BpClTJ-SLICMSO83MhCZMx5ykMZIBZzTVRho3KZa3qWugvBSL5jk3N_0d17jjYQ"/>
</div>
<!-- Top Content Area (Logo) -->
<div class="relative z-20 pt-16 px-margin-mobile flex flex-col items-center justify-start h-1/2 fade-up-enter">
<!-- Brand Mark -->
<div class="w-20 h-20 bg-surface rounded-full shadow-[0_8px_30px_rgba(0,0,0,0.12)] flex items-center justify-center mb-6">
<span class="material-symbols-outlined text-[40px] text-primary" style="font-variation-settings: 'FILL' 1;">restaurant</span>
</div>
<h1 class="font-display-sm text-display-sm text-on-background text-center drop-shadow-md">
                DineFlow
            </h1>
<p class="font-body-lg text-body-lg text-on-surface-variant mt-2 text-center max-w-[280px]">
                A seamless dining experience awaits.
            </p>
</div>
<!-- Bottom Action Area -->
<div class="relative z-20 pb-safe pb-8 px-margin-mobile flex flex-col justify-end min-h-[309px]">
<!-- Glassmorphism Container for CTA -->
<div class="glass-panel p-lg rounded-[24px] shadow-[0_-4px_40px_rgba(0,0,0,0.06)] border border-surface/50 flex flex-col gap-sm fade-up-enter fade-up-delay-2">
<h2 class="font-headline-md text-headline-md text-on-background mb-4">
                    Ready to order?
                </h2>
<!-- Primary CTA -->
<button class="w-full min-h-[56px] bg-primary-container text-on-primary-container font-label-lg text-label-lg rounded-[16px] flex items-center justify-center gap-2 active:scale-[0.98] transition-transform duration-200 shadow-[0_4px_14px_rgba(214,40,40,0.25)]">
                    Mulai Pesan
                    <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
</button>
</div>
</div>
</main>
</body></html>