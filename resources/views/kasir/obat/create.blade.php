@extends('layouts.kasir')

@section('title', 'Tambah Obat')

@section('content')
<div class="content flex-grow-1">
    <h2 class="fw-bold mb-4">@yield('title')</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('kasir.obat.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nama Obat</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                </div>
                <div class="mb-3">
                    <label>Kategori</label>
                    <input type="text" name="kategori" class="form-control" value="{{ old('kategori') }}">
                </div>
                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{ old('harga') }}" required>
                </div>
                <div class="mb-3">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" value="{{ old('stok') }}" required>
                </div>
                <div class="mb-3">
                    <label>Exp Date</label>
                    <input type="date" name="exp_date" class="form-control" value="{{ old('exp_date') }}">
                </div>
               

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('kasir.obat.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
