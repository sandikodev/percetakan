<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserDetail extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'nomor_whatsapp',
        'bank_nama',
        'bank_norek',
        'bank_atas_nama',
        'komisi',
        'id_afiliasi',
        'is_active',
        'id_telegram'
    ];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
