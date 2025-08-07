<?php

namespace App\Exports;

use App\Models\PNBP;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

    
class PNBPExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'satuan_kerja',
        'lelang',
        'uang',
        'uang_pengganti',
        'penjualan_langsung',
        'total',
        'realisasi_pnbp',
        'target_pnbp',
        'persentase',
        'keterangan',
        'periode_bulan',
        ];
    }
}