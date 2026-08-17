<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Menu - DineFlow</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Material Symbols -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- Google Fonts Inter -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" />
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
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
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-background text-on-background font-sans min-h-screen pb-32">

    <!-- Container Aplikasi Mobile-First -->
    <div class="max-w-md mx-auto min-h-screen bg-surface-container-lowest shadow-sm relative">

       <!-- Header Image & Top Nav Bar -->
<div class="relative w-full h-72 bg-surface-container-high overflow-hidden">
    <!-- Gambar langsung diambil dari folder assets/img/ berdasarkan ID / kolom database -->
    <img src="{{ asset('assets/img/' . $menu->id . '.jpg') }}" 
         alt="{{ $menu->name }}" 
         class="w-full h-full object-cover"
         onerror="this.onerror=null; this.src='{{ asset('assets/img/default.jpg') }}';">

    <!-- Top Floating Buttons -->
    <div class="absolute top-4 left-4 right-4 flex justify-between items-center z-10">
        <a href="{{ route('user.menu') }}" class="w-10 h-10 rounded-full bg-surface-container-lowest/80 backdrop-blur-md flex items-center justify-center text-on-surface hover:bg-surface-container-lowest transition-colors">
            <span class="material-symbols-outlined">arrow_back</span>
        </a>
        <button type="button" class="w-10 h-10 rounded-full bg-surface-container-lowest/80 backdrop-blur-md flex items-center justify-center text-primary hover:bg-surface-container-lowest transition-colors">
            <span class="material-symbols-outlined">favorite_border</span>
        </button>
    </div>
