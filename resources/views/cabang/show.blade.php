@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Cabang</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>Detail Cabang</h3>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-4">Nama Cabang</dt>
                                <dd class="col-sm-8">{{ $cabang->nama_cabang }}</dd>
                                <dt class="col-sm-4">Alamat Cabang</dt>
                                <dd class="col-sm-8">{{ $cabang->alamat_cabang }}</dd>
                                <dt class="col-sm-4">No. Telp</dt>
                                <dd class="col-sm-8">{{ $cabang->no_telp }}</dd>
                            </dl>
                            <a href="{{ route('cabang.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
