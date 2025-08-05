<?php

namespace App\Exports;
use App\Models\BarangRampasan;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

    
class BarangRampasanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return BarangRampasan::select(
            'id',
            'created_at',
            'updated_at',
            'register_perkara',
            'nama_barang',
            'tgl_pengambilan',
            'keterangan_pengambilan',
            'tgl_pengembalian',
            'keterangan_pengembalian',
            'status',
            'tgl_cetak'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Created At',
            'Updated At',
            'Register Perkara',
            'Nama Barang',
            'Tanggal Pengambilan',
            'Keterangan Pengambilan',
            'Tanggal Pengembalian',
            'Keterangan Pengembalian',
            'Status',
            'Tanggal Cetak'
        ];
    }
}