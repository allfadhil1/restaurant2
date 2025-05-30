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
        display: inline-flex;
        /* flex supaya bisa center alignment */
        align-items: center;
        justify-content: center;
        padding: 8px 16px;
        font-size: 0.875rem;
        border-radius: 6px;
        min-width: 100px;
        /* pastikan minimal lebar sama */
        text-align: center;
        transition: background-color 0.3s ease;
        white-space: nowrap;
        height: 36px;
        /* pastikan tinggi tombol konsisten */
        line-height: 1;
        /* agar vertikal center */
    }
</style>

<nav class="admin-navbar">
    <div class="container-navbar">
        <ul class="nav-links">
            <li><a href="{{ route('menu.index') }}">Menu</a></li>
            <li><a href="{{ route('chef.index') }}" class="active-manual">Chef</a></li>
            <li><a href="{{ route('bookings.create') }}">Booking</a></li>
            <li><a href="{{ route('bookings.show', $booking->id) }}">Lihat</a></li>
        </ul>
    </div>
</nav>

@section('content')
<main class="content-container">
    <a href="{{ route('chef.create') }}" class="bg-[#fb5849] text-white px-5 py-2 rounded-lg mb-6 inline-block hover:bg-[#e04d40] transition">
        + Tambah chef
    </a>

    @if(session('success'))
        <div class="mb-4 p-4 bg-[#ffe8e5] text-[#fb5849] border-l-4 border-[#fb5849] rounded-lg shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($chefs as $chef)
            <div class="bg-white border border-[#fb5849]/30 rounded-lg shadow-lg overflow-hidden">

                <div class="p-4">
                    <h5 class="text-xl font-semibold text-[#fb5849] mb-2">{{ $chef->name }}</h5>

                    <!-- Deskripsi -->
                    <p class="text-gray-600 text-sm mb-4">{{ $chef->specialty }}</p>

                    <div class="flex justify-between items-center">
                        <!-- Tombol Edit -->
                        <a href="{{ route('chef.edit', $chef) }}" class="bg-[#fb5849] text-white px-4 py-2 rounded-lg hover:bg-[#e04d40] transition">
                            Edit
                        </a>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('chef.destroy', $chef) }}" method="POST" onsubmit="return confirm('Hapus chef ini?');">
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