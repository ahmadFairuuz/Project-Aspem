<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PNBP extends Model
{
    use HasFactory;
protected $table = 'pnbp';

    protected $fillable = [
        'satuan_kerja',
        'lelang',
        'uang',
        'uang_pengganti',
        'penjualan_langsung',
        'total',
        'realisasi_pnbp',
        'target_pnbp',
        'persentase',
        'keterangan',
        'periode_bulan',
    ];

    
}

