<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
//admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/rooms', [AdminController::class, 'allRooms'])->name('rooms.index');
    Route::post('/rooms/{id}/approve', [AdminController::class, 'approve'])->name('rooms.approve');
    Route::post('/rooms/{id}/reject', [AdminController::class, 'reject'])->name('rooms.reject');
    Route::delete('/rooms/{id}', [AdminController::class, 'destroy'])->name('rooms.destroy');

    // Thêm tạm route cho users và categories
    Route::get('/users', function () {
        return view('admin.users.index');
    })->name('users.index');

    Route::get('/categories', function () {
        return view('admin.categories.index');
    })->name('categories.index');
});

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

Route::post('/login',[AuthController::class,'login'])->name('login.post');