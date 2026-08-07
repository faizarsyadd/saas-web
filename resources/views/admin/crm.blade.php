<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>DineFlow - CRM Hub</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

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
                        "on-secondary-container": "#666260"
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
                    },
                    "fontSize": {
                        "display": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "label-md": ["12px", {"lineHeight": "16px", "letterSpacing": "0.02em", "fontWeight": "500"}],
                        "title-lg": ["20px", {"lineHeight": "28px", "fontWeight": "600"}],
                        "body-lg": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                        "headline-md": ["24px", {"lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                        "tabular-nums": ["14px", {"lineHeight": "20px", "fontWeight": "500"}],
                        "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "600"}],
                        "body-md": ["14px", {"lineHeight": "20px", "fontWeight": "400"}]
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #fcf9f8; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; }
        .shadow-stripe { box-shadow: 0 2px 5px rgba(0,0,0,0.02), 0 8px 16px rgba(0,0,0,0.04), 0 16px 32px rgba(0,0,0,0.02); }
        .input-glow:focus-within { box-shadow: 0 0 0 2px rgba(214, 40, 40, 0.2); border-color: #d62828; }
        .glass-nav { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); }
        .pos-card { transition: transform 0.1s ease-in-out; }
        .pos-card:active { transform: scale(0.98); }
    </style>
</head>

<body class="text-on-background antialiased flex h-screen overflow-hidden" x-data="dineFlowCRM()" x-init="initDashboard()">

    {{-- Partial Layout Navigation Sidebar --}}
    @include('layouts.sidebar1')

    <!-- Main Content Area -->
    <main class="flex-1 md:ml-[280px] h-screen overflow-y-auto bg-background flex flex-col">
        
        <!-- Mobile Header -->
        <header class="md:hidden glass-nav sticky top-0 w-full z-40 border-b border-outline-variant shadow-sm flex justify-between items-center px-container-margin py-md">
            <div class="flex items-center gap-sm">
                <span class="material-symbols-outlined text-primary cursor-pointer">menu</span>
                <span class="font-display text-headline-sm font-bold text-primary">DineFlow</span>
            </div>
            <div class="flex items-center gap-md">
                <span class="material-symbols-outlined text-on-surface-variant hover:text-primary transition-colors cursor-pointer">notifications</span>
                <button class="bg-surface-container-high text-on-surface px-md py-sm rounded-lg border border-outline-variant font-label-md text-label-md font-medium">
                    Shift Aktif
                </button>
            </div>
        </header>

        <!-- Desktop Header -->
        <div class="hidden md:flex justify-between items-center px-container-margin py-lg border-b border-outline-variant bg-surface sticky top-0 z-30">
            <div>
                <h2 class="font-headline-lg text-headline-lg text-on-surface">Pertumbuhan Pelanggan & CRM</h2>
                <p class="font-body-md text-body-md text-secondary mt-1">
                    Kelola hubungan tamu, lacak kampanye, dan optimalkan nilai seumur hidup.
                    <span class="text-xs text-emerald-600 font-semibold ml-2" x-text="isSyncing ? '• Menyingkronkan DB...' : '• Terhubung Live'"></span>
                </p>
            </div>
            <div class="flex items-center gap-lg">
                <div class="flex items-center bg-surface-container-lowest border border-outline-variant rounded-lg px-md py-sm w-64 input-glow shadow-sm">
                    <span class="material-symbols-outlined text-secondary mr-2">search</span>
                    <input class="bg-transparent border-none focus:ring-0 text-body-md w-full outline-none text-on-surface placeholder:text-secondary-fixed-dim" placeholder="Cari tamu, kampanye..." type="text"/>
                </div>
                <div class="flex gap-sm">
                    <button @click="syncWithDatabase()" class="w-10 h-10 rounded-lg border border-outline-variant flex items-center justify-center text-secondary hover:text-primary hover:border-primary transition-colors bg-surface-container-lowest">
                        <span class="material-symbols-outlined" :class="{ 'animate-spin': isSyncing }">sync</span>
                    </button>
                    <button class="bg-primary-container text-on-primary px-lg py-sm rounded-lg font-label-md text-label-md font-bold shadow-sm hover:opacity-90 transition-opacity flex items-center gap-sm">
                        <span class="material-symbols-outlined text-[18px]">campaign</span>
                        Kampanye Baru
                    </button>
                </div>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="p-container-margin flex flex-col gap-lg">
            
            <!-- Top Row: LTV Segmentation Bento Grid -->
            <section>
                <div class="flex justify-between items-end mb-md">
                    <h3 class="font-title-lg text-title-lg text-on-surface">Segmentasi Nilai Seumur Hidup Tamu</h3>
                    <button class="text-primary font-label-md text-label-md flex items-center gap-xs hover:underline">
                        Lihat Laporan Lengkap <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                    </button>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-md">
                    <!-- High LTV / VIP Segment -->
                    <div class="bg-surface-container-lowest rounded-[18px] p-lg shadow-stripe border border-outline-variant pos-card flex flex-col relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-primary-container opacity-5 rounded-bl-[100px] pointer-events-none"></div>
                        <div class="flex justify-between items-start mb-md">
                            <div class="flex items-center gap-sm">
                                <div class="w-8 h-8 rounded-full bg-primary-fixed flex items-center justify-center text-on-primary-fixed">
                                    <span class="material-symbols-outlined text-[18px]">star</span>
                                </div>
                                <h4 class="font-title-lg text-title-lg text-on-surface">High LTV</h4>
                            </div>
                            <span class="bg-surface-container-high text-on-surface px-2 py-1 rounded text-[12px] font-medium font-tabular-nums">Pelanggan Setia</span>
                        </div>
                        <div class="mt-auto">
                            <div class="font-display text-[32px] font-bold text-on-surface mb-1" x-text="metrics.high_ltv_count">0</div>
                            <p class="font-body-md text-body-md text-secondary">Tamu VIP</p>
                        </div>
                    </div>

                    <!-- Total Guests Segment -->
                    <div class="bg-surface-container-lowest rounded-[18px] p-lg shadow-stripe border border-outline-variant pos-card flex flex-col">
                        <div class="flex justify-between items-start mb-md">
                            <div class="flex items-center gap-sm">
                                <div class="w-8 h-8 rounded-full bg-tertiary-fixed flex items-center justify-center text-on-tertiary-fixed">
                                    <span class="material-symbols-outlined text-[18px]">person_add</span>
                                </div>
                                <h4 class="font-title-lg text-title-lg text-on-surface">Total Tamu</h4>
                            </div>
                            <span class="bg-surface-container-high text-on-surface px-2 py-1 rounded text-[12px] font-medium font-tabular-nums">Database</span>
                        </div>
                        <div class="mt-auto">
                            <div class="font-display text-[32px] font-bold text-on-surface mb-1" x-text="metrics.total_guests">0</div>
                            <p class="font-body-md text-body-md text-secondary">Tamu Terdaftar</p>
                        </div>
                    </div>

                    <!-- At-Risk Segment -->
                    <div class="bg-surface-container-lowest rounded-[18px] p-lg shadow-stripe border border-outline-variant pos-card flex flex-col">
                        <div class="flex justify-between items-start mb-md">
                            <div class="flex items-center gap-sm">
                                <div class="w-8 h-8 rounded-full bg-error-container flex items-center justify-center text-on-error-container">
                                    <span class="material-symbols-outlined text-[18px]">warning</span>
                                </div>
                                <h4 class="font-title-lg text-title-lg text-on-surface">Beresiko</h4>
                            </div>
                            <span class="bg-surface-container-high text-on-surface px-2 py-1 rounded text-[12px] font-medium font-tabular-nums">&gt; 60 Hari</span>
                        </div>
                        <div class="mt-auto">
                            <div class="font-display text-[32px] font-bold text-on-surface mb-1" x-text="metrics.at_risk_count">0</div>
                            <p class="font-body-md text-body-md text-secondary">Tamu Perlu Re-engagement</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Middle Row: Campaigns & Top Guests -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-lg">
                
                <!-- Campaign Performance Table -->
                <section class="xl:col-span-2 flex flex-col">
                    <div class="flex justify-between items-end mb-md">
                        <h3 class="font-title-lg text-title-lg text-on-surface">Performa Kampanye Aktif</h3>
                    </div>
                    <div class="bg-surface-container-lowest rounded-[18px] shadow-stripe border border-outline-variant flex-1 overflow-hidden">
                        
                        <!-- Table Header -->
                        <div class="grid grid-cols-12 gap-sm px-lg py-md border-b border-surface-variant bg-surface-container-low font-label-md text-label-md text-secondary uppercase tracking-wider">
                            <div class="col-span-4">Nama Kampanye</div>
                            <div class="col-span-2 text-center">Saluran</div>
                            <div class="col-span-2 text-center">Status</div>
                            <div class="col-span-2 text-right">Penerima</div>
                            <div class="col-span-2 text-right">Tingkat Konversi</div>
                        </div>

                        <!-- Dynamic Table Rows -->
                        <div class="flex flex-col">
                            <template x-for="campaign in campaigns" :key="campaign.id">
                                <div class="grid grid-cols-12 gap-sm px-lg py-md border-b border-surface-variant hover:bg-[#FFF7F5] transition-colors items-center">
                                    <div class="col-span-4 flex items-center gap-sm">
                                        <div class="w-2 h-2 rounded-full bg-primary-container"></div>
                                        <span class="font-body-md text-body-md font-medium text-on-surface" x-text="campaign.title"></span>
                                    </div>
                                    <div class="col-span-2 flex justify-center">
                                        <span class="px-2 py-1 bg-surface-container-high rounded text-[11px] font-medium text-on-surface" x-text="campaign.channel"></span>
                                    </div>
                                    <div class="col-span-2 flex justify-center">
                                        <span class="px-2 py-0.5 rounded text-[10px] font-bold" 
                                              :class="campaign.status === 'Active' ? 'bg-emerald-100 text-emerald-800' : 'bg-gray-100 text-gray-600'" 
                                              x-text="campaign.status">
                                        </span>
                                    </div>
                                    <div class="col-span-2 text-right font-tabular-nums text-tabular-nums text-secondary" x-text="campaign.recipients_count"></div>
                                    <div class="col-span-2 text-right font-tabular-nums text-tabular-nums text-on-surface font-medium" x-text="campaign.conversion_rate + '%'"></div>
                                </div>
                            </template>
                            <template x-if="campaigns.length === 0">
                                <div class="p-lg text-center text-secondary text-body-md">Belum ada data kampanye.</div>
                            </template>
                        </div>
                    </div>
                </section>

                <!-- Top Guests List -->
                <section class="flex flex-col">
                    <div class="flex justify-between items-end mb-md">
                        <h3 class="font-title-lg text-title-lg text-on-surface">Tamu Unggulan</h3>
                    </div>
                    <div class="bg-surface-container-lowest rounded-[18px] shadow-stripe border border-outline-variant flex-1 overflow-hidden flex flex-col">
                        <div class="p-md flex flex-col gap-sm overflow-y-auto max-h-[350px]">
                            <template x-for="guest in topGuests" :key="guest.id">
                                <div class="flex items-center gap-md p-sm rounded-lg hover:bg-[#FFF7F5] transition-colors border border-transparent hover:border-outline-variant">
                                    <div class="w-10 h-10 rounded-full flex-shrink-0 bg-primary-container/10 flex items-center justify-center text-primary font-bold text-body-lg" x-text="guest.name.charAt(0)">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h5 class="font-body-md text-body-md font-medium text-on-surface truncate" x-text="guest.name"></h5>
                                        <p class="font-label-md text-label-md text-secondary truncate" x-text="guest.total_visits + ' Kunjungan • ' + formatRupiah(guest.total_spent)"></p>
                                    </div>
                                    <div class="flex flex-col gap-xs items-end">
                                        <span class="px-2 py-0.5 bg-[rgba(0,119,166,0.1)] text-tertiary-container text-[10px] font-medium rounded-full uppercase tracking-wide" x-text="guest.ltv_segment"></span>
                                    </div>
                                </div>
                            </template>
                            <template x-if="topGuests.length === 0">
                                <p class="text-center text-secondary py-md">Belum ada data tamu unggulan.</p>
                            </template>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </main>

    <!-- Script Integrasi Data Real-Time Alpine.js -->
    <script>
        function dineFlowCRM() {
            return {
                isSyncing: false,
                metrics: @json($metrics),
                campaigns: @json($campaigns),
                topGuests: @json($topGuests),

                initDashboard() {
                    // Interval Auto-Sync tiap 30 Detik
                    setInterval(() => {
                        this.syncWithDatabase();
                    }, 30000);
                },

                async syncWithDatabase() {
                    this.isSyncing = true;
                    try {
                        const response = await fetch("{{ route('api.dashboard.sync') }}");
                        if (!response.ok) throw new Error('Failed to sync');
                        
                        const data = await response.json();
                        this.metrics = data.metrics;
                        this.campaigns = data.campaigns;
                        this.topGuests = data.top_guests;
                    } catch (error) {
                        console.error("Gagal sinkronisasi data:", error);
                    } finally {
                        this.isSyncing = false;
                    }
                },

                formatRupiah(number) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        maximumFractionDigits: 0
                    }).format(number || 0);
                }
            }
        }
    </script>
</body>
</html>