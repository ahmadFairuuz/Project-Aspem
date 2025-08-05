<?php

namespace App\Exports;

use App\Models\User;
use App\Models\BarangRampasan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

    
class BarangRampasanImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * Import 1 row dari Excel ke model.
     */
    public function model(array $row)
    {
        return new BarangRampasan([
            'register_perkara'        => $row['register_perkara'],
            'nama_barang'             => $row['nama_barang'],
            'tgl_pengambilan'         => $row['tgl_pengambilan'],
            'keterangan_pengambilan'  => $row['keterangan_pengambilan'],
            'tgl_pengembalian'        => $row['tgl_pengembalian'],
            'keterangan_pengembalian' => $row['keterangan_pengembalian'],
            'status'                  => $row['status'],
            'tgl_cetak'               => $row['tgl_cetak'],
        ]);
    }

    /**
     * Validasi setiap baris sebelum disimpan ke database.
     */
    public function rules(): array
    {
        return [
            'register_perkara'        => 'required|string',
            'nama_barang'             => 'required|string',
            'tgl_pengambilan'         => 'required|date',
            'keterangan_pengambilan'  => 'nullable|string',
            'tgl_pengembalian'        => 'required|date',
            'keterangan_pengembalian' => 'nullable|string',
            'status'                  => 'required|string|in:PENGEMBALIAN,LAINNYA', // sesuaikan jika status bisa lebih dari 1
            'tgl_cetak'               => 'required|date',
        ];
    }
}