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
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('no_kk');
            $table->string('nama_penduduk');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('rt');
            $table->string('rw');
            $table->string('kel_desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->integer('status_kawin');
            $table->string('pekerjaan');
            $table->string('kewarganegaraan');
            $table->string('no_hp');
            $table->string('penghasilan');
            $table->string('tanggungan');
            $table->integer('cacat');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penduduk');
    }
};
