<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Barang;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Barang!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis = ['Baju Fashion', 'Baju Melayu', 'Hijab', 'Celana'];
        return view('barang.create', compact('jenis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:100',
            'jenis_barang' => 'required|in:Baju Fashion,Baju Melayu,Hijab,Celana',
            'stok' => 'required|numeric',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'harga' => 'required|numeric',
            'keterangan' => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('barang', 'public');
            $validated['photo'] = $photoPath;
        }

        Barang::create($validated);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Barang::findOrFail($id);
        $jenis = ['Baju Fashion', 'Baju Melayu', 'Hijab', 'Celana'];
        return view('barang.edit', compact('barang', 'jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barang = Barang::findOrFail($id);
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:100',
            'jenis_barang' => 'required|in:Baju Fashion,Baju Melayu,Hijab,Celana',
            'stok' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'harga' => 'required|numeric',
            'keterangan' => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($barang->photo && Storage::disk('public')->exists($barang->photo)) {
                Storage::disk('public')->delete($barang->photo);
            }
            $photoPath = $request->file('photo')->store('barang', 'public');
            $validated['photo'] = $photoPath;
        }

        $barang->update($validated);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);
        if ($barang->photo && Storage::disk('public')->exists($barang->photo)) {
            Storage::disk('public')->delete($barang->photo);
        }
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
