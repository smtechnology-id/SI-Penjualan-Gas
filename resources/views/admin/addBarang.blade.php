@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="container">
            <h3>Data Barang</h3>
            <hr>    
            <a href="{{ route('admin.dataBarang') }}" class="btn btn-outline-primary mb-2"><i class="ri-arrow-left-line"></i>Kembali</a>
            <br><br>
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('admin.addBarangPost') }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="kodeBarang" class="mb-2">Kode Barang</label>
                            <input type="text" name="kode_barang" id="kodeBarang" class="form-control" required placeholder="Kode Barang">
                        </div>
                        <div class="form-group mb-2">
                            <label for="namaBarang" class="mb-2">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" id="namaBarang" required placeholder="Nama Barang">
                        </div>
                        <div class="form-group mb-2">
                            <label for="stok" class="mb-2">Stok Barang</label>
                            <input type="number" class="form-control" name="stok_barang" id="stok" required placeholder="Stok Barang">
                        </div>
                        <div class="form-group mb-2">
                            <label for="harga_beli" class="mb-2">Harga Beli Barang</label>
                            <input type="number" class="form-control" name="harga_beli" id="harga_beli" required placeholder="Harga Beli Barang">
                        </div>
                        <div class="form-group mb-2">
                            <label for="harga_jual" class="mb-2">Harga Jual Barang</label>
                            <input type="number" class="form-control" name="harga_jual" id="harga_jual" required placeholder="Harga Jual Barang">
                        </div>
                        <div class="form-group mb-2">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
