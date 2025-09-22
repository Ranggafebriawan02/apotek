<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StrukController extends Controller
{
    public function cetak($id)
    {
        return "Cetak struk untuk penjualan ID: " . $id;
    }
}
