@extends('layouts.app')

<style>
    .tab-btn {
        background-color: #fff;
        color: #fb5849;
        border: 2px solid #fb5849;
        padding: 8px 16px;
        border-radius: 6px;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .tab-btn:hover,
    .tab-btn.active {
        background-color: #fb5849;
        color: white;
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

    .menu-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background-color: white;
        border: 1px solid rgba(251, 88, 73, 0.3);
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.04);
        overflow: hidden;
        transition: all 0.3s ease;
        min-height: 460px;
    }

    .menu-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .tab-btn-group {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 24px;
    }

    .content-container {
        margin: 20px;
    }
</style>

<nav class="admin-navbar">
    <div class="container-navbar">
        <ul class="nav-links">
            <li><a href="{{ route('menu.index') }}" class="active-manual">Menu</a></li>
            <li><a href="{{ route('chef.index') }}">Chef</a></li>
            <li><a href="{{ route('bookings.index') }}">Booking</a></li>
        </ul>
    </div>
</nav>

@section('content')
<main class="content-container">

    @auth
        @if (Auth::user()->usertype == 1)
            <a href="{{ route('menu.create') }}"
                class="bg-[#fb5849] text-white px-5 py-2 rounded-lg mb-6 inline-block hover:bg-[#e04d40] transition">
                + Tambah Menu
            </a>
        @endif
    @endauth

    @if(session('success'))
        <div class="mb-4 p-4 bg-[#ffe8e5] text-[#fb5849] border-l-4 border-[#fb5849] rounded-lg shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="tab-btn-group">
        <a href="{{ route('menu.index') }}" class="tab-btn {{ request('category') == '' ? 'active' : '' }}">
            Semua
        </a>
        @foreach($categories as $cat)
            <a href="{{ route('menu.index', ['category' => $cat->id]) }}"
                class="tab-btn {{ request('category') == $cat->id ? 'active' : '' }}">
                {{ $cat->name }}
            </a>
        @endforeach
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($menus as $menu)
            <div class="menu-card">
                @if($menu->gambar)
                    <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama }}" class="w-full h-48 object-cover">
                @endif

                <div class="p-4 flex flex-col justify-between h-full">
                    <div>
                        <h5 class="text-xl font-semibold text-[#fb5849] mb-2">{{ $menu->nama }}</h5>

                        @if($menu->category)
                            <p class="text-sm text-gray-500 mb-2">
                                Kategori: {{ $menu->category->name ?? '-' }}
                            </p>
                        @endif

                        <p class="text-lg font-bold text-[#fb5849] mb-2">
                            Rp {{ number_format($menu->harga, 0, ',', '.') }}
                        </p>

                        <p class="text-gray-600 text-sm mb-4">
                            {{ \Illuminate\Support\Str::words($menu->deskripsi, 40, '...') }}
                        </p>
                    </div>

                    @if(Auth::user()->usertype == 1)
                        <div class="flex justify-between items-center">
                            <a href="{{ route('menu.edit', $menu) }}"
                                class="bg-[#fb5849] text-white px-4 py-2 rounded-lg hover:bg-[#e04d40] transition">
                                Edit
                            </a>
                            <form action="{{ route('menu.destroy', $menu) }}" method="POST"
                                onsubmit="return confirm('Hapus menu ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('bookings.create') }}"
                            class="bg-[#fb5849] text-white mt-2 px-4 py-2 rounded-lg hover:bg-[#e04d40] transition text-center">
                            Make a Reservation
                        </a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</main>
@endsection
