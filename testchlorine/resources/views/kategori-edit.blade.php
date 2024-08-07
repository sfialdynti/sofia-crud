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
                    @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                    <form method="post" action="/category/update/{{ $category->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group pt-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Input Name" name="name" value="{{ $category->name }}">
                        </div>
                       <div class="form-group pt-2">
                            <label for="is_publish">Is Publish</label>
                                <select name="is_publish" id="is_publish" class=" form-select border-dark">
                                    <option value="0" {{ old('is_publish', $category->is_publish) == 0 ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ old('is_publish', $category->is_publish) == 1 ? 'selected' : '' }}>Yes</option>
                                </select>
                       </div>
                        <button type="submit" class="btn btn-secondary w-100 btn-block mt-5">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection