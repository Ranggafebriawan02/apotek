@extends('layouts.admin')


@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Supplier</h2>

    <form action="{{ route('admin.supplier.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Supplier</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kontak</label>
            <input type="text" name="kontak" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.supplier.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
