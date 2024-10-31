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
        Schema::create('tb_dokters', function (Blueprint $table) {
            $table->id();
            $table->string('nm_dokter');
            $table->enum('jk', ['laki-laki', 'perempuan']);
            $table->string('tmp_lahir');
            $table->date('tgl_lahir');
            $table->enum('gol_drh', ['A', 'B', 'O', 'AB']);
            $table->string('agama');
            $table->string('almt_tgl');
            $table->string('no_telp');
            $table->string('stts_nikah');
            $table->string('kd_sps');
            $table->string('alumni');
            $table->string('no_ijin_praktek');
            $table->string('image')->nullabel();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_dokters');
    }
};
