<?php

namespace App\Exports;


use App\Models\RekapBarangRampasan;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Carbon\Carbon;

class RekapBarangRampasanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return RekapBarangRampasan::select(
            'satuan_kerja',
            'jenis_barang_rampasan',
            'deskripsi_barang',
            'jumlah_total',
            'keterangan',
            'kendala',
            'solusi',
            'status',
            'bidang',
            'tanggal_input',
            
        )->get();
}

    public function headings(): array
    {
        return [
            'Satuan Kerja',
            'Jenis Barang Rampasan',
            'Deskripsi Barang',
            'Jumlah Total',
            'Keterangan',
            'Kendala',
            'Solusi',
            'Status',
            'Bidang',
            'Tanggal Input',
            
        ];
    }
}
