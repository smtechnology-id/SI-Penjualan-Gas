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
                    <form action="{{ route('admin.addAdminPost') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password:</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
