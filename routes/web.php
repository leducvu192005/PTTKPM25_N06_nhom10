<?php

use Illuminate\Support\Facades\Route;

// Trang mặc định
Route::get('/', function () {
    return view('welcome');
});

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
