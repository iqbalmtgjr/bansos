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
        Schema::create('riwayat_bansos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('penduduk_id');
            $table->foreignId('pengajuan_bansos_id');
            $table->integer('status_penerimaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_bansos');
    }
};
