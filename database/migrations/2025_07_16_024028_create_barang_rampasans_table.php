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
    Schema::create('barang_rampasan', function (Blueprint $table) {
    $table->id();
    $table->string('register_perkara');
    $table->string('barang_bukti');
    $table->date('tanggal_barbuk');
    $table->text('keterangan')->nullable();
    $table->string('satker');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_rampasans');
    }
};
