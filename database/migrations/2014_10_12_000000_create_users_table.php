<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('users', function (Blueprint $table) {
    //         $table->id();
    //         // $table->increments('id');
    //         $table->string('nama');
    //         $table->string('username')->unique();
    //         $table->string('password');
    //         $table->enum('role', ['admin', 'manajer',]);
    //         $table->enum('jenis_kelamin', ['L', 'P']);
    //         $table->char('nomor_telpon');
    //         $table->char('email');
    //         $table->char('alamat');
    //         $table->timestamps();
    //     });
    // }
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 200);
            $table->string('username', 100)->nullable()->unique();
            $table->string('password')->nullable();
            $table->enum('role', ['admin', 'manajer', 'pelanggan'])->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('nomor_telpon', 15);
            $table->string('email', 100);
            $table->text('alamat');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
