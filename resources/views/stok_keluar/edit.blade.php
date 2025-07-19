@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Edit Stok Keluar') }}</h1>
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
                            <h3>Form Edit Stok Keluar</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('stok-keluar.update', $stokKeluar->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="kurir_id" class="form-label">Kurir</label>
                                        <select name="kurir_id" id="kurir_id" class="form-control" required>
                                            @foreach ($kurirs as $kurir)
                                                <option value="{{ $kurir->id }}"
                                                    {{ $stokKeluar->kurir_id == $kurir->id ? 'selected' : '' }}>
                                                    {{ $kurir->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="cabang_id" class="form-label">Cabang</label>
                                        <select name="cabang_id" id="cabang_id" class="form-control" required>
                                            @foreach ($cabangs as $cabang)
                                                <option value="{{ $cabang->id }}"
                                                    {{ $stokKeluar->cabang_id == $cabang->id ? 'selected' : '' }}>
                                                    {{ $cabang->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
                                        <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control"
                                            value="{{ $stokKeluar->tanggal_keluar }}" required>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" name="keterangan" id="keterangan" class="form-control"
                                        value="{{ $stokKeluar->keterangan }}">
                                </div>
                                <div class="form-group text-end">
                                    <button type="submit" class="btn bg-maroon">Update</button>
                                    <a href="{{ route('stok-keluar.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
