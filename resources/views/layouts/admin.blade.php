<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white p-3" style="width: 220px; min-height: 100vh;">
            <h4 class="mb-4">Apotek Kita</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="{{ url('/admin/dashboard') }}" class="nav-link text-white"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                <li class="nav-item"><a href="{{ url('/admin/obat') }}" class="nav-link text-white"><i class="bi bi-capsule"></i> Obat</a></li>
                <li class="nav-item"><a href="{{ url('/admin/penjualan') }}" class="nav-link text-white"><i class="bi bi-cart4"></i> Penjualan</a></li>
                <li class="nav-item"><a href="{{ url('/admin/laporan') }}" class="nav-link text-white"><i class="bi bi-bar-chart"></i> Laporan</a></li>
            </ul>
        </div>

        <!-- Content -->
        <div class="flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>
</body>
</html>
