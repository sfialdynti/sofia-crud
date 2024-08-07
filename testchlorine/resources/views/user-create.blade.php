@extends('template')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Create User
                </div>
                <div class="card-body">
                    <form method="POST" action="/user/create" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group pt-2">
                            <label for="productName">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Input Name" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group pt-2">
                            <label for="category">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Input Email" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group pt-2">
                            <label for="price">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Input Password" name="password" value="{{ old('password') }}">
                        </div>
                        <button type="submit" class="btn btn-secondary w-100 btn-block mt-5" value="simpan">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection