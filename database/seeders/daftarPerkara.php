<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;

class daftarPerkara extends Seeder
{
    public function run(): void
    {
         $user = User::where('email', 'metro@example.com')->first();

        DB::table('perkara')->insert([
            [
                'register_perkara' => 'PDM-44/MTR/Eoh.2/07/2025',
                'tanggal_input' => Carbon::parse('2025-07-01'),
                'satuan_kerja' => 'Kejaksaan Negeri Metro',
                'nama_barang' => '1) bilah golok. 2) kaus dalam warna putih.',
                'nama_terpidana' => 'SUNARYO Bin NGATEMAN',
                'barang_bukti' => 'Barang Lainnya',
                'keterangan_barang_bukti' => 'Barang bukti ditemukan di lokasi kejadian.',
                'status_perkara' => 'PENDING',
                'jenis_perkara' => 'Penganiayaan',
                'no_putusan_inkraft' => 'Belum Ada Putusan',
                'created_at' => now(),
                'updated_at' => now(),
                 'kabupaten_id'     => $user->kabupaten_id,
            ],
            [
                'register_perkara' => 'PDM-49/MTR/Enz.2/07/2025',
                'tanggal_input' => Carbon::parse('2025-07-02'),
                'satuan_kerja' => 'Kejaksaan Negeri Metro',
                'nama_barang' => '1) Iphone XR Coral. 2) Lakban berisi tembakau gorila 4.70g. 3) Lakban isi tembakau 0.78g. 4) Lakban coklat isi 1.66g tembakau.',
                'nama_terpidana' => 'SULTHAN ZAKI SANJAYA Bin NOVA SYAILENDRA',
                'barang_bukti' => 'Narkotika/Psykotropika',
                'keterangan_barang_bukti' => 'Ditemukan di rumah tersangka saat penggerebekan.',
                'status_perkara' => 'PENDING',
                'jenis_perkara' => 'Narkotika',
                'no_putusan_inkraft' => 'Belum Ada Putusan',
                'created_at' => now(),
                'updated_at' => now(),
                 'kabupaten_id'     => $user->kabupaten_id,
            ],
            [
                'register_perkara' => 'PDM-48/MTR/Enz.2/07/2025',
                'tanggal_input' => Carbon::parse('2025-07-03'),
                'satuan_kerja' => 'Kejaksaan Negeri Metro',
                'nama_barang' => '1) HP Infinix. 2) Kristal sabu 0.1g. 3) HP Vivo. 4) Motor Scoopy putih pink + STNK.',
                'nama_terpidana' => 'BOBY SURYA ADJI WIJAYA dan ANGGA WIJAYA',
                'barang_bukti' => 'Barang Bergerak - Mobil/Motor',
                'keterangan_barang_bukti' => 'Disita saat penangkapan di jalan raya.',
                'status_perkara' => 'PENDING',
                'jenis_perkara' => 'Narkotika',
                'no_putusan_inkraft' => 'Belum Ada Putusan',
                'created_at' => now(),
                'updated_at' => now(),
                 'kabupaten_id'     => $user->kabupaten_id,
            ],
            [
                'register_perkara' => 'PDM-47/MTR/Enz.2/07/2025',
                'tanggal_input' => Carbon::parse('2025-07-04'),
                'satuan_kerja' => 'Kejaksaan Negeri Metro',
                'nama_barang' => '1) Sabu 0.007g. 2) Dompet hitam.',
                'nama_terpidana' => 'YUNIZAR Bin ZAINAL ABIDIN',
                'barang_bukti' => 'Barang Lainnya',
                'keterangan_barang_bukti' => 'Ditemukan di saku tersangka.',
                'status_perkara' => 'PENDING',
                'jenis_perkara' => 'Narkotika',
                'no_putusan_inkraft' => 'Belum Ada Putusan',
                'created_at' => now(),
                'updated_at' => now(),
                 'kabupaten_id'     => $user->kabupaten_id,
            ],
            [
                'register_perkara' => 'PDM-46/MTR/Enz.2/07/2025',
                'tanggal_input' => Carbon::parse('2025-07-05'),
                'satuan_kerja' => 'Kejaksaan Negeri Metro',
                'nama_barang' => '1) Tembakau sintetis 3.42g & 0.82g. 2) Obat Merlopam. 3) Motor Nmax BE 3204 FT. 4) HP iPhone XR & Realme 6 Pro. 5) Tas putih. 6) BPKB & STNK.',
                'nama_terpidana' => 'RIDHO PUTRA EFFENDI Bin JONI EFFENDI',
                'barang_bukti' => 'Barang Lainnya',
                'keterangan_barang_bukti' => 'Barang bukti ditemukan di dalam tas tersangka.',
                'status_perkara' => 'PENDING',
                'jenis_perkara' => 'Narkotika',
                'no_putusan_inkraft' => 'Belum Ada Putusan',
                'created_at' => now(),
                'updated_at' => now(),
                 'kabupaten_id'     => $user->kabupaten_id,
            ],
        ]);
    }
}
