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
        z-index: 999;
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
        padding: 0;
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

    .content-container {
        margin: 20px auto;
        max-width: 1100px;
        padding: 0 15px;
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 16px;
        font-size: 0.875rem;
        border-radius: 6px;
        min-width: 100px;
        text-align: center;
        transition: background-color 0.3s ease;
        white-space: nowrap;
        height: 36px;
        line-height: 1;
    }
</style>

<nav class="admin-navbar">
    <div class="container-navbar">
        <ul class="nav-links">
            <li><a href="{{ route('menu.index') }}" class="">Menu</a></li>
            <li><a href="{{ route('chef.index') }}" class="">Chef</a></li>
            <li><a href="{{ route('bookings.index') }}" class="active-manual">Booking</a></li>
        </ul>
    </div>
</nav>

@section('content')
    @if (Auth::user()->usertype == 1)
        <h1>Daftar Booking</h1>
    @else
        <h1>My Reservation</h1>
    @endif

    @if($bookings->isEmpty())
        <p>Tidak ada data booking.</p>
    @else
        <table class="table-auto w-full border-collapse">
            @if (Auth::user()->usertype == 1)
                <a href="{{ route('bookings.create') }}"
                    class="bg-[#fb5849] text-white px-5 py-2 rounded-lg mb-6 inline-block hover:bg-[#e04d40] transition">
                    + Booking
                </a>
            @endif
            <thead>
                <tr>
                    @if(Auth::user()->usertype == 1)
                        <th class="border px-4 py-2">User</th>
                    @endif
                    <th class="border px-4 py-2">Mulai Booking</th>
                    <th class="border px-4 py-2">Selesai Booking</th>
                    <th class="border px-4 py-2">Meja</th>
                    <th class="border px-4 py-2">Harga</th>
                    <th class="border px-4 py-2">Menu</th>
                    <th class="border px-4 py-2">Edit</th>
                    <th class="border px-4 py-2">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        @if(Auth::user()->usertype == 1)
                            <td class="border px-4 py-2">{{ $booking->user->name ?? 'Tidak diketahui' }}</td>
                        @endif
                        <td class="border px-4 py-2">
                            {{ \Carbon\Carbon::parse($booking->start_time)->translatedFormat('l, d F Y \p\u\k\u\l H:i') }}
                        </td>
                        <td class="border px-4 py-2">
                            {{ \Carbon\Carbon::parse($booking->end_time)->translatedFormat('l, d F Y \p\u\k\u\l H:i') }}
                        </td>
                        <td class="border px-4 py-2">{{ $booking->table->name ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $booking->total_price }}</td>
                        <td class="border px-4 py-2">
                            @if($booking->menus->isEmpty())
                                -
                            @else
                                @foreach($booking->menus as $menu)
                                    {{ $menu->nama }} ({{ $menu->pivot->quantity }}){{ !$loop->last ? ',' : '' }}
                                @endforeach
                            @endif
                        </td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('bookings.edit', $booking->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        </td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus booking ini?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline ml-2">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection