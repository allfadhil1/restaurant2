<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;

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