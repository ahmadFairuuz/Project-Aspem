<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Perkara;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PerkaraController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // ambil user yang sedang login

        if ($user->hasGlobalAccess()) {
            // Admin bisa lihat semua data
            $perkara = Perkara::orderBy('created_at', 'desc')->get();
        } else {
            // User biasa hanya lihat data sesuai kabupaten_id mereka
            $perkara = Perkara::where('kabupaten_id', $user->kabupaten_id)->orderBy('created_at', 'desc')->get();
        }

        return view('perkara.index', compact('perkara'));
    }
    public function create()
    {
         if (Auth::user()->name === 'kajati') {
        abort(403, 'Akses ditolak.');
    }
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
        $validated['kabupaten_id'] = Auth::user()->kabupaten_id;

        Perkara::create($validated);

        return redirect()->route('perkara.index')->with('success', 'Data berhasil ditambahkan.');
    }
}
