@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <div class="alert alert-info text-center">
            <h4>Alur baru stok keluar multi barang</h4>
            <p>Silakan gunakan tombol berikut untuk memulai proses stok keluar multi step:</p>
            <a href="{{ route('stok-keluar.create-step1') }}" class="btn btn-primary btn-lg">Mulai Input Stok Keluar</a>
        </div>
    </div>
@endsection
