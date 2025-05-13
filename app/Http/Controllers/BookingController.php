<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('menu.booking', [
            'bookings' => $bookings,
            'mode' => 'index'
        ]);
    }

    public function create()
    {
        return view('menu.booking', [
            'mode' => 'create',
            'booking' => null
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'table_number' => 'required|integer',
            'booking_time' => 'required|date',
        ]);

        Booking::create($request->all());

        return redirect()->route('menu.booking.index')->with('success', 'Booking berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('menu.booking', [
            'mode' => 'edit',
            'booking' => $booking
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'table_number' => 'required|integer',
            'booking_time' => 'required|date',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($request->all());

        return redirect()->route('menu.booking.index')->with('success', 'Booking berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('menu.booking.index')->with('success', 'Booking berhasil dihapus.');
    }
}