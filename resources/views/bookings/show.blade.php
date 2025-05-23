@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Struk Booking</h2>

        <p><strong>Nama:</strong> {{ $booking->user->name }}</p>
        <p><strong>Meja:</strong> {{ $booking->table->name }}</p>
        <p><strong>Mulai:</strong> {{ $booking->start_time }}</p>
        <p><strong>Selesai:</strong> {{ $booking->end_time }}</p>

        <h4>Menu Dipesan:</h4>
        <ul>
            @foreach ($booking->menus as $menu)
                <li>
                    {{ $menu->nama }}
                    @php
                        $subtotal = $menu->harga * $menu->pivot->quantity;
                    @endphp
                    {{ $menu->name }} (Rp {{ number_format($menu->harga) }})
                    x {{ $menu->pivot->quantity }} =
                    Rp {{ number_format($subtotal) }}
                </li>
            @endforeach
        </ul>

        <h3>Total: Rp {{ number_format($booking->total_price) }}</h3>
    </div>
@endsection