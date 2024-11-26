<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\WelcomeController;


Route::get('/', [WelcomeController::class, 'index']);

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');

// Route untuk program keahlian
Route::get('/jurusan/pplg', function () {
    return view('jurusan.pplg');
})->name('jurusan.pplg');

Route::get('/jurusan/tjkt', function () {
    return view('jurusan.tjkt');
})->name('jurusan.tjkt');

Route::get('/jurusan/to', function () {
    return view('jurusan.to');
})->name('jurusan.to');

Route::get('/jurusan/tp', function () {
    return view('jurusan.tp');
})->name('jurusan.tp');


// Route untuk menampilkan halaman login dan memproses login
Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');

// Route untuk halaman dashboard admin dengan middleware auth untuk petugas
Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard')
    ->middleware('auth:petugas');

    Route::prefix('admin')->group(function () {
        Route::resource('petugas', PetugasController::class);
        Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.index');
        Route::get('/petugas/create', [PetugasController::class, 'create'])->name('petugas.create');
        Route::post('/petugas', [PetugasController::class, 'store'])->name('petugas.store');
        Route::get('/petugas/{id}', [PetugasController::class, 'show'])->name('petugas.show');
        Route::get('/petugas/{id}/edit', [PetugasController::class, 'edit'])->name('petugas.edit');
        Route::put('/petugas/{id}', [PetugasController::class, 'update'])->name('petugas.update');
        Route::delete('/petugas/{id}', [PetugasController::class, 'destroy'])->name('petugas.destroy');
    });


// Grup route dengan prefix 'admin'
Route::middleware(['auth:petugas'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
    Route::resource('profile', ProfileController::class);
    Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/admin/profile/{id}/toggle-status', [ProfileController::class, 'toggleStatus'])->name('profile.toggleStatus');

});


Route::prefix('admin')->group(function () {
    // Rute untuk manajemen kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('admin.kategori.store');
    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
    Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('admin.kategori.update');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');
});

// Rute dengan middleware dan prefix admin
Route::middleware(['auth:petugas'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('posts', PostController::class);
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');    
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::patch('/posts/{id}/toggleStatus', [PostController::class, 'toggleStatus'])->name('posts.toggleStatus');

});


Route::prefix('admin')->group(function() {
    Route::resource('galery', GaleryController::class);
    Route::get('galery', [GaleryController::class, 'index'])->name('galery.index');
    Route::get('galery/create', [GaleryController::class, 'create'])->name('galery.create');
    Route::post('/galery/store', [GaleryController::class, 'store'])->name('galery.store');
    Route::get('galery/{id}/edit', [GaleryController::class, 'edit'])->name('galery.edit');
    Route::put('galery/{id}', [GaleryController::class, 'update'])->name('galery.update');
    Route::delete('galery/{id}', [GaleryController::class, 'destroy'])->name('galery.destroy');
    Route::patch('/galery/{id}/status', [GaleryController::class, 'toggleStatus'])->name('galery.toggleStatus');
});


Route::middleware(['auth:petugas'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('foto', FotoController::class);
    Route::delete('/foto/{foto}', [FotoController::class, 'destroy'])->name('foto.destroy');


});

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Add these routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('storage/{path}', function($path) {
    $file = storage_path('app/public/' . $path);
    if (file_exists($file)) {
        return response()->file($file, [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers' => 'Content-Type, Authorization'
        ]);
    }
    return abort(404);
})->where('path', '.*');