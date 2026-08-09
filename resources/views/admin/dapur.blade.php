@extends('layouts.app')

@section('title', 'Dapur (KDS)')

@section('content')
<div class="flex h-[calc(100vh-64px)] overflow-hidden bg-background text-on-background">

    <!-- Stasiun Navigation Panel (Left Side Panel) -->
    <aside class="hidden xl:flex flex-col bg-surface border-r border-outline-variant shadow-sm w-[260px] p-md overflow-y-auto shrink-0">
        <div class="mb-lg">
            <p class="font-label-md text-on-surface-variant uppercase tracking-wider mb-sm">Metrik Dapur</p>
            <div class="bg-surface-container-low rounded-lg p-md border border-outline-variant flex flex-col gap-sm">
                <div class="flex justify-between items-center">
                    <span class="font-body-md text-on-surface-variant">Aktif Tiket</span>
                    <span class="font-tabular-nums text-title-lg font-semibold text-primary">{{ $orders->count() }}</span>
                </div>
            </div>
        </div>

        <p class="font-label-md text-on-surface-variant uppercase tracking-wider mb-sm">Stasiun Kerja</p>
        <div class="flex flex-col gap-xs flex-1">
            <button class="w-full flex items-center gap-md p-md rounded-lg text-primary font-bold bg-primary-container/10 border-l-4 border-primary transition-colors text-left">
                <span class="material-symbols-outlined icon-fill">local_fire_department</span>
                <span>Semua Pesanan</span>
                <span class="ml-auto bg-primary text-on-primary rounded-full px-2 py-0.5 text-xs font-bold">{{ $orders->count() }}</span>
            </button>
        </div>
    </aside>

    <!-- Main KDS Tickets Canvas -->
    <div class="flex-1 p-md md:p-lg lg:p-xl bg-surface-container-lowest overflow-y-auto">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-md mb-lg">
            <div>
                <h2 class="font-headline-lg text-headline-lg text-on-surface">Pesanan Masuk</h2>
                <div class="flex items-center gap-2 mt-1">
                    <span class="inline-block w-2.5 h-2.5 rounded-full bg-success"></span>
                    <span class="font-label-md text-on-surface-variant">Terhubung ke Database</span>
                </div>
            </div>
        </div>

        <!-- Cards Grid Dynamic Data -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-md">
            @forelse($orders as $order)
                @php
                    $durationMinutes = $order->created_at->diffInMinutes(now());
                    $borderColor = 'border-t-success';
                    if ($durationMinutes > 15) {
                        $borderColor = 'border-t-danger';
                    } elseif ($durationMinutes > 8) {
                        $borderColor = 'border-t-warning';
                    }
                @endphp

                <article id="order-card-{{ $order->id }}" class="kds-card bg-surface rounded-xl border-t-8 {{ $borderColor }} border-x border-b border-outline-variant flex flex-col h-full shadow-sm hover:shadow-md transition-all duration-200">
                    <div class="p-md border-b border-outline-variant bg-surface-container-lowest rounded-t-lg">
                        <div class="flex justify-between items-start mb-sm">
                            <div>
                                <span class="font-headline-md text-headline-md font-bold text-on-surface block">#{{ $order->id }}</span>
                                <span class="font-label-md text-on-surface-variant">
                                    {{ $order->table ? 'Meja ' . $order->table->table_number : 'Takeaway' }}
                                </span>
                            </div>
                            <div class="text-right">
                                <span class="font-tabular-nums text-headline-md font-bold {{ $durationMinutes > 15 ? 'text-danger animate-pulse' : 'text-on-surface' }}">
                                    {{ $order->created_at->format('H:i') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="p-md flex-1 flex flex-col gap-md">
                        @foreach($order->orderItems as $item)
                            <div id="item-row-{{ $item->id }}" class="kds-item flex items-start gap-md border-b border-outline-variant pb-sm last:border-0 last:pb-0 transition-opacity duration-200 {{ $item->kitchen_status === 'completed' ? 'opacity-50' : '' }}">
                                <button onclick="toggleItemStatus({{ $item->id }}, this)" 
                                        class="mt-1 w-6 h-6 border-2 {{ $item->kitchen_status === 'completed' ? 'border-success bg-success' : 'border-outline-variant bg-surface' }} rounded flex items-center justify-center shrink-0">
                                    @if($item->kitchen_status === 'completed')
                                        <span class="material-symbols-outlined text-white text-[18px]">check</span>
                                    @endif
                                </button>
                                <div class="flex-1 item-details {{ $item->kitchen_status === 'completed' ? 'line-through decoration-2' : '' }}">
                                    <p class="font-title-lg text-title-lg font-bold text-on-surface leading-tight">{{ $item->menu->name ?? 'Menu Item' }}</p>
                                    @if($item->notes)
                                        <p class="font-body-md text-danger font-semibold mt-1">{{ $item->notes }}</p>
                                    @endif
                                </div>
                                <span class="font-title-lg text-title-lg font-bold text-on-surface-variant">{{ $item->quantity }}x</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="p-sm bg-surface-container-low rounded-b-xl border-t border-outline-variant mt-auto">
                        <button onclick="completeTicket({{ $order->id }})" class="w-full py-md bg-surface border border-outline-variant text-on-surface font-title-lg font-bold rounded-lg shadow-sm hover:bg-success hover:text-on-primary hover:border-success transition-colors flex items-center justify-center gap-sm uppercase tracking-wider">
                            <span class="material-symbols-outlined">done_all</span> Selesaikan Pesanan
                        </button>
                    </div>
                </article>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center p-xl text-center">
                    <span class="material-symbols-outlined text-[64px] text-outline">soup_kitchen</span>
                    <p class="font-title-lg text-on-surface-variant mt-md">Tidak ada pesanan aktif di dapur</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

@push('scripts')
<script>
    function toggleItemStatus(itemId, btn) {
        const itemRow = document.getElementById(`item-row-${itemId}`);
        const isCompleted = itemRow.classList.contains('opacity-50');
        const nextStatus = isCompleted ? 'pending' : 'completed';

        fetch(`/admin/dapur/item/${itemId}/status`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ status: nextStatus })
        })
        .then(res => res.json())
        .then(data => {
            if(data.success) {
                const details = itemRow.querySelector('.item-details');
                if (nextStatus === 'completed') {
                    itemRow.classList.add('opacity-50');
                    details.classList.add('line-through', 'decoration-2');
                    btn.className = "mt-1 w-6 h-6 border-2 border-success bg-success rounded flex items-center justify-center shrink-0";
                    btn.innerHTML = `<span class="material-symbols-outlined text-white text-[18px]">check</span>`;
                } else {
                    itemRow.classList.remove('opacity-50');
                    details.classList.remove('line-through', 'decoration-2');
                    btn.className = "mt-1 w-6 h-6 border-2 border-outline-variant bg-surface rounded flex items-center justify-center shrink-0";
                    btn.innerHTML = "";
                }
            }
        });
    }

    function completeTicket(orderId) {
        fetch(`/admin/dapur/order/${orderId}/complete`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if(data.success) {
                const card = document.getElementById(`order-card-${orderId}`);
                card.style.opacity = '0';
                card.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    card.remove();
                }, 200);
            }
        });
    }
</script>
@endpush
@endsection