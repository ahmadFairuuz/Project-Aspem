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
            'role' => 'kajati',
            'kabupaten_id' => 16,
        ],
        [
            'name' => 'aspem',
            'email' => 'aspem@example.com',
            'satuan_kerja' => 'Kejaksaan Tinggi Lampung',
            'password' => Hash::make('aspemLampung'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'aspem',
            'kabupaten_id' => 16,
        ],
        [
            'name' => 'maker-pringsewu',
            'email' => 'pringsewu@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Pringsewu',
            'password' => Hash::make('pringsewu123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'user',
            'kabupaten_id' => 3,
        ],
        [
            'name' => 'signer-pringsewu',
            'email' => 'pringsewu1@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Pringsewu',
            'password' => Hash::make('pringsewu123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
            'kabupaten_id' => 3,
        ],
        [
            'name' => 'maker-metro',
            'email' => 'metro@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Metro',
            'password' => Hash::make('metro123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'user',
            'kabupaten_id' => 1,
        ],
    [
            'name' => 'signer-metro',
            'email' => 'metro1@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Metro',
            'password' => Hash::make('metro123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
            'kabupaten_id' => 1,
    ],
[
            'name' => 'maker-balam',
            'email' => 'balam@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Bandar Lampung',
            'password' => Hash::make('balam123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'user',
            'kabupaten_id' => 2,
],
[
            'name' => 'signer-balam',
            'email' => 'balam1@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Bandar Lampung',
            'password' => Hash::make('balam123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
            'kabupaten_id' => 2,
],
[
            'name' => 'maker-pesawaran',
            'email' => 'pesawaran@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Pesawaran',
            'password' => Hash::make('pesawaran123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'user',
            'kabupaten_id' => 15,
],
[
            'name' => 'signer-pesawaran',
            'email' => 'pesawaran1@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Pesawaran',
            'password' => Hash::make('pesawaran123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
            'kabupaten_id' => 15,
],
[
            'name' => 'maker-tubaba',
            'email' => 'tubaba@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Tulang Bawang Barat',
            'password' => Hash::make('tubaba123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'user',
            'kabupaten_id' => 5,
],
[
            'name' => 'signer-tubaba',
            'email' => 'tubaba1@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Tulang Bawang Barat',
            'password' => Hash::make('tubaba123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
            'kabupaten_id' => 5,
],
[
            'name' => 'maker-tuba',
            'email' => 'tuba@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Tulang Bawang',
            'password' => Hash::make('tuba123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'user',
            'kabupaten_id' => 4,
],
[
            'name' => 'signer-tuba',
            'email' => 'tuba1@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Tulang Bawang',
            'password' => Hash::make('tuba123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
            'kabupaten_id' => 4,
],
[
            'name' => 'maker-lamtura',
            'email' => 'lamtura@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Lampung Utara',
            'password' => Hash::make('lamtura123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'user',
            'kabupaten_id' => 6,
],
[
            'name' => 'signer-lamtura',
            'email' => 'lamtura1@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Lampung Utara',
            'password' => Hash::make('lamtura123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
            'kabupaten_id' => 6,
],
[
            'name' => 'maker-lambar',
            'email' => 'lambar@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Lampung Barat',
            'password' => Hash::make('lambar123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'user',
            'kabupaten_id' => 7,
],
[
            'name' => 'signer-lambar',
            'email' => 'lambar1@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Lampung Barat',
            'password' => Hash::make('lambar123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
            'kabupaten_id' => 7,
],
[
            'name' => 'maker-lamtim',
            'email' => 'lamtim@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Lampung Timur',
            'password' => Hash::make('lamtim123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'user',
            'kabupaten_id' => 8,
],
[
            'name' => 'signer-lamtim',
            'email' => 'lamtim1@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri lamtim',
            'password' => Hash::make('lamtim123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
            'kabupaten_id' => 8,
],
        [
            'name' => 'maker-lamteng',
            'email' => 'lamteng@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Lampung Tengah',
            'password' => Hash::make('lamteng123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'user',
            'kabupaten_id' => 9,
],
[
            'name' => 'signer-lamteng',
            'email' => 'lamteng1@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Lampung Tengah',
            'password' => Hash::make('lamteng123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
            'kabupaten_id' => 9,
],
[
            'name' => 'maker-lamsel',
            'email' => 'lamsel@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Lampung Selatan',
            'password' => Hash::make('lamsel123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'user',
            'kabupaten_id' => 10,
],
[
            'name' => 'signer-lamsel',
            'email' => 'lamsel1@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Lampung Selatan',
            'password' => Hash::make('lamsel123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
            'kabupaten_id' => 10,
],
[
            'name' => 'maker-mesuji',
            'email' => 'mesuji@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Mesuji',
            'password' => Hash::make('mesuji123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'user',
            'kabupaten_id' => 11,
],
[
            'name' => 'signer-mesuji',
            'email' => 'mesuji1@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Mesuji',
            'password' => Hash::make('mesuji123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
            'kabupaten_id' => 11,
],
        [
            'name' => 'maker-pesibar',
            'email' => 'pesibar@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Pesisir Barat',
            'password' => Hash::make('pesibar123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'user',
            'kabupaten_id' => 12,
],
[
            'name' => 'signer-pesibar',
            'email' => 'pesibar1@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Pesisir Barat',
            'password' => Hash::make('pesibar123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
            'kabupaten_id' => 12,
],
[
            'name' => 'maker-waykanan',
            'email' => 'waykanan@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Way Kanan',
            'password' => Hash::make('waykana123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'user',
            'kabupaten_id' => 13,
],
[
            'name' => 'signer-waykanan',
            'email' => 'waykanan1@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Way Kanan',
            'password' => Hash::make('waykanan123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
            'kabupaten_id' => 13,
],
[
            'name' => 'maker-tanggamus',
            'email' => 'tanggamus@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Tanggamus',
            'password' => Hash::make('tanggamus123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'user',
            'kabupaten_id' => 14,
],
[
            'name' => 'signer-tanggamus',
            'email' => 'tanggamus1@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Tanggamus',
            'password' => Hash::make('tanggamus123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
            'kabupaten_id' => 14,
],

    ]);
    }
}

