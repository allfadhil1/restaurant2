<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\BookingController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get ("/",[HomeController::class,"index"]);
Route::resource('menu', MenuController::class)->except('show');
// route untuk user
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
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
// route untuk chef
Route::prefix('chef')->name('menu.chef.')->group(function () {
    Route::get('/', [ChefController::class, 'index'])->name('index');
    Route::get('/create', [ChefController::class, 'create'])->name('create');
    Route::post('/', [ChefController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [ChefController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ChefController::class, 'update'])->name('update');
    Route::delete('/{id}', [ChefController::class, 'destroy'])->name('destroy');
});
// route untuk booking
Route::prefix('booking')->name('menu.booking.')->group(function () {
    Route::get('/', [BookingController::class, 'index'])->name('index');
    Route::get('/create', [BookingController::class, 'create'])->name('create');
    Route::post('/', [BookingController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [BookingController::class, 'edit'])->name('edit');
    Route::put('/{id}', [BookingController::class, 'update'])->name('update');
    Route::delete('/{id}', [BookingController::class, 'destroy'])->name('destroy');
});