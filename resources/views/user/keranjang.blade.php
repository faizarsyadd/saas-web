<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DineFlow - Cart & Checkout</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
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
                "label-sm": ["12px", {"lineHeight": "16px", "letterSpacing": "0.04em", "fontWeight": "500"}],
                "headline-lg": ["24px", {"lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                "body-lg": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                "headline-md": ["20px", {"lineHeight": "28px", "fontWeight": "600"}],
                "display-sm": ["30px", {"lineHeight": "38px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                "body-md": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                "label-lg": ["14px", {"lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "600"}]
            }
          }
        }
      }
    </script>
    <style>
        body { -webkit-tap-highlight-color: transparent; min-height: max(884px, 100dvh); }
        .ambient-shadow { box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); }
    </style>
</head>
<body class="bg-background text-on-background min-h-screen pb-[120px]">

    <!-- Header -->
    <header class="bg-surface dark:bg-on-background shadow-sm docked full-width top-0 sticky z-50">
        <div class="flex justify-between items-center w-full px-margin-mobile py-sm">
            <a href="{{ route('user.table') }}" class="w-12 h-12 flex items-center justify-center text-primary dark:text-primary-fixed hover:opacity-80 transition-opacity active:scale-95 duration-200">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">table_restaurant</span>
            </a>
            <h1 class="font-display-sm text-display-sm font-bold text-primary dark:text-primary-fixed">DineFlow</h1>
            <a href="{{ route('user.keranjang') }}" class="w-12 h-12 flex items-center justify-center text-primary dark:text-primary-fixed hover:opacity-80 transition-opacity active:scale-95 duration-200">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">shopping_cart</span>
            </a>
        </div>
    </header>

    <main class="px-margin-mobile pt-lg flex flex-col gap-lg">
        <form action="{{ route('orders.store') }}" method="POST" id="checkout-form">
            @csrf
            
            <!-- Cart Items Section -->
            <section class="flex flex-col gap-sm">
                <h2 class="font-headline-md text-headline-md">Your Order</h2>
                
                @if(empty($cart) || count($cart) == 0)
                    <div class="bg-surface-container rounded-xl p-md text-center text-on-surface-variant">
                        Keranjang belanja Anda kosong.
                    </div>
                @else
                    @foreach($cart as $key => $item)
                        <div class="bg-surface-container rounded-xl p-md flex gap-md items-center ambient-shadow mb-sm" id="cart-item-{{ $key }}">
                            <!-- Gambar Produk -->
                            <img class="w-20 h-20 rounded-lg object-cover bg-surface-variant flex-shrink-0" 
                                 src="{{ asset('assets/img/' . ($item['id'] ?? $item['image'] ?? 'default.jpg')) }}" 
                                 alt="{{ $item['name'] ?? 'Menu' }}"
                                 onerror="this.onerror=null; this.src='{{ asset('assets/img/default.jpg') }}';"/>
                            
                            <!-- Detail Produk -->
                            <div class="flex-1 flex flex-col">
                                <span class="font-label-lg text-label-lg text-on-surface">{{ $item['name'] ?? 'Menu Item' }}</span>
                                <span class="font-body-md text-body-md text-on-surface-variant mt-1">
                                    Ukuran: {{ ucfirst($item['size'] ?? 'Regular') }}
                                    @if(!empty($item['toppings']))
                                        | {{ implode(', ', $item['toppings']) }}
                                    @endif
                                </span>
                                <span class="font-label-lg text-label-lg text-primary mt-2">
                                    Rp {{ number_format($item['price'] ?? 0, 0, ',', '.') }}
                                </span>
                            </div>

                            <!-- Tombol Aksi Quantity & Hapus -->
                            <div class="flex flex-col items-end gap-2">
                                <!-- Tombol Hapus (Sampah) -->
                                <button type="button" onclick="removeItem('{{ $key }}')" class="text-error hover:opacity-75 transition-opacity p-1">
                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                </button>

                                <!-- Kontrol Tambah & Kurang -->
                                <div class="flex items-center bg-surface-container-high rounded-lg p-1 gap-2">
                                    <button type="button" onclick="updateQuantity('{{ $key }}', -1)" class="w-7 h-7 bg-surface rounded-md flex items-center justify-center text-on-surface shadow-xs active:scale-90 transition-transform">
                                        <span class="material-symbols-outlined text-[16px]">remove</span>
                                    </button>
                                    
                                    <span class="font-label-lg text-label-lg font-bold min-w-[20px] text-center" id="qty-{{ $key }}">
                                        {{ $item['quantity'] ?? 1 }}
                                    </span>

                                    <button type="button" onclick="updateQuantity('{{ $key }}', 1)" class="w-7 h-7 bg-primary text-on-primary rounded-md flex items-center justify-center shadow-xs active:scale-90 transition-transform">
                                        <span class="material-symbols-outlined text-[16px]">add</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </section>

            <!-- Promo Code Section -->
            <section class="bg-surface-container-low rounded-xl p-md border border-surface-variant mt-lg">
                <div class="flex gap-sm">
                    <div class="relative flex-1">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">local_offer</span>
                        <input name="promo_code" class="w-full pl-10 pr-4 h-[48px] bg-surface rounded-lg border-none focus:ring-2 focus:ring-primary font-body-md text-body-md placeholder:text-on-surface-variant" placeholder="Add promo code" type="text"/>
                    </div>
                    <button type="button" class="h-[48px] px-sm bg-primary-container text-on-primary-container rounded-lg font-label-lg text-label-lg active:scale-95 transition-transform whitespace-nowrap">Apply</button>
                </div>
            </section>

            <!-- Payment Method Section -->
            <section class="flex flex-col gap-sm mt-lg">
                <h3 class="font-headline-md text-headline-md">Payment Method</h3>
                <div class="grid grid-cols-2 gap-sm">
                    <label class="relative cursor-pointer">
                        <input checked="" class="peer sr-only" name="payment_method" value="qris" type="radio"/>
                        <div class="h-16 bg-surface-container rounded-xl flex items-center justify-center gap-2 border-2 border-transparent peer-checked:border-primary peer-checked:bg-primary-fixed transition-colors">
                            <span class="material-symbols-outlined text-primary">qr_code_scanner</span>
                            <span class="font-label-lg text-label-lg text-on-surface peer-checked:text-on-primary-fixed">QRIS</span>
                        </div>
                    </label>
                    <label class="relative cursor-pointer">
                        <input class="peer sr-only" name="payment_method" value="cash" type="radio"/>
                        <div class="h-16 bg-surface-container rounded-xl flex items-center justify-center gap-2 border-2 border-transparent peer-checked:border-primary peer-checked:bg-primary-fixed transition-colors">
                            <span class="material-symbols-outlined text-on-surface-variant">payments</span>
                            <span class="font-label-lg text-label-lg text-on-surface peer-checked:text-on-primary-fixed">Cash</span>
                        </div>
                    </label>
                </div>
            </section>

            <!-- Summary Section -->
            <section class="bg-surface-container rounded-xl p-md flex flex-col gap-sm mb-lg mt-lg">
                <h3 class="font-headline-md text-headline-md border-b border-surface-variant pb-sm">Summary</h3>
                <div class="flex justify-between items-center font-body-md text-body-md text-on-surface-variant mt-sm">
                    <span>Subtotal</span>
                    <span id="summary-subtotal">Rp {{ number_format($subtotal ?? 0, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between items-center font-body-md text-body-md text-on-surface-variant">
                    <span>Service Charge (5%)</span>
                    <span id="summary-service">Rp {{ number_format($serviceCharge ?? 0, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between items-center font-body-md text-body-md text-on-surface-variant">
                    <span>PB1 Tax (10%)</span>
                    <span id="summary-tax">Rp {{ number_format($tax ?? 0, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between items-center font-headline-lg text-headline-lg text-on-surface mt-sm pt-sm border-t border-surface-variant">
                    <span>Total</span>
                    <span class="text-primary" id="summary-total">Rp {{ number_format($total ?? 0, 0, ',', '.') }}</span>
                </div>
            </section>

            <!-- Sticky Checkout Button -->
            <div class="fixed bottom-0 left-0 w-full bg-surface/80 backdrop-blur-md border-t border-outline-variant p-margin-mobile pb-[max(20px,env(safe-area-inset-bottom))] z-50">
                <button type="submit" id="btn-submit" @if(empty($cart)) disabled @endif class="w-full min-h-[56px] bg-primary text-on-primary rounded-xl font-label-lg text-label-lg flex items-center justify-center gap-2 shadow-lg active:scale-95 transition-transform disabled:opacity-50 disabled:cursor-not-allowed">
                    <span>Bayar Sekarang</span>
                    <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                </button>
            </div>
        </form>
    </main>

    <!-- JavaScript Handler AJAX -->
    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        function updateQuantity(itemKey, change) {
            const qtyElement = document.getElementById(`qty-${itemKey}`);
            let currentQty = parseInt(qtyElement.textContent.trim());
            let newQty = currentQty + change;

            // Jika dipencet berkurang saat jumlah 1, otomatis panggil hapus item
            if (newQty <= 0) {
                removeItem(itemKey);
                return;
            }

            // Update UI langsung
            qtyElement.textContent = newQty;

            // Kirim AJAX ke Backend
            fetch('{{ route("user.cart.update") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ key: itemKey, quantity: newQty })
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    updateSummaryUI(data.subtotal, data.serviceCharge, data.tax, data.total);
                }
            })
            .catch(err => console.error('Error updating cart:', err));
        }

        function removeItem(itemKey) {
            const itemContainer = document.getElementById(`cart-item-${itemKey}`);
            
            // Efek Animasi Hilang dari UI
            itemContainer.style.transition = 'all 0.3s ease';
            itemContainer.style.opacity = '0';
            itemContainer.style.transform = 'scale(0.9)';

            setTimeout(() => {
                itemContainer.remove();
            }, 300);

            // Kirim Request AJAX Hapus ke Backend
            fetch('{{ route("user.cart.remove") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ key: itemKey })
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    updateSummaryUI(data.subtotal, data.serviceCharge, data.tax, data.total);
                    
                    // Reload halaman jika keranjang kosong total
                    if(data.is_empty) {
                        location.reload();
                    }
                }
            })
            .catch(err => console.error('Error removing item:', err));
        }

        function updateSummaryUI(subtotal, service, tax, total) {
            document.getElementById('summary-subtotal').textContent = `Rp ${formatRupiah(subtotal)}`;
            document.getElementById('summary-service').textContent = `Rp ${formatRupiah(service)}`;
            document.getElementById('summary-tax').textContent = `Rp ${formatRupiah(tax)}`;
            document.getElementById('summary-total').textContent = `Rp ${formatRupiah(total)}`;
        }

        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID').format(number);
        }
    </script>
</body>
</html>