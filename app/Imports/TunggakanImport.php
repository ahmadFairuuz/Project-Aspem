<?php

namespace App\Imports;

use App\Models\Tunggakan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TunggakanImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * Import 1 row dari Excel ke model.
     */
    public function model(array $row)
    {
        return new Tunggakan([
            'no_putusan'      => $row['no_putusan'],
            'nama_terpidana'  => $row['nama_terpidana'],
            'no_register'     => $row['no_register'],
            'nama_barang'     => $row['nama_barang'],
            'jumlah'          => $row['jumlah'],
        ]);
    }

    /**
     * Validasi setiap baris sebelum disimpan ke database.
     */
    public function rules(): array
    {
        return [
            'no_putusan'      => 'required|string',
            'nama_terpidana'  => 'required|string',
            'no_register'     => 'required|string',
            'nama_barang'     => 'required|string',
            'jumlah'          => 'required|integer|min:1',
        ];
    }
}
