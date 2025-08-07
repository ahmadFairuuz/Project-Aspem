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
            $table->date('tanggal_input');
            $table->string('satuan_kerja');
            $table->string('jaksa');
            $table->string('pasal_dakwaan');
            $table->string('pasal_terbukti');
            $table->string('status');
            $table->string('nama_barang');
            $table->string('nama_terpidana');
            $table->string('barang_bukti');
            $table->string('keterangan_barang_bukti');
            $table->enum('status_perkara', ['DISETUJUI', 'PENDING', 'DITOLAK'])->default('PENDING');
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
       Schema::table('perkara', function (Blueprint $table) {
        $table->string('status_perkara')->change();
    });
    }
};
