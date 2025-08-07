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
        'tanah_dan_bangunan',
        'hewan_dan_tanaman',
        'peralatan_dan_mesin',
        'aset_tetap_lainnya',
        'aset_lain_lain',
        'barang_persediaan',
        'jumlah_total',
        'keterangan',
        'status', // enum: Belum memiliki nilai taksir, Memiliki nilai taksir, Terjual
        'bidang', // enum: Pidsus, Pidum
    ];



    protected $casts = [
        'tgl_input' => 'date',
    ];
}
