@extends('layouts.app')

@section('content')
<style>
    .struk-wrapper {
        max-width: 600px;
        margin: 50px auto;
        padding: 30px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        animation: fadeIn 0.7s ease-in-out;
        font-family: 'Arial', sans-serif;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .struk-header {
        text-align: center;
        border-bottom: 2px dashed #fb5849;
        margin-bottom: 20px;
        padding-bottom: 10px;
    }

    .struk-header h2 {
        color: #fb5849;
        margin: 0;
    }

    .struk-section {
        margin-bottom: 16px;
    }

    .struk-section strong {
        display: inline-block;
        width: 120px;
        color: #333;
    }

    .struk-menu {
        list-style: none;
        padding: 0;
        margin-top: 10px;
    }

    .struk-menu li {
        border-bottom: 1px dashed #ddd;
        padding: 6px 0;
        display: flex;
        justify-content: space-between;
        font-size: 15px;
    }

    .struk-total {
        text-align: right;
        font-size: 20px;
        font-weight: bold;
        margin-top: 20px;
        color: #fb5849;
    }

    .btn-back {
        display: block;
        margin: 30px auto 0;
        background-color: #fb5849;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        transition: background 0.3s;
        width: fit-content;
    }

    .btn-back:hover {
        background-color: #e44d3d;
    }
</style>

<div class="struk-wrapper">
    <div class="struk-header">
        <h2>Struk Booking</h2>
        <small>{{ now()->format('d M Y, H:i') }}</small>
    </div>

    <div class="struk-section"><strong>Nama:</strong> {{ $booking->user->name }}</div>
    <div class="struk-section"><strong>Meja:</strong> {{ $booking->table->name }}</div>
    <div class="struk-section"><strong>Mulai:</strong> {{ \Carbon\Carbon::parse($booking->start_time)->format('d M Y H:i') }}</div>
    <div class="struk-section"><strong>Selesai:</strong> {{ \Carbon\Carbon::parse($booking->end_time)->format('d M Y H:i') }}</div>

    <h4 style="margin-top: 30px; color: #fb5849;">Menu Dipesan:</h4>
    <ul class="struk-menu">
        @foreach ($booking->menus as $menu)
            @php
                $subtotal = $menu->harga * $menu->pivot->quantity;
            @endphp
            <li>
                <span>{{ $menu->nama }} x {{ $menu->pivot->quantity }}</span>
                <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
            </li>
        @endforeach
    </ul>

    <div class="struk-total">
        Total: Rp {{ number_format($booking->total_price, 0, ',', '.') }}
    </div>

    <a href="/" class="btn-back">← Kembali ke Beranda</a>

</div>
@endsection
