<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspem extends Model
{
    use HasFactory;
    protected $fillable = [
       'register_perkara',
        'barang_bukti',
        'tanggal_barbuk',
        'keterangan'
    ];
    
}

