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
                <th>KK</th>
                <th>KTP</th>
                <th>Kartu Kendali</th>
                <th></th>

            </thead>
            <tbody>
                @foreach ($konsumens as $konsumen)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $konsumen->kode_konsumen }}</td>
                        <td>{{ $konsumen->nama_konsumen }}</td>
                        <td>{{ $konsumen->alamat }}</td>
                        <td>{{ $konsumen->no_telp }}</td>
                        <td><a href="{{ asset($konsumen->kk) }}" target="_blank"><img src="{{ asset($konsumen->kk) }}"
                                    alt="" srcset="" style="width: 100px"></a></td>
                        <td><a href="{{ asset($konsumen->ktp) }}" target="_blank"><img src="{{ asset($konsumen->ktp) }}"
                                    alt="" srcset="" style="width: 100px"></a></td>
                        <td><a href="{{ asset($konsumen->kartu_kendali) }}" target="_blank"><img
                                    src="{{ asset($konsumen->kartu_kendali) }}" alt="" srcset=""
                                    style="width: 100px"></a></td>
                        <td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- end table-responsive-->
@endsection
