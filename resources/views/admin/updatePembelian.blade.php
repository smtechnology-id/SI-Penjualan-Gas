@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">
            <h3>Update Pembelian</h3>
            <hr>
            <a href="{{ route('admin.dataPembelian') }}" class="btn btn-outline-primary mb-2">
                <i class="ri-arrow-left-line"></i>Kembali
            </a>
            <br><br>
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('admin.updatePembelianPost') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kode_pembelian">Kode Pembelian</label>
                            <input type="text" class="form-control" id="kode_pembelian" name="kode_pembelian" value="{{ $pembelian->kode_pembelian }}" required>
                            <input type="hidden" class="form-control" id="id" name="id" value="{{ $pembelian->id }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $pembelian->tanggal }}" required>
                        </div>
                        <div class="form-group">
                            <label for="barang_id">Barang</label>
                            <select class="form-control" id="barang_id" name="barang_id" required>
                                @foreach ($barangs as $barang)
                                    <option value="{{ $barang->id }}" {{ $barang->id == $pembelian->barang_id ? 'selected' : '' }}>
                                        {{ $barang->nama_barang }} - Rp. {{ number_format($barang->harga_jual, 0, ',', '.') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $pembelian->jumlah }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection