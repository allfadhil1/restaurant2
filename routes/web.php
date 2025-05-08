<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get ("/",[HomeController::class,"index"]);
Route::resource('menu', MenuController::class)->except('show');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
