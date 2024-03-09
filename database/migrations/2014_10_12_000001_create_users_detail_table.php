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
        Schema::create('users_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->string('phone');
            $table->string('bank_norek');
            $table->string('bank_atas_nama');
            $table->string('komisi');
            $table->string('id_afiliasi');
            $table->string('is_active');
            $table->string('id_telegram');
            $table->string('bank_nama');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_detail');
    }
};
