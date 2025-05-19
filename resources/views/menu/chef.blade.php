@extends('layouts.app')

<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.admin-navbar {
    background-color: #fb5849;
    padding: 15px 0;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 50;
}

.container-navbar {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
}

.nav-links {
    list-style: none;
    display: flex;
    gap: 20px;
    margin: 0;
}

.nav-links li a {
    color: white;
    font-weight: 500;
    text-decoration: none;
    padding: 8px 12px;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.nav-links li a:hover {
    background-color: #e04d40;
}

.nav-links li a.active-manual {
    background-color: #ffffff;
    color: #fb5849;
    font-weight: bold;
    border-radius: 8px;
    box-shadow: 0 0 0 2px #ffffff, 0 0 0 4px #fb5849;
    padding: 10px 15px;
}

main {
    margin: 20px auto;
    max-width: 900px;
}

.content-container {
    margin: 20px;
}

.btn-action {
    display: inline-block;
    padding: 8px 16px;
    font-size: 0.875rem;
    border-radius: 6px;
    min-width: 100px;
    text-align: center;
    transition: background-color 0.3s ease;
    white-space: nowrap;
}
.btn-action {
    display: inline-flex;       /* flex supaya bisa center alignment */
    align-items: center;
    justify-content: center;
    padding: 8px 16px;
    font-size: 0.875rem;
    border-radius: 6px;
    min-width: 100px;           /* pastikan minimal lebar sama */
    text-align: center;
    transition: background-color 0.3s ease;
    white-space: nowrap;
    height: 36px;               /* pastikan tinggi tombol konsisten */
    line-height: 1;             /* agar vertikal center */
}

</style>

<nav class="admin-navbar">
    <div class="container-navbar">
        <ul class="nav-links">
            <li><a href="{{ route('menu.index') }}">Menu</a></li>
            <li><a href="{{ route('menu.chef.index') }}" class="active-manual">Lihat Chef</a></li>
            <li><a href="{{ route('menu.booking.index') }}">Booking Meja</a></li>
        </ul>
    </div>
</nav>

@section('content')
<main class="content-container">
    @if($mode === 'index')
        <a href="{{ route('menu.chef.create') }}" class="bg-[#fb5849] text-white px-5 py-2 rounded-lg mb-6 inline-block hover:bg-[#e04d40] transition">
            + Tambah Chef
        </a>

        @if(session('success'))
            <div class="mb-4 p-4 bg-[#ffe8e5] text-[#fb5849] border-l-4 border-[#fb5849] rounded-lg shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full bg-white text-black rounded-lg shadow-md overflow-hidden">
                <thead class="bg-[#fb5849] text-white">
                    <tr>
                        <th class="p-3 text-left">Nama</th>
                        <th class="p-3 text-left">Spesialis</th>
                        <th class="p-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($chefs as $chef)
                    <tr class="border-t border-gray-200">
                        <td class="p-3">{{ $chef->name }}</td>
                        <td class="p-3">{{ $chef->specialty }}</td>
                        <td class="p-3">
                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('menu.chef.edit', $chef->id) }}" class="btn-action bg-yellow-400 text-white hover:bg-yellow-500">
    Edit
</a>
<form action="{{ route('menu.chef.destroy', $chef->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn-action bg-red-500 text-white hover:bg-red-600">
        Hapus
    </button>
</form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center p-4 text-gray-600">Belum ada data chef.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @else
        <h2 class="text-xl font-semibold mb-4 text-[#fb5849]">{{ $mode === 'create' ? 'Tambah' : 'Edit' }} Chef</h2>

        @if(session('success'))
            <div class="mb-4 p-4 bg-[#ffe8e5] text-[#fb5849] border-l-4 border-[#fb5849] rounded-lg shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ $mode === 'create' ? route('menu.chef.store') : route('menu.chef.update', $chef->id) }}" method="POST"
            class="space-y-4 bg-white p-6 rounded-lg shadow-lg text-black border border-gray-200">
            @csrf
            @if($mode === 'edit') @method('PUT') @endif

            <div>
                <label class="block font-medium mb-1">Nama</label>
                <input type="text" name="name" class="w-full border border-gray-300 rounded p-2 placeholder-gray-400 focus:ring-2 focus:ring-[#fb5849]"
                    value="{{ old('name', $chef->name ?? '') }}" required placeholder="Nama Chef">
            </div>

            <div>
                <label class="block font-medium mb-1">Spesialis</label>
                <input type="text" name="specialty" class="w-full border border-gray-300 rounded p-2 placeholder-gray-400 focus:ring-2 focus:ring-[#fb5849]"
                    value="{{ old('specialty', $chef->specialty ?? '') }}" required placeholder="Masakan Spesialis">
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-[#fb5849] text-white px-5 py-2 rounded-lg hover:bg-[#e04d40] transition">Simpan</button>
                <a href="{{ route('menu.chef.index') }}" class="bg-gray-200 text-[#fb5849] px-5 py-2 rounded-lg hover:bg-gray-300 transition">Batal</a>
            </div>
        </form>
    @endif
</main>
@endsection
