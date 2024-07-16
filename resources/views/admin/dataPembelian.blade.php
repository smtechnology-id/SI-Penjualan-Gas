@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="container">
            <h3>Data Pembelian</h3>
            <hr>
            <a href="{{ route('admin.addPembelian') }}" class="btn btn-primary mb-2">Tambah Pembelian</a>
            <table class="table table-borderless">
                <thead>
                    <th>No</th>
                    <th>Kode Pembelian</th>
                    <th>Tanggal</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Harga Beli</th>
                    <th>Total</th>
                    <th>Aksi</th>
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
                        <td>
                            <a href="{{ route('admin.updatePembelian', $pembelian->id) }}" class="btn btn-secondary">Update</a>
                            <a href="{{ route('admin.deletePembelian', $pembelian->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection