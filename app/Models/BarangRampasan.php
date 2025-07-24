<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangRampasan extends Model
{
    use HasFactory;

    protected $table = 'barang_rampasan';

    protected $fillable = [
        'register_perkara',
        'nama_barang',
        'tgl_pengambilan',
        'keterangan_pengambilan',
        'tgl_pengembalian',
        'keterangan_pengembalian',
        'status',
        'tgl_cetak',
    ];
}
