<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            userSeeder::class,
            AspemSeeder::class,
            daftarPerkara::class,
            // BarangRampasanSeeder::class,
            PNBPSeeder::class,
            TunggakanSeeder::class,
        ]);
    }
}
