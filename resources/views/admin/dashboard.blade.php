@extends('layouts.app')


@section('content')
    <div class="row">
        @foreach ($barang as $data)
            <div class="col-xxl-3 col-sm-6">
                <div class="card widget-flat text-bg-purple">
                    <div class="card-body">
                        <div class="float-end">
                           <img src="{{ asset('assets/images/gas.png') }}" alt="" srcset="" style="width: 100px">
                        </div>
                        <h6 class="text-uppercase mt-0" title="Customers">{{ $data->nama_barang }}</h6>
                        <h2 class="my-2">{{ $data->stok_barang }} Pcs</h2>
                    </div>
                </div>
            </div> <!-- end col-->
        @endforeach
    </div>
@endsection
