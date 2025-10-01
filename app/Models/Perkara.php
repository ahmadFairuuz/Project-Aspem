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
    'jaksa',
    'pasal_dakwaan',
    'pasal_terbukti',
    'status',
    'nama_terpidana',
    'barang_bukti',
    'keterangan_barang_bukti',
    'status_perkara',
    'jenis_perkara',
    'no_putusan_inkraft',

];
public function barangRampasan()
{
    return $this->hasMany(BarangRampasan::class);
}
public function label()
{
    return $this->hasMany(Label::class);
}
}
