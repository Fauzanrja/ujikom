<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\GaleryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/petugas', [PetugasController::class, 'index']);            // Mendapatkan daftar petugas
    Route::post('/petugas', [PetugasController::class, 'store']);           // Menambah petugas baru
    Route::put('/petugas/{id}', [PetugasController::class, 'update']);      // Memperbarui data petugas
    Route::delete('/petugas/{id}', [PetugasController::class, 'destroy']);  // Menghapus petugas
});

// Daftar rute untuk kategori
Route::middleware('auth:api')->group(function () {
    Route::get('/kategori', [KategoriController::class, 'index']); // Mendapatkan daftar kategori
    Route::post('/kategori', [KategoriController::class, 'store']); // Menambah kategori
    Route::put('/kategori/{id}', [KategoriController::class, 'update']); // Mengupdate kategori
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']); // Menghapus kategori
});

Route::get('api/galery', [GaleryController::class, 'apiIndex']);
Route::get('api/galery/{id}', [GaleryController::class, 'apiShow']);
Route::post('api/galery', [GaleryController::class, 'apiStore']);
Route::put('api/galery/{id}', [GaleryController::class, 'apiUpdate']);
Route::delete('api/galery/{id}', [GaleryController::class, 'apiDestroy']);


Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
