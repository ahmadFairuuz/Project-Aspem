<?php

namespace App\Http\Controllers;

use App\Models\Tunggakan;
use App\Exports\TunggakanExport;
use App\Imports\TunggakanImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TunggakanController
{
    public function index()
    {
        $data = Tunggakan::paginate(10);
        return view('tunggakan.index', compact('data'));
    }

    public function create()
    {
        return view('tunggakan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_putusan' => 'required',
            'nama_terpidana' => 'required',
            'no_register' => 'required',
            'nama_barang' => 'required',
            'jumlah' => 'required|integer',
        ]);

        Tunggakan::create($request->all());

        return redirect()->route('tunggakan.index')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $tunggakan = Tunggakan::findOrFail($id);
        return view('tunggakan.edit', compact('tunggakan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_putusan' => 'required',
            'nama_terpidana' => 'required',
            'no_register' => 'required',
            'nama_barang' => 'required',
            'jumlah' => 'required|integer',
        ]);

        $tunggakan = Tunggakan::findOrFail($id);
        $tunggakan->update($request->all());

        return redirect()->route('tunggakan.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $tunggakan = Tunggakan::findOrFail($id);
        $tunggakan->delete();

        return redirect()->route('tunggakan.index')->with('success', 'Data berhasil dihapus');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|max:2048',
        ]);
        Excel::import(new TunggakanImport(), $request->file('file'));
        return redirect()->back()->with('success', 'Users Imported Successfully');
    }

    public function export()
    {
        return Excel::download(new TunggakanExport(), 'data-tunggakan.xlsx');
    }
}
