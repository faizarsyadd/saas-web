<!-- Include Alpine.js jika belum ada -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- SideNavBar -->
<aside 
    x-data="{ 
        sidebarOpen: localStorage.getItem('sidebarState') !== 'closed',
        toggleSidebar() {
            this.sidebarOpen = !this.sidebarOpen;
            localStorage.setItem('sidebarState', this.sidebarOpen ? 'open' : 'closed');
            this.adjustLayout();
        },
        adjustLayout() {
            const mainContent = document.querySelector('main') || document.querySelector('.flex-1') || document.body.children[1];
            if (mainContent) {
                mainContent.style.transition = 'margin-left 0.3s ease';
                mainContent.style.marginLeft = this.sidebarOpen ? '280px' : '80px';
            }
        }
    }"
    x-init="adjustLayout(); $watch('sidebarOpen', () => adjustLayout())"
    class="hidden md:flex flex-col h-screen p-md bg-surface shadow-sm fixed left-0 top-0 z-50 transition-all duration-300 border-r border-surface-variant overflow-x-hidden"
    :class="sidebarOpen ? 'w-[280px]' : 'w-[80px]'"
>
    <!-- Header Logo & Toggle Button -->
    <div class="flex items-center justify-between mb-xl px-xs">
        <div class="flex items-center gap-md">
            <!-- Icon Logo diganti dari text DF ke image icon.png -->
            <div class="w-10 h-10 rounded bg-primary-container/10 flex-shrink-0 flex items-center justify-center overflow-hidden p-1">
                <img src="{{ asset('image/icon.png') }}" alt="DineFlow Logo" class="w-full h-full object-contain">
            </div>
            <div x-show="sidebarOpen" x-transition class="whitespace-nowrap">
                <h1 class="font-display text-headline-md font-bold text-primary">DineFlow</h1>
                <p class="font-label-md text-label-md text-secondary">Admin Waralaba</p>
            </div>
        </div>

        <!-- Tombol Tarik / Buka-Tutup Sidebar -->
        <button 
            @click="toggleSidebar()" 
            type="button"
            class="p-xs rounded-lg hover:bg-surface-container-high text-secondary transition-colors"
            title="Tarik / Kembangkan Sidebar"
        >
            <span class="material-symbols-outlined transition-transform duration-300" :class="!sidebarOpen ? 'rotate-180' : ''">
                chevron_left
            </span>
        </button>
    </div>

    <!-- Main Navigation Links -->
    <div class="flex flex-col gap-sm flex-1">
        <a class="flex items-center gap-md px-md py-sm rounded {{ request()->routeIs('admin.dashboard') || request()->routeIs('admin.index') ? 'text-primary font-bold border-r-4 border-primary bg-primary-container/10' : 'text-secondary font-medium hover:bg-surface-container-high' }} transition-all" 
           href="{{ route('admin.dashboard') }}" 
           :title="!sidebarOpen ? 'Pusat Komando' : ''">
            <span class="material-symbols-outlined flex-shrink-0" style="{{ request()->routeIs('admin.dashboard') || request()->routeIs('admin.index') ? "font-variation-settings: 'FILL' 1;" : '' }}">dashboard</span>
            <span x-show="sidebarOpen" x-transition class="font-body-md text-body-md whitespace-nowrap">Dashboard</span>
        </a>

        <a class="flex items-center gap-md px-md py-sm rounded {{ request()->routeIs('admin.kasir') ? 'text-primary font-bold border-r-4 border-primary bg-primary-container/10' : 'text-secondary font-medium hover:bg-surface-container-high' }} transition-all" 
           href="{{ route('admin.kasir') }}" 
           :title="!sidebarOpen ? 'Kasir (POS)' : ''">
            <span class="material-symbols-outlined flex-shrink-0">point_of_sale</span>
            <span x-show="sidebarOpen" x-transition class="font-body-md text-body-md whitespace-nowrap">Kasir (POS)</span>
        </a>

        <a class="flex items-center gap-md px-md py-sm rounded {{ request()->routeIs('admin.inventory*') ? 'text-primary font-bold border-r-4 border-primary bg-primary-container/10' : 'text-secondary font-medium hover:bg-surface-container-high' }} transition-all" 
           href="{{ route('admin.inventory.index') }}" 
           :title="!sidebarOpen ? 'Inventaris' : ''">
            <span class="material-symbols-outlined flex-shrink-0">inventory_2</span>
            <span x-show="sidebarOpen" x-transition class="font-body-md text-body-md whitespace-nowrap">Inventaris</span>
        </a>

        <a class="flex items-center gap-md px-md py-sm rounded {{ request()->routeIs('admin.dapur') ? 'text-primary font-bold border-r-4 border-primary bg-primary-container/10' : 'text-secondary font-medium hover:bg-surface-container-high' }} transition-all" 
           href="{{ route('admin.dapur') }}" 
           :title="!sidebarOpen ? 'Dapur' : ''">
            <span class="material-symbols-outlined flex-shrink-0">restaurant</span>
            <span x-show="sidebarOpen" x-transition class="font-body-md text-body-md whitespace-nowrap">Dapur</span>
        </a>

        <a class="flex items-center gap-md px-md py-sm rounded {{ request()->routeIs('admin.staff') ? 'text-primary font-bold border-r-4 border-primary bg-primary-container/10' : 'text-secondary font-medium hover:bg-surface-container-high' }} transition-all" 
           href="{{ route('admin.staff') }}" 
           :title="!sidebarOpen ? 'Staf' : ''">
            <span class="material-symbols-outlined flex-shrink-0">group</span>
            <span x-show="sidebarOpen" x-transition class="font-body-md text-body-md whitespace-nowrap">Staf</span>
        </a>

        <a class="flex items-center gap-md px-md py-sm rounded {{ request()->routeIs('admin.crm') ? 'text-primary font-bold border-r-4 border-primary bg-primary-container/10' : 'text-secondary font-medium hover:bg-surface-container-high' }} transition-all" 
           href="{{ route('admin.crm') }}" 
           :title="!sidebarOpen ? 'Pelanggan (CRM)' : ''">
            <span class="material-symbols-outlined flex-shrink-0">query_stats</span>
            <span x-show="sidebarOpen" x-transition class="font-body-md text-body-md whitespace-nowrap">Pelanggan (CRM)</span>
        </a>
    </div>

    <!-- CTA Pesanan Cepat -->
    <a href="{{ route('admin.kasir') }}" 
       class="mt-auto mb-lg w-full bg-primary-container text-on-primary py-sm rounded-lg font-label-md text-label-md hover:opacity-90 transition-all text-center flex items-center justify-center gap-xs"
       :title="!sidebarOpen ? 'Pesanan Cepat' : ''">
        <span class="material-symbols-outlined flex-shrink-0" x-show="!sidebarOpen">add_shopping_cart</span>
        <span x-show="sidebarOpen" x-transition class="whitespace-nowrap">Pesanan Cepat</span>
    </a>

    <!-- Footer Logout & Settings -->
    <div class="flex flex-col gap-sm pt-md border-t border-surface-variant">
        <a class="flex items-center gap-md px-md py-sm rounded text-secondary font-medium hover:bg-surface-container-high transition-colors" 
           href="#" 
           :title="!sidebarOpen ? 'Pengaturan' : ''">
            <span class="material-symbols-outlined flex-shrink-0">settings</span>
            <span x-show="sidebarOpen" x-transition class="font-body-md text-body-md whitespace-nowrap">Pengaturan</span>
        </a>
        <form action="{{ route('logout') }}" method="POST" class="w-full">
            @csrf
            <button type="submit" 
                    class="w-full flex items-center gap-md px-md py-sm rounded text-error font-medium hover:bg-error-container/20 transition-colors text-left" 
                    :title="!sidebarOpen ? 'Keluar' : ''">
                <span class="material-symbols-outlined flex-shrink-0">logout</span>
                <span x-show="sidebarOpen" x-transition class="font-body-md text-body-md whitespace-nowrap">Keluar (Logout)</span>
            </button>
        </form>
    </div>
</aside>