<?php
namespace App\Http\Controllers;


use App\Models\Perkara;
use App\Models\Tunggakan;
use App\Models\BarangRampasan;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPerkara = Perkara::count();
        $totalBarangRampasan = BarangRampasan::count();
        $totalTunggakan = Tunggakan::count();

        return view('dashboard', compact('totalPerkara', 'totalBarangRampasan', 'totalTunggakan'));
    }
}
