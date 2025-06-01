<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Menu;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create()
    {
        $menus = Menu::all();
        $tables = Table::where('is_available', true)->get();
        return view('bookings.create', compact('menus', 'tables'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'table_id' => 'required|exists:tables,id',
            'menus' => 'required|array',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $totalPrice = 0;

        // Hitung total harga
        foreach ($request->menus as $menuId => $menuData) {
            $menu = Menu::find($menuId);
            $quantity = isset($menuData['quantity']) ? intval($menuData['quantity']) : 0;
            if ($quantity > 0) {
                $totalPrice += $menu->harga * $quantity;
            }
        }

        // Buat booking
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'table_id' => $request->table_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'total_price' => $totalPrice,
        ]);

        // Attach menu dengan quantity
        foreach ($request->menus as $menuId => $menuData) {
            $quantity = isset($menuData['quantity']) ? intval($menuData['quantity']) : 0;
            if ($quantity > 0) {
                $booking->menus()->attach($menuId, ['quantity' => $quantity]);
            }
        }
        
        $table = Table::find($request->table_id);
        $table->is_available = false;
        $table->save();

        return redirect()->route('bookings.show', $booking->id);
    }

    // Tampilkan struk booking
    public function show($id)
    {
        $booking = Booking::with(['user', 'table', 'menus'])->findOrFail($id);
        return view('bookings.show', compact('booking'));
    }
}
