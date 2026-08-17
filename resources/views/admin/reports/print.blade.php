<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan - {{ $date }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print { display: none !important; }
            body { padding: 0; }
        }
    </style>
</head>
<body class="bg-white p-8 text-gray-800">

    <!-- Header Laporan -->
    <div class="flex justify-between items-center border-b pb-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold uppercase text-gray-900">DineFlow - Laporan Penjualan</h1>
            <p class="text-xs text-gray-500">Tanggal Laporan: {{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }}</p>
            <p class="text-xs text-gray-500">Tipe Laporan: {{ strtoupper($type) }} | Cabang: {{ $branchId }}</p>
        </div>
        <button onclick="window.print()" class="no-print bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-xs font-semibold cursor-pointer">
            Cetak Ulang
        </button>
    </div>

    <!-- Ringkasan Singkat -->
    <div class="grid grid-cols-2 gap-4 mb-6">
        <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
            <span class="text-xs text-gray-500 uppercase font-bold">Total Pesanan</span>
            <p class="text-xl font-extrabold text-gray-900">{{ $totalOrders }} Transaksi</p>
        </div>
        <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
            <span class="text-xs text-gray-500 uppercase font-bold">Total Omset</span>
            <p class="text-xl font-extrabold text-red-600">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
        </div>
    </div>

    <!-- Tabel Data Transaksi -->
    <table class="w-full text-left text-xs border border-gray-200">
        <thead>
            <tr class="bg-gray-100 border-b border-gray-200 text-gray-700 font-bold uppercase">
                <th class="p-3 border-r">No. Order</th>
                <th class="p-3 border-r">Pelanggan</th>
                <th class="p-3 border-r">Tipe</th>
                <th class="p-3 border-r">Status Bayar</th>
                <th class="p-3 border-r text-center">Waktu</th>
                <th class="p-3 text-right">Total</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($orders as $order)
                <tr>
                    <td class="p-3 border-r font-bold">{{ $order->order_number }}</td>
                    <td class="p-3 border-r">{{ $order->customer_name ?? '-' }}</td>
                    <td class="p-3 border-r uppercase">{{ $order->order_type }}</td>
                    <td class="p-3 border-r font-semibold uppercase {{ $order->payment_status === 'paid' ? 'text-emerald-600' : 'text-red-600' }}">
                        {{ $order->payment_status }}
                    </td>
                    <td class="p-3 border-r text-center">{{ $order->created_at->format('H:i') }} WIB</td>
                    <td class="p-3 text-right font-bold">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="p-4 text-center text-gray-400">Tidak ada data transaksi pada tanggal ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <script>
        // Membuka dialog print otomatis setelah halaman dimuat sempurna
        window.addEventListener('DOMContentLoaded', () => {
            window.print();
        });
    </script>
</body>
</html>