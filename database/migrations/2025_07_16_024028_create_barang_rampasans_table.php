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
            $table->string('nama_barang');
            $table->date('tgl_pengambilan');
             $table->string('keterangan_pengambilan');
            $table->date('tgl_pengembalian');
            $table->string('keterangan_pengembalian');
            $table->enum('status', ['PENGEMBALIAN', 'PENGAMBILAN'])->default('PENGEMBALIAN');
            $table->date('tgl_cetak');
            $table->unsignedBigInteger('kabupaten_id');
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
