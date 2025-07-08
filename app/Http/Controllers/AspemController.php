<?php

namespace App\Http\Controllers;
use App\Models\Aspem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AspemController extends Controller
{
    public function login(){
        return view('login');
    }
    public function index(){
        $aspem = Aspem::all();
        return view('label.label',compact('aspem'));
    }
    public function create()
    {
        return view('label.create');
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'register_perkara' => 'required|max:100',
            'barang_bukti' => 'required|max:255',
            'tanggal_barbuk' => 'required|date',
            'keterangan' => 'nullable|string',
        ],
        [
            'register_perkara.required' => 'Register perkara wajib diisi',
            'register_perkara.max' => 'Maksimal 100 karakter',
            'barang_bukti.required' => 'Barang bukti wajib diisi',
            'barang_bukti.max' => 'Maksimal 255 karakter',
            'tanggal_barbuk.required' => 'Tanggal barbuk wajib diisi',
            'tanggal_barbuk.date' => 'Format tanggal tidak valid',
        ]);

        DB::table('aspems')->insert([
            'register_perkara' => $request->register_perkara,
            'barang_bukti' => $request->barang_bukti,
            'tanggal_barbuk' => $request->tanggal_barbuk,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('label.index')->with('success', 'Data berhasil disimpan.');
    }
    public function edit(Aspem $id)
    {
        return view('label.edit', compact('id'));
    }
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'register_perkara' => 'required|max:100',
            'barang_bukti' => 'required|max:100',
            'tanggal_barbuk' => 'required|date',
            'keterangan' => 'nullable|max:255',
        ],
        [
            'register_perkara.required' => 'Register perkara wajib diisi.',
            'register_perkara.max' => 'Register perkara maksimal 100 karakter.',
            'barang_bukti.required' => 'Barang bukti wajib diisi.',
            'barang_bukti.max' => 'Barang bukti maksimal 100 karakter.',
            'tanggal_barbuk.required' => 'Tanggal wajib diisi.',
            'tanggal_barbuk.date' => 'Format tanggal tidak valid.',
            'keterangan.max' => 'Keterangan maksimal 255 karakter.',
        ]);

        // Update data aspem
        DB::table('aspems')->where('id', $id)->update([
            'register_perkara' => $request->register_perkara,
            'barang_bukti' => $request->barang_bukti,
            'tanggal_barbuk' => $request->tanggal_barbuk,
            'keterangan' => $request->keterangan,
        ]);

        // Redirect ke halaman index aspem
        return redirect()->route('label.index')->with('success', 'Data berhasil diupdate.');
    }
    public function destroy(Aspem $id)
    {
        $id->delete();
        
        return redirect()->route('label.index')
                ->with('success','Data berhasil di hapus' );
    }


}
