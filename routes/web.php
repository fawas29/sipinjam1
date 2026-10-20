<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Item;
use App\Models\Loan;


Route::get('/alat', function () {
    $alat = Item::with('category')->orderBy('name')->get();
    
    return view('alat', ['alat' => $alat]);
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'jumlahAlat'     => Item::count(),
        'jumlahKategori' => Category::count(),
        'sedangDipinjam' => Loan::where('status', 'dipinjam')->count(),
    ]);
});

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






// Route untuk Halaman Login
Route::get('/login', function () {
    return view('auth.login');
});

// Route untuk Halaman Daftar
Route::get('/daftar', function () {
    return view('auth.daftar');});