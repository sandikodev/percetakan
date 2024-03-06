<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class email_setting extends Model
{
    use HasFactory;
    public $table = "tb_settings_email";

    protected $fillable = [
        'mail_transport',
        'mail_host',
        'mail_port',
        'mail_username',
        'mail_password',
        'mail_from',
        'mail_encryption',
    ];
}
