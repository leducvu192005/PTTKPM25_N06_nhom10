<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PhongTroController;

//routes
Route::resource('rooms', RoomController::class);
Route::resource('users', UserController::class);
Route::resource('bookings', BookingController::class);
Route::resource('phongtro', PhongTroController::class);


// Trang login
Route::get('/', function () {
    return view('auth.login');
});

// Trang register
Route::get('/register', function () {
    return view('auth.register');
});

