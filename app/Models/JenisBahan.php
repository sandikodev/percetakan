<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBahan extends Model
{
    use HasFactory;
    public $table = "tb_jenis_bahan";

    protected $fillable = [
        'id_layanan',
        'nama_bahan',
        'panjang',
        'harga_cm2',
        'keterangan',
        'stok',
    ];
}
