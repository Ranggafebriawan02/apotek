@extends('layouts.kasir')

@section('title', 'Dashboard')

@section('content')
<div class="content flex-grow-1">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">@yield('title')</h2>
            <small class="text-muted">Ringkasan aktivitas hari ini</small>
        </div>
        <div class="d-flex align-items-center">
            <span class="me-3">Halo, <strong>{{ Auth::user()->name ?? 'Guest' }}</strong></span>
            <span class="badge bg-gradient-primary me-3 text-uppercase">{{ Auth::user()->role ?? '-' }}</span>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger shadow-sm">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Statistik -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-lg h-100 hover-lift">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <span class="bg-primary text-white rounded-circle p-3 shadow">
                            <i class="bi bi-capsule fs-4"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Jumlah Obat</h6>
                        <h2 class="fw-bold text-primary mb-0">120</h2>
                        <small class="text-success"><i class="bi bi-arrow-up"></i> +12 hari ini</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-lg h-100 hover-lift">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <span class="bg-warning text-white rounded-circle p-3 shadow">
                            <i class="bi bi-exclamation-triangle fs-4"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Stok Menipis</h6>
                        <h2 class="fw-bold text-warning mb-0">8</h2>
                        <small class="text-danger"><i class="bi bi-exclamation-circle"></i> Segera restok</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-lg h-100 hover-lift">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <span class="bg-success text-white rounded-circle p-3 shadow">
                            <i class="bi bi-cash-stack fs-4"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Transaksi Hari Ini</h6>
                        <h2 class="fw-bold text-success mb-0">35</h2>
                        <small class="text-muted">Rp 2,5 Juta</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart -->
    <div class="card border-0 shadow-lg">
        <div class="card-header bg-white border-0">
            <h5 class="fw-bold mb-0">Grafik Penjualan Mingguan</h5>
        </div>
        <div class="card-body">
            <canvas id="salesChart" height="120"></canvas>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesChart');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            datasets: [{
                label: 'Jumlah Transaksi',
                data: [5, 12, 9, 14, 20, 18, 25],
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13, 110, 253, 0.2)',
                fill: true,
                tension: 0.4,
                pointRadius: 5,
                pointBackgroundColor: '#0d6efd',
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>

<!-- Hover Effect -->
<style>
    .hover-lift {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 2rem rgba(0,0,0,0.15);
    }
</style>
@endsection
