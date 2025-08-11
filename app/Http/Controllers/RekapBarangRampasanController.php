<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\RekapBarangRampasan;
use Illuminate\Support\Facades\Auth;
use App\Exports\RekapBarangRampasanExport;
use App\Imports\RekapBarangRampasanImport;

use Maatwebsite\Excel\Facades\Excel;

class RekapBarangRampasanController
{
    // Tampilkan semua data
    public function index(Request $request)
    {
        $user = Auth::user(); // ambil user yang sedang login

        if ($user->hasGlobalAccess()) {
            // Admin bisa lihat semua data
            $rekap = RekapBarangRampasan::orderBy('created_at', 'desc')->get();
        } else {
            // User biasa hanya lihat data sesuai kabupaten_id mereka
            $rekap = RekapBarangRampasan::where('satuan_kerja', $user->satuan_kerja)->orderBy('created_at', 'desc')->get();
        }

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
            $query->whereDate('tanggal_input', '>=', $tanggalBatas);
        }

        $rekap = $query->get();

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
            'deskripsi_barang' => 'required|string',
            'jumlah_total' => 'required|string',
            'keterangan' => 'required|string',
            'kendala' => 'nullable|string',
            'solusi' => 'nullable|string',
            'status' => 'required|in:Belum memiliki nilai taksir,Memiliki nilai taksir,Terjual',
            'bidang' => 'required|in:Pidsus,Pidum',
            'tanggal_input' => 'required|date',
        ]);

        $validated['Timestamp'] = now();

        RekapBarangRampasan::create($validated);

        return redirect()->route('rekap-barang-rampasan.index')->with('success', 'Data berhasil disimpan.');
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
        'jenis_barang_rampasan' => 'required|string',
        'deskripsi_barang' => 'required|string',
        'jumlah_total' => 'required|string',
        'keterangan' => 'required|string',
        'kendala' => 'nullable|string',
        'solusi' => 'nullable|string',
        'status' => 'required|in:Belum memiliki nilai taksir,Memiliki nilai taksir,Terjual',
        'bidang' => 'required|in:Pidsus,Pidum',
        'tanggal_input' => 'required|date',
    ]);

        $rekap = RekapBarangRampasan::findOrFail($id);
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
