<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>DineFlow - Pusat Komando Admin</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
        body {
            font-family: 'Inter', sans-serif;
            background-color: #FAFAFA;
        }
        .shadow-stripe-card {
            box-shadow: 0 2px 5px -1px rgba(50, 50, 93, 0.25), 0 1px 3px -1px rgba(0, 0, 0, 0.3);
        }
        .shadow-stripe-ambient {
            box-shadow: 0 13px 27px -5px rgba(50, 50, 93, 0.25), 0 8px 16px -8px rgba(0, 0, 0, 0.3);
        }
        .sparkline-up {
            stroke: #059669;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
        }
        .sparkline-down {
            stroke: #D62828;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
        }
    </style>
</head>
<body class="bg-background text-on-background flex h-screen overflow-hidden">

    <!-- Wrapper Utam: Horizontal (Sidebar kiri, Konten kanan) -->
    <div class="flex h-full w-full overflow-hidden">

        <!-- Kiri: Sidebar diset flex-shrink-0 agar lebarnya tidak melar/gepeng -->
        <aside class="w-64 flex-shrink-0 h-full border-r border-outline-variant bg-surface">
            @include('layouts.sidebar1')
        </aside>

        <!-- Kanan: Seluruh Area Konten (Header Topbar + Main Body) -->
        <div class="flex-1 flex flex-col h-full overflow-hidden">
            
            <!-- Top Header Bar (Persis seperti Pusat Komando) -->
            <header class="h-16 border-b border-outline-variant bg-surface flex items-center justify-between px-6 flex-shrink-0">
                <h1 class="text-xl font-bold text-on-surface">Personalia &amp; Penggajian</h1>
                
                <div class="flex items-center gap-4">
                    <span class="px-3 py-1 bg-primary text-white text-xs font-semibold rounded-full">Shift Aktif</span>
                    <button class="p-2 text-on-surface-variant hover:text-on-surface">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <button class="p-2 text-on-surface-variant hover:text-on-surface">
                        <span class="material-symbols-outlined">logout</span>
                    </button>
                    <div class="flex items-center gap-2 pl-2 border-l border-outline-variant">
                        <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-xs">
                            AD
                        </div>
                        <span class="text-xs font-medium">Admin</span>
                    </div>
                </div>
            </header>

            <!-- Main Scrollable Area -->
            <main class="flex-1 overflow-y-auto p-gutter md:p-container-margin bg-surface-container-lowest">
                
                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-800 rounded-lg text-sm flex items-center gap-2">
                        <span class="material-symbols-outlined text-base">check_circle</span>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <div class="flex justify-between items-end mb-lg">
                    <div>
                        <p class="text-sm text-on-surface-variant">Kelola jadwal, pantau performa, dan setujui penggajian.</p>
                    </div>
                    <div class="flex gap-3">
                        <button onclick="window.print()" class="px-4 py-2 border border-outline-variant rounded-lg text-on-surface text-xs font-medium hover:bg-surface-container-low flex items-center gap-2 transition-colors">
                            <span class="material-symbols-outlined text-sm">download</span> Ekspor
                        </button>
                        <button onclick="toggleModal('modalTambahStaff')" class="px-4 py-2 bg-primary-container text-on-primary-container rounded-lg text-xs font-medium hover:bg-opacity-90 flex items-center gap-2 transition-colors">
                            <span class="material-symbols-outlined text-sm">add</span> Tambah Staff
                        </button>
                    </div>
                </div>

                <!-- Dashboard Grid -->
                <div class="grid grid-cols-12 gap-gutter">
                    <!-- Weekly Schedule (Span 8) -->
                    <div class="col-span-12 xl:col-span-8 bg-surface rounded-xl border border-outline-variant overflow-hidden flex flex-col h-[600px]">
                        <div class="p-md border-b border-outline-variant flex justify-between items-center">
                            <div class="flex items-center gap-4">
                                <h2 class="text-lg font-semibold text-on-surface">Jadwal Tim</h2>
                                <div class="flex items-center bg-surface-container-low rounded-lg p-1 border border-outline-variant text-xs font-medium">
                                    <a href="{{ route('admin.staff', array_merge(request()->query(), ['dept' => 'BOH'])) }}" class="px-3 py-1 rounded-md {{ $department == 'BOH' ? 'bg-surface text-on-surface shadow-sm' : 'text-on-surface-variant' }}">
                                        BOH ({{ $bohCount }})
                                    </a>
                                    <a href="{{ route('admin.staff', array_merge(request()->query(), ['dept' => 'FOH'])) }}" class="px-3 py-1 rounded-md {{ $department == 'FOH' ? 'bg-surface text-on-surface shadow-sm' : 'text-on-surface-variant' }}">
                                        FOH ({{ $fohCount }})
                                    </a>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 text-on-surface-variant text-sm">
                                <span>Minggu Ini</span>
                            </div>
                        </div>
                        <div class="flex-1 overflow-auto bg-surface-container-lowest">
                            <table class="w-full text-left border-collapse min-w-[800px]">
                                <thead>
                                    <tr class="border-b border-outline-variant bg-surface">
                                        <th class="p-3 text-xs uppercase w-48 sticky left-0 bg-surface z-10">Staff</th>
                                        <th class="p-3 text-xs uppercase text-center border-l border-outline-variant">Senin</th>
                                        <th class="p-3 text-xs uppercase text-center border-l border-outline-variant bg-primary-container/5 text-primary">Selasa (Hari Ini)</th>
                                        <th class="p-3 text-xs uppercase text-center border-l border-outline-variant">Rabu</th>
                                        <th class="p-3 text-xs uppercase text-center border-l border-outline-variant">Kamis</th>
                                        <th class="p-3 text-xs uppercase text-center border-l border-outline-variant">Jumat</th>
                                        <th class="p-3 text-xs uppercase text-center border-l border-outline-variant">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-outline-variant">
                                    @forelse($staffs as $staff)
                                    <tr class="hover:bg-surface-container-low transition-colors group">
                                        <td class="p-3 sticky left-0 bg-surface-container-lowest group-hover:bg-surface-container-low z-10 flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center font-bold text-xs">
                                                {{ strtoupper(substr($staff->name, 0, 2)) }}
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-on-surface">{{ $staff->name }}</div>
                                                <div class="text-xs text-on-surface-variant">{{ $staff->role ?? 'Staff' }}</div>
                                            </div>
                                        </td>

                                        <td class="p-2 border-l border-outline-variant text-center">
                                            <div class="bg-surface-container-high border border-outline-variant rounded p-2 text-xs">
                                                {{ $staff->shift_senin ?: '-' }}
                                            </div>
                                        </td>

                                        <td class="p-2 border-l border-outline-variant bg-primary-container/5 text-center">
                                            <div class="bg-primary-container text-on-primary-container rounded p-2 text-xs font-medium flex items-center justify-center gap-1">
                                                <span class="material-symbols-outlined text-[14px]">schedule</span> 
                                                {{ $staff->shift_selasa ?: '-' }}
                                            </div>
                                        </td>

                                        <td class="p-2 border-l border-outline-variant text-center">
                                            <div class="text-xs text-on-surface-variant">
                                                {{ $staff->shift_rabu ?: 'Libur' }}
                                            </div>
                                        </td>

                                        <td class="p-2 border-l border-outline-variant text-center">
                                            <div class="bg-surface-container-high border border-outline-variant rounded p-2 text-xs">
                                                {{ $staff->shift_kamis ?: '-' }}
                                            </div>
                                        </td>

                                        <td class="p-2 border-l border-outline-variant text-center">
                                            <div class="bg-surface-container-high border border-outline-variant rounded p-2 text-xs">
                                                {{ $staff->shift_jumat ?: '-' }}
                                            </div>
                                        </td>

                                        <td class="p-2 border-l border-outline-variant text-center">
                                            <button onclick='openModalShift(@json($staff))' 
                                                    class="px-2 py-1 bg-surface-container-high hover:bg-outline-variant rounded text-xs font-medium text-on-surface transition-colors">
                                                Atur Shift
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="p-6 text-center text-on-surface-variant text-sm">
                                            Tidak ada staff terdaftar untuk divisi {{ $department }}.
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Right Column (Span 4) -->
                    <div class="col-span-12 xl:col-span-4 flex flex-col gap-gutter">
                        <!-- Shift Coverage Heatmap -->
                        <div class="bg-surface rounded-xl border border-outline-variant p-md">
                            <h3 class="text-lg font-semibold text-on-surface mb-4">Cakupan Shift</h3>
                            <div class="space-y-3">
                                <div>
                                    <div class="flex justify-between text-xs mb-1">
                                        <span class="font-medium">Lunch Rush (11:00 - 14:00)</span>
                                        <span class="text-error font-medium">Kurang Personil</span>
                                    </div>
                                    <div class="w-full bg-surface-container-high rounded-full h-2">
                                        <div class="bg-error h-2 rounded-full" style="width: 60%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs mb-1">
                                        <span class="font-medium">Dinner Prep (15:00 - 17:00)</span>
                                        <span class="text-primary font-medium">Optimal</span>
                                    </div>
                                    <div class="w-full bg-surface-container-high rounded-full h-2">
                                        <div class="bg-primary h-2 rounded-full" style="width: 90%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="bg-surface rounded-xl border border-outline-variant p-md">
                            <h3 class="text-lg font-semibold text-on-surface mb-4">Tindakan Cepat</h3>
                            <div class="grid grid-cols-2 gap-3">
                                <button class="p-3 border border-outline-variant rounded-lg hover:border-primary text-left">
                                    <span class="material-symbols-outlined text-primary mb-2">how_to_reg</span>
                                    <div class="text-xs font-medium">Setujui Gaji</div>
                                    <div class="text-[10px] text-on-surface-variant mt-1">3 Pending</div>
                                </button>
                                <button class="p-3 border border-outline-variant rounded-lg hover:border-primary text-left">
                                    <span class="material-symbols-outlined text-primary mb-2">timer_off</span>
                                    <div class="text-xs font-medium">Koreksi Jam Kerja</div>
                                    <div class="text-[10px] text-on-surface-variant mt-1">1 Request</div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

