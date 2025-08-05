<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Perkara;
use Illuminate\Http\Request;
use App\Exports\PerkaraExport;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

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
    public function edit(Perkara $id)
    {
        return view('perkara.edit', compact('id'));
    }

    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate(
            [
                'register_perkara' => 'required|max:100',
                'satuan_kerja' => 'nullable|max:100',
                'nama_barang' => 'nullable|max:100',
                'nama_terpidana' => 'nullable|max:100',
                'barang_bukti' => 'required|max:100',
                'keterangan_barang_bukti' => 'nullable|max:255',
                'jenis_perkara' => 'nullable|max:100',
                'status_perkara' => 'nullable|max:100',
                'no_putusan_inkraft' => 'nullable|max:100',
            ],
            [
                'register_perkara.required' => 'Register perkara wajib diisi.',
                'register_perkara.max' => 'Maksimal 100 karakter.',
                'barang_bukti.required' => 'Barang bukti wajib diisi.',
                'barang_bukti.max' => 'Maksimal 100 karakter.',
                'keterangan_barang_bukti.max' => 'Maksimal 255 karakter.',
            ],
        );

        // Update data perkara
        DB::table('perkara')
            ->where('id', $id)
            ->update([
                'register_perkara' => $request->register_perkara,
                'satuan_kerja' => $request->satuan_kerja,
                'nama_barang' => $request->nama_barang,
                'nama_terpidana' => $request->nama_terpidana,
                'barang_bukti' => $request->barang_bukti,
                'keterangan_barang_bukti' => $request->keterangan_barang_bukti,
                'jenis_perkara' => $request->jenis_perkara,
                'status_perkara' => $request->status_perkara,
                'no_putusan_inkraft' => $request->no_putusan_inkraft,
                'updated_at' => now(), // opsional, jika kamu ingin perbarui waktu
            ]);

        return redirect()->route('perkara.index')->with('success', 'Data perkara berhasil diperbarui.');
    }

    public function destroy(Perkara $id)
    {
        $id->delete();

        return redirect()->route('perkara.index')->with('success', 'Data berhasil di hapus');
    }
        public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|max:2048',
        ]);
        Excel::import(new PerkaraImport, $request->file('file'));
        return redirect()->back()->with('success', 'Users Imported Successfully');
    }

    public function export()
    {
        return Excel::download(new PerkaraExport, 'daftar-perkara.xlsx');
    }
}
