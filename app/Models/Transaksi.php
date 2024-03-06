<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    public $table = "tb_transaksi";

    protected $fillable = [
        'id_transaksi',
        'id_user',
        'id_layanan',
        'nama_layanan',
        'keterangan_layanan',
        'url_berkas',
        'total_tagihan',
        'catatan_order',
        'url_invoice',
        'status_pembayaran',
        'status_order',
        'status_pengambilan',
        'nama_lengkap',
        'email',
        'whatsapp',
        'id_midtrans',
        'snapToken',
        'bukti_transfer',
        'type_pembayaran',
        'lebar',
        'id_bahan',
        'nama_bahan',
        'panjang_bahan',
        'harga_bahan_cm2',
        'id_laminasi',
        'nama_laminasi',
        'harga_laminasi_cm2',
        'addons_service',
        'harga_addons_service',
    ];
}
