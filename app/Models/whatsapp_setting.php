<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class whatsapp_setting extends Model
{
    use HasFactory;
    public $table = "tb_settings_whatsapp";

    protected $fillable = [
        'nomor',
        'api_url',
        'api_key',
    ];
}
