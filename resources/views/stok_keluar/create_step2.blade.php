@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <h2 class="mb-0">Tambah Barang ke Stok Keluar</h2>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Kurir</label>
                            <input type="text" class="form-control" value="{{ $kurirNama }}" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Cabang</label>
                            <input type="text" class="form-control" value="{{ $cabangNama }}" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Tanggal Keluar</label>
                            <input type="text" class="form-control" value="{{ $form['tanggal_keluar'] }}" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Keterangan</label>
                            <input type="text" class="form-control" value="{{ $form['keterangan'] }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="card mb-3">
                            <div class="card-header bg-success text-white">
                                <strong>Tambah Barang</strong>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('stok-keluar.add-barang') }}" method="POST" class="row g-3">
                                    @csrf
                                    <input type="hidden" name="kurir_id" value="{{ $form['kurir_id'] }}">
                                    <input type="hidden" name="cabang_id" value="{{ $form['cabang_id'] }}">
                                    <input type="hidden" name="tanggal_keluar" value="{{ $form['tanggal_keluar'] }}">
                                    <input type="hidden" name="keterangan" value="{{ $form['keterangan'] }}">
                                    <div class="row align-items-end">
                                        <div class="col-12 mb-2">
                                            <label class="form-label">Barang</label>
                                            <select name="barang_id" class="form-control" required>
                                                <option value="">Pilih Barang</option>
                                                @foreach ($barangs as $barang)
                                                    <option value="{{ $barang->id }}">{{ $barang->nama_barang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-7">
                                            <label class="form-label">Jumlah</label>
                                            <input type="number" name="jumlah" class="form-control" placeholder="Jumlah"
                                                min="1" required>
                                        </div>
                                        <div class="col-5 d-grid">
                                            <label class="form-label d-none d-md-block">&nbsp;</label>
                                            <button class="btn btn-success w-100" type="submit"><i class="fas fa-plus"></i>
                                                Tambah</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">
                                <strong>Daftar Barang</strong>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <span></span>
                                    <form action="{{ route('stok-keluar.clear-cart') }}" method="POST"
                                        onsubmit="return confirm('Hapus semua barang di cart?')">
                                        @csrf
                                        <button class="btn btn-outline-danger btn-sm" type="submit">Hapus Semua</button>
                                    </form>
                                </div>
                                <table class="table table-bordered" id="table">
                                    <thead>
                                        <tr>
                                            <th width="10px">#</th>
                                            <th>Barang</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($cart as $i => $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item['nama_barang'] }}</td>
                                                <td>{{ $item['jumlah'] }}</td>
                                                <td>
                                                    <form action="{{ route('stok-keluar.remove-barang', $i) }}"
                                                        method="POST" style="display:inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" type="submit"
                                                            onclick="return confirm('Hapus barang ini dari cart?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Belum ada barang ditambahkan</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('stok-keluar.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="kurir_id" value="{{ $form['kurir_id'] }}">
                    <input type="hidden" name="cabang_id" value="{{ $form['cabang_id'] }}">
                    <input type="hidden" name="tanggal_keluar" value="{{ $form['tanggal_keluar'] }}">
                    <input type="hidden" name="keterangan" value="{{ $form['keterangan'] }}">
                    <button class="btn btn-primary w-100 mt-3" type="submit">Simpan Stok Keluar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            @if (count($cart) > 0)
                $('#table').DataTable({
                    responsive: true,
                    autoWidth: true,
                    processing: true,
                    paging: false,
                    searching: false,
                    info: false
                });
            @endif
        });
    </script>
@endsection
