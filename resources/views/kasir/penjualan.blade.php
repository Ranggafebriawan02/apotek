@extends('layouts.kasir')

@section('title', 'Penjualan')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Halaman Penjualan Kasir</h5>
        </div>
        <div class="card-body">
            <p>Ini adalah halaman untuk transaksi penjualan. 💊</p>

            {{-- Tombol tambah transaksi --}}
            <a href="{{ route('kasir.penjualan.create') }}" class="btn btn-success mb-3">
                <i class="bi bi-plus-circle"></i> Tambah Penjualan
            </a>

            {{-- Tabel daftar penjualan --}}
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Pelanggan</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Contoh dummy data --}}
                        <tr>
                            <td>1</td>
                            <td>2025-09-19</td>
                            <td>Budi Santoso</td>
                            <td>Rp 150.000</td>
                            <td>
                                <a href="{{ route('kasir.struk.cetak', 1) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-printer"></i> Cetak
                                </a>
                                <a href="#" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        {{-- Nanti looping data penjualan di sini --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
