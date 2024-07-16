@extends('layouts.cetak')

@section('title', 'Laporan Konsumen')

@section('content')
    <div class="table-responsive">
        <table class="table table-borderless">
            <thead>
                <th>No</th>
                <th>Kode Konsumen</th>
                <th>Nama Konsumen</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>No KK</th>
                <th></th>
                
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- end table-responsive-->
@endsection
