<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
=======
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
>>>>>>> f70668e (Cập nhật code local)

// ------------------------------------
// 1. ROUTES AUTHENTICATION (Đăng nhập/Đăng ký/Đăng xuất)
// ------------------------------------
Route::middleware('guest')->group(function () {
    // Đăng ký
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

<<<<<<< HEAD
    // Đăng nhập
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

// Đăng xuất (luôn cần đăng nhập)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('auth');


// ------------------------------------
// 2. ROUTES DÀNH CHO NGƯỜI THUÊ (Public)
// ------------------------------------
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/rooms/{id}', [HomeController::class, 'show'])->name('rooms.show'); // Chi tiết phòng


// ------------------------------------
// 3. ROUTES DÀNH CHO USER ĐĂNG PHÒNG (Cần đăng nhập)
// ------------------------------------
Route::middleware(['auth'])->group(function () {
    // Index riêng: Danh sách phòng trọ đã đăng của User
    Route::get('/my-rooms', [RoomController::class, 'index'])->name('rooms.index'); 
    
    // CRUD phòng trọ (trừ index/show)
    Route::resource('rooms', RoomController::class)->except(['index', 'show']); 
});


// ------------------------------------
// 4. ROUTES DÀNH CHO ADMIN (Cần đăng nhập VÀ phải là Admin)
// ------------------------------------
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/pending-rooms', [AdminController::class, 'pendingRooms'])->name('pending.rooms');
    Route::post('/approve/{id}', [AdminController::class, 'approveRoom'])->name('approve');
    Route::delete('/reject/{id}', [AdminController::class, 'rejectRoom'])->name('reject');
    
    // Thêm các route quản lý user, v.v. tại đây
});
=======
// Listings CRUD
Route::resource('listings', ListingController::class);
// Auth pages
Route::get('/login', fn () => view('auth.login'))->name('login');
Route::get('/register', fn () => view('auth.register'))->name('register');
Route::get('/forgot-password', fn () => view('auth.forgot-password'))->name('password.request');

Route::post('/login',[AuthController::class,'login'])->name('login.post');
>>>>>>> f70668e (Cập nhật code local)
