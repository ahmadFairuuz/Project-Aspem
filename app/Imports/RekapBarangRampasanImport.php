<?php

namespace App\Imports;

use App\Models\RekapBarangRampasan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class RekapBarangRampasanImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * Import 1 row dari Excel ke model.
     */
    public function model(array $row)
    {
        return new RekapBarangRampasan([
            'satuan_kerja'          => $row['satuan_kerja'],
            'jenis_barang_rampasan' => $row['jenis_barang_rampasan'],
            'barang_persediaan'     => $row['barang_persediaan'],
            'deskripsi_barang'      => $row['deskripsi_barang'],
            'jumlah_total'          => $row['jumlah_total'],
            'keterangan'            => $row['keterangan'],
            'status'                => $row['status'], // enum: Belum memiliki nilai taksir, Memiliki nilai taksir, Terjual
            'bidang'                => $row['bidang'], // enum: Pidsus, Pidum
            'Timestamp'               => now(),
        ]);
    }

    /**
     * Validasi setiap baris sebelum disimpan ke database.
     */
    public function rules(): array
    {
        return [
            'satuan_kerja'          => 'required|string|max:255',
            'jenis_barang_rampasan' => 'required|string|max:255',
            'barang_persediaan'     => 'required|string|max:255',
            'deskripsi_barang'      => 'nullable|string',
            'jumlah_total'          => 'required|integer|min:1',
            'keterangan'            => 'nullable|string',
            'status'                => 'required|in:Belum memiliki nilai taksir,Memiliki nilai taksir,Terjual',
            'bidang'                => 'required|in:Pidsus,Pidum',
            'Timestamp'             =>  now(),
        ];
    }
}
