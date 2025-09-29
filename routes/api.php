<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::middleware('auth:sanctum')->group(function(){
    // User routes
    Route::get('/rooms',[RoomController::class,'index']);
    Route::get('/rooms/{id}',[RoomController::class,'show']);
    Route::post('/rooms',[RoomController::class,'store'])->middleware('role:user');
    Route::delete('/rooms/{id}',[RoomController::class,'destroy'])->middleware('role:user');

    // Admin routes
    Route::get('/admin/rooms',[AdminController::class,'allRooms'])->middleware('role:admin');
    Route::patch('/admin/rooms/{id}/approve',[AdminController::class,'approve'])->middleware('role:admin');
    Route::patch('/admin/rooms/{id}/reject',[AdminController::class,'reject'])->middleware('role:admin');
    Route::delete('/admin/rooms/{id}',[AdminController::class,'destroy'])->middleware('role:admin');
});