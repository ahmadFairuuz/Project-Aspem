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
        Schema::create('tunggakan', function (Blueprint $table) {
    $table->id();
    $table->string('no_putusan');
    $table->string('satuan_kerja');
    $table->string('nama_terpidana');
    $table->string('no_register');
    $table->text('nama_barang');
    $table->integer('jumlah');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tunggakan');
    }
};
