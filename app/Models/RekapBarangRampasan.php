<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapBarangRampasan extends Model
{
    use HasFactory;

    protected $table = 'rekap_barang_rampasan';
    protected $dates = ['tanggal_input'];

    protected $fillable = [
        'satuan_kerja',
        'jenis_barang_rampasan',
        'barang_persediaan',
        'deskripsi_barang',
        'jumlah_total',
        'keterangan',
        'status', // enum: Belum memiliki nilai taksir, Memiliki nilai taksir, Terjual
        'bidang', // enum: Pidsus, Pidum
    ];



    protected $casts = [
        'tgl_input' => 'date',
    ];
}
