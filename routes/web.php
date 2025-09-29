<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;




// Trang login
Route::get('/', function () {
    return view('auth.login');
});

// Trang register
Route::get('/register', function () {
    return view('auth.register');
});

