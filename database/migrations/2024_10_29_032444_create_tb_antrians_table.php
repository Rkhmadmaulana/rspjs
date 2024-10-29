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
        Schema::create('tb_antrians', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('no_antrian');
            $table->boolean('status')->default(true);
            $table->dateTime('update_date');
            $table->string('jenis_antrian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_antrians');
    }
};
