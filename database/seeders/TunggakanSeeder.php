<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tunggakan;

class TunggakanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'no_putusan'     => '24/Pid.Sus/2025/PN Met',
                'satuan_kerja'     => 'Kejaksaan Negeri Metro',
                'nama_terpidana' => 'JHORDY ANDRIANSYAH Bin ZUNAIDI',
                'no_register'    => 'PDM-12/MTR/Enz.2/01/2025',
                'nama_barang'    => 'handphone model iphone 11 pro dengan nomor model MW9C2LL/A dan nomor seri C392JHLJNX6M',
                'jumlah'         => 1,
            ],
            [
                'no_putusan'     => '71/Pid.B/2025/PN Met',
                'satuan_kerja'     => 'Kejaksaan Negeri Pesawaran',
                'nama_terpidana' => 'IWAN PERMANA BIN PRANOWO',
                'no_register'    => 'PDM-6/MTR/Eku.2/03/2025',
                'nama_barang'    => 'Handphone merk Xiaomi Warna Gold',
                'jumlah'         => 1,
            ],
            [
                'no_putusan'     => '58/Pid.B/2025/PN Met',
                'satuan_kerja'     => 'Kejaksaan Negeri Metro',
                'nama_terpidana' => 'ACHYARI Bin AZIER TANJUNG',
                'no_register'    => 'PDM-05/MTR/Eku.2/03/2025',
                'nama_barang'    => 'mouse.',
                'jumlah'         => 1,
            ],
            [
                'no_putusan'     => '58/Pid.B/2025/PN Met',
                'satuan_kerja'     => 'Kejaksaan Negeri Pesawaran',
                'nama_terpidana' => 'ACHYARI Bin AZIER TANJUNG',
                'no_register'    => 'PDM-05/MTR/Eku.2/03/2025',
                'nama_barang'    => 'keyboard.',
                'jumlah'         => 1,
            ],
            [
                'no_putusan'     => '58/Pid.B/2025/PN Met',
                'satuan_kerja'     => 'Kejaksaan Negeri Pringsewu',
                'nama_terpidana' => 'ACHYARI Bin AZIER TANJUNG',
                'no_register'    => 'PDM-05/MTR/Eku.2/03/2025',
                'nama_barang'    => 'cpu.',
                'jumlah'         => 1,
            ],
            [
                'no_putusan'     => '58/Pid.B/2025/PN Met',
                'satuan_kerja'     => 'Kejaksaan Negeri Pringsewu',
                'nama_terpidana' => 'ACHYARI Bin AZIER TANJUNG',
                'no_register'    => 'PDM-05/MTR/Eku.2/03/2025',
                'nama_barang'    => 'monitor komputer.',
                'jumlah'         => 1,
            ],
        ];

        foreach ($data as $item) {
            Tunggakan::create($item);
        }
    }
}
