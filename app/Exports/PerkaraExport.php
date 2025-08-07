<?php

namespace App\Exports;

use App\Models\Perkara;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PerkaraExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Perkara::select(
            'register_perkara',
            'tanggal_input',
            'satuan_kerja',
            'jaksa',
            'pasal_dakwaan',
            'pasal_terbukti',
            'status',
            'nama_barang',
            'nama_terpidana',
            'barang_bukti',
            'keterangan_barang_bukti',
            'status_perkara',
            'jenis_perkara',
            'no_putusan_inkraft',
            'created_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Register Perkara',
            'Tanggal Input',
            'Satuan Kerja',
            'Jaksa',
            'Pasal Dakwaan',
            'Pasal Terbukti',
            'Status',
            'Nama Barang',
            'Nama Terpidana',
            'Barang Bukti',
            'Keterangan Barang Bukti',
            'Status Perkara',
            'Jenis Perkara',
            'No Putusan Inkraft',
            'Created At'
        ];
    }
}
