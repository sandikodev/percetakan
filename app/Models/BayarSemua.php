<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BayarSemua extends Model
{
    use HasFactory;
    public $table = "tb_bayar_semua";

    protected $fillable = [
        'id_transaksi',
        'total_tagihan',
        'status_klik_bayar_semua',
        'id_user',
    ];
}
