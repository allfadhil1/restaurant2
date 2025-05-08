@extends('layouts.app')

@section('content')
    <a href="{{ route('menu.create') }}" class="bg-green-600 text-white px-5 py-2 rounded-lg mb-6 inline-block hover:bg-green-700 transition">
        + Tambah Menu
    </a>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($menus as $menu)
            <div class="bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden">
                <!-- Gambar -->
                @if($menu->gambar)
                    <img src="{{ asset('storage/'.$menu->gambar) }}" alt="{{ $menu->nama }}" class="w-full h-48 object-cover">
                @endif

                <div class="p-4">
                    <!-- Nama Menu -->
                    <h5 class="text-xl font-semibold text-gray-800 mb-2">{{ $menu->nama }}</h5>

                    <!-- Harga -->
                    <p class="text-lg font-bold text-green-600 mb-2">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>

                    <!-- Deskripsi -->
                    <p class="text-gray-600 text-sm mb-4">{{ $menu->deskripsi }}</p>

                    <div class="flex justify-between items-center">
                        <!-- Tombol Edit -->
                        <a href="{{ route('menu.edit', $menu) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                            Edit
                        </a>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('menu.destroy', $menu) }}" method="POST" onsubmit="return confirm('Hapus menu ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
