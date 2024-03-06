<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    public $table = "tb_layanan";

    protected $fillable = [
        'nama_service',
        'biaya',
        'keterangan',
        'satuan',
        'status',
    ];
}
