<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Menu;
use Illuminate\Http\Request;

class BookingApiController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('table', 'menus')->where('user_id', auth()->id())->get();
        return response()->json($bookings);
    }

    public function store(Request $request)
    {
        $request->validate([
            'table_id' => 'required|exists:tables,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $totalPrice = 0;

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'table_id' => $request->table_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'notes' => $request->notes,
        ]);

        if ($request->has('menus')) {
            foreach ($request->menus as $menu_id => $qty) {
                if ($qty > 0) {
                    $menu = Menu::find($menu_id);
                    $totalPrice += $menu->harga * $qty;
                    $booking->menus()->attach($menu_id, ['quantity' => $qty]);
                }
            }
        }

        $booking->update(['total_price' => $totalPrice]);

        return response()->json($booking->load('menus', 'table'), 201);
    }

    public function show(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json($booking->load('menus', 'table'));
    }

    public function update(Request $request, Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $request->validate([
            'table_id' => 'required|exists:tables,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $booking->update([
            'table_id' => $request->table_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'notes' => $request->notes,
        ]);

        $booking->menus()->detach();
        $totalPrice = 0;

        if ($request->has('menus')) {
            foreach ($request->menus as $menu_id => $qty) {
                if ($qty > 0) {
                    $menu = Menu::find($menu_id);
                    $totalPrice += $menu->harga * $qty;
                    $booking->menus()->attach($menu_id, ['quantity' => $qty]);
                }
            }
        }

        $booking->update(['total_price' => $totalPrice]);

        return response()->json($booking->load('menus', 'table'));
    }

    public function destroy(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $booking->menus()->detach();
        $booking->delete();

        return response()->json(['message' => 'Booking deleted']);
    }
}

