<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\StokMasuk;
use App\Models\StokKeluar;
use Illuminate\Http\Request;

class LaporanStokController extends Controller
{
    public function index(Request $request)
    {
        $tanggal_awal = $request->input('tanggal_awal');
        $tanggal_akhir = $request->input('tanggal_akhir');
        $barangs = Barang::all();
        $laporan = [];
        foreach ($barangs as $barang) {
            $stok_awal = $barang->stok;
            if ($tanggal_awal) {
                $masuk = StokMasuk::where('barang_id', $barang->id)
                    ->where('tanggal_masuk', '<', $tanggal_awal)
                    ->sum('jumlah');
                $keluar = $barang->stok_keluar_details()
                    ->whereHas('stokKeluar', function ($q) use ($tanggal_awal) {
                        $q->where('tanggal_keluar', '<', $tanggal_awal);
                    })->sum('jumlah');
                $stok_awal = $barang->stok + $keluar - $masuk;
            }
            $stok_masuk = $barang->stok_masuk()
                ->when($tanggal_awal, function ($q) use ($tanggal_awal) {
                    $q->where('tanggal_masuk', '>=', $tanggal_awal);
                })
                ->when($tanggal_akhir, function ($q) use ($tanggal_akhir) {
                    $q->where('tanggal_masuk', '<=', $tanggal_akhir);
                })
                ->sum('jumlah');
            $stok_keluar = $barang->stok_keluar_details()
                ->whereHas('stokKeluar', function ($q) use ($tanggal_awal, $tanggal_akhir) {
                    if ($tanggal_awal) $q->where('tanggal_keluar', '>=', $tanggal_awal);
                    if ($tanggal_akhir) $q->where('tanggal_keluar', '<=', $tanggal_akhir);
                })->sum('jumlah');
            $stok_akhir = $stok_awal + $stok_masuk - $stok_keluar;
            $laporan[] = [
                'barang' => $barang,
                'stok_awal' => $stok_awal,
                'stok_masuk' => $stok_masuk,
                'stok_keluar' => $stok_keluar,
                'stok_akhir' => $stok_akhir,
            ];
        }
        return view('laporan.stok', compact('laporan', 'tanggal_awal', 'tanggal_akhir'));
    }
}
