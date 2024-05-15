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
        Schema::create('produk', function (Blueprint $table) {
            $table->string('id')->primary();
            // $table->char('id_produk', 10)->unique();
            $table->string('gambar_produk');
            $table->string('nama_produk');
            $table->integer('harga_produk');
            $table->enum('kategori_produk', ['tas', 'sepatu', 'pakaian']);
            $table->text('deskripsi_produk');
            $table->enum('merk_produk', ['consina', 'forester']);
            $table->enum('status_produk', ['new arrival', 'lama']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
