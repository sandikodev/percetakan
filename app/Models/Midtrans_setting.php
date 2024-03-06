<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Midtrans_setting extends Model
{
    use HasFactory;
    public $table = "tb_settings_midtrans";

    protected $fillable = [
        'merchant_id',
        'client_key',
        'server_key',
        'is_production',
        'snap_url',
    ];
}
