<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('icon');
            $table->string('nama_web');
            $table->string('payment');
            $table->unsignedBigInteger('bank_id');
            $table->string('norek_bank');
            $table->string('nama_pemilik_bank');
            $table->string('pesan_notif_order');
            $table->string('pesan_notif_payment_sukses');
            $table->string('pesan_notif_setelah_register');
            $table->string('email_notif_order');
            $table->string('email_notif_payment_sukses');
            $table->string('email_notif_setelah_register');
            $table->string('whatsapp_gateway');
            $table->string('telegram_gateway');
            $table->timestamps();
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
