<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Aspem;


class LabelController 
{

   
public function generate($id)
{
    $item = Aspem::findOrFail($id);

    $qrData = "Register Perkara: {$item->register_perkara}\nBarang Bukti: {$item->barang_bukti}\nTanggal: {$item->tanggal_barbuk}\nKeterangan: {$item->keterangan}";

    $qrCode = QrCode::size(300)->generate($qrData);

    return view('label.qrcode', compact('item', 'qrCode'));
}
}

