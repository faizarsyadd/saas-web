@extends('layouts.user')

@section('title', 'DineFlow - Menu')

@section('content')
    <!-- Meta CSRF Token untuk request AJAX -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Search Bar -->
    <div class="mb-lg mt-sm">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="material-symbols-outlined text-on-surface-variant">search</span>
            </div>
            <input id="searchInput" onkeyup="filterMenu()" class="block w-full pl-10 pr-3 py-3 border-0 rounded-xl bg-surface-container-high text-on-background focus:ring-2 focus:ring-primary focus:bg-surface transition-colors" placeholder="Cari makanan, minuman..." type="text"/>
        </div>
    </div>

    <!-- Horizontal Categories Dinamis -->
    <div class="mb-xl overflow-x-auto hide-scrollbar">
        <div class="flex space-x-sm pb-2">
            <!-- Tombol Semua Kategori -->
            <a href="{{ route('user.menu') }}" 
               class="flex-none px-4 py-2 rounded-full {{ ($selectedCategoryId == 'all') ? 'bg-primary-container text-on-primary-container font-semibold shadow-sm' : 'bg-surface-container-high text-on-surface-variant hover:bg-surface-variant' }} transition-colors">
                Semua
            </a>

            <!-- Looping dari Tabel Categories -->
            @foreach($categories as $category)
                <a href="{{ route('user.menu', ['category_id' => $category->id]) }}" 
                   class="flex-none px-4 py-2 rounded-full {{ ($selectedCategoryId == $category->id) ? 'bg-primary-container text-on-primary-container font-semibold shadow-sm' : 'bg-surface-container-high text-on-surface-variant hover:bg-surface-variant' }} transition-colors">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>

    <!-- Promo Banner -->
    <div class="mb-xl rounded-xl overflow-hidden shadow-sm relative h-48 bg-gray-900">
        <div class="absolute inset-0 bg-cover bg-center opacity-70" style="background-image: url('{{ asset('assets/img/promo-banner.jpg') }}'), url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=1000&auto=format&fit=crop');"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-background via-background/80 to-transparent"></div>
        <div class="relative h-full flex flex-col justify-center px-lg w-2/3">
            <span class="text-xs text-primary font-bold uppercase tracking-wider mb-xs">Spesial Hari Ini</span>
            <h2 class="text-xl font-bold text-on-background mb-sm">Diskon 20% Menu Pilihan</h2>
            <a href="#menu-grid" class="self-start px-4 py-2 bg-on-background text-surface rounded-full text-xs font-semibold hover:opacity-90 transition-opacity">Pesan Sekarang</a>
        </div>
    </div>

    <!-- Menu Grid Section -->
    <div id="menu-grid">
        <h3 class="text-lg font-bold text-on-background mb-md">
            Daftar Menu {{ $selectedCategory !== 'All' ? '- ' . ucfirst($selectedCategory) : '' }}
        </h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-gutter" id="menuContainer">
            @forelse($menus as $menu)
                @php
                    $imageFileName = $menu->image ?? ($menu->id . '.jpg');
                    $imagePath = asset('assets/img/' . $imageFileName);
                @endphp

                <div class="menu-item bg-surface rounded-xl shadow-sm overflow-hidden border border-surface-variant flex flex-col group hover:shadow-md transition-shadow" data-name="{{ strtolower($menu->name ?? $menu->nama_menu ?? '') }}">
                    <!-- Image Container -->
                    <div class="menu-image-container h-48 w-full bg-cover bg-center relative overflow-hidden bg-surface-container-high" style="background-image: url('{{ $imagePath }}');">
                        <div class="absolute top-sm right-sm bg-surface/90 backdrop-blur-sm rounded-full p-1 shadow-sm">
                            <span class="material-symbols-outlined text-on-surface-variant text-sm">favorite</span>
                        </div>
                    </div>

                    <!-- Card Details -->
                    <div class="p-md flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-start mb-xs">
                                <h4 class="text-base font-semibold text-on-background line-clamp-1">{{ $menu->name ?? $menu->nama_menu }}</h4>
                                <span class="text-base font-semibold text-primary ml-2 whitespace-nowrap">
                                    Rp {{ number_format($menu->price ?? $menu->harga, 0, ',', '.') }}
                                </span>
                            </div>
                            <p class="text-xs text-on-surface-variant line-clamp-2 mb-sm">
                                {{ $menu->description ?? $menu->deskripsi ?? 'Hidangan lezat siap disajikan.' }}
                            </p>
                        </div>

                        <!-- Detail & Add Button -->
                        <div class="flex items-center gap-2 mt-2">
                            <a href="{{ route('user.detail_menu', $menu->id) }}" class="h-[48px] px-3 rounded-lg bg-surface-container-high text-on-surface-variant flex items-center justify-center hover:bg-surface-variant transition-colors">
                                <span class="material-symbols-outlined">info</span>
                            </a>
                            <button onclick="addToCart(this, {{ $menu->id }}, '{{ $imagePath }}')" class="add-to-cart-btn flex-1 h-[48px] rounded-lg bg-surface-container-high text-primary font-semibold flex items-center justify-center space-x-2 hover:bg-primary hover:text-white transition-colors active:scale-95 duration-200">
                                <span class="material-symbols-outlined">add</span>
                                <span>Tambah</span>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-on-surface-variant">
                    <span class="material-symbols-outlined text-4xl mb-2">restaurant_menu</span>
                    <p class="text-sm">Belum ada menu yang tersedia untuk kategori ini.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function filterMenu() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            const items = document.querySelectorAll('.menu-item');

            items.forEach(item => {
                const name = item.getAttribute('data-name');
                if (name.includes(query)) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        function addToCart(button, menuId, imageSrc) {
            // 1. JALANKAN ANIMASI INSTAN (Tanpa nunggu AJAX/server)
            animateFlyInstantly(button, imageSrc);

            // 2. KIRIM AJAX DI BACKGROUND
            fetch('{{ route("user.cart.add") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ menu_id: menuId, quantity: 1 })
            }).catch(error => console.error('Error AJAX:', error));
        }

        function animateFlyInstantly(button, imageSrc) {
            const card = button.closest('.menu-item');
            const imgContainer = card.querySelector('.menu-image-container');
            
            // Cari ikon keranjang
            const allIcons = document.querySelectorAll('header span.material-symbols-outlined');
            let cartIcon = null;
            allIcons.forEach(icon => {
                if (icon.textContent.trim() === 'shopping_cart') {
                    cartIcon = icon;
                }
            });

            if (!imgContainer || !cartIcon) return;

            // Umpan balik visual langsung pada tombol yang diklik (Micro-interaction)
            button.style.transform = 'scale(0.92)';
            setTimeout(() => button.style.transform = 'scale(1)', 100);

            const start = imgContainer.getBoundingClientRect();
            const end = cartIcon.getBoundingClientRect();

            // Kloning gambar baru untuk tiap klik (Support Spam)
            const flyer = document.createElement('img');
            flyer.src = imageSrc;
            flyer.style.position = 'fixed';
            flyer.style.left = `${start.left}px`;
            flyer.style.top = `${start.top}px`;
            flyer.style.width = `${start.width}px`;
            flyer.style.height = `${start.height}px`;
            flyer.style.borderRadius = '16px';
            flyer.style.objectFit = 'cover';
            flyer.style.zIndex = '99999';
            flyer.style.pointerEvents = 'none';
            flyer.style.boxShadow = '0 8px 20px rgba(0,0,0,0.25)';
            
            // Durasi dipersingkat (0.45s) agar respons cepat & snappy
            flyer.style.transition = 'left 0.45s cubic-bezier(0.4, 0, 0.2, 1), top 0.45s cubic-bezier(0.4, 0, 0.2, 1), width 0.45s ease-in-out, height 0.45s ease-in-out, opacity 0.45s ease-in-out, transform 0.45s ease-in-out';

            document.body.appendChild(flyer);

            // Force reflow agar CSS terdeteksi seketika
            void flyer.offsetWidth;

            // Jalankan animasi melayang
            flyer.style.left = `${end.left + (end.width / 4)}px`;
            flyer.style.top = `${end.top + (end.height / 4)}px`;
            flyer.style.width = '20px';
            flyer.style.height = '20px';
            flyer.style.opacity = '0.2';
            flyer.style.transform = 'scale(0.2) rotate(25deg)';

            // Efek pop pada ikon keranjang saat item mendarat
            setTimeout(() => {
                flyer.remove();

                const targetBtn = cartIcon.parentElement;
                targetBtn.style.transition = 'transform 0.15s ease-out';
                targetBtn.style.transform = 'scale(1.35)';

                setTimeout(() => {
                    targetBtn.style.transform = 'scale(1)';
                }, 150);
            }, 450);
        }
    </script>
@endpush