<!-- Modal Tambah Staff -->
<div id="modalTambahStaff" class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4">
    <div class="bg-surface rounded-xl border border-outline-variant w-full max-w-md overflow-hidden shadow-xl">
        <div class="p-md border-b border-outline-variant flex justify-between items-center">
            <h3 class="font-bold text-lg text-on-surface">Tambah Staff Baru</h3>
            <button onclick="toggleModal('modalTambahStaff')" class="text-on-surface-variant hover:text-on-surface">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form action="{{ route('admin.staff.store') }}" method="POST" class="p-md space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-medium mb-1 text-on-surface">Nama Lengkap</label>
                <input type="text" name="name" required class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-md text-sm outline-none focus:border-primary" placeholder="Masukkan nama staff">
            </div>
            <div>
                <label class="block text-xs font-medium mb-1 text-on-surface">Email</label>
                <input type="email" name="email" required class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-md text-sm outline-none focus:border-primary" placeholder="email@domain.com">
            </div>
            <div>
                <label class="block text-xs font-medium mb-1 text-on-surface">Password</label>
                <input type="password" name="password" required class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-md text-sm outline-none focus:border-primary" placeholder="••••••••">
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-medium mb-1 text-on-surface">Divisi / Departemen</label>
                    <select name="department" required class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-md text-sm outline-none focus:border-primary">
                        <option value="BOH">BOH (Kitchen)</option>
                        <option value="FOH">FOH (Service/Kasir)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium mb-1 text-on-surface">Jabatan / Role</label>
                    <input type="text" name="role" required class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-md text-sm outline-none focus:border-primary" placeholder="Chef, Waiter, dll">
                </div>
            </div>
            <div class="pt-2 flex justify-end gap-2">
                <button type="button" onclick="toggleModal('modalTambahStaff')" class="px-4 py-2 border border-outline-variant rounded-lg text-xs font-medium text-on-surface hover:bg-surface-container-low">Batal</button>
                <button type="submit" class="px-4 py-2 bg-primary-container text-on-primary-container rounded-lg text-xs font-medium hover:bg-opacity-90">Simpan Staff</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Atur Shift Staff -->
