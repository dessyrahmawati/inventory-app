<?php

namespace App\Http\Controllers;

use App\Models\StokKeluar;
use App\Models\StokKeluarDetail;
use App\Models\Barang;
use App\Models\Kurir;
use App\Models\Cabang;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class StokKeluarController extends Controller
{
    // Step 1: Form Kurir
    public function createStep1()
    {
        $kurirs = Kurir::all();
        $cabangs = Cabang::all();
        $kurirCabang = [];
        foreach ($kurirs as $kurir) {
            $cabang = $cabangs->where('id', $kurir->cabang_id)->first();
            $kurirCabang[$kurir->id] = [
                'cabang_id' => $kurir->cabang_id ? $kurir->cabang_id : '',
                'nama_cabang' => $cabang ? $cabang->nama_cabang : '',
            ];
        }
        return view('stok_keluar.create_step1', compact('kurirs', 'kurirCabang'));
    }

    // Step 1 POST: Simpan ke session, redirect ke step2
    public function postStep1(Request $request)
    {
        $request->validate([
            'kurir_id' => 'required|exists:tbl_kurir,id',
            'cabang_id' => 'required|exists:tbl_cabang,id',
            'tanggal_keluar' => 'required|date',
        ]);
        Session::put('stok_keluar_form', [
            'kurir_id' => $request->kurir_id,
            'cabang_id' => $request->cabang_id,
            'tanggal_keluar' => $request->tanggal_keluar,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('stok-keluar.create-step2');
    }

    // Step 2: Form Barang & Cart
    public function createStep2()
    {
        $form = Session::get('stok_keluar_form');
        if (!$form) {
            return redirect()->route('stok-keluar.create-step1')->with('error', 'Isi data kurir terlebih dahulu.');
        }
        $barangs = Barang::all();
        $cart = Session::get('stok_keluar_cart', []);
        $kurir = Kurir::find($form['kurir_id']);
        $cabang = Cabang::find($form['cabang_id']);
        $kurirNama = $kurir ? $kurir->nama_kurir : '';
        $cabangNama = $cabang ? $cabang->nama_cabang : '';
        return view('stok_keluar.create_step2', compact('barangs', 'cart', 'form', 'kurirNama', 'cabangNama'));
    }
    public function tugasKurir()
    {
        $user = auth()->user();
        $kurir = Kurir::where('user_id', $user->id)->first();
        if (!$kurir) {
            return redirect()->route('home')->with('error', 'Anda bukan kurir.');
        }
        $tugas = StokKeluar::with(['cabang', 'details.barang'])
            ->where('kurir_id', $kurir->id)
            ->latest()->get();
        return view('kurir.tugas', compact('tugas'));
    }

    public function index(Request $request)
    {
        $barang = Barang::latest()->paginate(10);
        $stokKeluarQuery = StokKeluar::with(['kurir', 'cabang', 'details.barang']);
        if ($request->filled('tanggal_mulai')) {
            $stokKeluarQuery->whereDate('tanggal_keluar', '>=', $request->tanggal_mulai);
        }
        if ($request->filled('tanggal_sampai')) {
            $stokKeluarQuery->whereDate('tanggal_keluar', '<=', $request->tanggal_sampai);
        }
        $stokKeluar = $stokKeluarQuery->latest()->get();
        return view('stok_keluar.index', compact('stokKeluar', 'barang'));
    }

    public function create()
    {
        $barangs = Barang::all();
        $kurirs = Kurir::all();
        $cabangs = Cabang::all();
        $cart = Session::get('stok_keluar_cart', []);
        $form = Session::get('stok_keluar_form', [
            'kurir_id' => '',
            'cabang_id' => '',
            'tanggal_keluar' => '',
            'keterangan' => '',
        ]);
        $kurirCabang = [];
        foreach ($kurirs as $kurir) {
            $cabang = $cabangs->where('id', $kurir->cabang_id)->first();
            $kurirCabang[$kurir->id] = [
                'cabang_id' => $kurir->cabang_id ? $kurir->cabang_id : '',
                'nama_cabang' => $cabang ? $cabang->nama_cabang : '',
            ];
        }
        return view('stok_keluar.create', compact('barangs', 'kurirs', 'cabangs', 'cart', 'kurirCabang', 'form'));
    }

    public function addBarang(Request $request)
    {
        $cart = Session::get('stok_keluar_cart', []);
        $barang = Barang::find($request->barang_id);
        $cart[] = [
            'barang_id' => $request->barang_id,
            'nama_barang' => $barang ? ($barang->nama_barang ?? $barang->nama) : '',
            'jumlah' => $request->jumlah
        ];
        Session::put('stok_keluar_cart', $cart);
        // Simpan data form ke session agar tidak hilang
        Session::put('stok_keluar_form', [
            'kurir_id' => $request->kurir_id,
            'cabang_id' => $request->cabang_id,
            'tanggal_keluar' => $request->tanggal_keluar,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->back();
    }

    public function removeBarang($id)
    {
        $cart = Session::get('stok_keluar_cart', []);
        unset($cart[$id]);
        Session::put('stok_keluar_cart', array_values($cart));
        return redirect()->back();
    }


    public function store(Request $request)
    {
        $request->validate([
            'kurir_id' => 'required|exists:tbl_kurir,id',
            'cabang_id' => 'required|exists:tbl_cabang,id',
            'tanggal_keluar' => 'required|date',
        ]);
        $cart = Session::get('stok_keluar_cart', []);
        // Validasi cart: pastikan ada minimal satu item di cart
        if (empty($cart) || count($cart) < 1) {
            return redirect()->back()->with('error', 'Barang belum dipilih');
        }
        $stokKeluar = StokKeluar::create([
            'kurir_id' => $request->kurir_id,
            'cabang_id' => $request->cabang_id,
            'tanggal_keluar' => $request->tanggal_keluar,
            'keterangan' => $request->keterangan,
        ]);
        foreach ($cart as $item) {
            StokKeluarDetail::create([
                'stok_keluar_id' => $stokKeluar->id,
                'barang_id' => $item['barang_id'],
                'jumlah' => $item['jumlah'],
            ]);
            $barang = Barang::find($item['barang_id']);
            $barang->stok -= $item['jumlah'];
            $barang->save();
        }
        Session::forget('stok_keluar_cart');
        Session::forget('stok_keluar_form');
        return redirect()->route('stok-keluar.index')->with('success', 'Stok keluar berhasil disimpan');
    }



    public function clearCart()
    {
        Session::forget('stok_keluar_cart');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $stokKeluar = StokKeluar::findOrFail($id);
        foreach ($stokKeluar->details as $detail) {
            $barang = $detail->barang;
            $barang->stok += $detail->jumlah;
            $barang->save();
            $detail->delete();
        }
        $stokKeluar->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
