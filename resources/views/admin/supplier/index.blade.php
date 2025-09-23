@extends('layouts.admin')


@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Data Supplier</h2>
    <a href="{{ route('admin.supplier.create') }}" class="btn btn-primary">Tambah Supplier</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kontak</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($suppliers as $s)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $s->nama }}</td>
            <td>{{ $s->kontak }}</td>
            <td>{{ $s->alamat }}</td>
            <td>
                <a href="{{ route('admin.supplier.edit', $s->id_supplier) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.supplier.destroy', $s->id_supplier) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus supplier ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
