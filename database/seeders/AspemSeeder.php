<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AspemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('aspems')->insert([
            [
                'register_perkara' => 'RP001',
                'barang_bukti'     => 'Laptop Asus',
                'tanggal_barbuk'   => '2025-07-01',
                'keterangan'       => 'Disita dari TKP A',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'register_perkara' => 'RP002',
                'barang_bukti'     => 'Smartphone Samsung',
                'tanggal_barbuk'   => '2025-07-02',
                'keterangan'       => 'Barang bukti kejahatan cyber',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'register_perkara' => 'RP003',
                'barang_bukti'     => 'Uang tunai Rp 5.000.000',
                'tanggal_barbuk'   => '2025-07-02',
                'keterangan'       => 'Disita dari hasil penggeledahan',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
        ]);
    }
}
