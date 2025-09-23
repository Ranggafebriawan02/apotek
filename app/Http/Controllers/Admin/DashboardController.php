<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use App\Models\Penjualan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalObat = Obat::count();
        $stokMenipis = Obat::where('stok', '<', 10)->count();
        $transaksiHariIni = Penjualan::whereDate('created_at', Carbon::today())->count();
        $totalPendapatanHariIni = Penjualan::whereDate('created_at', Carbon::today())
            ->sum('total_harga');

        return view('admin.dashboard', compact(
            'totalObat',
            'stokMenipis',
            'transaksiHariIni',
            'totalPendapatanHariIni'
        ));
    }
}
