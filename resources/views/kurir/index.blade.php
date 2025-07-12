@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Kurir</h1>
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
                            <div class="d-flex aligns-items-center justify-content-between">
                                <h3 class="mb-0">Tabel Kurir</h3>
                                <div class="ms-auto">
                                    <a href="{{ route('kurir.create') }}" class="btn bg-maroon">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <table class="table table-bordered table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Kurir</th>
                                        <th>Alamat</th>
                                        <th>No Telp</th>
                                        <th>Jenis Kendaraan</th>
                                        <th>Plat Nomor</th>
                                        <th>Status</th>
                                        <th>Cabang</th>
                                        <th>Photo</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kurirs as $kurir)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kurir->nama_kurir }}</td>
                                            <td>{{ $kurir->alamat_kurir }}</td>
                                            <td>{{ $kurir->no_telp }}</td>
                                            <td>{{ $kurir->jenis_kendaraan }}</td>
                                            <td>{{ $kurir->plat_nomor }}</td>
                                            <td>{{ $kurir->status }}</td>
                                            <td>{{ $kurir->cabang->nama_cabang ?? '-' }}</td>
                                            <td>
                                                @if ($kurir->photo)
                                                    <img src="{{ asset('storage/' . $kurir->photo) }}" width="50" />
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('kurir.edit', $kurir->id) }}"
                                                    class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('kurir.destroy', $kurir->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('kurir.destroy', $kurir->id) }}"
                                                        class="btn btn-danger btn-sm" data-confirm-delete="true"><i
                                                            class="fas fa-trash"></i></a>
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
