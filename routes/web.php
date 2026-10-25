<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoanController; 
use App\Models\pemasok;// Tambahan: Import LoanController untuk fitur Peminjaman

// Route latihan Hari 1 (Dibiarkan tetap ada sesuai instruksi modul)
Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/halamandepan', function () {
    return view('halamandepan');
});

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/profil', function () {
    return view('profil', [
        'nama' => 'Budi Santoso',
        'nim' => '224100001',
        'kelas' => 'TI-2A',
        'prodi' => 'Teknik Informatika',
        'kampus' => 'Politeknik Manufaktur Bandung',
        'hobi' => 'Futsal',
        'alamat' => 'Pondok Pekayon Indah',
    ]);
})->name('profil');

Route::get('/latihan-blade', function () {
    return view('latihan-blade', [
        'nilai' => 60,
        'hobi' => ['Membaca', 'Bermain futsal', 'Ngoding'],
        'kosong' => [],
        'catatan' => '<b>Teks ini tebal</b>',
    ]);
})->name('latihan-blade');


// Hanya untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/daftar', [AuthController::class, 'showRegister'])->name('daftar');
    Route::post('/daftar', [AuthController::class, 'register']);
});

// Wajib login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Khusus admin
    Route::middleware('admin')->group(function () {
        Route::resource('kategori', CategoryController::class)->except('show');
        Route::resource('alat', ItemController::class)->except(['index', 'show']);
        
        // Tambahan: Rute khusus admin untuk memproses pengembalian alat
        Route::patch('/peminjaman/{peminjaman}/kembali', [LoanController::class, 'kembalikan'])->name('peminjaman.kembali');
    });
    
    // Semua yang sudah login (Admin dan Mahasiswa): melihat daftar alat dan meminjam
    Route::get('/alat', [ItemController::class, 'index'])->name('alat.index');
    
    // Tambahan: Rute untuk melihat riwayat peminjaman dan membuat form pinjam
    Route::resource('peminjaman', LoanController::class)->only(['index', 'create', 'store']);
});

