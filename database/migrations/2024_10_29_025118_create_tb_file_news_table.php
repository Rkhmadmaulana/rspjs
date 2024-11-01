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
        Schema::create('tb_file_news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tb_news_id')->constrained('tb_news')->cascadeOnDelete();
            $table->string('nm_file_news');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_file_news');
    }
};
