@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Tugas Pengiriman Saya</h2>
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Cabang Tujuan</th>
                    <th>Barang</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tugas as $sk)
                    <tr>
                        <td>{{ $sk->tanggal_keluar }}</td>
                        <td>{{ $sk->cabang->nama ?? '-' }}</td>
                        <td>
                            <ul>
                                @foreach ($sk->details as $detail)
                                    <li>{{ $detail->barang->nama }} ({{ $detail->jumlah }})</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $sk->keterangan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tidak ada tugas pengiriman.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
