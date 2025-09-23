<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use App\Models\Supplier; // tambahkan ini
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::with('supplier')->orderBy('id_obat', 'desc')->paginate(10);
        return view('admin.obat.index', compact('obats'));
    }

    public function create()
    {
        $suppliers = Supplier::all(); // ambil semua supplier
        return view('admin.obat.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'kategori' => 'nullable|string|max:50',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'exp_date' => 'nullable|date',
            'supplier_id' => 'required|exists:supplier,id_supplier',
        ]);

        Obat::create($validated);

        return redirect()->route('admin.obat.index')->with('success', 'Obat berhasil ditambahkan');
    }

    public function edit(Obat $obat)
    {
        $suppliers = Supplier::all(); // ambil semua supplier juga untuk dropdown
        return view('admin.obat.edit', compact('obat', 'suppliers'));
    }

    public function update(Request $request, Obat $obat)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'kategori' => 'nullable|string|max:50',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'exp_date' => 'nullable|date',
            'supplier_id' => 'required|exists:supplier,id_supplier',
        ]);

        $obat->update($validated);

        return redirect()->route('admin.obat.index')->with('success', 'Obat berhasil diperbarui');
    }

    public function destroy(Obat $obat)
    {
        $obat->delete();
        return redirect()->route('admin.obat.index')->with('success', 'Obat berhasil dihapus');
    }
}
