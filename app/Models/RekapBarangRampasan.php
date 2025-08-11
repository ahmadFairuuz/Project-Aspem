<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapBarangRampasan extends Model
{
    use HasFactory;

    protected $table = 'rekap_barang_rampasan';

    protected $fillable = [
        'satuan_kerja',
        'jenis_barang_rampasan',
        'deskripsi_barang',
        'jumlah_total',
        'keterangan',
        'kendala',
        'solusi',
        'status',
        'bidang',
        'tanggal_input',
    ];
}