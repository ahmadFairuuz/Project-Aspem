<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkara extends Model
{
  use HasFactory;
  protected $table = 'perkara'; // <- TAMBAHKAN INI
   protected $fillable = [
    'register_perkara',
    'tanggal_input',
    'satuan_kerja',
    'nama_barang',
    'nama_terpidana',
    'barang_bukti',
    'keterangan_barang_bukti',
    'status_perkara',
    'jenis_perkara',
    'no_putusan_inkraft',
    'kabupaten_id',

];

}
