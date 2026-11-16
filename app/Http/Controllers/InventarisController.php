<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index()
    {
        $data = Inventaris::all();
        return view('inventaris.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah'      => 'required|integer|min:0',
            'kondisi'     => 'required',
            'keterangan'  => 'nullable|string',
        ]);

        Inventaris::create($request->only(['nama_barang', 'jumlah', 'kondisi', 'keterangan']));

        return redirect()->route('inventaris.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = Inventaris::findOrFail($id);
        return view('inventaris.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah'      => 'required|integer|min:0',
            'kondisi'     => 'required',
            'keterangan'  => 'nullable|string',
        ]);

        $item = Inventaris::findOrFail($id);
        $item->update($request->only(['nama_barang', 'jumlah', 'kondisi', 'keterangan']));

        return redirect()->route('inventaris.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Inventaris::findOrFail($id)->delete();

        return redirect()->route('inventaris.index')->with('success', 'Data berhasil dihapus');
    }
}