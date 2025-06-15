@extends('layouts.app')

@section('content')
    <main class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-md">
        <h3 class="text-2xl font-semibold mb-6 text-[#fb5849]">
            {{ isset($menu) ? 'Edit' : 'Tambah' }} Menu
        </h3>

        @if ($errors->any())
            <div class="mb-6 p-4 bg-[#ffe8e5] text-[#fb5849] border-l-4 border-[#fb5849] rounded-lg shadow-sm">
                <ul class="list-disc pl-5 space-y-1 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($menu) ? route('menu.update', $menu) : route('menu.store') }}" method="POST"
            enctype="multipart/form-data" class="space-y-5">
            @csrf
            @if(isset($menu))
                @method('PUT')
            @endif

            <div>
                <label class="block text-sm font-medium mb-1">Nama Menu</label>
                <input type="text" name="nama" value="{{ old('nama', $menu->nama ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#fb5849]"
                    required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Harga</label>
                <input type="number" name="harga" value="{{ old('harga', $menu->harga ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#fb5849]"
                    required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Deskripsi</label>
                <textarea name="deskripsi"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#fb5849]"
                    rows="4">{{ old('deskripsi', $menu->deskripsi ?? '') }}</textarea>
            </div>

            <div>
                <label for="category_id">Kategori:</label>
                <select name="category_id" id="category_id"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#fb5849]"
                    required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $menu->category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Gambar (Opsional)</label>
                <input type="file" name="gambar" class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                                   file:rounded-lg file:border-0
                                   file:bg-[#fb5849] file:text-white
                                   hover:file:bg-[#e04d40] transition cursor-pointer" />
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-[#fb5849] text-white px-5 py-2 rounded-lg hover:bg-[#e04d40] transition">
                    Simpan
                </button>
            </div>
        </form>
    </main>
@endsection