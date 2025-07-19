<?php

namespace App\Http\Controllers;

use App\Models\StokMasuk;
use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StokMasukController extends Controller
{
    public function create()
    {
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('stok_masuk.create', compact('barang', 'supplier'));
    }

    public function edit($id)
    {
        $stokMasuk = StokMasuk::findOrFail($id);
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('stok_masuk.edit', compact('stokMasuk', 'barang', 'supplier'));
    }
    public function index()
    {
        $stokMasuk = StokMasuk::with(['barang', 'supplier'])->latest()->get();
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('stok_masuk.index', compact('stokMasuk', 'barang', 'supplier'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:tbl_barang,id',
            'supplier_id' => 'required|exists:tbl_supplier,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
        ]);
        $stokMasuk = StokMasuk::create($request->all());
        $barang = Barang::find($request->barang_id);
        if ($barang) {
            $barang->stok += $request->jumlah;
            $barang->save();
        }
        return redirect('stok_masuk')->with('success', 'Stok masuk berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $stokMasuk = StokMasuk::findOrFail($id);
        // Hitung selisih jumlah lama dan baru
        $jumlahLama = $stokMasuk->jumlah;
        $stokMasuk->update($request->all());
        $barang = Barang::find($stokMasuk->barang_id);
        if ($barang) {
            $barang->stok += ($stokMasuk->jumlah - $jumlahLama);
            $barang->save();
        }
        return redirect()->back()->with('success', 'Stok masuk berhasil diupdate');
    }

    public function destroy($id)
    {
        $stokMasuk = StokMasuk::findOrFail($id);
        $barang = Barang::find($stokMasuk->barang_id);
        if ($barang) {
            $barang->stok -= $stokMasuk->jumlah;
            $barang->save();
        }
        $stokMasuk->delete();
        return redirect()->back()->with('success', 'Stok masuk berhasil dihapus');
    }
}
