<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkara extends Model
{
    use HasFactory;
    protected $fillable = [
       'register_perkara',
        'satuan_kerja',
        'nama_barang',
        'nama_terpidana',
        'barang_bukti',
        'tanggal_pengembalian',
        'keterangan_pengembalian',
        'status_perkara',
        'jenis_perkara',
        'no_putusan_inkraft'
    ];
}
