<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BarangRampasan;

class BarangRampasanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'register_perkara' => 'PDM-35/MTR/Eoh.2/05/2025',
                'nama_barang' => 'BPKB Sepeda Motor Merk Yamaha Vixion / FZ150 warna putih nopol A 2462 BZ Noka MH33C1005CK878651 Nosin 3C1-879650 an. JUNOPAL NATA ATMAJA.',
                'tgl_pengambilan' => '2025-06-17',
                'keterangan_pengambilan' => 'SIDANG JAKSA AGISA',
                'tgl_pengembalian' => '2025-06-17',
                'keterangan_pengembalian' => 'TELAH KEMBALI',
                'status' => 'PENGEMBALIAN',
                'tgl_cetak' => now()->toDateString(),
            ],
            [
                'register_perkara' => 'PDM-35/MTR/Eoh.2/05/2025',
                'nama_barang' => 'STNK Sepeda Motor Merk Yamaha Vixion / FZ150 warna putih nopol A 2462 BZ Noka MH33C1005CK878651 Nosin 3C1-879650 an. JUNOPAL NATA ATMAJA.',
                'tgl_pengambilan' => '2025-06-17',
                'keterangan_pengambilan' => 'SIDANG JAKSA AGISA',
                'tgl_pengembalian' => '2025-06-17',
                'keterangan_pengembalian' => 'TELAH KEMBALI',
                'status' => 'PENGEMBALIAN',
                'tgl_cetak' => now()->toDateString(),
            ],
            [
                'register_perkara' => 'PDM-30/MTR/Eoh.2/04/2025',
                'nama_barang' => 'helai kaos lengan pendek berwarna hitam yang bermotif garis putih',
                'tgl_pengambilan' => '2025-06-02',
                'keterangan_pengambilan' => 'SIDANG JAKSA SAFA',
                'tgl_pengembalian' => '2025-06-03',
                'keterangan_pengembalian' => 'TELAH KEMBALI',
                'status' => 'PENGEMBALIAN',
                'tgl_cetak' => now()->toDateString(),
            ],
        ];

        foreach ($data as $item) {
            BarangRampasan::create($item);
        }
    }
}