</div>

        <!-- Form Tambah ke Keranjang -->
        <form action="{{ route('user.cart.add') }}" method="POST" id="add-to-cart-form">
            @csrf
            <input type="hidden" name="menu_id" value="{{ $menu->id ?? 1 }}">

            <!-- Detail Menu Content -->
            <div class="p-5 space-y-6">

                <!-- Header Info & Rating -->
                <div>
                    <div class="flex items-center gap-1.5 mb-1 text-xs font-semibold text-tertiary">
                        <span class="material-symbols-outlined text-base fill-1">star</span>
                        <span>4.8</span>
                        <span class="text-on-surface-variant font-normal">(120)</span>
                    </div>
                    <h1 class="text-2xl font-bold text-on-surface leading-tight">
                        {{ $menu->name ?? 'Ribeye Steak 200g' }}
                    </h1>
                    <div class="text-xl font-bold text-primary mt-2">
                        Rp {{ number_format($menu->price ?? 25000, 0, ',', '.') }}
                    </div>
                    <p class="text-sm text-on-surface-variant mt-2 leading-relaxed">
                        {{ $menu->description ?? 'Nasi goreng dengan telur, ayam suwir, dan kerupuk' }}
                    </p>
                </div>

                <hr class="border-surface-container">

                <!-- Opsi 1: Pilih Ukuran (Wajib) -->
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <h2 class="text-base font-semibold text-on-surface">Pilih Ukuran</h2>
                        <span class="text-xs font-medium px-2 py-0.5 rounded bg-primary-container text-on-primary-container">Wajib</span>
                    </div>

                    <div class="space-y-2">
                        <label class="flex items-center justify-between p-3.5 rounded-xl bg-surface-container-low border border-transparent has-[:checked]:border-primary has-[:checked]:bg-on-primary-container/30 cursor-pointer transition-all">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="size" value="regular" checked class="w-4 h-4 text-primary focus:ring-primary">
                                <span class="text-sm font-medium text-on-surface">Regular</span>
                            </div>
                            <span class="text-sm font-semibold text-on-surface-variant">Free</span>
                        </label>

                        <label class="flex items-center justify-between p-3.5 rounded-xl bg-surface-container-low border border-transparent has-[:checked]:border-primary has-[:checked]:bg-on-primary-container/30 cursor-pointer transition-all">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="size" value="large" class="w-4 h-4 text-primary focus:ring-primary">
                                <span class="text-sm font-medium text-on-surface">Large (Double Extra)</span>
                            </div>
                            <span class="text-sm font-semibold text-primary">+Rp 15.000</span>
                        </label>
                    </div>
                </div>

                <!-- Opsi 2: Extra Toppings (Opsional) -->
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <h2 class="text-base font-semibold text-on-surface">Extra Toppings</h2>
                        <span class="text-xs font-medium px-2 py-0.5 rounded bg-surface-container-high text-on-surface-variant">Opsional</span>
                    </div>

                    <div class="space-y-2">
                        <label class="flex items-center justify-between p-3.5 rounded-xl bg-surface-container-low border border-transparent has-[:checked]:border-primary has-[:checked]:bg-on-primary-container/30 cursor-pointer transition-all">
                            <div class="flex items-center gap-3">
                                <input type="checkbox" name="toppings[]" value="cheese" class="w-4 h-4 text-primary rounded focus:ring-primary">
                                <span class="text-sm font-medium text-on-surface">Extra Cheese</span>
                            </div>
                            <span class="text-sm font-semibold text-primary">+Rp 5.000</span>
                        </label>

                        <label class="flex items-center justify-between p-3.5 rounded-xl bg-surface-container-low border border-transparent has-[:checked]:border-primary has-[:checked]:bg-on-primary-container/30 cursor-pointer transition-all">
                            <div class="flex items-center gap-3">
                                <input type="checkbox" name="toppings[]" value="sauce" class="w-4 h-4 text-primary rounded focus:ring-primary">
                                <span class="text-sm font-medium text-on-surface">Extra Sauce</span>
                            </div>
                            <span class="text-sm font-semibold text-primary">+Rp 3.000</span>
                        </label>
                    </div>
                </div>

                <!-- Catatan untuk Dapur -->
                <div>
                    <label for="notes" class="block text-base font-semibold text-on-surface mb-2">Catatan untuk Dapur</label>
                    <textarea id="notes" name="notes" rows="2" placeholder="Contoh: Tanpa bawang, pedas sedang..." class="w-full p-3 rounded-xl bg-surface-container-low border border-surface-container text-sm focus:outline-none focus:border-primary transition-colors resize-none"></textarea>
                </div>

            </div>

            <!-- Bottom Action Bar (Quantity & Submit) -->
            <div class="fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-md p-4 bg-surface-container-lowest border-t border-surface-container flex items-center gap-4 z-40">
                <!-- Counter Quantity -->
                <div class="flex items-center justify-between bg-surface-container-low border border-surface-container rounded-xl px-2 py-1.5">
                    <button type="button" id="btn-minus" class="w-9 h-9 rounded-lg bg-surface-container-lowest flex items-center justify-center text-on-surface hover:bg-surface-container transition-colors disabled:opacity-40">
                        <span class="material-symbols-outlined text-lg">remove</span>
                    </button>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" readonly class="w-10 text-center font-bold text-on-surface bg-transparent focus:outline-none">
                    <button type="button" id="btn-plus" class="w-9 h-9 rounded-lg bg-surface-container-lowest flex items-center justify-center text-on-surface hover:bg-surface-container transition-colors">
                        <span class="material-symbols-outlined text-lg">add</span>
                    </button>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="flex-1 py-3.5 px-4 bg-primary text-on-primary rounded-xl font-semibold text-sm hover:bg-primary-container transition-colors shadow-sm flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-lg">shopping_bag</span>
                    <span>Tambah ke Keranjang</span>
                </button>
            </div>
        </form>

    </div>

    <!-- Script Counter Quantity -->
    <script>
        const btnMinus = document.getElementById('btn-minus');
        const btnPlus = document.getElementById('btn-plus');
        const inputQty = document.getElementById('quantity');

        btnMinus.addEventListener('click', () => {
            let currentVal = parseInt(inputQty.value) || 1;
            if (currentVal > 1) {
                inputQty.value = currentVal - 1;
            }
        });

        btnPlus.addEventListener('click', () => {
            let currentVal = parseInt(inputQty.value) || 1;
            inputQty.value = currentVal + 1;
        });
    </script>

    <!-- Script Pop-up SweetAlert2 ketika Sukses -->
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil Masuk Keranjang!',
                text: "{{ session('success') }}",
                showConfirmButton: true,
                confirmButtonText: 'Lihat Keranjang',
                showCancelButton: true,
                cancelButtonText: 'Lanjut Belanja',
                confirmButtonColor: '#b20112', // Primary theme color
                cancelButtonColor: '#5c403d',
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'rounded-xl font-medium px-4 py-2.5',
                    cancelButton: 'rounded-xl font-medium px-4 py-2.5'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('user.keranjang') }}";
                }
            });
        });
    </script>
    @endif

</body>
</html>