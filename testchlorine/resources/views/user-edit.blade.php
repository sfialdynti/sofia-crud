@extends('template')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Update User
                </div>
                <div class="card-body">
                    <form method="post" action="/user/update/{{ $user->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group pt-2">
                            <label for="name">Nama Produk</label>
                            <input type="text" class="form-control" id="name" placeholder="Input Name" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group pt-2">
                            <label for="email">Kategori</label>
                            <input type="email" class="form-control" id="email" placeholder="Input Email" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group pt-2">
                            <label for="password">Harga</label>
                            <input type="password" class="form-control" id="password" placeholder="Input Password" name="password" value="">
                        </div>
                        <button type="submit" class="btn btn-secondary w-100 btn-block mt-5">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection