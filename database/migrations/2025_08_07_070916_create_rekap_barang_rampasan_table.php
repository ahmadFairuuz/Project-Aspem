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
       Schema::create('rekap_barang_rampasan', function (Blueprint $table) {
    $table->id();
    $table->string('satuan_kerja');
    $table->text('tanah_dan_bangunan')->nullable();
    $table->text('hewan_dan_tanaman')->nullable();
    $table->text('peralatan_dan_mesin')->nullable();
    $table->text('aset_tetap_lainnya')->nullable();
    $table->text('aset_lain_lain')->nullable();
    $table->text('barang_persediaan')->nullable();
    $table->string('jumlah_total')->nullable();
    $table->text('keterangan')->nullable();

    $table->enum('status', [
        'Belum memiliki nilai taksir',
        'Memiliki nilai taksir',
        'Terjual'
    ])->default('Belum memiliki nilai taksir');

    $table->enum('bidang', ['Pidsus', 'Pidum'])->default('Pidsus');

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_barang_rampasan');
    }
};
