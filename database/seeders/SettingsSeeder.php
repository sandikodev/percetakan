<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::created([
            'icon'=>'percetakan_logo.png',
            'nama_web' => 'ROOM',
            'payment' => true, // auto
            'nama_bank' => ,
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
        ])
    }
}
