<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tunggakan extends Model
{
    use HasFactory;

    // Nama tabel (opsional, kalau tidak sesuai konvensi)
    protected $table = 'tunggakan';

    // Field yang bisa diisi (mass assignable)
    protected $fillable = [
        'no_putusan',
        'satuan_kerja',
        'nama_terpidana',
        'no_register',
        'nama_barang',
        'jumlah',
    ];
}
