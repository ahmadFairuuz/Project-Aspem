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
        Schema::create('aspems', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('register_perkara');
            $table->string('satuan_kerja');
            $table->string('barang_bukti');
            $table->string('tanggal_barbuk');
            $table->text('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspems');
    }
};