<div id="modalShiftStaff" class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4">
    <div class="bg-surface rounded-xl border border-outline-variant w-full max-w-lg overflow-hidden shadow-xl">
        <div class="p-md border-b border-outline-variant flex justify-between items-center">
            <h3 class="font-bold text-lg text-on-surface">Atur Jadwal Shift - <span id="shiftStaffName" class="text-primary"></span></h3>
            <button onclick="toggleModal('modalShiftStaff')" class="text-on-surface-variant hover:text-on-surface">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form id="formAturShift" method="POST" action="" class="p-md space-y-3">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-medium mb-1 text-on-surface">Senin</label>
                    <input type="text" name="shift_senin" id="shift_senin" class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-md text-sm outline-none focus:border-primary" placeholder="contoh: 09:00 - 17:00 / Libur">
                </div>
                <div>
                    <label class="block text-xs font-medium mb-1 text-on-surface">Selasa</label>
                    <input type="text" name="shift_selasa" id="shift_selasa" class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-md text-sm outline-none focus:border-primary" placeholder="contoh: 09:00 - 17:00 / Libur">
                </div>
                <div>
                    <label class="block text-xs font-medium mb-1 text-on-surface">Rabu</label>
                    <input type="text" name="shift_rabu" id="shift_rabu" class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-md text-sm outline-none focus:border-primary" placeholder="contoh: 09:00 - 17:00 / Libur">
                </div>
                <div>
                    <label class="block text-xs font-medium mb-1 text-on-surface">Kamis</label>
                    <input type="text" name="shift_kamis" id="shift_kamis" class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-md text-sm outline-none focus:border-primary" placeholder="contoh: 10:00 - 18:00 / Libur">
                </div>
                <div class="col-span-2">
                    <label class="block text-xs font-medium mb-1 text-on-surface">Jumat</label>
                    <input type="text" name="shift_jumat" id="shift_jumat" class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant rounded-md text-sm outline-none focus:border-primary" placeholder="contoh: 09:00 - 17:00 / Libur">
                </div>
            </div>

            <div class="pt-3 flex justify-end gap-2">
                <button type="button" onclick="toggleModal('modalShiftStaff')" class="px-4 py-2 border border-outline-variant rounded-lg text-xs font-medium text-on-surface hover:bg-surface-container-low">Batal</button>
                <button type="submit" class="px-4 py-2 bg-primary-container text-on-primary-container rounded-lg text-xs font-medium hover:bg-opacity-90">Simpan Shift</button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.toggle('hidden');
        }
    }

   function openModalShift(staff) {
    document.getElementById('shiftStaffName').innerText = staff.name;
    document.getElementById('shift_senin').value = staff.shift_senin || '';
    document.getElementById('shift_selasa').value = staff.shift_selasa || '';
    document.getElementById('shift_rabu').value = staff.shift_rabu || '';
    document.getElementById('shift_kamis').value = staff.shift_kamis || '';
    document.getElementById('shift_jumat').value = staff.shift_jumat || '';

    // Action URL
    let url = "{{ route('admin.staff.updateShift', ':id') }}";
    document.getElementById('formAturShift').action = url.replace(':id', staff.id);

    toggleModal('modalShiftStaff');
}
</script>
</body>
</html>