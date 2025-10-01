<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;
    protected $table = 'label';

    protected $fillable = [
       'register_perkara',
       'satuan_kerja',
        'barang_bukti',
        'tanggal_barbuk',
        'keterangan'
    ];
    public function perkara()
    {
        return $this->belongsTo(Perkara::class);
    }
}

