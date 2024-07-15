@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="container">
            <h3>Data Admin</h3>
            <hr>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addDivision">Tambah
                Admin</button>
            <table class="table table-borderless">
                <thead>
                    <th>No</th>
                    <th>Kode Admin</th>
                    <th>Nama Admin</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>#123</td>
                        <td>Admin 1</td>
                        <td>admin1@gmail.com</td>
                        <td>****</td>
                        <td>
                            <a href="" class="btn btn-secondary">Update</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
