@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Pengiriman Barang') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="card h-100 mb-3">
                        <div class="card-header">
                            <h3>Stok Saat Ini</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width='10px'>#</th>
                                        <th>Barang</th>
                                        <th>Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($barang as $b)
                                        <tr>
                                            <td>{{ ($barang->currentPage() - 1) * $barang->perPage() + $loop->iteration }}
                                            </td>
                                            <td>{{ $b->nama_barang }}</td>
                                            <td>{{ $b->stok }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">
                                                <center>Data Kosong</center>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $barang->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 mb-3">
                        <div class="card-header">
                            <h3>Form Pengiriman Barang</h3>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('stok-keluar.create-step1') }}" class="btn btn-primary mb-2">Tambah Stok
                                Keluar</a>
                            <p class="text-muted">Gunakan tombol di atas untuk membuat pengiriman barang dengan beberapa
                                item sekaligus.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2">
                        <div class="card-header">
                            <h4 class="mb-0">Riwayat Stok Keluar</h4>
                        </div>
                        <div class="card-body">
                            <form method="GET" class="row g-3 align-items-end mb-3">
                                <div class="col-auto">
                                    <label for="tanggal_mulai" class="form-label mb-0">Dari</label>
                                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
                                        value="{{ request('tanggal_mulai') }}">
                                </div>
                                <div class="col-auto">
                                    <label for="tanggal_sampai" class="form-label mb-0">Sampai</label>
                                    <input type="date" name="tanggal_sampai" id="tanggal_sampai" class="form-control"
                                        value="{{ request('tanggal_sampai') }}">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-secondary">Filter</button>
                                    <a href="{{ route('stok-keluar.index') }}" class="btn btn-outline-secondary">Reset</a>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Kurir</th>
                                            <th>Cabang</th>
                                            <th>Barang & Jumlah</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($stokKeluar as $sk)
                                            <tr>
                                                <td>{{ $sk->tanggal_keluar }}</td>
                                                <td>{{ $sk->kurir->nama ?? '-' }}</td>
                                                <td>{{ $sk->cabang->nama ?? '-' }}</td>
                                                <td>
                                                    <ul class="mb-0 ps-3">
                                                        @foreach ($sk->details as $detail)
                                                            <li>{{ $detail->barang->nama ?? '-' }} ({{ $detail->jumlah }})
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>{{ $sk->keterangan }}</td>
                                                <td>
                                                    <form action="{{ route('stok-keluar.destroy', $sk->id) }}"
                                                        method="POST" style="display:inline-block">
                                                        @csrf @method('DELETE')
                                                        <button class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Hapus data ini?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#table').DataTable({
            responsive: true,
            autoWidth: true,
            processing: true,
        });
    </script>
@endsection
