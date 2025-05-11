@extends('layouts.app')

<style>
body {
    margin: 0; /* Hapus margin dari body agar tidak ada margin default */
    font-family: Arial, sans-serif; /* Pilih font yang lebih nyaman dibaca */
}

.admin-navbar {
    background-color: #fb5849;
    padding: 15px 0; /* Mengurangi padding atas dan bawah agar lebih rapat */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 50;
}

.container-navbar {
    display: flex;
    align-items: center;
    justify-content: center; /* Pusatkan navbar */
    width: 100%; /* Pastikan navbar memenuhi lebar layar */
}

.logo-img {
    height: 40px;
    width: auto;
    margin: 0; /* Menghapus margin di sekitar logo */
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
    padding: 10px 15px; /* Padding ekstra agar lebih menonjol */
}

main {
    margin: 20px; /* Memberikan margin pada seluruh konten utama */
}

.content-container {
    margin: 20px; /* Margin pada kontainer utama konten */
}
</style>

<!-- ***** Header Area End ***** -->

<nav class="admin-navbar">
    <div class="container-navbar">
        <!-- Menu -->
        <ul class="nav-links">
            <li><a href="/admin/home">Home Admin</a></li>
            <li><a href="/admin/menu" class="active-manual">Menu</a></li>
            <li><a href="/admin/chef">Chef</a></li>
            <li><a href="/admin/booking">Booking Meja</a></li>
        </ul>
    </div>
</nav>



@section('content')
<main class="content-container">
    <a href="{{ route('menu.create') }}" class="bg-[#fb5849] text-white px-5 py-2 rounded-lg mb-6 inline-block hover:bg-[#e04d40] transition">
        + Tambah Menu
    </a>

    @if(session('success'))
        <div class="mb-4 p-4 bg-[#ffe8e5] text-[#fb5849] border-l-4 border-[#fb5849] rounded-lg shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($menus as $menu)
            <div class="bg-white border border-[#fb5849]/30 rounded-lg shadow-lg overflow-hidden">
                <!-- Gambar -->
                @if($menu->gambar)
                    <img src="{{ asset('storage/'.$menu->gambar) }}" alt="{{ $menu->nama }}" class="w-full h-48 object-cover">
                @endif

                <div class="p-4">
                    <!-- Nama Menu -->
                    <h5 class="text-xl font-semibold text-[#fb5849] mb-2">{{ $menu->nama }}</h5>

                    <!-- Harga -->
                    <p class="text-lg font-bold text-[#fb5849] mb-2">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>

                    <!-- Deskripsi -->
                    <p class="text-gray-600 text-sm mb-4">{{ $menu->deskripsi }}</p>

                    <div class="flex justify-between items-center">
                        <!-- Tombol Edit -->
                        <a href="{{ route('menu.edit', $menu) }}" class="bg-[#fb5849] text-white px-4 py-2 rounded-lg hover:bg-[#e04d40] transition">
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
</main>
@endsection
