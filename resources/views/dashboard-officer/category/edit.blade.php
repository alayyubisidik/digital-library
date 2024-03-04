@extends('layout.main')

@section('title', 'Book')

@section('content')

    <div class="content-wrapper">
        <a href="/dashboard-officer/category">
            <button type="button" class="btn btn-warning mr-2 mb-3">Back</button>
        </a>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Category</h4>
                <form class="forms-sample" action="/dashboard-officer/category/edit/{{ $category->slug }}" method="POST">

                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        @error('name')
                            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                        @enderror
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ $category->name }}">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>


@endsection
