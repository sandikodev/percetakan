<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLaminasi extends Model
{
    use HasFactory;
    public $table = "tb_jenis_laminasi";

    protected $fillable = [
        'nama_laminasi',
        'harga_cm2',
        'stok',
        'keterangan',
        'id_layanan',
    ];
}
