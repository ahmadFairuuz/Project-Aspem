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
        Schema::create('rekap_barang_rampasan', function (Blueprint $table) {
            $table->id();
            $table->string('satuan_kerja');
            $table->enum('jenis_barang_rampasan', ['Tanah dan Bangunan', 'Hewan dan Tanaman', 'Peralatan dan Mesin', 'Aset Tetap Lainnya', 'Aset Lain-lain']);
            $table->text('deskripsi_barang');
            $table->string('jumlah_total');
            $table->text('keterangan');
            $table->string('kendala')->nullable();
            $table->string('solusi')->nullable();
            $table->enum('status', ['Belum memiliki nilai taksir', 'Memiliki nilai taksir', 'Terjual'])->default('Belum memiliki nilai taksir');
            $table->enum('bidang', ['Pidsus', 'Pidum'])->default('Pidum');
            $table->date('tanggal_input');
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
