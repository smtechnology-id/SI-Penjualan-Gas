@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="container">
            <h3>Data Penjualan</h3>
            <hr>
           <a href="{{ route('admin.addPenjualan') }}" class="btn btn-primary mb-2">Tambah Penjualan</a>
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
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach($penjualans as $penjualan)
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
                        <td>
                            <a href="{{ route('admin.updatePenjualan', $penjualan->id) }}" class="btn btn-secondary">Update</a>
                            <a href="{{ route('admin.deletePenjualan', $penjualan->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection