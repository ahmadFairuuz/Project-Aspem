<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        } else {
            return view('login');
        }
    }
    public function login(Request $request)
    {
        //VALIDASI INPUT
        $request->validate([
            'name'     => 'required',
            'password' => 'required',
        ]);

        //CEK KREDENSIAL
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            return redirect()->intended('/dashboard');
        }
        return back()->with('error', 'Username atau password salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
    
}
