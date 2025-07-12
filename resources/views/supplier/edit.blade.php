@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Edit Supplier') }}</h1>
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
                            <h3>Form Edit Supplier</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="nama_supplier" class="form-label">Nama Supplier</label>
                                    <input type="text" name="nama_supplier" id="nama_supplier"
                                        class="form-control form-control-lg" value="{{ $supplier->nama_supplier }}"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="alamat_supplier" class="form-label">Alamat Supplier</label>
                                    <input type="text" name="alamat_supplier" id="alamat_supplier"
                                        class="form-control form-control-lg" value="{{ $supplier->alamat_supplier }}"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="no_telp" class="form-label">No Telp</label>
                                    <input type="text" name="no_telp" id="no_telp" class="form-control form-control-lg"
                                        value="{{ $supplier->no_telp }}" required>
                                </div>
                                <div class="form-group text-end">
                                    <button type="submit" class="btn bg-maroon">Update</button>
                                    <a href="{{ route('supplier.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
