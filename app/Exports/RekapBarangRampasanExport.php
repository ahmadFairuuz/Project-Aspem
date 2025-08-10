<?php

namespace App\Exports;

use App\Models\RekapBarangRampasan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RekapBarangRampasanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return RekapBarangRampasan::select(
            'satuan_kerja',
            'jenis_barang_rampasan',
            'deskripsi_barang',
            'barang_persediaan',
            'jumlah_total',
            'keterangan',
            'status',
            'bidang',
            'Timestamp'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Satuan Kerja',
            'Jenis Barang Rampasan',
            'Deskripsi Barang',
            'Barang Persediaan',
            'Jumlah Total',
            'Keterangan',
            'Status',
            'Bidang',
            'Timestamp'
        ];
    }
}
