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
            'satuan_kerja' => $row['satuan_kerja'],
            'jenis_barang_rampasan' => $row['jenis_barang_rampasan'],
            'deskripsi_barang' => $row['deskripsi_barang'],
            'jumlah_total' => $row['jumlah_total'],
            'keterangan' => $row['keterangan'],
            'kendala' => $row['kendala'],
            'solusi' => $row['solusi'],
            'status' => $row['status'], // enum: Belum memiliki nilai taksir, Memiliki nilai taksir, Terjual
            'bidang' => $row['bidang'],
            'tanggal_input' => $row['tanggal_input'], // enum: Pidsus, Pidum
        ]);
    }

    /**
     * Validasi setiap baris sebelum disimpan ke database.
     */
    public function rules(): array
    {
        return [
            'satuan_kerja' => 'required|string',
            'jenis_barang_rampasan' => 'required|string',
            'deskripsi_barang' => 'required|string',
            'jumlah_total' => 'required',
            'keterangan' => 'nullable|string',
            'kendala' => 'nullable|string',
            'solusi' => 'nullable|string',
            'status' => 'required',
            'bidang' => 'required',
            'tanggal_input' => 'required',
        ];
    }
}
