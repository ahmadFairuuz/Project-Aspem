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
            'tanggal_input',
            'jenis_barang_rampasan',
            'deskripsi_barang',
            'barang_persediaan',
            'jumlah_total',
            'keterangan',
            'status',
            'bidang',
            
        )->get();
}

    public function headings(): array
    {
        return [
            'Satuan Kerja',
            'Tanggal Input',
            'Jenis Barang Rampasan',
            'Deskripsi Barang',
            'Barang Persediaan',
            'Jumlah Total',
            'Keterangan',
            'Status',
            'Bidang',
            
        ];
    }
}
