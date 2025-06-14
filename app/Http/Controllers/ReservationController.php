<?php

// app/Http/Controllers/ReservationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Menu;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

    public function index()
    {
        $user = Auth::user(); // dapatkan user yang login
        $bookings = Booking::where('user_id', $user->id)->latest()->get(); // filter berdasarkan user_id

        return view('reservations.index', compact('bookings'));
    }

    public function create()
    {
        $tables = Table::all();
        $menus = Menu::all();
        return view('home', compact('tables', 'menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'table_id' => 'required|exists:tables,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'menus' => 'array',
        ]);

        $total = 0;
        $menus = collect($request->menus)->filter(fn($item) => $item['quantity'] > 0);
        foreach ($menus as $id => $data) {
            $menu = Menu::find($id);
            if ($menu) {
                $total += $menu->harga * $data['quantity'];
            }
        }

        $booking = Booking::create([
            'user_id' => auth()->id() ?? null,
            'table_id' => $request->table_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'total_price' => $total,
        ]);

        foreach ($menus as $id => $data) {
            $booking->menus()->attach($id, ['quantity' => $data['quantity']]);
        }

        return back()->with('success', 'Reservasi berhasil dibuat!');
    }
}
