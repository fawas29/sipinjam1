@extends('layout.dashboard') {{-- Sesuaikan jika nama layout Anda berbeda --}}

@section('content')
<div class="container mt-4">
    <h2>Daftar Kategori</h2>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Jumlah Alat</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategori as $kat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kat->name }}</td>
                    <td>{{ $kat->description }}</td>
                    {{-- Menggunakan $kategori->items_count sesuai petunjuk modul --}}
                    <td>{{ $kat->items_count }} alat</td> 
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Data kategori belum tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection