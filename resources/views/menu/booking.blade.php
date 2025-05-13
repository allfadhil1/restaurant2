@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Manajemen Booking Meja</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    @if($mode === 'index')
        <a href="{{ route('menu.booking.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Booking</a>

        <table class="w-full border mt-4">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2 text-left">Nama Pelanggan</th>
                    <th class="p-2 text-left">No Meja</th>
                    <th class="p-2 text-left">Waktu Booking</th>
                    <th class="p-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr class="border-t">
                    <td class="p-2">{{ $booking->customer_name }}</td>
                    <td class="p-2">{{ $booking->table_number }}</td>
                    <td class="p-2">{{ \Carbon\Carbon::parse($booking->booking_time)->format('d M Y H:i') }}</td>
                    <td class="p-2 space-x-2">
                        <a href="{{ route('menu.booking.edit', $booking->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                        <form action="{{ route('menu.booking.destroy', $booking->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h2 class="text-xl font-semibold mb-4">{{ $mode === 'create' ? 'Tambah' : 'Edit' }} Booking</h2>

        <form action="{{ $mode === 'create' ? route('menu.booking.store') : route('menu.booking.update', $booking->id) }}" method="POST" class="space-y-4">
            @csrf
            @if($mode === 'edit') @method('PUT') @endif

            <div>
                <label class="block font-medium">Nama Pelanggan</label>
                <input type="text" name="customer_name" class="w-full border rounded p-2" value="{{ old('customer_name', $booking->customer_name ?? '') }}" required>
            </div>

            <div>
                <label class="block font-medium">Nomor Meja</label>
                <input type="number" name="table_number" class="w-full border rounded p-2" value="{{ old('table_number', $booking->table_number ?? '') }}" required>
            </div>

            <div>
                <label class="block font-medium">Waktu Booking</label>
                <input type="datetime-local" name="booking_time" class="w-full border rounded p-2"
                       value="{{ old('booking_time', isset($booking->booking_time) ? \Carbon\Carbon::parse($booking->booking_time)->format('Y-m-d\TH:i') : '') }}" required>
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('menu.booking.index') }}" class="bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded">Batal</a>
            </div>
        </form>
    @endif
</div>
@endsection