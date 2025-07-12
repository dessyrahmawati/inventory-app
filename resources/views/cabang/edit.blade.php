@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Edit Cabang') }}</h1>
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
                            <h3>Form Edit Cabang</h3>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('cabang.update', $cabang->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="nama_cabang" class="form-label">Nama Cabang</label>
                                    <input type="text" name="nama_cabang" id="nama_cabang"
                                        class="form-control form-control-lg"
                                        value="{{ old('nama_cabang', $cabang->nama_cabang) }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="alamat_cabang" class="form-label">Alamat Cabang</label>
                                    <input type="text" name="alamat_cabang" id="alamat_cabang"
                                        class="form-control form-control-lg"
                                        value="{{ old('alamat_cabang', $cabang->alamat_cabang) }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="no_telp" class="form-label">No. Telp</label>
                                    <input type="number" name="no_telp" id="no_telp" class="form-control form-control-lg"
                                        value="{{ old('no_telp', $cabang->no_telp) }}" required>
                                </div>
                                <div class="form-group text-end">
                                    <button type="submit" class="btn bg-maroon">Update</button>
                                    <a href="{{ route('cabang.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
