<?php

namespace App\Http\Controllers;
use App\Models\PNBP;
use App\Models\User;
use App\Exports\PNBPExport;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PNBPController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // Ambil bulan dari request atau default bulan ini
        $bulan = $request->input('bulan', now()->format('Y-m'));

        // Query awal
        $query = PNBP::where('periode_bulan', $bulan);

        // Jika bukan admin/global access, filter berdasarkan kabupaten user
        if (!$user->hasGlobalAccess()) {
            $query->where('satuan_kerja', $user->satuan_kerja);
        }

        // Ambil data
        $pnbp = $query->orderBy('created_at', 'desc')->get();

        // Daftar bulan untuk dropdown filter
        $listBulan = PNBP::select('periode_bulan')->distinct()->orderByDesc('periode_bulan')->pluck('periode_bulan');

        return view('pnbp.index', compact('pnbp', 'bulan', 'listBulan'));
    }

    public function create()
{
    $user = Auth::user();

    if ($user->hasGlobalAccess()) {
        $satkerUsers = User::select('id', 'satuan_kerja')->distinct()->get();
    } else {
        $satkerUsers = collect([$user]);
    }

    $kabupaten = DB::table('kabupaten')->get();

    return view('pnbp.create', compact('kabupaten', 'satkerUsers', 'user'));
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'satuan_kerja' => 'required',
            'lelang' => 'nullable|numeric',
            'uang' => 'nullable|numeric',
            'uang_pengganti' => 'nullable|numeric',
            'penjualan_langsung' => 'nullable|numeric',
            'total' => 'nullable|numeric',
            'realisasi_pnbp' => 'nullable|numeric',
            'target_pnbp' => 'nullable|numeric',
            'keterangan' => 'nullable',
            'periode_bulan' => 'required',
        ]);

        $persentase = 0;
        if ($validated['target_pnbp'] != 0) {
            $persentase = ($validated['realisasi_pnbp'] / $validated['target_pnbp']) * 100;
        }

        $data = $request->all();
        $data['persentase'] = round($persentase, 2);

        PNBP::create($data);

        return redirect()->route('pnbp.index')->with('success', 'Data PNBP berhasil ditambahkan');
    }
    public function export(Request $request)
    {
        $bulan = $request->query('bulan');

        $data =
            $bulan && $bulan !== 'all'
                ? PNBP::where('periode_bulan', $bulan)
                    ->get()
                    ->makeHidden(['created_at', 'updated_at'])
                : PNBP::all()->makeHidden(['created_at', 'updated_at']);

        return Excel::download(new PNBPExport($data), 'pnbp_export.xlsx');
    }
}
