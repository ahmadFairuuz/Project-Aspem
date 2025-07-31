<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         DB::table('users')->insert([
            [
            'name' => 'admin aspem',
            'email' => 'superadmin@example.com',
            'satuan_kerja' => 'Kejaksaan Tinggi Lampung',
            'password' => Hash::make('admin123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'superadmin',
            'kabupaten_id' => 16,
        ],
        [
            'name' => 'kajati',
            'email' => 'kajati@example.com',
            'satuan_kerja' => 'Kejaksaan Tinggi Lampung',
            'password' => Hash::make('kajatiLampung'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
            'kabupaten_id' => 16,
        ],
        [
            'name' => 'aspem',
            'email' => 'aspem@example.com',
            'satuan_kerja' => 'Kejaksaan Tinggi Lampung',
            'password' => Hash::make('aspemLampung'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
            'kabupaten_id' => 16,
        ],
        [
            'name' => 'Maker Pringsewu',
            'email' => 'pringsewu@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Pringsewu',
            'password' => Hash::make('pringsewu123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'user',
            'kabupaten_id' => 3,
        ],
        [
            'name' => 'Signer Pringsewu',
            'email' => 'pringsewu1@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Pringsewu',
            'password' => Hash::make('pringsewu123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
            'kabupaten_id' => 3,
        ],
        [
            'name' => 'Maker Metro',
            'email' => 'metro@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Metro',
            'password' => Hash::make('metro123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'user',
            'kabupaten_id' => 1,
        ],
    [
            'name' => 'Signer Metro',
            'email' => 'metro1@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Metro',
            'password' => Hash::make('metro123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
            'kabupaten_id' => 1,
    ],
[
            'name' => 'Maker Balam',
            'email' => 'balam@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Bandar Lampung',
            'password' => Hash::make('balam123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'user',
            'kabupaten_id' => 2,
],
[
            'name' => 'Signer Balam',
            'email' => 'balam1@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Bandar Lampung',
            'password' => Hash::make('balam123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
            'kabupaten_id' => 2,
],
[
            'name' => 'Maker Pesawaran',
            'email' => 'pesawaran@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Pesawaran',
            'password' => Hash::make('pesawaran123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'user',
            'kabupaten_id' => 15,
],
[
            'name' => 'Signer Pesawaran',
            'email' => 'pesawaran1@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Pesawaran',
            'password' => Hash::make('pesawaran123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
            'kabupaten_id' => 15,
        ]]);
    }
}

