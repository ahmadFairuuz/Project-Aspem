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
        ],
        [
            'name' => 'kajati',
            'email' => 'kajati@example.com',
            'satuan_kerja' => 'Kejaksaan Tinggi Lampung',
            'password' => Hash::make('kajatiLampung'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
        ],
        [
            'name' => 'aspem',
            'email' => 'aspem@example.com',
            'satuan_kerja' => 'Kejaksaan Tinggi Lampung',
            'password' => Hash::make('aspemLampung'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'validator',
        ],
        [
            'name' => 'Kejari Pringsewu',
            'email' => 'pringsewu@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Pringsewu',
            'password' => Hash::make('pringsewu123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'user',
        ],
        [
            'name' => 'Kejari Metro',
            'email' => 'metro@example.com',
            'satuan_kerja' => 'Kejaksaan Negeri Metro',
            'password' => Hash::make('metro123'),
            'created_at'       => now(),
            'updated_at'       => now(),
            'role' => 'user',
        ]]);
    }
}

