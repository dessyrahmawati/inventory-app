<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Cabang;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $title = 'Delete Cabang!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        $cabangs = Cabang::all();
        return view('cabang.index', compact('cabangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cabang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_cabang' => 'required|string|max:100',
            'alamat_cabang' => 'required|string|max:100',
            'no_telp' => 'required|string|max:15',
        ]);
        Cabang::create($validated);
        return redirect()->route('cabang.index')->with('success', 'Cabang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cabang = Cabang::findOrFail($id);
        return view('cabang.show', compact('cabang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cabang = Cabang::findOrFail($id);
        return view('cabang.edit', compact('cabang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_cabang' => 'required|string|max:100',
            'alamat_cabang' => 'required|string|max:100',
            'no_telp' => 'required|string|max:15',
        ]);
        $cabang = Cabang::findOrFail($id);
        $cabang->update($validated);
        return redirect()->route('cabang.index')->with('success', 'Cabang berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cabang = Cabang::findOrFail($id);
        $cabang->delete();
        return redirect()->route('cabang.index')->with('success', 'Cabang berhasil dihapus.');
    }
}
