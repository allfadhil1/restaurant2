<style>
    .edit-booking-form {
        max-width: 600px;
        margin: 30px auto;
        padding: 30px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        font-family: 'Segoe UI', sans-serif;
    }

    .edit-booking-form h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #fb5849;
    }

    .edit-booking-form label {
        display: block;
        margin-bottom: 5px;
        color: #333;
        font-weight: 500;
        margin-top: 15px;
    }

    .edit-booking-form input[type="datetime-local"],
    .edit-booking-form select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-sizing: border-box;
        font-size: 0.95rem;
        margin-bottom: 10px;
    }

    .menu-group {
        margin-top: 10px;
    }

    .menu-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        padding: 8px 12px;
        background-color: #f9f9f9;
        border-radius: 6px;
        border: 1px solid #eee;
    }

    .menu-item .menu-label {
        flex: 1;
        font-size: 0.95rem;
        color: #333;
    }

    .menu-item input[type="number"] {
        width: 60px;
        padding: 6px;
        border-radius: 6px;
        border: 1px solid #ccc;
        margin-left: 15px;
        text-align: center;
    }

    .edit-booking-form button {
        margin-top: 20px;
        width: 100%;
        padding: 12px;
        background-color: #fb5849;
        color: white;
        font-size: 1rem;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .edit-booking-form button:hover {
        background-color: #e04d40;
    }
</style>

<form class="edit-booking-form" action="{{ route('bookings.update', $booking->id) }}" method="POST">
    @csrf
    @method('PUT')

    <h2>Edit Booking</h2>

    <!-- Waktu -->
    <label for="start_time">Waktu Mulai</label>
    <input type="datetime-local" name="start_time" value="{{ \Carbon\Carbon::parse($booking->start_time)->format('Y-m-d\TH:i') }}" required>

    <label for="end_time">Waktu Selesai</label>
    <input type="datetime-local" name="end_time" value="{{ \Carbon\Carbon::parse($booking->end_time)->format('Y-m-d\TH:i') }}" required>

    <!-- Meja -->
    <label for="table_id">Pilih Meja</label>
    <select name="table_id" required>
        @foreach($tables as $table)
            <option value="{{ $table->id }}" {{ $booking->table_id == $table->id ? 'selected' : '' }}>
                {{ $table->name }}
            </option>
        @endforeach
    </select>

    <!-- Menu -->
    <label>Menu Dipesan</label>
    <div class="menu-group">
        @foreach($menus as $menu)
            <div class="menu-item">
                <div class="menu-label">{{ $menu->nama }} (Rp {{ number_format($menu->harga, 0, ',', '.') }})</div>
                <input type="number" name="menus[{{ $menu->id }}]" value="{{ $booking->menus->find($menu->id)?->pivot->quantity ?? 0 }}" min="0">
            </div>
        @endforeach
    </div>

    <button type="submit">Update Booking</button>
</form>
