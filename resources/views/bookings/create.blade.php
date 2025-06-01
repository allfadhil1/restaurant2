@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Form Booking</h2>

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf

        <div>
            <label for="table_id">Pilih Meja:</label>
            <select name="table_id" id="table_id" required>
                <option value="">-- Pilih Meja --</option>
                @foreach ($tables as $table)
                    @if($table->is_available == '1')
                        <option value="{{ $table->id }}">{{ $table->name }}</option>
                    @endif
                @endforeach
            </select>
            @error('table_id') <div class="text-red-500">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Menu:</label>
            @foreach ($menus as $menu)
                <div>
                    <label>
                        {{ $menu->nama }} (Rp {{ number_format($menu->harga, 0, ',', '.') }})
                        <input type="number" name="menus[{{ $menu->id }}][quantity]" value="0" min="0" />
                    </label>
                </div>
            @endforeach
            @error('menus') <div class="text-red-500">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="start_time">Mulai Booking:</label>
            <input type="datetime-local" name="start_time" id="start_time" required>
            @error('start_time') <div class="text-red-500">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="end_time">Selesai Booking:</label>
            <input type="datetime-local" name="end_time" id="end_time" required>
            @error('end_time') <div class="text-red-500">{{ $message }}</div> @enderror
        </div>

        <button type="submit">Booking</button>
    </form>
</div>
@endsection
