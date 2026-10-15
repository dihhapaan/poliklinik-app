@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-slate-800">Jadwal Periksa</h1>
        <a href="{{ route('jadwal-periksa.create') }}"
            class="px-4 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold">
            <i class="fas fa-plus mr-1"></i> Tambah Jadwal
        </a>
    </div>

    <x-partials.alert />

    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-100 text-slate-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Hari</th>
                    <th class="px-4 py-3 text-left">Jam Mulai</th>
                    <th class="px-4 py-3 text-left">Jam Selesai</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
                @forelse ($jadwals as $jadwal)
                    <tr>
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $jadwal->hari }}</td>
                        <td class="px-4 py-3">{{ substr($jadwal->jam_mulai, 0, 5) }}</td>
                        <td class="px-4 py-3">{{ substr($jadwal->jam_selesai, 0, 5) }}</td>
                        <td class="px-4 py-3">
                            @if ($jadwal->status)
                                <span class="px-2 py-1 rounded-md bg-green-100 text-green-700 text-xs font-semibold">Aktif</span>
                            @else
                                <span class="px-2 py-1 rounded-md bg-slate-200 text-slate-600 text-xs font-semibold">Tidak Aktif</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('jadwal-periksa.edit', $jadwal) }}"
                                    class="px-3 py-1 rounded bg-amber-500 hover:bg-amber-600 text-white text-xs font-semibold">
                                    Edit
                                </a>
                                <form action="{{ route('jadwal-periksa.destroy', $jadwal) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 rounded bg-red-500 hover:bg-red-600 text-white text-xs font-semibold">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-slate-500">Belum ada jadwal periksa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection