@extends('layouts.app')

@section('content')
    <!-- Top Header Bar -->
    <header class="h-16 border-b border-outline-variant bg-surface flex items-center justify-between px-6 flex-shrink-0">
        <h1 class="text-xl font-bold text-on-surface">Personalia &amp; Penggajian</h1>
        
        <div class="flex items-center gap-4">
            <span class="px-3 py-1 bg-primary text-white text-xs font-semibold rounded-full">Shift Aktif</span>
            <button type="button" class="p-2 text-on-surface-variant hover:text-on-surface">
                <span class="material-symbols-outlined">notifications</span>
            </button>
            <button type="button" class="p-2 text-on-surface-variant hover:text-on-surface">
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
        
        <!-- Session Flash Message -->
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-800 rounded-lg text-sm flex items-center gap-2 shadow-sm">
                <span class="material-symbols-outlined text-base">check_circle</span>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 p-3 bg-red-100 border border-red-300 text-red-800 rounded-lg text-sm shadow-sm">
                <strong class="font-bold">Gagal menyimpan data:</strong>
                <ul class="mt-1 list-disc list-inside text-xs">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Action Header -->
        <div class="flex justify-between items-end mb-lg">
            <div>
                <p class="text-sm text-on-surface-variant">Kelola jadwal, pantau performa, dan setujui penggajian.</p>
            </div>
            <div class="flex gap-3">
                <button type="button" onclick="window.print()" class="px-4 py-2 border border-outline-variant rounded-lg text-on-surface text-xs font-medium hover:bg-surface-container-low flex items-center gap-2 transition-colors">
                    <span class="material-symbols-outlined text-sm">download</span> Ekspor
                </button>
                <button type="button" onclick="toggleModal('modalTambahStaff')" class="px-4 py-2 bg-primary-container text-on-primary-container rounded-lg text-xs font-medium hover:bg-opacity-90 flex items-center gap-2 transition-colors">
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
                            <a href="{{ route('admin.staff', array_merge(request()->query(), ['dept' => 'BOH'])) }}" 
                               class="px-3 py-1 rounded-md {{ ($department ?? 'BOH') == 'BOH' ? 'bg-surface text-on-surface shadow-sm font-bold' : 'text-on-surface-variant' }}">
                                BOH ({{ $bohCount ?? 0 }})
                            </a>
                            <a href="{{ route('admin.staff', array_merge(request()->query(), ['dept' => 'FOH'])) }}" 
                               class="px-3 py-1 rounded-md {{ ($department ?? '') == 'FOH' ? 'bg-surface text-on-surface shadow-sm font-bold' : 'text-on-surface-variant' }}">
                                FOH ({{ $fohCount ?? 0 }})
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
                                        <div class="flex items-center justify-center gap-1">
                                            <button type="button" onclick='openModalShift(@json($staff))' 
                                                    class="px-2 py-1 bg-surface-container-high hover:bg-outline-variant rounded text-xs font-medium text-on-surface transition-colors">
                                                Atur Shift
                                            </button>

                                            <form action="{{ route('admin.staff.destroy', $staff->id) }}" 
                                                  method="POST" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus staff {{ $staff->name }}?');" 
                                                  class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        title="Hapus / Resign Staff"
                                                        class="p-1 bg-error/10 hover:bg-error/20 text-error rounded transition-colors flex items-center justify-center">
                                                    <span class="material-symbols-outlined text-[16px]">delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="p-6 text-center text-on-surface-variant text-sm">
                                        Tidak ada staff terdaftar untuk divisi {{ $department ?? 'BOH' }}.
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

                <!-- Fast Actions -->
                <div class="bg-surface rounded-xl border border-outline-variant p-md">
                    <h3 class="text-lg font-semibold text-on-surface mb-4">Tindakan Cepat</h3>
                    <div class="grid grid-cols-2 gap-3">
                        <button type="button" class="p-3 border border-outline-variant rounded-lg hover:border-primary text-left transition-colors">
                            <span class="material-symbols-outlined text-primary mb-2">how_to_reg</span>
                            <div class="text-xs font-medium">Setujui Gaji</div>
                            <div class="text-[10px] text-on-surface-variant mt-1">3 Pending</div>
                        </button>
                        <button type="button" class="p-3 border border-outline-variant rounded-lg hover:border-primary text-left transition-colors">
                            <span class="material-symbols-outlined text-primary mb-2">timer_off</span>
                            <div class="text-xs font-medium">Koreksi Jam Kerja</div>
                            <div class="text-[10px] text-on-surface-variant mt-1">1 Request</div>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Modal Tambah Staff -->
    <div id="modalTambahStaff" class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-surface rounded-xl border border-outline-variant w-full max-w-md overflow-hidden shadow-xl">
            <div class="p-md border-b border-outline-variant flex justify-between items-center">
                <h3 class="font-bold text-lg text-on-surface">Tambah Staff Baru</h3>
                <button type="button" onclick="toggleModal('modalTambahStaff')" class="text-on-surface-variant hover:text-on-surface">
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
                <button type="button" onclick="toggleModal('modalShiftStaff')" class="text-on-surface-variant hover:text-on-surface">
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
@endsection

@push('scripts')
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

            let url = "{{ route('admin.staff.updateShift', ':id') }}";
            document.getElementById('formAturShift').action = url.replace(':id', staff.id);

            toggleModal('modalShiftStaff');
        }
    </script>
@endpush