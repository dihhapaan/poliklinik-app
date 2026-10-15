@extends('layouts.app')

@section('content')
<div class="p-6 max-w-xl">
    <h1 class="text-2xl font-bold text-slate-800 mb-6">Tambah Jadwal Periksa</h1>

    <form action="{{ route('jadwal-periksa.store') }}" method="POST" class="bg-white rounded-xl shadow p-6 space-y-4">
        @csrf

        <div>
            <label for="hari" class="block text-sm font-medium text-slate-700 mb-1">Hari</label>
            <select id="hari" name="hari" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm">
                <option value="">-- Pilih Hari --</option>
                @foreach ($hariList as $hari)
                    <option value="{{ $hari }}" @selected(old('hari') === $hari)>{{ $hari }}</option>
                @endforeach
            </select>
            @error('hari') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="jam_mulai" class="block text-sm font-medium text-slate-700 mb-1">Jam Mulai</label>
            <input type="time" id="jam_mulai" name="jam_mulai" value="{{ old('jam_mulai') }}"
                class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm">
            @error('jam_mulai') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="jam_selesai" class="block text-sm font-medium text-slate-700 mb-1">Jam Selesai</label>
            <input type="time" id="jam_selesai" name="jam_selesai" value="{{ old('jam_selesai') }}"
                class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm">
            @error('jam_selesai') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-2 pt-2">
            <button type="submit"
                class="px-4 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold">Simpan</button>
            <a href="{{ route('jadwal-periksa.index') }}"
                class="px-4 py-2 rounded-lg bg-slate-200 hover:bg-slate-300 text-slate-700 text-sm font-semibold">Batal</a>
        </div>
    </form>
</div>
@endsection