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

            Schema::create('perkara', function (Blueprint $table) {
            $table->id();
            $table->string('register_perkara');
            $table->string('satuan_kerja');
            $table->string('nama_barang');
            $table->string('nama_terpidana');
            $table->string('barang_bukti');
            $table->date('tanggal_pengembalian')->nullable();
            $table->text('keterangan_pengembalian')->nullable();
            $table->string('status_perkara');
            $table->string('jenis_perkara');
            $table->string('no_putusan_inkraft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perkara');
    }
};
