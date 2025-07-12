<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Kurir;
use Illuminate\Http\Request;

class KurirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $title = 'Delete Kurir!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        $kurirs = Kurir::with('cabang')->get();
        return view('kurir.index', compact('kurirs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cabangs = Cabang::all();
        return view('kurir.create', compact('cabangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kurir' => 'required|string|max:100',
            'alamat_kurir' => 'required|string|max:100',
            'no_telp' => 'required|string|max:15',
            'jenis_kendaraan' => 'required|string|max:50',
            'plat_nomor' => 'required|string|max:20',
            'status' => 'required|in:Aktif,Tidak Aktif',
            'cabang_id' => 'required|exists:tbl_cabang,id',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('kurir_photos', 'public');
            $validated['photo'] = $photoPath;
        }

        Kurir::create($validated);
        return redirect()->route('kurir.index')->with('success', 'Kurir berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kurir = Kurir::findOrFail($id);
        $cabangs = Cabang::all();
        return view('kurir.edit', compact('kurir', 'cabangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kurir = Kurir::findOrFail($id);
        $validated = $request->validate([
            'nama_kurir' => 'required|string|max:100',
            'alamat_kurir' => 'required|string|max:100',
            'no_telp' => 'required|string|max:15',
            'jenis_kendaraan' => 'required|string|max:50',
            'plat_nomor' => 'required|string|max:20',
            'status' => 'required|in:Aktif,Tidak Aktif',
            'cabang_id' => 'required|exists:tbl_cabang,id',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('kurir_photos', 'public');
            $validated['photo'] = $photoPath;
        } else {
            unset($validated['photo']);
        }

        $kurir->update($validated);
        return redirect()->route('kurir.index')->with('success', 'Kurir berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kurir = Kurir::findOrFail($id);
        $kurir->delete();
        return redirect()->route('kurir.index')->with('success', 'Kurir berhasil dihapus.');
    }
}
