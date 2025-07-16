<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangRampasan extends Model
{
    use HasFactory;

    protected $table = 'barang_rampasan'; // pastikan sesuai nama tabel di database

    protected $fillable = [
        'register_perkara',
        'barang_bukti',
        'tanggal_barbuk',
        'keterangan',
        'satker',
    ];
}
