@extends('template')
@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class=" col-md-6">
                <a href="/category/create" class=" btn btn-primary mb-3">Create Category</a>
            </div>
            <div class="col-md-6">
                <form action={{ url('/search') }} method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request('search') }}">
                        <button class="btn btn-success" type="submit">Go</button>
                      </div>
                </form>
            </div>
        </div>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>PUBLISH</th>
                    <th>CREATED</th>
                    <th>UPDATED</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->is_publish }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            <a href="/category/delete/{{ $item->id }}" class=" btn btn-danger" onclick="return window.confirm('Yakin hapus data kategori ini?')" class="btn btn-danger">DELETE</a>
                            <a href="/category/edit/{{ $item->id }}" class=" btn btn-info">EDIT</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class=" my-5">
            {{ $category->withQueryString()->links() }}
        </div>
    </div>
@endsection