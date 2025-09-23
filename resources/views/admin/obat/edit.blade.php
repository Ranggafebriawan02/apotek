@extends('layouts.admin')

@section('title', 'Edit Obat')

@section('content')
<div class="content flex-grow-1">
    <h2 class="fw-bold mb-4">@yield('title')</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.obat.update', $obat->id_obat) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama Obat</label>
                    <input type="text" name="nama" class="form-control"
                           value="{{ old('nama', $obat->nama) }}" required>
                </div>

                <div class="mb-3">
                    <label>Kategori</label>
                    <input type="text" name="kategori" class="form-control"
                           value="{{ old('kategori', $obat->kategori) }}">
                </div>

                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control"
                           value="{{ old('harga', $obat->harga) }}" required>
                </div>

                <div class="mb-3">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control"
                           value="{{ old('stok', $obat->stok) }}" required>
                </div>

                <div class="mb-3">
                    <label>Exp Date</label>
                    <input type="date" name="exp_date" class="form-control"
                           value="{{ old('exp_date', $obat->exp_date ? $obat->exp_date->format('Y-m-d') : '') }}">
                </div>

                <div class="mb-3">
                    <label>Supplier</label>
                    <select name="supplier_id" class="form-control" required>
                        <option value="">-- Pilih Supplier --</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id_supplier }}"
                                {{ old('supplier_id', $obat->supplier_id) == $supplier->id_supplier ? 'selected' : '' }}>
                                {{ $supplier->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('admin.obat.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
