<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return response()->json([
        'message' => 'Backend tìm phòng trọ hoạt động!'
    ]);
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/test-controller', [RoomController::class, 'test']);
//routes
Route::resource('rooms', RoomController::class);
Route::resource('users', UserController::class);
Route::resource('bookings', BookingController::class);

