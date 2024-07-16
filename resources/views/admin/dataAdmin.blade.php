@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="container">
            <h3>Data Admin</h3>
            <hr>
            <a href="{{ route('admin.addAdmin') }}" class="btn btn-primary mb-2">Tambah Admin</a>
            <table class="table table-borderless">
                <thead>
                    <th>No</th>
                    <th>Nama Admin</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('admin.updateAdmin', $user->id) }}" class="btn btn-secondary">Update</a>
                            <a href="{{ route('admin.deleteAdmin', $user->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection