<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Perkara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class LabelController 
{
   public function index()
    {
        $user = Auth::user(); // ambil user yang sedang login

        if ($user->hasGlobalAccess()) {
            // Admin bisa lihat semua data
            $label = Label::orderBy('created_at', 'desc')->get();
        } else {
            // User biasa hanya lihat data sesuai kabupaten_id mereka
            $label = Label::where('satuan_kerja', $user->satuan_kerja)->orderBy('created_at', 'desc')->get();
        }
        if (in_array($user->role, ['kajati', 'validator'])) {
            abort(403, 'Akses ditolak.');
        }

        return view('label.label', compact('label'));
    }
    public function create()
    {
        $user = Auth::user();
        if ($user->hasGlobalAccess()) {
            $satkerUsers = User::select('id', 'satuan_kerja')->distinct()->get();
        } else {
            $satkerUsers = collect([$user]);
        }
        if (in_array($user->role, ['kajati', 'validator'])) {
            abort(403, 'Akses ditolak');
        }
        return view('label.create', compact('satkerUsers', 'user'));
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate(
            [
                'register_perkara' => 'required|max:100',
                'satuan_kerja'     => 'required|max:100',
                'barang_bukti'     => 'required|max:255',
                'tanggal_barbuk'   => 'required|date',
                'keterangan'       => 'nullable|string',
            ],
            [
                'register_perkara.required' => 'Register perkara wajib diisi',
                'register_perkara.max'      => 'Maksimal 100 karakter',
                'barang_bukti.required'     => 'Barang bukti wajib diisi',
                'barang_bukti.max'          => 'Maksimal 255 karakter',
                'tanggal_barbuk.required'   => 'Tanggal barbuk wajib diisi',
                'tanggal_barbuk.date'       => 'Format tanggal tidak valid',
            ],
        );

        DB::table('label')->insert([
            'register_perkara' => $request->register_perkara,
            'satuan_kerja'     => $request->satuan_kerja,
            'barang_bukti'     => $request->barang_bukti,
            'tanggal_barbuk'   => $request->tanggal_barbuk,
            'keterangan'       => $request->keterangan,
        ]);

        return redirect()->route('label.index')->with('success', 'Data berhasil disimpan.');
    }
    public function pisahkanLabel()
    {
        $dataAwal = DB::table('perkara')->get(); // Ganti dengan nama tabel awalmu

        foreach ($dataAwal as $row) {
            $registerPerkara   = $row->register_perkara;
            $namaBarangLumpSum = $row->barang_bukti;

            // Regex: ambil format seperti "1) Nama barang. 2) Nama barang. ..."
            preg_match_all('/\d+\)\s([^\.]+)\./', $namaBarangLumpSum, $matches);

            foreach ($matches[1] as $item) {
                Perkara::create([
                    'register_perkara' => $registerPerkara,
                    'barang_bukti'     => trim($item),
                ]);
            }
        }

        return 'Data label berhasil dipisah dan disimpan.';
    }
    public function edit(Label $id)
    {
        return view('label.edit', compact('id'));
    }
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate(
            [
                'register_perkara' => 'required|max:100',
                'barang_bukti'     => 'required|max:100',
                'tanggal_barbuk'   => 'required|date',
                'keterangan'       => 'nullable|max:255',
            ],
            [
                'register_perkara.required' => 'Register perkara wajib diisi.',
                'register_perkara.max'      => 'Register perkara maksimal 100 karakter.',
                'barang_bukti.required'     => 'Barang bukti wajib diisi.',
                'barang_bukti.max'          => 'Barang bukti maksimal 100 karakter.',
                'tanggal_barbuk.required'   => 'Tanggal wajib diisi.',
                'tanggal_barbuk.date'       => 'Format tanggal tidak valid.',
                'keterangan.max'            => 'Keterangan maksimal 255 karakter.',
            ],
        );

        // Update data label
        DB::table('label')
            ->where('id', $id)
            ->update([
                'register_perkara' => $request->register_perkara,
                'barang_bukti'     => $request->barang_bukti,
                'tanggal_barbuk'   => $request->tanggal_barbuk,
                'keterangan'       => $request->keterangan,
            ]);

        // Redirect ke halaman label
        return redirect()->route('label.index')->with('success', 'Data berhasil diupdate.');
    }
    public function destroy(Label $id)
    {
        $id->delete();

        return redirect()->route('label.index')->with('success', 'Data berhasil di hapus');
    }
public function generate($id)
{
    $item = Label::findOrFail($id);

    $qrData = "Register Perkara: {$item->register_perkara}\nBarang Bukti: {$item->barang_bukti}\nTanggal: {$item->tanggal_barbuk}\nKeterangan: {$item->keterangan}";

    $qrCode = QrCode::size(300)->generate($qrData);

    return view('label.qrcode', compact('item', 'qrCode'));
}
}

