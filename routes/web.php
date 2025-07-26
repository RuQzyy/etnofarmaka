<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\KeranjangController;

Route::get('/', function () {
    return view('landing');
});

 Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/tentang', function () {
    return view('tentang'); // pastikan kamu punya file resources/views/tentang.blade.php
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:pengguna'])->group(function () {
    Route::get('/pengguna/dashboard', [PenggunaController::class, 'index'])->name('pengguna.dashboard');
});

Route::post('/checkout', function(){
    return view('landing');
})->name('checkout.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function () {
    // Rute untuk menampilkan isi keranjang
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');

    // Rute untuk menambahkan item ke keranjang (gunakan method POST)
    Route::post('/keranjang/tambah', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');

    // Rute untuk memperbarui jumlah item (gunakan method PATCH/PUT)
    Route::patch('/keranjang/update/{id}', [KeranjangController::class, 'update'])->name('keranjang.update');
    
    // Rute untuk menghapus item dari keranjang (gunakan method DELETE)
    Route::delete('/keranjang/hapus/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');
});


Route::resource('obat', ObatController::class)->middleware('auth');
