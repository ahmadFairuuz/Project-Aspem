<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pnbp', function (Blueprint $table) {
            $table->id();
            $table->string('satuan_kerja');
            $table->bigInteger('lelang')->nullable();
            $table->bigInteger('uang')->nullable();
            $table->bigInteger('uang_pengganti')->nullable();
            $table->bigInteger('penjualan_langsung')->nullable();
            $table->bigInteger('total')->nullable();
            $table->bigInteger('realisasi_pnbp')->nullable();
            $table->bigInteger('target_pnbp')->nullable();
            $table->float('persentase')->nullable(); // atau decimal(6,2)
            $table->text('keterangan')->nullable();
            $table->string('periode_bulan'); // contoh '2025-07'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pnbp');
    }
};
