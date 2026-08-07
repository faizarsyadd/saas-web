<!DOCTYPE html>

<html class="h-full" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>DineFlow - QRIS Payment</title>
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
        .scan-line {
            position: absolute;
            width: 100%;
            height: 2px;
            background: #D62828;
            box-shadow: 0 0 8px 2px rgba(214, 40, 40, 0.5);
            animation: scan 2s infinite linear;
        }

        @keyframes scan {
            0% { top: 0; opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { top: 100%; opacity: 0; }
        }

        .pulse-dot {
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(214, 40, 40, 0.7); }
            70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(214, 40, 40, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(214, 40, 40, 0); }
        }
    </style>
<style>
    body {
      min-height: max(884px, 100dvh);
    }
  </style>
  </head>
<body class="bg-background text-on-background font-body-md min-h-full flex flex-col antialiased">
<!-- TopAppBar -->
<header class="docked full-width top-0 sticky z-50 bg-surface dark:bg-on-background shadow-sm flex justify-between items-center w-full px-margin-mobile py-sm">
<button aria-label="Go back" class="flex items-center justify-center min-w-[48px] min-h-[48px] hover:opacity-80 transition-opacity active:scale-95 duration-200">
<span class="material-symbols-outlined text-on-surface-variant dark:text-surface-variant text-[24px]">arrow_back</span>
</button>
<div class="flex items-center gap-xs">
<span class="material-symbols-outlined text-primary dark:text-primary-fixed text-[24px]">table_restaurant</span>
<h1 class="font-display-sm text-display-sm font-bold text-primary dark:text-primary-fixed">DineFlow</h1>
</div>
<button aria-label="Support" class="flex items-center justify-center min-w-[48px] min-h-[48px] hover:opacity-80 transition-opacity active:scale-95 duration-200">
<span class="material-symbols-outlined text-on-surface-variant dark:text-surface-variant text-[24px]">help</span>
</button>
</header>
<!-- Main Content (Canvas) -->
<main class="flex-1 px-margin-mobile py-lg pb-[100px] flex flex-col items-center max-w-md mx-auto w-full">
<!-- Header Text -->
<div class="text-center mb-xl w-full">
<h2 class="font-headline-lg text-headline-lg text-on-background mb-xs">Complete Payment</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Scan the QR code below using your preferred payment app.</p>
</div>
<!-- QRIS Frame Component -->
<div class="bg-surface-container-lowest rounded-[24px] shadow-[0_8px_30px_rgba(28,27,27,0.08)] p-lg w-full mb-lg flex flex-col items-center border border-outline-variant/30">
<!-- QRIS Logo Mock -->
<div class="h-8 w-24 bg-surface-variant rounded flex items-center justify-center mb-lg">
<span class="font-label-lg text-label-lg text-on-surface-variant">QRIS</span>
</div>
<!-- QR Code Container -->
<div class="relative w-[250px] h-[250px] bg-white rounded-xl border border-surface-variant p-4 mb-lg overflow-hidden">
<!-- Mock QR Image -->
<img class="w-full h-full object-contain mix-blend-multiply opacity-80" data-alt="A high-contrast, crisp, abstract black and white geometric pattern resembling a complex QR code. The image is set against a pure white background to ensure maximum legibility. The style is modern, clinical, and precise, aligning with a premium digital payment interface." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDMpLQ36GFJItqZAiKtXeSh85xF-vi8hnfs4WacG7_GtQ70ehuY-taKKyEcTH3LLybfEOVBM51XcakWYr1qzySpKKugTSlDgBc1PIwmj87XHuPY1YrBx7OdQSuLHuOhtDFxtgCwBVQxd4pxD16TqAgEgPxgJfbqwOUSbzQ32S2PwiUbNyt-c2r5Nott_3Oj4LDOgGbi1nMN71qpsEvOOSiSx7X5jExnj9dHPPJ3Kn5IMZv5phmkTd3kPg"/>
<!-- Scanning Animation Line -->
<div class="scan-line"></div>
<!-- Corner Accents -->
<div class="absolute top-0 left-0 w-8 h-8 border-t-4 border-l-4 border-primary rounded-tl-xl m-2"></div>
<div class="absolute top-0 right-0 w-8 h-8 border-t-4 border-r-4 border-primary rounded-tr-xl m-2"></div>
<div class="absolute bottom-0 left-0 w-8 h-8 border-b-4 border-l-4 border-primary rounded-bl-xl m-2"></div>
<div class="absolute bottom-0 right-0 w-8 h-8 border-b-4 border-r-4 border-primary rounded-br-xl m-2"></div>
</div>
<!-- Timer -->
<div class="flex items-center gap-2 bg-error-container/30 px-4 py-2 rounded-full mb-sm">
<span class="material-symbols-outlined text-error text-[18px]">timer</span>
<span class="font-label-lg text-label-lg text-error" id="countdown">14:59</span>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant">Code expires soon</p>
</div>
<!-- Transaction Details Bento -->
<div class="w-full grid grid-cols-2 gap-sm mb-lg">
<div class="bg-surface-container-low rounded-xl p-md flex flex-col justify-center">
<span class="font-label-sm text-label-sm text-on-surface-variant mb-1">Order Number</span>
<span class="font-headline-md text-headline-md text-on-background">#DF-8492</span>
</div>
<div class="bg-surface-container-low rounded-xl p-md flex flex-col justify-center">
<span class="font-label-sm text-label-sm text-on-surface-variant mb-1">Table</span>
<span class="font-headline-md text-headline-md text-on-background">12</span>
</div>
<div class="col-span-2 bg-surface-container-low rounded-xl p-md flex justify-between items-center">
<span class="font-body-lg text-body-lg text-on-background font-semibold">Total Amount</span>
<span class="font-headline-lg text-headline-lg text-primary">Rp 450.000</span>
</div>
</div>
<!-- Waiting for Payment Status -->
<div class="w-full flex items-center justify-center gap-sm p-md bg-surface-container rounded-xl">
<div class="w-3 h-3 rounded-full bg-primary pulse-dot"></div>
<span class="font-label-lg text-label-lg text-on-background">Waiting for payment confirmation...</span>
</div>
</main>
<!-- Sticky Bottom Action -->
<div class="fixed bottom-0 left-0 w-full p-margin-mobile bg-surface/80 backdrop-blur-md border-t border-outline-variant/20 z-40 pb-[env(safe-area-inset-bottom)]">
<button class="w-full min-h-[56px] bg-surface-container-highest text-on-surface font-label-lg text-label-lg rounded-[16px] flex items-center justify-center gap-sm active:scale-95 transition-transform duration-200" onclick="alert('Cancelling Order')">
            Cancel Payment
        </button>
</div>
<script>
        // Simple countdown logic
        let timeInSeconds = 14 * 60 + 59;
        const countdownEl = document.getElementById('countdown');

        setInterval(() => {
            if (timeInSeconds <= 0) return;
            timeInSeconds--;
            const minutes = Math.floor(timeInSeconds / 60);
            const seconds = timeInSeconds % 60;
            countdownEl.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        }, 1000);
    </script>
</body></html>