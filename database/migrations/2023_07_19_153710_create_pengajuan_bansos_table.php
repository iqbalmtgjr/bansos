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
        Schema::create('pengajuan_bansos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id');
            $table->foreignId('jenis_bansos_id');
            $table->foreignId('detail_rumah_id');
            $table->string('surat_ket_tidak_mampu');
            $table->string('foto_kk');
            $table->string('foto_ktp');
            $table->string('foto_diri');
            $table->integer('acc_rt');
            $table->integer('acc_rw');
            $table->integer('acc_desa');
            $table->integer('acc_kecamatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_bansos');
    }
};
