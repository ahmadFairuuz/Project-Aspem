<?php
namespace App\Http\Controllers;

use App\Exports\BarangRampasanExport;
use App\Exports\BarangRampasanImport;
use App\Models\BarangRampasan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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
    public function simpanPengambilan(Request $request, $id)
    {
        $request->validate([
            'tgl_pengambilan' => 'required|date',
            'keterangan_pengambilan' => 'nullable|string',
        ]);

        $barang = BarangRampasan::findOrFail($id);
        $barang->status = 'PENGAMBILAN';
        $barang->tgl_pengambilan = $request->tgl_pengambilan;
        $barang->keterangan_pengambilan = $request->keterangan_pengambilan;
        $barang->tgl_pengembalian = null;
        $barang->keterangan_pengembalian = null;
        $barang->save();

        return redirect()->back()->with('success', 'Barang berhasil dipinjam.');
    }

    public function simpanPengembalian(Request $request, $id)
    {
        $request->validate([
            'tgl_pengembalian' => 'required|date',
            'keterangan_pengembalian' => 'nullable|string',
        ]);

        $barang = BarangRampasan::findOrFail($id);
        $barang->status = 'PENGEMBALIAN';
        $barang->tgl_pengembalian = $request->tgl_pengembalian;
        $barang->keterangan_pengembalian = $request->keterangan_pengembalian;
        $barang->save();

        return redirect()->back()->with('success', 'Barang berhasil dikembalikan.');
    }
}
