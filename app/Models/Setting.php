<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'nama_web',
        'payment',
        'nama_bank',
        'norek_bank',
        'nama_pemilik_bank',
        'pesan_notif_order',
        'pesan_notif_payment_sukses',
        'pesan_notif_setelah_register',
        'email_notif_order',
        'email_notif_payment_sukses',
        'email_notif_setelah_register',
        'whatsapp_gateway',
        'telegram_gateway',
    ];
}
