<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Perkara;
use Illuminate\Http\Request;
use App\Exports\PerkaraExport;
use App\Imports\PerkaraImport;
use App\Models\BarangRampasan;
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
            $perkara = Perkara::where('satuan_kerja', $user->satuan_kerja)->orderBy('created_at', 'desc')->get();
        }

        return view('perkara.index', compact('perkara'));
    }
    public function create()
    {
        $user = Auth::user();
        if ($user->hasGlobalAccess()) {
            $satkerUsers = User::select('id', 'satuan_kerja')->distinct()->get();
        } else {
            $satkerUsers = collect([$user]);
        }

        if ($user->name === 'kajati') {
            abort(403, 'Akses ditolak.');
        }
        return view('perkara.create', compact('satkerUsers', 'user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'register_perkara' => 'required|max:100',
                'tanggal_input' => 'required|date',
                'satuan_kerja' => 'required|max:100',
                'jaksa' => 'required|max:100',
                'pasal_dakwaan' => 'required|string',
                'pasal_terbukti' => 'required|string',
                'status' => 'required|string',
                'nama_terpidana' => 'required|string',
                'barang_bukti' => 'required|string|max:255',
                'keterangan_barang_bukti' => 'required|string',
                'status_perkara' => 'nullable|string',
                'jenis_perkara' => 'required|string',
                'no_putusan_inkraft' => 'required|string',
            ],
            [
                'register_perkara.required' => 'Register perkara wajib diisi.',
                'tanggal_input.required' => 'Tanggal input wajib diisi.',
                'tanggal_input.date' => 'Format tanggal tidak valid.',
                'barang_bukti.required' => 'Barang bukti wajib diisi.',
                'barang_bukti.max' => 'Barang bukti maksimal 255 karakter.',
                'nama_terpidana.required' => 'Nama terpidana wajib diisi.',
                // tambahkan pesan lain sesuai kebutuhan
            ],
        );

        // Simpan data ke tabel perkara
        $perkara = Perkara::create([
            'register_perkara' => $request->register_perkara,
            'tanggal_input' => $request->tanggal_input,
            'satuan_kerja' => $request->satuan_kerja,
            'jaksa' => $request->jaksa,
            'pasal_dakwaan' => $request->pasal_dakwaan,
            'pasal_terbukti' => $request->pasal_terbukti,
            'status' => $request->status,
            'nama_terpidana' => $request->nama_terpidana,
            'barang_bukti' => $request->barang_bukti,
            'keterangan_barang_bukti' => $request->keterangan_barang_bukti,
            'jenis_perkara' => $request->jenis_perkara,
            'no_putusan_inkraft' => $request->no_putusan_inkraft,
        ]);

        BarangRampasan::create([
            'perkara_id' => $perkara->id,
            'register_perkara' => $perkara->register_perkara,
            'satuan_kerja' => $perkara->satuan_kerja,
            'barang_bukti' => $perkara->barang_bukti,
            'tgl_cetak' => now(),
            'status' => 'PENGEMBALIAN',
        ]);

        return redirect()->route('perkara.index')->with('success', 'Data perkara berhasil ditambahkan.');
    }

    public function validasi()
    {
        $perkara = Perkara::get(); // atau sesuaikan
        return view('perkara.validasi', compact('perkara'));
    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_perkara' => 'required|in:DISETUJUI,PENDING,DITOLAK',
        ]);

        $perkara = Perkara::findOrFail($id);
        $perkara->status_perkara = $request->status_perkara;
        $perkara->save();

        return redirect()->back()->with('success', 'Status perkara berhasil diperbarui.');
    }

    public function edit(Perkara $id)
    {
        if (Auth::user()->name === 'kajati,validator') {
            abort(403, 'Akses ditolak.');
        }
        return view('perkara.edit', compact('id'));
    }

    public function update(Request $request, string $id)
    {
        if (Auth::user()->name === 'kajati,validator') {
            abort(403, 'Akses ditolak.');
        }
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
        if (Auth::user()->name === 'kajati,validator') {
            abort(403, 'Akses ditolak.');
        }
        $id->delete();

        return redirect()->route('perkara.index')->with('success', 'Data berhasil di hapus');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|max:2048',
        ]);
        Excel::import(new PerkaraImport(), $request->file('file'));
        return redirect()->back()->with('success', 'Users Imported Successfully');
    }

    public function export()
    {
        return Excel::download(new PerkaraExport(), 'daftar-perkara.xlsx');
    }
}
