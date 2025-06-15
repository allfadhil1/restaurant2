<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Menu;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BookingController extends Controller
{

    use AuthorizesRequests;
    public function index()
    {
        if (auth()->user()->usertype == 1) {
            // Admin: lihat semua booking
            $bookings = Booking::with(['table', 'menus', 'user'])->get();
        } else {
            // User biasa: lihat hanya booking miliknya
            $bookings = Booking::with(['table', 'menus'])
                ->where('user_id', auth()->id())
                ->get();
        }

        return view('bookings.index', compact('bookings'));
    }
    public function create()
    {
        $menus = Menu::all();
        $tables = Table::all();
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

    public function edit(Booking $booking)
    {
        // Cek apakah booking ini milik user yang sedang login
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Kamu tidak punya izin untuk mengedit data ini.');
        }

        $tables = Table::all();
        $menus = Menu::all();

        return view('bookings.edit', compact('booking', 'tables', 'menus'));
    }

    public function update(Request $request, Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Kamu tidak punya izin untuk mengedit data ini.');
        }

        $request->validate([
            'table_id' => 'required|exists:tables,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        // Hitung total harga dari menu yang dipesan
        $totalPrice = 0;
        $booking->menus()->detach(); // reset dulu

        if ($request->has('menus')) {
            foreach ($request->menus as $menu_id => $qty) {
                if ($qty > 0) {
                    $menu = Menu::find($menu_id);
                    $totalPrice += $menu->harga * $qty;

                    $booking->menus()->attach($menu_id, ['quantity' => $qty]);
                }
            }
        }

        // Update data booking
        $booking->update([
            'table_id' => $request->table_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'notes' => $request->notes,
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil diperbarui.');
    }

    public function destroy(Booking $booking)
    {
        // Pastikan hanya user yang memiliki booking yang bisa menghapus
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Kamu tidak punya izin untuk menghapus booking ini.');
        }

        // Hapus relasi menu dulu jika pakai pivot
        $booking->menus()->detach();

        // Hapus booking
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil dihapus.');
    }

}
