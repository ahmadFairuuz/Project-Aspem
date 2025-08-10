<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\RekapBarangRampasan;
use Illuminate\Support\Facades\Auth;

class RekapBarangRampasanController
{
    // Tampilkan semua data
    public function index()
    {
        $user = Auth::user(); // ambil user yang sedang login

        if ($user->hasGlobalAccess()) {
            // Admin bisa lihat semua data
            $rekap = RekapBarangRampasan::orderBy('created_at', 'desc')->get();
        } else {
            // User biasa hanya lihat data sesuai kabupaten_id mereka
            $rekap = RekapBarangRampasan::where('satuan_kerja', $user->satuan_kerja)->orderBy('created_at', 'desc')->get();
        }
        return view('rekap_rampasan.index', compact('rekap'));
    }

    // Tampilkan form input
    public function create()
    {
        $user = Auth::user();
        if ($user->hasGlobalAccess()) {
            $satkerUsers = User::select('id', 'satuan_kerja')->distinct()->get();
        } else {
            $satkerUsers = collect([$user]);
        }
        return view('rekap_rampasan.create', compact('satkerUsers', 'user'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'satuan_kerja' => 'required|string',
            'jenis_barang_rampasan' => 'required|string',
            'deskripsi_barang_rampasan' => 'nullable|string',
            'barang_persediaan' => 'nullable|string',
            'jumlah_total' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:Belum memiliki nilai taksir,Memiliki nilai taksir,Terjual',
            'bidang' => 'required|in:Pidsus,Pidum',
            'tanggal_input' => 'required|date',
        ]);

        RekapBarangRampasan::create($validated);

        return redirect()->route('rekap-barang-rampasan.index')->with('success', 'Data berhasil disimpan.');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $rekap = RekapBarangRampasan::findOrFail($id);
        return view('rekap_rampasan.edit', compact('rekap'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $rekap = RekapBarangRampasan::findOrFail($id);

        $validated = $request->validate([
            'satuan_kerja' => 'required|string',
            'tanah_dan_bangunan' => 'nullable|string',
            'hewan_dan_tanaman' => 'nullable|string',
            'peralatan_dan_mesin' => 'nullable|string',
            'aset_tetap_lainnya' => 'nullable|string',
            'aset_lain_lain' => 'nullable|string',
            'barang_persediaan' => 'nullable|string',
            'jumlah_total' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:Belum memiliki nilai taksir,Memiliki nilai taksir,Terjual',
            'bidang' => 'required|in:Pidsus,Pidum',
        ]);

        $rekap->update($validated);

        return redirect()->route('rekap-barang-rampasan.index')->with('success', 'Data berhasil diperbarui.');
    }

    // Hapus data
    public function destroy($id)
    {
        $rekap = RekapBarangRampasan::findOrFail($id);
        $rekap->delete();

        return redirect()->route('rekap-barang-rampasan.index')->with('success', 'Data berhasil dihapus.');
    }
}
