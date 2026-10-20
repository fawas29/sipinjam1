<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
 return view('homepage');
})->name('homepage');
    
    
    Route::get('/halamandepan', function () {
 return view('halamandepan');
});

Route::get('/dashboard', function () {
 return view('dashboard');
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


Route::get('/alat', function () {
 $alat = [
 ['kode' => 'ALT-0001', 'nama' => 'Multimeter Digital', 'kategori' => 'Alat
Ukur', 'stok' => 5],
 ['kode' => 'ALT-0002', 'nama' => 'Osiloskop', 'kategori' => 'Alat
Ukur', 'stok' => 0],
 ['kode' => 'ALT-0003', 'nama' => 'Solder 40 Watt', 'kategori' => 'Alat
Solder', 'stok' => 8],
 ['kode' => 'ALT-0004', 'nama' => 'Arduino Uno', 'kategori' =>
'Mikrokontroler', 'stok' => 12],
 ['kode' => 'ALT-0005', 'nama' => 'Tang Potong', 'kategori' =>
'Perkakas', 'stok' => 3],
 ['kode' => 'ALT-0005', 'nama' => 'Besi', 'kategori' =>
'Bahan', 'stok' => 0],
 ['kode' => 'ALT-0005', 'nama' => 'Obeng', 'kategori' =>
'Perkakas', 'stok' => 2],
 ];
 return view('alat', ['alat' => $alat]);
})->name('alat');




// Route untuk Halaman Login
Route::get('/login', function () {
    return view('auth.login');
});

// Route untuk Halaman Daftar
Route::get('/daftar', function () {
    return view('auth.daftar');});