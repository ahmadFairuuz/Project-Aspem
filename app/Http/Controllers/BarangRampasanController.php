<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BarangRampasan;

class BarangRampasanController extends Controller
{
    public function index()
    {
        $barangRampasan = BarangRampasan::all();
        return view('barang_rampasan.index', compact('barangRampasan'));
    }

    public function create()
    {
        return view('barang_rampasan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'satker' => 'required|max:100',
            'tanggal_cetak' => 'required|date',
        ], [
            'satker.required' => 'Satker wajib diisi',
            'tanggal_cetak.required' => 'Tanggal cetak wajib diisi',
            'tanggal_cetak.date' => 'Format tanggal tidak valid',
        ]);

        DB::table('barang_rampasan')->insert([
            'satker' => $request->satker,
            'tanggal_cetak' => $request->tanggal_cetak,
        ]);

        return redirect()->route('barang-rampasan.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit(BarangRampasan $barangRampasan)
    {
        return view('barang_rampasan.edit', compact('barangRampasan'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'satker' => 'required|max:100',
            'tanggal_cetak' => 'required|date',
        ]);

        DB::table('barang_rampasan')->where('id', $id)->update([
            'satker' => $request->satker,
            'tanggal_cetak' => $request->tanggal_cetak,
        ]);

        return redirect()->route('barang-rampasan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(BarangRampasan $barangRampasan)
    {
        $barangRampasan->delete();
        return redirect()->route('barang-rampasan.index')->with('success', 'Data berhasil dihapus.');
    }
}
