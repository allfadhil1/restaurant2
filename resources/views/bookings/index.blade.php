@extends('layouts.app')

<style>
    .struk-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        padding: 20px;
    }

    .receipt-container {
        width: 48%;
        background: #fff;
        padding: 25px 30px;
        border-radius: 15px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        font-family: 'Segoe UI', sans-serif;
        box-sizing: border-box;
        transition: background-color 0.3s ease;
    }

    .receipt-container:hover {
        background-color: #fff5f3;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .receipt-container {
            width: 100%;
        }
    }

    .receipt-header {
        text-align: center;
        margin-bottom: 15px;
    }

    .receipt-header h2 {
        color: #fb5849;
        margin-bottom: 5px;
    }

    .receipt-header p {
        font-size: 0.9rem;
        color: #666;
    }

    .divider {
        border-top: 2px dashed #fb5849;
        margin: 20px 0;
    }

    .receipt-info {
        margin-bottom: 10px;
    }

    .receipt-info strong {
        width: 100px;
        display: inline-block;
        color: #333;
    }

    .menu-title {
        margin-top: 20px;
        color: #fb5849;
        font-weight: bold;
    }

    .menu-item {
        display: flex;
        justify-content: space-between;
        margin: 5px 0;
        font-size: 0.95rem;
    }

    .menu-item span:first-child {
        color: #333;
    }

    .total {
        margin-top: 15px;
        text-align: right;
        font-weight: bold;
        font-size: 1.1rem;
        color: #fb5849;
        border-top: 1px dashed #ccc;
        padding-top: 10px;
    }

    .action-btns {
        margin-top: 20px;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .edit-btn,
    .delete-btn {
        padding: 8px 16px;
        font-size: 0.85rem;
        border-radius: 6px;
        text-decoration: none;
        color: white;
        text-align: center;
        border: none;
        min-width: 90px;
    }

    .edit-btn {
        background-color: #fb5849;
    }

    .edit-btn:hover {
        background-color: #e04d40;
    }

    .delete-btn {
        background-color: #dc3545;
    }

    .delete-btn:hover {
        background-color: #c82333;
    }

    form {
        display: inline;
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

    .edit-btn,
.delete-btn {
    padding: 8px 16px;
    font-size: 0.85rem;
    border-radius: 6px;
    color: white;
    border: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 38px; /* Tambahan agar fix ukurannya */
    min-width: 90px;
    box-sizing: border-box;
    text-align: center;
    text-decoration: none;
    font-weight: 500;
}

</style>

<nav class="admin-navbar">
    <div class="container-navbar">
        <ul class="nav-links">
            <li><a href="{{ route('menu.index') }}">Menu</a></li>
            <li><a href="{{ route('chef.index') }}">Chef</a></li>
            <li><a href="{{ route('bookings.index') }}" class="active-manual">Booking</a></li>
        </ul>
    </div>
</nav>

@section('content')
<div class="struk-wrapper">
    @foreach($bookings as $booking)
        <div class="receipt-container">
            <div class="receipt-header">
                <h2>Struk Booking</h2>
                <p>{{ $booking->created_at->format('d M Y, H:i') }}</p>
            </div>

            <div class="divider"></div>

            <div class="receipt-info"><strong>Nama:</strong> {{ $booking->user->name ?? 'Tidak diketahui' }}</div>
            <div class="receipt-info"><strong>Meja:</strong> {{ $booking->table->name ?? '-' }}</div>
            <div class="receipt-info"><strong>Mulai:</strong> {{ \Carbon\Carbon::parse($booking->start_time)->format('d M Y H:i') }}</div>
            <div class="receipt-info"><strong>Selesai:</strong> {{ \Carbon\Carbon::parse($booking->end_time)->format('d M Y H:i') }}</div>

            <div class="menu-title">Menu Dipesan:</div>
            @if($booking->menus->isEmpty())
                <p>-</p>
            @else
                @foreach($booking->menus as $menu)
                    <div class="menu-item">
                        <span>{{ $menu->nama }} x {{ $menu->pivot->quantity }}</span>
                        @if($loop->first)
                            <span>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</span>
                        @endif
                    </div>
                @endforeach
            @endif

            <div class="total">Total: Rp {{ number_format($booking->total_price, 0, ',', '.') }}</div>

            <div class="action-btns">
                <a href="{{ route('bookings.edit', $booking->id) }}" class="edit-btn">Edit</a>
                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus booking ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn">Hapus</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
