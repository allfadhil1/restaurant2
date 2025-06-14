<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\BookingController;
use App\Models\Chef;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    $chefs = Chef::all();
    return view('home', compact('chefs'));
});
Route::get('/', [HomeController::class, 'index']);

Route::get('/chefs', [HomeController::class, 'chefs'])->name('chefs');

Route::get("/", [HomeController::class, "index"]);
Route::resource('menu', MenuController::class)->except('show');
// route untuk user
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
// route untuk admin
Route::middleware(['auth:sanctum', 'verified', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});


Route::resource('chef', ChefController::class)->except('show');
Route::resource('booking', BookingController::class)->except('show');
Route::middleware(['auth'])->group(function () {
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
    Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
});

//Reservasi yang di home
Route::middleware(['auth'])->group(function () {
    Route::get('/reservasi', [ReservationController::class, 'index'])->name('reservations.index');
    Route::post('/reservasi', [ReservationController::class, 'store'])->name('reservations.store');
});

Route::resource('category', CategoryController::class);