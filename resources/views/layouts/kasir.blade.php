<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Aplikasi Apotek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        /* Sidebar Styling */
        .sidebar {
            min-height: 100vh;
            background-color: #009688; /* hijau tosca */
            color: #fff;
        }

        .sidebar h4 {
            font-size: 1.3rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .sidebar .nav-link {
            color: #ffffff;
            padding: 10px 15px;
            border-radius: 6px;
            margin: 5px 0;
            transition: background 0.3s;
            font-size: 0.95rem;
        }

        .sidebar .nav-link:hover {
            background-color: #00796b; /* tosca lebih gelap saat hover */
            color: #fff;
        }

        .sidebar .nav-link.active {
            background-color: #00695c; /* tosca tua untuk menu aktif */
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 sidebar py-4">
                <!-- Header Sidebar -->
                <h4>
                    <i class="bi bi-hospital me-2"></i> Apotek Kita
                </h4>

                <!-- Menu Sidebar -->
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('kasir.dashboard') }}" class="nav-link">
                            <i class="bi bi-house-door-fill me-2"></i> Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('kasir.obat.index') }}" class="nav-link">
                            <i class="bi bi-capsule-pill me-2"></i> Obat
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="{{ route('kasir.penjualan.index') }}" class="nav-link">
                            <i class="bi bi-cash-stack me-2"></i> Penjualan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('kasir.laporan') }}" class="nav-link">
                            <i class="bi bi-file-earmark-bar-graph-fill me-2"></i> Laporan
                        </a>
                    </li>

                </ul>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
