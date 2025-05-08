@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-8 p-6 bg-white rounded-xl shadow-md">
    <h3 class="text-2xl font-semibold mb-6">
        {{ isset($menu) ? 'Edit' : 'Tambah' }} Menu
    </h3>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-md">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($menu) ? route('menu.update', $menu) : route('menu.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-4">
        @csrf
        @if(isset($menu))
            @method('PUT')
        @endif

        <div>
            <label class="block text-sm font-medium mb-1">Nama Menu</label>
            <input type="text" name="nama" value="{{ old('nama', $menu->nama ?? '') }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Harga</label>
            <input type="number" name="harga" value="{{ old('harga', $menu->harga ?? '') }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                rows="4">{{ old('deskripsi', $menu->deskripsi ?? '') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Gambar (Opsional)</label>
            <input type="file" name="gambar"
                class="w-full file:border file:border-gray-300 file:px-3 file:py-2 file:rounded-lg file:bg-white file:text-gray-700">
        </div>

        <div>
            <button type="submit"
                class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
