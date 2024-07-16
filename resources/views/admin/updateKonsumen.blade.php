@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">
            <h3>Update Konsumen</h3>
            <hr>    
            <a href="{{ route('admin.dataKonsumen') }}" class="btn btn-outline-primary mb-2"><i class="ri-arrow-left-line"></i>Kembali</a>
            <br><br>
            <div class="row">
                <div class="col-md-6">
                    <!-- Form untuk menambahkan konsumen -->
                    <form action="{{ route('admin.updateKonsumen') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="kode_konsumen">Kode Konsumen</label>
                            <input type="text" class="form-control" id="kode_konsumen" name="kode_konsumen" required value="{{ $konsumen->kode_konsumen }}">
                            <input type="hidden" class="form-control" id="id" name="id" required value="{{ $konsumen->id }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_konsumen">Nama Konsumen</label>
                            <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen" required value="{{ $konsumen->nama_konsumen }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $konsumen->alamat }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No. Telepon</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" required value="{{ $konsumen->no_telp }}">
                        </div>
                        <div class="form-group">
                            <label for="ktp">KTP</label>
                            <input type="file" class="form-control" id="ktp" name="ktp">
                            @if($konsumen->ktp)
                                <a href="{{ asset($konsumen->ktp) }}" target="_blank">Lihat KTP</a>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="kartu_kendali">Kartu Kendali</label>
                            <input type="file" class="form-control" id="kartu_kendali" name="kartu_kendali">
                            @if($konsumen->kartu_kendali)
                                <a href="{{ asset($konsumen->kartu_kendali) }}" target="_blank">Lihat Kartu Kendali</a>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="kk">Kartu Keluarga (KK)</label>
                            <input type="file" class="form-control" id="kk" name="kk">
                            @if($konsumen->kk)
                                <a href="{{ asset($konsumen->kk) }}" target="_blank">Lihat Kartu Keluarga</a>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Update Konsumen</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
@endsection