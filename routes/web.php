<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RoomsController;
//rooms
Route::resource('rooms', RoomsController::class);

// Trang chủ -> gọi home trong ListingController
Route::get('/', [ListingController::class, 'home'])->name('home');

// Listings CRUD
Route::resource('listings', ListingController::class);
// Auth pages
Route::get('/login', fn () => view('auth.login'))->name('login');
Route::get('/register', fn () => view('auth.register'))->name('register');
Route::get('/forgot-password', fn () => view('auth.forgot-password'))->name('password.request');
