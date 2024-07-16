@extends('layouts.cetak')

@section('title', 'Laporan Pembelian')

@section('content')
    <div class="table-responsive">
        <table class="table table-borderless">
            <thead>
                <th>No</th>
                <th>Kode Pembelian</th>
                <th>Tanggal</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Harga Beli</th>
                <th>Total</th>
            </thead>
            <tbody>
                @foreach($pembelians as $pembelian)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pembelian->kode_pembelian }}</td>
                    <td>{{ $pembelian->tanggal }}</td>
                    <td>{{ $pembelian->barang->nama_barang }}</td>
                    <td>{{ $pembelian->jumlah }}</td>
                    <td>Rp {{ number_format($pembelian->barang->harga_beli, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($pembelian->barang->harga_beli * $pembelian->jumlah, 0, ',', '.') }}</td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- end table-responsive-->
@endsection
