@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="container">
            <h3>Data Barang</h3>
            <hr>    
            <a href="{{ route('admin.addBarang') }}" class="btn btn-primary mb-2">Tambah Barang</a>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barang as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->stok_barang }}</td>
                        <td>Rp. {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('admin.updateBarang', ['id' => $item->id]) }}" class="btn btn-secondary">Update</a>
                            <a href="{{ route('admin.deleteBarang', ['id' => $item->id]) }}" class="btn btn-danger">Delete</a>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection