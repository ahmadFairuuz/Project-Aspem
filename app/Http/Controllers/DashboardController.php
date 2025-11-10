<?php
namespace App\Http\Controllers;

use App\Models\PNBP;
use App\Models\Perkara;
use App\Models\Tunggakan;
use App\Models\BarangRampasan;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPerkara = Perkara::count();
        $totalBarangRampasan = BarangRampasan::count();
        $totalTunggakan = Tunggakan::count();

        // $pnbpData = PNBP::select('satuan_kerja', 'realisasi_pnbp', 'target_pnbp')->get();

        $pnbpData = DB::table('pnbp')->select('satuan_kerja', DB::raw('SUM(realisasi_pnbp) as total_pnbp'))->groupBy('satuan_kerja')->get();

        return view('dashboard', compact('totalPerkara', 'totalBarangRampasan', 'totalTunggakan', 'pnbpData'));
    }
}
