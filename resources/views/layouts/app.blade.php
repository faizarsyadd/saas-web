<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>{{ $title ?? 'DineFlow Pusat Kontrol' }}</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
              "surface-container-lowest": "#ffffff",
              "inverse-on-surface": "#f3f0ef",
              "primary": "#b20112",
              "on-surface": "#1c1b1b",
              "on-primary-container": "#fff1ef",
              "on-tertiary": "#ffffff",
              "tertiary-fixed-dim": "#83cfff",
              "on-primary-fixed-variant": "#93000d",
              "primary-fixed-dim": "#ffb4ab",
              "error": "#ba1a1a",
              "tertiary-container": "#0077a6",
              "surface-container-highest": "#e5e2e1",
              "secondary-fixed": "#e8e1df",
              "tertiary-fixed": "#c7e7ff",
              "surface-container-high": "#eae7e7",
              "on-primary-fixed": "#410002",
              "inverse-surface": "#313030",
              "surface-container-low": "#f6f3f2",
              "on-secondary-fixed": "#1e1b1a",
              "primary-container": "#d62828",
              "surface-dim": "#dcd9d9",
              "primary-fixed": "#ffdad6",
              "surface-bright": "#fcf9f8",
              "on-secondary": "#ffffff",
              "background": "#fcf9f8",
              "surface-tint": "#bd1119",
              "on-secondary-fixed-variant": "#4a4645",
              "secondary": "#625d5c",
              "tertiary": "#005d83",
              "secondary-fixed-dim": "#ccc5c3",
              "on-error-container": "#93000a",
              "surface": "#fcf9f8",
              "on-background": "#1c1b1b",
              "inverse-primary": "#ffb4ab",
              "surface-container": "#f0eded",
              "on-tertiary-fixed": "#001e2e",
              "secondary-container": "#e5dedc",
              "surface-variant": "#e5e2e1",
              "on-primary": "#ffffff",
              "outline-variant": "#e5bdb9",
              "on-surface-variant": "#5c403d",
              "outline": "#906f6b",
              "on-tertiary-fixed-variant": "#004c6c",
              "on-tertiary-container": "#ebf5ff",
              "on-error": "#ffffff",
              "error-container": "#ffdad6",
              "on-secondary-container": "#666260",
              "success": "#2A9D8F",
              "danger": "#E63946"
            },
            "borderRadius": {
              "DEFAULT": "0.25rem",
              "lg": "0.5rem",
              "xl": "0.75rem",
              "full": "9999px"
            },
            "spacing": {
              "xl": "32px",
              "container-margin": "40px",
              "gutter": "24px",
              "unit": "8px",
              "md": "16px",
              "lg": "24px",
              "sm": "8px",
              "xs": "4px"
            },
            "fontFamily": {
              "display": ["Inter"],
              "label-md": ["Inter"],
              "title-lg": ["Inter"],
              "body-lg": ["Inter"],
              "headline-md": ["Inter"],
              "tabular-nums": ["Inter"],
              "headline-lg": ["Inter"],
              "body-md": ["Inter"]
            }
          }
        }
      }
    </script>
    <style>
        body { background-color: #FAFAFA; }
        .glass-header { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); border-bottom: 1px solid #E5E5E5; }
        .card-ambient { background: #FFFFFF; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 10px 15px -3px rgba(0, 0, 0, 0.05); }
        .data-table-row:hover { background-color: #FFF7F5; }
    </style>
</head>
<body class="font-body-md text-on-surface antialiased flex h-screen overflow-hidden">

    <!-- Sidebar Layout -->
    @include('layouts.sidebar1')

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col min-w-0 overflow-y-auto">
        @yield('content')
    </main>

    <!-- Stack tempat menampung JavaScript khusus halaman -->
    @stack('scripts')
</body>
</html>