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
            $table->timestamps();
            $table->string('register_perkara');
            $table->string('satuan_kerja');
            $table->string('barang_bukti');
            $table->date('tgl_pengambilan')->nullable();
             $table->string('keterangan_pengambilan')->nullable();
            $table->date('tgl_pengembalian')->nullable();
            $table->string('keterangan_pengembalian')->nullable();
            $table->enum('status', ['PENGEMBALIAN', 'PENGAMBILAN'])->default('PENGEMBALIAN')->nullable();
            $table->date('tgl_cetak');
            //  $table->enum('bidang', ['Pidsus', 'Pidum' ])->default('Pidum'); // Atau ->default('Pidum')

});
     }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_rampasan');
    }
};
