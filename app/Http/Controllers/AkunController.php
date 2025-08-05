<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // ambil user yang sedang login

        if ($user->role == 'superadmin') {
            // Admin bisa lihat semua data
            $akun = User::get();
        } if (in_array($user->role, ['kajati', 'validator','user'])) {
        abort(403, 'Akses ditolak.');
    }
        return view('akun.index', compact('akun'));
    }
    public function destroy(User $id)
    {
        $id->delete();
        
        return redirect()->route('akun.index')
                ->with('success','Akun berhasil di hapus' );
    }
    public function edit(User $id)
    {
        return view('akun.edit', compact('id'));
    }
    public function update(Request $request, string $id)
{
    $request->validate([
        'password' => 'nullable|min:6',
    ],
    [
        'password.min' => 'Password minimal 6 karakter.',
    ]);

    // Hanya update password jika diisi
    if ($request->filled('password')) {
        DB::table('users')->where('id', $id)->update([
            'password' => Hash::make($request->password),
        ]);
    }

    return redirect()->route('akun.index')->with('success', 'Password berhasil diperbarui.');
}
}
