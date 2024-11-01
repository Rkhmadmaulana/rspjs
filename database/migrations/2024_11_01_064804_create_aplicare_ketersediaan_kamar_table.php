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
        Schema::create('aplicare_ketersediaan_kamar', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kelas_aplicare');
            $table->char('kd_bangsal');
            $table->enum('kelas', ['Kelas 1','Kelas 2','Kelas 3','Kelas Utama','Kelas VIP','Kelas VVIP']);
            $table->integer('kapasitas')->nullable();
            $table->integer('tersedia')->nullable();
            $table->integer('tersediapria')->nullable();
            $table->integer('tersediawanita')->nullable();
            $table->integer('tersediapriawanita')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aplicare_ketersediaan_kamar');
    }
};
