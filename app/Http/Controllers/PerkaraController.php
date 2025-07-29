<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Perkara;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PerkaraController extends Controller
{
    public function index(){
        $perkara = Perkara::all();
        return view('perkara.index', compact('perkara'));
    }
   public function create()
{
    return view('perkara.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'register_perkara' => 'required',
        'tanggal_input' => 'required|date',
        'satuan_kerja' => 'required',
        'nama_barang' => 'required',
        'nama_terpidana' => 'required',
        'barang_bukti' => 'required',
        'keterangan_barang_bukti' => 'required',
        'status_perkara' => 'required',
        'jenis_perkara' => 'required',
        'no_putusan_inkraft' => 'required',
    ]);

    \App\Models\Perkara::create($validated);

    return redirect()->route('perkara.index')->with('success', 'Data berhasil ditambahkan.');
}
}
