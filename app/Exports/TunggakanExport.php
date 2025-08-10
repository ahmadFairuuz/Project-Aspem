<?php

namespace App\Exports;

use App\Models\RekapBarangRampasan;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class RekapBarangRampasanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return RekapBarangRampasan::select(
            'satuan_kerja',
            'jenis_barang_rampasan',
            'barang_persediaan',
            'deskripsi_barang',
            'jumlah_total',
            'keterangan',
            'status',
            'bidang'
        )->get();
    }

    public function headings(): array
    {
        return [
            'satuan_kerja',
            'jenis_barang_rampasan',
            'barang_persediaan',
            'deskripsi_barang',
            'jumlah_total',
            'keterangan',
            'status',
            'bidang'
        ];
    }
}
