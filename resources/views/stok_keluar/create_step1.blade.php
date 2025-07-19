@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <h2 class="mb-0">Input Data Kurir & Cabang</h2>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <form action="{{ route('stok-keluar.create-step1.post') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label>Kurir</label>
                            <select name="kurir_id" id="kurir_id" class="form-control" required>
                                <option value="">Pilih Kurir</option>
                                @foreach ($kurirs as $kurir)
                                    <option value="{{ $kurir->id }}">{{ $kurir->nama_kurir }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Cabang</label>
                            <input type="text" id="cabang_nama" class="form-control" readonly>
                            <input type="hidden" name="cabang_id" id="cabang_id" required>
                        </div>
                        <div class="col-md-4">
                            <label>Tanggal Keluar</label>
                            <input type="date" name="tanggal_keluar" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>
                    <button class="btn btn-primary w-100" type="submit">Next &raquo;</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        const kurirCabang = @json($kurirCabang);
        $(document).ready(function() {
            $('#kurir_id').on('change', function() {
                const val = $(this).val();
                if (kurirCabang[val]) {
                    $('#cabang_id').val(kurirCabang[val].cabang_id);
                    $('#cabang_nama').val(kurirCabang[val].nama_cabang);
                } else {
                    $('#cabang_id').val('');
                    $('#cabang_nama').val('');
                }
            });
        });
    </script>
@endsection
