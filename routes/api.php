<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\LoanController;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    
    // 1. RUTE PUBLIK (Bisa diakses siapa saja tanpa token)
    Route::get('/halo', function () {
        return ['pesan' => 'Halo dari API SiPinjam', 'waktu' => now()->toDateTimeString()];
    })->name('halo');
    
    Route::get('/profil', function () {
        return ['nama' => 'Nama Anda', 'nim' => 'NIM', 'kelas' => 'Kelas', 'hobi' => ['Hobi 1']];
    });
    
    Route::get('/tambah/{a}/{b}', function ($a, $b) {
        return ['a' => $a, 'b' => $b, 'hasil' => $a + $b];
    });

    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/kategori', [CategoryController::class, 'index'])->name('kategori.index');
    Route::get('/alat', [ItemController::class, 'index'])->name('alat.index');
    Route::get('/alat/{alat}', [ItemController::class, 'show'])->name('alat.show');

    // 2. RUTE TERKUNCI (Wajib membawa Token dari login)
    Route::middleware('auth:sanctum')->group(function () {
        
        Route::get('/me', [AuthController::class, 'me'])->name('me');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        
        Route::get('/peminjaman', [LoanController::class, 'index'])->name('peminjaman.index');
        Route::post('/peminjaman', [LoanController::class, 'store'])->name('peminjaman.store');

        // 3. RUTE KHUSUS ADMIN (Hanya token milik akun admin yang bisa akses)
        Route::middleware('admin')->group(function () {
            Route::apiResource('alat', ItemController::class)->except(['index', 'show']);
        });

    });
});