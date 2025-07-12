@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Create Supplier') }}</h1>
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
                            <h3>Form Create Supplier</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('supplier.store') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="nama_supplier" class="form-label">Nama Supplier</label>
                                    <input type="text" name="nama_supplier" id="nama_supplier"
                                        class="form-control form-control-lg" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="alamat_supplier" class="form-label">Alamat Supplier</label>
                                    <input type="text" name="alamat_supplier" id="alamat_supplier"
                                        class="form-control form-control-lg" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="no_telp" class="form-label">No Telp</label>
                                    <input type="number" name="no_telp" id="no_telp" class="form-control form-control-lg"
                                        required>
                                </div>
                                <div class="form-group text-end">
                                    <button type="submit" class="btn bg-maroon">Submit</button>
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
