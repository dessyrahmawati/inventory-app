@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Laporan Stok Barang') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="container-fluid">
            <div class="card mt-4">
                <div class="card-body">
                    <form method="GET" class="mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="date" name="tanggal_awal" class="form-control"
                                    value="{{ request('tanggal_awal') }}" placeholder="Tanggal Awal">
                            </div>
                            <div class="col-md-3">
                                <input type="date" name="tanggal_akhir" class="form-control"
                                    value="{{ request('tanggal_akhir') }}" placeholder="Tanggal Akhir">
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary" type="submit">Tampilkan</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Barang</th>
                                <th>Stok Awal</th>
                                <th>Stok Masuk</th>
                                <th>Stok Keluar</th>
                                <th>Stok Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($laporan as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row['barang']->nama ?? ($row['barang']->nama_barang ?? '-') }}</td>
                                    <td>{{ $row['stok_awal'] }}</td>
                                    <td>{{ $row['stok_masuk'] }}</td>
                                    <td>{{ $row['stok_keluar'] }}</td>
                                    <td>{{ $row['stok_akhir'] }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data stok untuk periode ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
