<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PNBPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pnbp')->insert([
            [
                'satuan_kerja' => 'Kejaksaan Negeri Bandar Lampung',
                'lelang' => 0,
                'uang' => 33770398313,
                'uang_pengganti' => 1900000000,
                'penjualan_langsung' => 0,
                'total' => 35670398313,
                'realisasi_pnbp' => 35439687510,
                'target_pnbp' => 222570000,
                'persentase' => 1592.37,
                'keterangan' => null,
                'periode_bulan' => '2025-05'
            ],
            [
                'satuan_kerja' => 'Kejaksaan Negeri Bandar Lampung',
                'lelang' => 0,
                'uang' => 22370398313,
                'uang_pengganti' => 1000000000,
                'penjualan_langsung' => 0,
                'total' => 35670398313,
                'realisasi_pnbp' => 35439687510,
                'target_pnbp' => 222570000,
                'persentase' => 1592.37,
                'keterangan' => null,
                'periode_bulan' => '2025-06'
            ],
            [
                'satuan_kerja' => 'Kejaksaan Negeri Lampung Timur',
                'lelang' => 119685000,
                'uang' => 17849000,
                'uang_pengganti' => 0,
                'penjualan_langsung' => 53961000,
                'total' => 191495000,
                'realisasi_pnbp' => 191495000,
                'target_pnbp' => 0,
                'persentase' => 0,
                'keterangan' => null,
                'periode_bulan' => '2025-07'
            ],
            [
                'satuan_kerja' => 'Kejaksaan Negeri Metro',
                'lelang' => 29854000,
                'uang' => 1292000,
                'uang_pengganti' => 0,
                'penjualan_langsung' => 0,
                'total' => 31146000,
                'realisasi_pnbp' => 29854000,
                'target_pnbp' => 5000000,
                'persentase' => 597.08,
                'keterangan' => null,
                'periode_bulan' => '2025-07'
            ],
            [
                'satuan_kerja' => 'Kejaksaan Negeri Tulang Bawang',
                'lelang' => 0,
                'uang' => 1793000,
                'uang_pengganti' => 0,
                'penjualan_langsung' => 3082940,
                'total' => 4875940,
                'realisasi_pnbp' => 431925115,
                'target_pnbp' => 730600000,
                'persentase' => 59.12,
                'keterangan' => null,
                'periode_bulan' => '2025-07'
            ],
            [
                'satuan_kerja' => 'Kejaksaan Negeri Way Kanan',
                'lelang' => 271548000,
                'uang' => 0,
                'uang_pengganti' => 0,
                'penjualan_langsung' => 18975000,
                'total' => 290523000,
                'realisasi_pnbp' => 320007000,
                'target_pnbp' => 73000000,
                'persentase' => 438.37,
                'keterangan' => null,
                'periode_bulan' => '2025-06'
            ],
            [
                'satuan_kerja' => 'Kejaksaan Negeri Lampung Tengah',
                'lelang' => 44000000,
                'uang' => 0,
                'uang_pengganti' => 0,
                'penjualan_langsung' => 10617000,
                'total' => 55120000,
                'realisasi_pnbp' => 367367536,
                'target_pnbp' => 354500000,
                'persentase' => 103.65,
                'keterangan' => null,
                'periode_bulan' => '2025-08'
            ],
        ]);
    }
}
