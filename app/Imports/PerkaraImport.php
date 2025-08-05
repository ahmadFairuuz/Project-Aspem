<?php

namespace App\Exports;

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
            'nama_barang'             => $row['nama_barang'],
            'nama_terpidana'          => $row['nama_terpidana'],
            'barang_bukti'            => $row['barang_bukti'],
            'keterangan_barang_bukti' => $row['keterangan_barang_bukti'],
            'status_perkara'          => $row['status_perkara'],
            'jenis_perkara'           => $row['jenis_perkara'],
            'no_pututsan_inkraft'     => $row['no_pututsan_inkraft'],
            'kabupaten_id'            => $row['kabupaten_id'],
            'created_at'              => $row['created_at'],
        ]);
    }

    public function rules(): array
    {
        return [
            'register_perkara'        => 'required|string',
            'tanggal_input'           => 'required|date',
            'satuan_kerja'            => 'required|string',
            'nama_barang'             => 'required|string',
            'nama_terpidana'          => 'nullable|string',
            'barang_bukti'            => 'required|string',
            'keterangan_barang_bukti' => 'nullable|string',
            'status_perkara'          => 'required|string|in:PENDING,DONE',
            'jenis_perkara'           => 'required|string',
            'no_pututsan_inkraft'     => 'nullable|string',
            'kabupaten_id'            => 'required|integer',
            'created_at'              => 'required|date',
        ];
    }
}