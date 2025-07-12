@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Daftar Cabang') }}</h1>
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
                            <div class="d-flex justify-content-between align-items-center">
                                <h3>Tabel Cabang</h3>
                                <a href="{{ route('cabang.create') }}" class="btn bg-maroon">Tambah Cabang</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <table class="table table-bordered table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th width="10px">#</th>
                                        <th>Nama Cabang</th>
                                        <th>Alamat</th>
                                        <th>No. Telp</th>
                                        <th width="150px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cabangs as $cabang)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $cabang->nama_cabang }}</td>
                                            <td>{{ $cabang->alamat_cabang }}</td>
                                            <td>{{ $cabang->no_telp }}</td>
                                            <td>
                                                <a href="{{ route('cabang.edit', $cabang->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('cabang.destroy', $cabang->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('cabang.destroy', $cabang->id) }}"
                                                        class="btn btn-sm btn-danger" data-confirm-delete="true">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
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
