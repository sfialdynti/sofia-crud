@extends('template')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Create Category
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
                    <form method="POST" action="/category/create" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group pt-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Input Name" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group pt-2">
                            <label for="is_publish">Is Publish</label>
                            <select name="is_publish" id="is_publish" class=" form-select border-dark">
                                <option value="0" {{ old('is_publish') == 0 ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('is_publish') == 1 ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                        {{-- <div class="form-group pt-2">
                            <label for="created_at">Created At</label>
                            <input type="date" class="form-control" id="is_publish" name="created_at" value="{{ old('created_at') }}">
                        </div>
                        <div class="form-group pt-2">
                            <label for="created_at">Updated At</label>
                            <input type="date" class="form-control" id="is_publish" name="updated_at" value="{{ old('updated_at') }}">
                        </div> --}}
                        <button type="submit" class="btn btn-secondary w-100 btn-block mt-5" value="simpan">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection