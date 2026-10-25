@extends('layouts.app')
@section('Dashboard SiPinjam', 'Dashboard')
@section('content')
<h3 class="mb-4">Dashboard</h3>
<div class="row g-3">
    <div class="col-md-4">
        <div class="card border-primary shadow-sm">
            <div class="card-body">
                <div class="text-muted">Jenis Alat</div>
                <div class="fs-2 fw-bold text-primary">{{ $jumlahAlat }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-success shadow-sm">
            <div class="card-body">
                <div class="text-muted">Kategori</div>
                <div class="fs-2 fw-bold text-success">{{ $jumlahKategori }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-warning shadow-sm">
            <div class="card-body">
                <div class="text-muted">Sedang Dipinjam</div>
                <div class="fs-2 fw-bold text-warning">{{ $sedangDipinjam }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-danger shadow-sm">
            <div class="card-body">
                <div class="text-muted">Pengembalian Terlambat</div>
                <div class="fs-2 fw-bold text-danger">6</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-danger text-white shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Peminjaman Terlambat</h5>
                <h3>{{ $terlambatCount }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="alert alert-info mt-4">
    Angka di atas masih contoh. Di Hari 3, angka ini diambil langsung dari
    database.
</div>
@endsection