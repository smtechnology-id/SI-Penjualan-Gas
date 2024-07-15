@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="container">
            <h3>Data Pembelian</h3>
            <hr>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addDivision">Tambah
                Pembelian</button>
            <table class="table table-borderless">
                <thead>
                    <th>No</th>
                    <th>Kode Pembelian</th>
                    <th>Tanggal</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Harga Jual</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>#123</td>
                        <td>12 - 12 - 2024</td>
                        <td>Gas Lpg 3 Kg</td>
                        <td>12</td>
                        <td>Rp. 22.000</td>
                        <td>Rp. 264.000</td>
                        <td>
                            <a href="" class="btn btn-secondary">Update</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
