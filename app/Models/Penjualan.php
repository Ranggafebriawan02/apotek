<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan'; // kalau tabelmu bernama `penjualan`
    protected $primaryKey = 'id_penjualan'; // sesuaikan dengan nama PK
    public $timestamps = true; // kalau pakai created_at & updated_at

    protected $fillable = [
        'id_obat',
        'jumlah',
        'total_harga',
        'created_at',
        'updated_at'
    ];

    // Relasi ke Obat (jika perlu)
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id_obat');
    }
}
