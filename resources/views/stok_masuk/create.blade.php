@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Tambah Stok Masuk') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Form Tambah Stok Masuk</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('stok-masuk.store') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Barang</label>
                                    <select name="barang_id" class="form-control" required>
                                        <option value="">Pilih Barang</option>
                                        @foreach ($barang as $b)
                                            <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Supplier</label>
                                    <select name="supplier_id" class="form-control" required>
                                        <option value="">Pilih Supplier</option>
                                        @foreach ($supplier as $s)
                                            <option value="{{ $s->id }}">{{ $s->nama_supplier }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Tanggal Masuk</label>
                                    <input type="date" name="tanggal_masuk" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control">
                                </div>
                                <div class="form-group text-end">
                                    <button type="submit" class="btn bg-maroon">Submit</button>
                                    <a href="{{ route('stok-masuk.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
