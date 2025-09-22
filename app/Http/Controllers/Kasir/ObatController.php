<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::orderBy('id_obat', 'desc')->paginate(10); // pakai id_obat
        return view('kasir.obat.index', compact('obats'));
    }

    public function create()
    {
        return view('kasir.obat.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'kategori' => 'nullable|string|max:50',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'exp_date' => 'nullable|date',
            // 'supplier_id' => 'nullable|integer',
        ]);

        Obat::create($validated);

        return redirect()->route('kasir.obat.index')->with('success', 'Obat berhasil ditambahkan');
    }

    public function edit(Obat $obat)
    {
        return view('kasir.obat.edit', compact('obat'));
    }

    public function update(Request $request, Obat $obat)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'kategori' => 'nullable|string|max:50',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'exp_date' => 'nullable|date',
            // 'supplier_id' => 'nullable|integer',
        ]);

        $obat->update($validated);

        return redirect()->route('kasir.obat.index')->with('success', 'Obat berhasil diperbarui');
    }

    public function destroy(Obat $obat)
    {
        $obat->delete();
        return redirect()->route('kasir.obat.index')->with('success', 'Obat berhasil dihapus');
    }
}
