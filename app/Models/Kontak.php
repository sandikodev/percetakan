<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;
    public $table = "tb_landing_kontak";

    protected $fillable = [
        'gambar',
        'judul',
        'keterangan',
        'email',
        'whatsapp',
    ];
}
