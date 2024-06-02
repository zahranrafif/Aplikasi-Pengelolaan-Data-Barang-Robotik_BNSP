<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('barang')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('transaksis.index', compact('transaksis'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('transaksis.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jenis' => 'required|in:masuk,keluar',
            'jumlah' => 'required|integer|min:1',
        ]);

        $transaksi = new Transaksi;
        $transaksi->barang_id = $request->barang_id;
        $transaksi->jenis = $request->jenis;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->save();

        $barang = Barang::find($request->barang_id);

        if ($request->jenis == 'masuk') {
            $barang->stok += $request->jumlah;
        } elseif ($request->jenis == 'keluar') {
            if ($barang->stok < $request->jumlah) {
                return redirect()->back()->withErrors('Stok barang tidak mencukupi untuk transaksi keluar.');
            }
            $barang->stok -= $request->jumlah;
        }

        $barang->save();

        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil diproses.');
    }

    public function show($id)
    {
        $transaksi = Transaksi::with('barang')->findOrFail($id);
        return view('transaksis.show', compact('transaksi'));
    }

    public function destroy(Transaksi $transaksi)
    {
        $barang = $transaksi->barang;

        if ($transaksi->jenis == 'masuk') {
            $barang->stok -= $transaksi->jumlah;
        } elseif ($transaksi->jenis == 'keluar') {
            $barang->stok += $transaksi->jumlah;
        }

        $barang->save();
        $transaksi->delete();

        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil dihapus dan stok barang diperbarui.');
    }
}
