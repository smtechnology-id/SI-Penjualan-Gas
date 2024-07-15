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
                    <th>No KK</th>
                    <th>Status</th>
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
                        <td>{{ $konsumen->no_kk }}</td>
                        <td>{{ $konsumen->status }}</td>
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