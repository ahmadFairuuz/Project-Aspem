<?php

namespace App\Http\Controllers;

use App\Models\RekapBarangRampasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Exports\RekapBarangRampasanExport;
use App\Imports\RekapBarangRampasanImport;

use Maatwebsite\Excel\Facades\Excel;


class RekapBarangRampasanController 
{
    // Tampilkan semua data
    public function index(Request $request)
    {
       $query = RekapBarangRampasan::query();

    // Filter Bidang
    if ($request->filled('bidang')) {
        $query->where('bidang', $request->bidang);
    }

    // Filter Status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // Filter Rentang Waktu (dalam hari)
    if ($request->filled('rentang')) {
        $tanggalBatas = now()->subDays($request->rentang);
        $query->whereDate('tanggal', '>=', $tanggalBatas);
    }

    $rekap = $query->get();

    return view('rekap_rampasan.index', compact('rekap'));
    }

    // Tampilkan form input
    public function create()
    {
        return view('rekap_rampasan.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'satuan_kerja' => 'required|string',
            'jenis_barang_rampasan' => 'required|string',
            'deskripsi_barang' => 'nullable|string',
            'barang_persediaan' => 'nullable|string',
            'jumlah_total' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:Belum memiliki nilai taksir,Memiliki nilai taksir,Terjual',
            'bidang' => 'required|in:Pidsus,Pidum',
        ]);

        $validated['Timestamp'] = now();

        RekapBarangRampasan::create($validated);

        return redirect()->route('rekap-barang-rampasan.index')
            ->with('success', 'Data berhasil disimpan.');
    }

    // Tampilkan form edit
       public function edit($id)
    {
        $rekap = RekapBarangRampasan::findOrFail($id);
        return view('rekap_rampasan.edit', compact('rekap'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'satuan_kerja' => 'required|string',
            'jenis_barang_rampasan' => 'required|in:Tanah dan Bangunan,Hewan dan Tanaman,Peralatan dan Mesin,Aset Tetap Lainnya,Aset Lain-lain',
            'deskripsi_barang' => 'nullable|string',
            'barang_persediaan' => 'nullable|string',
            'jumlah_total' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:Belum memiliki nilai taksir,Memiliki nilai taksir,Terjual',
            'bidang' => 'required|in:Pidsus,Pidum',
        ]);

        $rekap = RekapBarangRampasan::findOrFail($id);
        $rekap->update($validated);

        return redirect()->route('rekap-barang-rampasan.index')
                         ->with('success', 'Data berhasil diperbarui.');
    }
    // Hapus data
    public function destroy($id)
    {
        $rekap = RekapBarangRampasan::findOrFail($id);
        $rekap->delete();

        return redirect()->route('rekap-barang-rampasan.index')
            ->with('success', 'Data berhasil dihapus.');
    }

     public function import(Request $request)
    {
        $request->validate([
    'file' => 'required|mimes:xlsx,xls,csv|max:2048',
]);

        Excel::import(new RekapBarangRampasanImport(), $request->file('file'));
         return redirect()->back()->with('success', 'Users Imported Successfully');
    }

    public function export()
    {
        return Excel::download(new RekapBarangRampasanExport(), 'rekap-rampasan.xlsx');
    }
}
