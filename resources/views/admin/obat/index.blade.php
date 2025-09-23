@extends('layouts.admin')

@section('title', 'Obat')

@section('content')
<div class="content flex-grow-1">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">@yield('title')</h2>
        <a href="{{ route('admin.obat.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Obat
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Exp Date</th>
                        <th>Supplier</th> {{-- tambahan --}}
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($obats as $index => $obat)
                    <tr>
                        <td class="text-center">{{ $index + $obats->firstItem() }}</td>
                        <td>{{ $obat->nama }}</td>
                        <td>{{ $obat->kategori }}</td>
                        <td>{{ $obat->stok }}</td>
                        <td>Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                        <td>{{ $obat->exp_date ? \Carbon\Carbon::parse($obat->exp_date)->format('d-m-Y') : '-' }}</td>
                        <td>{{ $obat->supplier?->nama ?? '-' }}</td> {{-- relasi supplier --}}
                        <td class="text-center">
                            <a href="{{ route('admin.obat.edit', $obat->id_obat) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.obat.destroy', $obat->id_obat) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus obat ini?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">Belum ada data obat</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $obats->links() }}
        </div>
    </div>
</div>
@endsection
