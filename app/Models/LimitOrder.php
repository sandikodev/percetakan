<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LimitOrder extends Model
{
    use HasFactory;
    public $table = "tb_limit_order";

    protected $fillable = [
        'roles',
        'maksimal_pending_pembayaran',
    ];
}
