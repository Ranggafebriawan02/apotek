<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    // Pakai tabel 'obat' (bukan default 'obats')
    protected $table = 'obat';

    // Primary key custom
    protected $primaryKey = 'id_obat';

    // PK auto increment integer
    public $incrementing = true;
    protected $keyType = 'int';

    // Fillable fields (supaya bisa mass assignment)
    protected $fillable = [
        'nama',
        'kategori',
        'harga',
        'stok',
        'exp_date',
        'supplier_id',
    ];

    // Cast exp_date menjadi Carbon otomatis
    protected $casts = [
        'exp_date' => 'date',
    ];

    // Jika tabel memiliki created_at & updated_at, set true; kalau tidak, false
    public $timestamps = true;
}
