<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminRoomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SavedPostController;
// Nếu có ListingController và AuthController thì import luôn:
// use App\Http\Controllers\ListingController;


// ------------------------------------
// 1. ROUTES AUTHENTICATION (Đăng nhập/Đăng ký/Đăng xuất)
// ------------------------------------
Route::middleware('guest')->group(function () {
    // Đăng ký
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    // Đăng nhập
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

// Đăng xuất (luôn cần đăng nhập)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout')
    ->middleware('auth');


// ------------------------------------
// 2. ROUTES DÀNH CHO NGƯỜI THUÊ (Public)
// ------------------------------------
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/rooms/{id}', [HomeController::class, 'show'])
->whereNumber('id')
->name('rooms.show'); // Chi tiết phòng


// ------------------------------------
// 3. ROUTES DÀNH CHO USER ĐĂNG PHÒNG (Cần đăng nhập)
// ------------------------------------
Route::middleware(['auth'])->group(function () {
    // Danh sách phòng trọ đã đăng của User
    Route::get('/my-rooms', [RoomController::class, 'index'])
        ->name('rooms.index');    
    
    // CRUD phòng trọ (trừ index/show)
    Route::resource('rooms', RoomController::class)->except(['index', 'show']); 

    // Xem và sửa profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // 🔐 Đổi mật khẩu
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])
        ->name('profile.changePassword');
    // lưu tin và tin đã lưu 
       Route::get('/saved', [SavedPostController::class, 'index'])->name('saved.index');        // Xem tin đã lưu
    Route::post('/saved/{roomId}', [SavedPostController::class, 'store'])->name('saved.store'); // Lưu tin
    Route::delete('/saved/{roomId}', [SavedPostController::class, 'destroy'])->name('saved.destroy'); // Bỏ lưu
   
});


// ------------------------------------
// 4. ROUTES DÀNH CHO ADMIN (Cần đăng nhập + Admin)
// ------------------------------------
Route::middleware(['auth', 'is_admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

        // Quản lý phòng
        Route::get('/rooms', [AdminController::class, 'allRooms'])->name('rooms.index');
        
        // Quản lý người dùng
        Route::delete('/rooms/{id}', [AdminController::class, 'destroy'])->name('rooms.destroy');

        // Quản lý danh mục
        Route::view('/categories', 'admin.categories.index')->name('categories.index');
    });
Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/rooms', [AdminRoomController::class, 'index'])->name('admin.rooms.index');
    Route::put('/rooms/{id}/approve', [AdminRoomController::class, 'approve'])->name('admin.rooms.approve');
    Route::put('/rooms/{id}/reject', [AdminRoomController::class, 'reject'])->name('admin.rooms.reject');
    Route::delete('/rooms/{id}', [AdminRoomController::class, 'destroy'])->name('admin.rooms.destroy');
    Route::get('/rooms/{id}', [AdminRoomController::class, 'show'])->name('admin.rooms.show');
    Route::get('/users', [AdminRoomController::class, 'users'])->name('admin.users.index');
    Route::delete('/users/{id}', [AdminRoomController::class, 'deleteUser'])->name('admin.users.destroy');
});
// Nếu bạn thực sự có ListingController và AuthController thì mở 2 cái dưới:j
// Route::resource('listings', ListingController::class);
// Route::post('/login',[AuthController::class,'login'])->name('login.post');
/*Route::get('/home', function () {
    $listings = []; // tạm thời không có dữ liệu
    return view('home', compact('listings'));
});
*/
Route::resource('listings', ListingController::class);
// ------------------------------------
// 3.1. ROUTES HỒ SƠ KHÁCH HÀNG (Cần đăng nhập)
// ------------------------------------


//Route::view('/profile', 'profile.index')->middleware('auth')->name('profile');
// GIAO DIỆN ADMIN
// ========================
