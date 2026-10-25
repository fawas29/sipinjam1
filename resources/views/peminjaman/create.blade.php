@extends('layouts.app')
@section('title', 'Pinjam Alat')
@section('content')
<h3 class="mb-3">Pinjam Alat</h3>
<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf
            @foreach($alatTersedia as $alat)
            <div class="row mb-3 align-items-center">
                <div class="col-md-6">
                    <strong>{{ $alat->name }}</strong> (Stok: {{ $alat->stock }})
                </div>
                <div class="col-md-6">
                    <input type="number" name="items[{{ $alat->id }}]" class="form-control" min="0" max="{{ $alat->stock }}" value="0" placeholder="Jumlah">
                </div>
            </div>
            @endforeach
            <div class="row">

                <div class="col-md-8 mb-3">
                    <label for="due_date" class="form-label">Tanggal
                        Kembali</label>
                    <input type="date" id="due_date" name="due_date"
                        value="{{ old('due_date', now()->addDays(3)->toDateString()) }}"
                        class="form-control @error('due_date') is-invalid
@enderror">
                    @error('due_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="notes" class="form-label">Keperluan</label>
                <input type="text" id="notes" name="notes" value="{{ old('notes')
}}" class="form-control"
                    placeholder="Contoh: Praktikum Elektronika Dasar">
            </div>
            <button type="submit" class="btn btn-primary">Ajukan
                Peminjaman</button>
            <a href="{{ route('peminjaman.index') }}" class="btn btnsecondary">Batal</a>
        </form>
    </div>
</div>
@endsection