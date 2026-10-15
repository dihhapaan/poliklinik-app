@extends('layouts.app')

@section('content')
<div class="p-6 max-w-xl">
    <h1 class="text-2xl font-bold text-slate-800 mb-6">Tambah Obat</h1>

    <form action="{{ route('obat.store') }}" method="POST" class="bg-white rounded-xl shadow p-6 space-y-4">
        @csrf

        <div>
            <label for="nama_obat" class="block text-sm font-medium text-slate-700 mb-1">Nama Obat</label>
            <input type="text" id="nama_obat" name="nama_obat" value="{{ old('nama_obat') }}"
                class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm">
            @error('nama_obat') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="kemasan" class="block text-sm font-medium text-slate-700 mb-1">Kemasan</label>
            <input type="text" id="kemasan" name="kemasan" value="{{ old('kemasan') }}"
                placeholder="contoh: Strip 10 tablet"
                class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm">
            @error('kemasan') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="harga" class="block text-sm font-medium text-slate-700 mb-1">Harga (Rp)</label>
            <input type="number" id="harga" name="harga" value="{{ old('harga') }}" min="0"
                class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm">
            @error('harga') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-2 pt-2">
            <button type="submit"
                class="px-4 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold">Simpan</button>
            <a href="{{ route('obat.index') }}"
                class="px-4 py-2 rounded-lg bg-slate-200 hover:bg-slate-300 text-slate-700 text-sm font-semibold">Batal</a>
        </div>
    </form>
</div>
@endsection