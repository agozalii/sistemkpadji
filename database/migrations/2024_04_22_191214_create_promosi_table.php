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
        Schema::create('promosi', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->text('gambar_promosi');
            $table->string('nama_promosi', 200);
            $table->text('deskripsi_promosi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->integer('promosi_use')->nullable();
            $table->integer('promosi_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promosi');
    }
};
