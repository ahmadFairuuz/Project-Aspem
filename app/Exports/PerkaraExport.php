<?php

namespace App\Exports;

use App\Models\User;
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
            'nama_barang',
            'nama_terpidana',
            'barang_bukti',
            'keterangan_barang_bukti',
            'status_perkara',
            'jenis_perkara',
            'no_putusan_inkraft',
            'kabupaten_id',
            'created_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Register Perkara',
            'Tanggal Input',
            'Satuan Kerja',
            'Nama Barang',
            'Nama Terpidana',
            'Barang Bukti',
            'Keterangan Barang Bukti',
            'Status Perkara',
            'Jenis Perkara',
            'No Putusan Inkraft',
            'Kabupaten ID',
            'Created At'
        ];
    }
}