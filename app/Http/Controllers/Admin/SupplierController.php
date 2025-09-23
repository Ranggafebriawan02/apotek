<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('admin.supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('admin.supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'kontak' => 'nullable|string|max:50',
            'alamat' => 'nullable|string',
        ]);

        Supplier::create($request->all());

        return redirect()->route('admin.supplier.index')
                         ->with('success', 'Supplier berhasil ditambahkan');
    }

    public function edit(Supplier $supplier)
    {
        return view('admin.supplier.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'kontak' => 'nullable|string|max:50',
            'alamat' => 'nullable|string',
        ]);

        $supplier->update($request->all());

        return redirect()->route('admin.supplier.index')
                         ->with('success', 'Supplier berhasil diperbarui');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('admin.supplier.index')
                         ->with('success', 'Supplier berhasil dihapus');
    }
}
