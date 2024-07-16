@extends('layouts.cetak')

@section('title', 'Laporan Penjualan')

@section('content')
    <div class="table-responsive">
        <table class="table table-borderless">
            <thead>
                <th>No</th>
                <th>Kode Penjualan</th>
                <th>Tanggal</th>
                <th>Konsumen</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Harga Jual</th>
                <th>Total</th>
                <th>Status</th>
                <td></td>
            </thead>
            <tbody>
                @foreach ($penjualans as $penjualan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $penjualan->kode_penjualan }}</td>
                        <td>{{ $penjualan->tanggal }}</td>
                        <td>{{ $penjualan->konsumen->nama_konsumen }}</td>
                        <td>{{ $penjualan->barang->nama_barang }}</td>
                        <td>{{ $penjualan->jumlah }}</td>
                        <td>Rp {{ number_format($penjualan->barang->harga_jual, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($penjualan->total, 0, ',', '.') }}</td>
                        <td>{{ $penjualan->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- end table-responsive-->
@endsection
