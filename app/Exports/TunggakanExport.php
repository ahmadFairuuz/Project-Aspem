<?php

namespace App\Exports;

use App\Models\Tunggakan;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TunggakanExport implements FromCollection, WithHeadings
{
     public function collection()
    {
        // Ambil data dari tabel Tunggakan
        return Tunggakan::select('no_putusan', 'nama_terpidana', 'no_register', 'nama_barang', 'jumlah')->get();
    }
   
    public function headings(): array
    {
        return [
            'no_putusan',
        'nama_terpidana',
        'no_register',
        'nama_barang',
        'jumlah',
        ];
    }
}
