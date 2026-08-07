<!-- SideNavBar -->
<nav class="hidden md:flex flex-col h-screen p-lg bg-surface shadow-sm fixed left-0 top-0 w-[280px] z-50">
    <!-- Header Logo -->
    <div class="flex items-center gap-md mb-xl">
        <div class="w-10 h-10 rounded bg-primary-container flex items-center justify-center text-on-primary font-bold">
            DF
        </div>
        <div>
            <h1 class="font-display text-headline-md font-bold text-primary">DineFlow</h1>
            <p class="font-label-md text-label-md text-secondary">Admin Waralaba</p>
        </div>
    </div>

    <!-- Main Navigation Links -->
    <div class="flex flex-col gap-sm flex-1">
        <a class="flex items-center gap-md px-md py-sm rounded {{ request()->routeIs('admin.dashboard') || request()->routeIs('admin.index') ? 'text-primary font-bold border-r-4 border-primary bg-primary-container/10' : 'text-secondary font-medium hover:bg-surface-container-high' }} transition-all" href="{{ route('admin.dashboard') }}">
            <span class="material-symbols-outlined" style="{{ request()->routeIs('admin.dashboard') || request()->routeIs('admin.index') ? "font-variation-settings: 'FILL' 1;" : '' }}">dashboard</span>
            <span class="font-body-md text-body-md">Pusat Komando</span>
        </a>
        <a class="flex items-center gap-md px-md py-sm rounded {{ request()->routeIs('admin.kasir') ? 'text-primary font-bold border-r-4 border-primary bg-primary-container/10' : 'text-secondary font-medium hover:bg-surface-container-high' }} transition-all" href="{{ route('admin.kasir') }}">
            <span class="material-symbols-outlined">point_of_sale</span>
            <span class="font-body-md text-body-md">Kasir (POS)</span>
        </a>
        <a class="flex items-center gap-md px-md py-sm rounded {{ request()->routeIs('admin.inventory') ? 'text-primary font-bold border-r-4 border-primary bg-primary-container/10' : 'text-secondary font-medium hover:bg-surface-container-high' }} transition-all" href="{{ route('admin.inventory') }}">
            <span class="material-symbols-outlined">inventory_2</span>
            <span class="font-body-md text-body-md">Inventaris</span>
        </a>
        <a class="flex items-center gap-md px-md py-sm rounded {{ request()->routeIs('admin.dapur') ? 'text-primary font-bold border-r-4 border-primary bg-primary-container/10' : 'text-secondary font-medium hover:bg-surface-container-high' }} transition-all" href="{{ route('admin.dapur') }}">
            <span class="material-symbols-outlined">restaurant</span>
            <span class="font-body-md text-body-md">Dapur</span>
        </a>
        <a class="flex items-center gap-md px-md py-sm rounded {{ request()->routeIs('admin.staff') ? 'text-primary font-bold border-r-4 border-primary bg-primary-container/10' : 'text-secondary font-medium hover:bg-surface-container-high' }} transition-all" href="{{ route('admin.staff') }}">
            <span class="material-symbols-outlined">group</span>
            <span class="font-body-md text-body-md">Staf</span>
        </a>
        <a class="flex items-center gap-md px-md py-sm rounded {{ request()->routeIs('admin.crm') ? 'text-primary font-bold border-r-4 border-primary bg-primary-container/10' : 'text-secondary font-medium hover:bg-surface-container-high' }} transition-all" href="{{ route('admin.crm') }}">
            <span class="material-symbols-outlined">query_stats</span>
            <span class="font-body-md text-body-md">Pelanggan (CRM)</span>
        </a>
    </div>

    <!-- CTA Pesanan Cepat -->
    <a href="{{ route('admin.kasir') }}" class="mt-auto mb-lg w-full bg-primary-container text-on-primary py-sm rounded-lg font-label-md text-label-md hover:opacity-90 transition-opacity text-center">
        Pesanan Cepat
    </a>

    <!-- Footer Logout & Settings -->
    <div class="flex flex-col gap-sm pt-md border-t border-surface-variant">
        <a class="flex items-center gap-md px-md py-sm rounded text-secondary font-medium hover:bg-surface-container-high transition-colors" href="#">
            <span class="material-symbols-outlined">settings</span>
            <span class="font-body-md text-body-md">Pengaturan</span>
        </a>
        <form action="{{ route('logout') }}" method="POST" class="w-full">
            @csrf
            <button type="submit" class="w-full flex items-center gap-md px-md py-sm rounded text-error font-medium hover:bg-error-container/20 transition-colors text-left">
                <span class="material-symbols-outlined">logout</span>
                <span class="font-body-md text-body-md">Keluar (Logout)</span>
            </button>
        </form>
    </div>
</nav>