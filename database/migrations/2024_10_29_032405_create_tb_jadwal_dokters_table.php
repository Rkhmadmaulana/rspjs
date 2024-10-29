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
        Schema::create('tb_jadwal_dokters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tb_dokter_id')->constrained('tb_dokters')->cascadeOnDelete(); 
            $table->string('poliklinik');
            $table->enum('hari_kerja');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_jadwal_dokters');
    }
};
