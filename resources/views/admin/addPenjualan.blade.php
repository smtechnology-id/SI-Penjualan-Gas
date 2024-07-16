@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="container">
            <h3>Data Penjualan</h3>
            <hr>
            <a href="{{ route('admin.dataPenjualan') }}" class="btn btn-outline-primary mb-2"><i
                    class="ri-arrow-left-line"></i>Kembali</a>
            <br><br>
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('admin.addPenjualanPost') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kode_penjualan">Kode Penjualan</label>
                            <input type="text" class="form-control" id="kode_penjualan" name="kode_penjualan" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <div class="form-group">
                            <label for="konsumen_id">Konsumen</label>
                            <select class="form-control" id="konsumen_id" name="konsumen_id" required>
                                @foreach ($konsumens as $konsumen)
                                    <option value="{{ $konsumen->id }}">{{ $konsumen->nama_konsumen }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="barang_id">Barang</label>
                            <select class="form-control" id="barang_id" name="barang_id" required>
                                @foreach ($barangs as $barang)
                                    <option value="{{ $barang->id }}">{{ $barang->nama_barang }} - Rp.
                                        {{ number_format($barang->harga_jual, 0, ',', '.') }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
