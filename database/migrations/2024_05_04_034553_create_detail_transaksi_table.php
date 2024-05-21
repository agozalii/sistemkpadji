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
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('produk_id');
            // $table->foreign('produk_id')->references('id')->on('produk');
            $table->string('transaksi_id');
            // $table->foreign('transaksi_id')->references('id')->on('transaksi');
            $table->string('promosi_id')->nullable();
            // $table->foreign('promosi_id')->references('id')->on('promosi');
            $table->integer('harga_produk');
            $table->integer('promo_value')->nullable();
            $table->integer('harga_promo')->nullable();
            $table->integer('jumlah_beli_produk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
