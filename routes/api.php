<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhongTroController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/phong-tros', [PhongTroController::class, 'index']);
Route::get('/phong-tros/{id}', [PhongTroController::class, 'show']);
Route::post('/phong-tros', [PhongTroController::class, 'store']);
Route::put('/phongtro/{id}', [PhongTroController::class, 'apiUpdate']);
Route::delete('/phongtro/{id}', [PhongTroController::class, 'apiDestroy']);
