@extends('layouts.admin')


@section('content')
<div class="container">
    <h2 class="mb-4">Edit Supplier</h2>

    <form action="{{ route('admin.supplier.update', $supplier->id_supplier) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Supplier</label>
            <input type="text" name="nama" class="form-control" value="{{ $supplier->nama }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kontak</label>
            <input type="text" name="kontak" class="form-control" value="{{ $supplier->kontak }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3">{{ $supplier->alamat }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.supplier.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
