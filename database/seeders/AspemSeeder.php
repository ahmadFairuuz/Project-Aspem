<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                'satuan_kerja' => 'Kejaksaan Negeri Metro',
                'barang_bukti' => 'Laptop Asus',
                'tanggal_barbuk' => '2025-07-01',
                'keterangan' => 'Disita dari TKP A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'register_perkara' => 'RP002',
                'satuan_kerja' => 'Kejaksaan Negeri Metro',
                'barang_bukti' => 'Smartphone Samsung',
                'tanggal_barbuk' => '2025-07-02',
                'keterangan' => 'Barang bukti kejahatan cyber',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'register_perkara' => 'RP003',
                'satuan_kerja' => 'Kejaksaan Negeri Pesawaran',
                'barang_bukti' => 'Uang tunai Rp 5.000.000',
                'tanggal_barbuk' => '2025-07-02',
                'keterangan' => 'Disita dari hasil penggeledahan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('kabupaten')->insert([
            ['nama' => 'Metro', 'satuan_kerja' => 'Kejaksaan Negeri Metro'],
            ['nama' => 'Bandar Lampung', 'satuan_kerja' => 'Kejaksaan Negeri Bandar Lampung'],
            ['nama' => 'Pringsewu', 'satuan_kerja' => 'Kejaksaan Negeri Pringsewu'],
            ['nama' => 'Tulang Bawang', 'satuan_kerja' => 'Kejaksaan Negeri Tulang Bawang'],
            ['nama' => 'Tulang Bawang Barat', 'satuan_kerja' => 'Kejaksaan Negeri Tulang Bawang Barat'],
            ['nama' => 'Lampung Utara', 'satuan_kerja' => 'Kejaksaan Negeri Lampung Utara'],
            ['nama' => 'Lampung Barat', 'satuan_kerja' => 'Kejaksaan Negeri Lampung Barat'],
            ['nama' => 'Lampung Timur', 'satuan_kerja' => 'Kejaksaan Negeri Lampung Timur'],
            ['nama' => 'Lampung Tengah', 'satuan_kerja' => 'Kejaksaan Negeri Lampung Tengah'],
            ['nama' => 'Lampung Selatan', 'satuan_kerja' => 'Kejaksaan Negeri Lampung Selatan'],
            ['nama' => 'Mesuji', 'satuan_kerja' => 'Kejaksaan Negeri Mesuji'],
            ['nama' => 'Pesisir Barat', 'satuan_kerja' => 'Kejaksaan Negeri Pesisir Barat'],
            ['nama' => 'Way Kanan', 'satuan_kerja' => 'Kejaksaan Negeri Way Kanan'],
            ['nama' => 'Tanggamus', 'satuan_kerja' => 'Kejaksaan Negeri Tanggamus'],
            ['nama' => 'Pesawaran', 'satuan_kerja' => 'Kejaksaan Negeri Pesawaran'],
        ]);
    }
}
