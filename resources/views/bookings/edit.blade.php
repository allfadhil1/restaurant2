<form action="{{ route('bookings.update', $booking->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Tanggal Booking -->
    <label for="start_time">Mulai:</label>
    <input type="datetime-local" name="start_time" value="{{ $booking->start_time }}" required>

    <label for="end_time">Selesai:</label>
    <input type="datetime-local" name="end_time" value="{{ $booking->end_time }}" required>

    <!-- Pilih Meja -->
    <label for="table_id">Meja:</label>
    <select name="table_id" required>
        @foreach($tables as $table)
            <option value="{{ $table->id }}" {{ $booking->table_id == $table->id ? 'selected' : '' }}>
                {{ $table->name }}
            </option>
        @endforeach
    </select>

    <!-- Pilih Menu -->
    <label>Menu:</label>
    @foreach($menus as $menu)
        <div>
            <label>{{ $menu->nama }} ({{ $menu->harga }})</label>
            <input type="number" name="menus[{{ $menu->id }}]" value="{{ $booking->menus->find($menu->id)?->pivot->quantity ?? 0 }}" min="0">
        </div>
    @endforeach

    <button type="submit">Update Booking</button>
</form>
