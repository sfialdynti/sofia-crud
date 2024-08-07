@extends('template')
@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class=" col-md-6">
                <a href="/user/create" class=" btn btn-primary mb-3">Create User</a>
            </div>
        </div>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>EMAIL</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <a href="/user/delete/{{ $item->id }}" class=" btn btn-danger" onclick="return window.confirm('Yakin hapus user ini?')" class="btn btn-danger">DELETE</a>
                            <a href="/user/edit/{{ $item->id }}" class=" btn btn-info">EDIT</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection