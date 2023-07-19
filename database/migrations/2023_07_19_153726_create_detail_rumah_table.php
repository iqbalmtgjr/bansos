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
        Schema::create('detail_rumah', function (Blueprint $table) {
            $table->id();
            $table->string('foto_rmh_tampak_dpn');
            $table->string('foto_rmh_tampak_belakang');
            $table->float('luas_bangunan');
            $table->integer('status_rumah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_rumah');
    }
};
