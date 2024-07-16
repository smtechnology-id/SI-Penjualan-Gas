@extends('layouts.app')


@section('content')

    <div class="row">
        @foreach ($barang as $data)
            <div class="col-xxl-3 col-sm-4">
                <div class="card widget-flat text-bg-purple">
                    <div class="card-body">
                        <div class="float-end">
                            <img src="{{ asset('assets/images/gas.png') }}" alt="" srcset=""
                                style="width: 100px">
                        </div>
                        <h6 class="text-uppercase mt-0" title="Customers">{{ $data->nama_barang }}</h6>
                        <h2 class="my-2">{{ $data->stok_barang }} Pcs</h2>
                    </div>
                </div>
            </div> <!-- end col-->
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 style="color: #1A2942;">GAMBARAN UMUM PANGKALAN GAS ELIPJI EKO SUMANTO</h4>
                </div>
                <div class="card-body">
                    <p>Pangkalan Gas 3 kg Eko Sumanto merupakan salah satu usaha yang menjual jenis gas elpiji 3 kg, 5 kg dan 12 kg.
                        Penjualan gas 3 kg merupakan gas bersubsidi yang pasokan gasnya berasal dari PT. Berhan Pratama, sedangkan
                        gas 5,5 kg dan gas 12 kg merupakan gas non subsidi yang pasokan gasnya berasal dari PT. Firman Jaya Lestari.
                        Untuk menjalankan kegiatan operasionalnya, Pangkalan Gas 3 kg Eko Sumanto memiliki 1 karyawan yang bertugas
                        sebagai admin sekaligus karyawan toko yang melayani konsumen didampingi oleh pemilik pangkalan.</p>
                    <p>Pangkalan Gas 3 kg Eko Sumanto beralamat di jalan Tp. Sriwijaya No. 71 RT. 4 Kelurahan beliung, Kecamatan
                        Alam Barajo, Jambi, dengan Bapak Eko Sumanto selaku pemilik pangkalan. Pangkalan gas 3 kg Eko Sumanto ini
                        melayani penjualan gas 3 kg bersubsidi untuk RT. 3, RT. 4, RT. 5, RT. 8, dan RT. 17 di beliung yang mana
                        terdiri dari 400 kartu pelanggan gas . Setiap konsumen membawa kartu kendali gas dan KTP, dimana untuk rumah
                        tangga hanya bisa membeli 1 tabung per minggu dan untuk pelaku UKM 2 tabung per minggu.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <img src="{{ asset('assets/images/lpg.jpg') }}" alt="" srcset="" style="width: 100%">
        </div>
    </div>
@endsection
