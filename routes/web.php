<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
// Nếu có ListingController và AuthController thì import luôn:
// use App\Http\Controllers\ListingController;
// use App\Http\Controllers\AuthController;

// ------------------------------------
// 1. ROUTES AUTHENTICATION (Đăng nhập/Đăng ký/Đăng xuất)
// ------------------------------------
Route::middleware('guest')->group(function () {
    // Đăng ký
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    // Đăng nhập
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

// Đăng xuất (luôn cần đăng nhập)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout')
    ->middleware('auth');


// ------------------------------------
// 2. ROUTES DÀNH CHO NGƯỜI THUÊ (Public)
// ------------------------------------
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/rooms/{id}', [HomeController::class, 'show'])->name('rooms.show'); // Chi tiết phòng


// ------------------------------------
// 3. ROUTES DÀNH CHO USER ĐĂNG PHÒNG (Cần đăng nhập)
// ------------------------------------
Route::middleware(['auth'])->group(function () {
    // Danh sách phòng trọ đã đăng của User
    Route::get('/my-rooms', [RoomController::class, 'index'])->name('rooms.index'); 
    
    // CRUD phòng trọ (trừ index/show)
    Route::resource('rooms', RoomController::class)->except(['index', 'show']); 
});


// ------------------------------------
// 4. ROUTES DÀNH CHO ADMIN (Cần đăng nhập + Admin)
// ------------------------------------
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/pending-rooms', [AdminController::class, 'pendingRooms'])->name('pending.rooms');
    Route::post('/approve/{id}', [AdminController::class, 'approveRoom'])->name('approve');
    Route::delete('/reject/{id}', [AdminController::class, 'rejectRoom'])->name('reject');
    // Thêm các route quản lý user, v.v. tại đây
});

// Nếu bạn thực sự có ListingController và AuthController thì mở 2 cái dưới:
// Route::resource('listings', ListingController::class);
// Route::post('/login',[AuthController::class,'login'])->name('login.post');
