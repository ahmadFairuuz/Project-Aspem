<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Aspem;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AspemController extends Controller
{
    public function showLoginForm(){
       if (Auth::check()) {
            return redirect('dashboard');
        }else{
            return view('login');
        }
    }
    public function login(Request $request){
       //VALIDASI INPUT
        $request->validate([
        'name' => 'required',
        'password' => 'required',
        ]);
       
       //CEK KREDENSIAL
       if(Auth::attempt(['name' => $request->name, 'password' => $request->password])){
        return redirect() -> intended('/dashboard');
       }
       return back()->with('error', 'Username atau password salah!');
    }

    public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();


    return redirect('login');
}    
    public function index(){
        $user = Auth::user(); // ambil user yang sedang login

        if ($user->hasGlobalAccess()) {
            // Admin bisa lihat semua data
            $aspem = Aspem::orderBy('created_at', 'desc')->get();
        } else {
            // User biasa hanya lihat data sesuai kabupaten_id mereka
            $aspem = Aspem::where('kabupaten_id', $user->kabupaten_id)->orderBy('created_at', 'desc')->get();
        } 
        if (in_array($user->role, ['kajati', 'validator'])) {
        abort(403, 'Akses ditolak.');
    }
        
        return view('label.label',compact('aspem')); 
    }
    public function create()
    {
         $user = Auth::user(); // ambil user yang sedang login
         if (in_array($user->role, ['kajati', 'validator'])) {
        abort(403, 'Akses ditolak');
    }
        return view('label.create');
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'register_perkara' => 'required|max:100',
            'barang_bukti' => 'required|max:255',
            'tanggal_barbuk' => 'required|date',
            'keterangan' => 'nullable|string',
        ],
        [
            'register_perkara.required' => 'Register perkara wajib diisi',
            'register_perkara.max' => 'Maksimal 100 karakter',
            'barang_bukti.required' => 'Barang bukti wajib diisi',
            'barang_bukti.max' => 'Maksimal 255 karakter',
            'tanggal_barbuk.required' => 'Tanggal barbuk wajib diisi',
            'tanggal_barbuk.date' => 'Format tanggal tidak valid',
        ]);

        DB::table('aspems')->insert([
            'register_perkara' => $request->register_perkara,
            'barang_bukti' => $request->barang_bukti,
            'tanggal_barbuk' => $request->tanggal_barbuk,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('label.index')->with('success', 'Data berhasil disimpan.');
    }
    public function edit(Aspem $id)
    {
        return view('label.edit', compact('id'));
    }
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'register_perkara' => 'required|max:100',
            'barang_bukti' => 'required|max:100',
            'tanggal_barbuk' => 'required|date',
            'keterangan' => 'nullable|max:255',
        ],
        [
            'register_perkara.required' => 'Register perkara wajib diisi.',
            'register_perkara.max' => 'Register perkara maksimal 100 karakter.',
            'barang_bukti.required' => 'Barang bukti wajib diisi.',
            'barang_bukti.max' => 'Barang bukti maksimal 100 karakter.',
            'tanggal_barbuk.required' => 'Tanggal wajib diisi.',
            'tanggal_barbuk.date' => 'Format tanggal tidak valid.',
            'keterangan.max' => 'Keterangan maksimal 255 karakter.',
        ]);
        $validated['kabupaten_id'] = Auth::user()->kabupaten_id;


        // Update data aspem
        DB::table('aspems')->where('id', $id)->update([
            'register_perkara' => $request->register_perkara,
            'barang_bukti' => $request->barang_bukti,
            'tanggal_barbuk' => $request->tanggal_barbuk,
            'keterangan' => $request->keterangan,
        ]);

        // Redirect ke halaman index aspem
        return redirect()->route('label.index')->with('success', 'Data berhasil diupdate.');
    }
    public function destroy(Aspem $id)
    {
        $id->delete();
        
        return redirect()->route('label.index')
                ->with('success','Data berhasil di hapus' );
    }
    


}

