<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangRampasan;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BarangRampasanExport;
use App\Exports\BarangRampasanImport;

class BarangRampasanController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // ambil user yang sedang login
        $barangRampasan = BarangRampasan::all();
        return view('barang_rampasan.index', compact('barangRampasan'));
    }

    public function aktivitas()
    {
        $barangRampasan = BarangRampasan::all();
        return view('barang_rampasan.aktivitas', compact('barangRampasan'));
    }
    public function pisahkanBarang()
    {
        $dataAwal = DB::table('perkara')->get(); // Ganti dengan nama tabel awalmu

        foreach ($dataAwal as $row) {
            $registerPerkara = $row->register_perkara;
            $namaBarangLumpSum = $row->barang_bukti;

            // Regex: ambil format seperti "1) Nama barang. 2) Nama barang. ..."
            preg_match_all('/\d+\)\s([^\.]+)\./', $namaBarangLumpSum, $matches);

            foreach ($matches[1] as $item) {
                BarangRampasan::create([
                    'register_perkara' => $registerPerkara,
                    'barang_bukti' => trim($item),
                ]);
            }
        }

        return 'Data barang rampasan berhasil dipisah dan disimpan.';
    }
    public function create()
    {
        return view('barang_rampasan.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'satker' => 'required|max:100',
                'tanggal_cetak' => 'required|date',
            ],
            [
                'satker.required' => 'Satker wajib diisi',
                'tanggal_cetak.required' => 'Tanggal cetak wajib diisi',
                'tanggal_cetak.date' => 'Format tanggal tidak valid',
            ],
        );
        $validated['kabupaten_id'] = Auth::user()->kabupaten_id;

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

        DB::table('barang_rampasan')
            ->where('id', $id)
            ->update([
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
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|max:2048',
        ]);
        Excel::import(new BarangRampasanImport(), $request->file('file'));
        return redirect()->back()->with('success', 'Users Imported Successfully');
    }

    public function export()
    {
        return Excel::download(new BarangRampasanExport(), 'barang-rampasan.xlsx');
    }
}
