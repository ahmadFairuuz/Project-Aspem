<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Perkara;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PerkaraController extends Controller
{
    public function index(){
        $perkara = Perkara::all();
        return view('perkara.index', compact('perkara'));
    }
}
