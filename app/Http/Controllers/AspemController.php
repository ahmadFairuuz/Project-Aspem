<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Aspem;

class AspemController extends Controller
{
    public function index(){
        $aspem = Aspem::all();
        return view('label.label',compact('aspem'));
    }
}
