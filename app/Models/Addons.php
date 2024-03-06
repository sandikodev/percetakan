<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addons extends Model
{
    use HasFactory;
    public $table = "tb_addons_service";

    protected $fillable = [
        'nama_addons',
        'keterangan',
    ];
}
