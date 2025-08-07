<?php

namespace App\Imports;

use App\Models\Perkara;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

    
class PerkaraImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
{
    return new Perkara([
        'register_perkara'        => $row['register_perkara'],
        'tanggal_input'           => $row['tanggal_input'],
        'satuan_kerja'            => $row['satuan_kerja'],
        'jaksa'                   => $row['jaksa'],
        'pasal_dakwaan'           => $row['pasal_dakwaan'],
        'pasal_terbukti'          => $row['pasal_terbukti'],
        'status'                  => $row['status'],
        'nama_barang'             => $row['nama_barang'],
        'nama_terpidana'          => $row['nama_terpidana'],
        'barang_bukti'            => $row['barang_bukti'],
        'keterangan_barang_bukti' => $row['keterangan_barang_bukti'],
        'jenis_perkara'           => $row['jenis_perkara'],
        'status_perkara'          => $row['status_perkara'],
        'no_putusan_inkraft'      => $row['no_putusan_inkraft'],
    ]);
}


    public function rules(): array
{
    return [
        'register_perkara'        => 'required|string',
        'tanggal_input'           => 'required|date',
        'satuan_kerja'            => 'required|string',
        'jaksa'                   => 'required|string',
        'pasal_dakwaan'           => 'required|string',
        'pasal_terbukti'          => 'required|string',
        'status'                  => 'required|string',
        'nama_barang'             => 'required|string',
        'nama_terpidana'          => 'nullable|string',
        'barang_bukti'            => 'required|string',
        'keterangan_barang_bukti'=> 'nullable|string',
        'jenis_perkara'           => 'required|string',
        'status_perkara'          => 'required|string',
        'no_putusan_inkraft'      => 'nullable|string',
    ];
}

}