<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;

// Trang mặc định
Route::get('/', function () {
    return view('welcome');
});


Route::get('/test-controller', [RoomController::class, 'test']);
//routes
Route::resource('rooms', RoomController::class);
Route::resource('users', UserController::class);
Route::resource('bookings', BookingController::class);


Route::get('/test', function () {
    return "Test URL";
});



// Trang login
Route::get('/login', function () {
    return view('auth.login');
});

// Trang register
Route::get('/register', function () {
    return view('auth.register');
});

