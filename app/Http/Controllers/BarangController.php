<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('supplier')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('barangs.index', compact('barangs'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        return view('barangs.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'supplier_id' => 'required|exists:suppliers,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $barang = new Barang;
        $barang->nama = $request->nama;
        $barang->deskripsi = $request->deskripsi;
        $barang->stok = $request->stok;
        $barang->harga = $request->harga;
        $barang->supplier_id = $request->supplier_id;

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $fileName);
            $barang->foto = $fileName;
        }

        $barang->save();

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit(Barang $barang)
    {
        $suppliers = Supplier::all();
        return view('barangs.edit', compact('barang', 'suppliers'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'supplier_id' => 'required|exists:suppliers,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $barang->nama = $request->nama;
        $barang->deskripsi = $request->deskripsi;
        $barang->stok = $request->stok;
        $barang->harga = $request->harga;
        $barang->supplier_id = $request->supplier_id;

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $fileName);
            $barang->foto = $fileName;
        }

        $barang->save();

        return redirect()->route('barangs.index');
    }

    public function show(Barang $barang)
    {
        return view('barangs.show', compact('barang'));
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barangs.index');
    }
}
