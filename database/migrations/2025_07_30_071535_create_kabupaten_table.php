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
        Schema::create('kabupaten', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
            $table->enum('satuan_kerja', ['Kejaksaan Negeri Bandar Lampung', 'Kejaksaan Negeri Metro', 'Kejaksaan Negeri Lampung Selatan', 'Kejaksaan Negeri Lampung Tengah', 'Kejaksaan Negeri Lampung Timur', 'Kejaksaan Negeri Lampung Barat', 'Kejaksaan Negeri Pesisir Barat', 'Kejaksaan Negeri Tanggamus', 'Kejaksaan Negeri Pringsewu', 'Kejaksaan Negeri Pesawaran', 'Kejaksaan Negeri Tulang Bawang', 'Kejaksaan Negeri Tulang Bawang Barat', 'Kejaksaan Negeri Mesuji', 'Kejaksaan Negeri Way Kanan', 'Kejaksaan Negeri Lampung Utara']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kabupaten');
    }
};
