@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="container">
            <h3>Data Konsumen</h3>
            <hr>
            <a href="{{ route('admin.addKonsumen') }}" class="btn btn-primary mb-2">Tambah Konsumen</a>
            <table class="table table-borderless">
                <thead>
                    <th>No</th>
                    <th>Kode Konsumen</th>
                    <th>Nama Konsumen</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>KK</th>
                    <th>KTP</th>
                    <th>Kartu Kendali</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach($konsumens as $konsumen)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $konsumen->kode_konsumen }}</td>
                        <td>{{ $konsumen->nama_konsumen }}</td>
                        <td>{{ $konsumen->alamat }}</td>
                        <td>{{ $konsumen->no_telp }}</td>
                        <td><a href="{{ asset($konsumen->kk) }}" target="_blank"><img src="{{ asset($konsumen->kk) }}" alt="" srcset="" style="width: 100px"></a></td>
                        <td><a href="{{ asset($konsumen->ktp) }}" target="_blank"><img src="{{ asset($konsumen->ktp) }}" alt="" srcset="" style="width: 100px"></a></td>
                        <td><a href="{{ asset($konsumen->kartu_kendali) }}" target="_blank"><img src="{{ asset($konsumen->kartu_kendali) }}" alt="" srcset="" style="width: 100px"></a></td>
                        <td>
                            <a href="{{ route('admin.editKonsumen', $konsumen->id) }}" class="btn btn-secondary">Update</a>
                            <a href="{{ route('admin.deleteKonsumen', $konsumen->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection