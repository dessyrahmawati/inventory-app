@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Edit Barang') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Form Edit Barang</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('barang.update', $barang->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="nama_barang" class="form-label">Nama Barang</label>
                                    <input type="text" name="nama_barang" id="nama_barang"
                                        class="form-control form-control-lg" value="{{ $barang->nama_barang }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="jenis_barang" class="form-label">Jenis Barang</label>
                                    <select name="jenis_barang" id="jenis_barang" class="form-control form-control-lg"
                                        required>
                                        <option value="">-- Pilih Jenis --</option>
                                        @foreach ($jenis as $j)
                                            <option value="{{ $j }}"
                                                {{ $barang->jenis_barang == $j ? 'selected' : '' }}>{{ $j }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="stok" class="form-label">Stok</label>
                                    <input type="number" name="stok" id="stok" class="form-control form-control-lg"
                                        value="{{ $barang->stok }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="photo" class="form-label">Photo</label>
                                    <input type="file" name="photo" id="photo" class="form-control form-control-lg"
                                        accept="image/*">
                                    @if ($barang->photo)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $barang->photo) }}" width="80"
                                                height="80" alt="Photo">
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" name="harga" id="harga" class="form-control form-control-lg"
                                        value="{{ $barang->harga }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" name="keterangan" id="keterangan"
                                        class="form-control form-control-lg" value="{{ $barang->keterangan }}">
                                </div>
                                <div class="form-group text-end">
                                    <button type="submit" class="btn bg-maroon">Update</button>
                                    <a href="{{ route('barang.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
