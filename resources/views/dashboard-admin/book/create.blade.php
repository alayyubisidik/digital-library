@extends('layout.main')

@section('title', 'Book')

@section('content')


    <div class="content-wrapper">
        <a href="/dashboard-admin/book">
            <button type="button" class="btn btn-warning mr-2 mb-3">Back</button>
        </a>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create a New Book</h4>
                <form class="forms-sample" action="/dashboard-admin/book/create" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label for="title">Title</label>
                        @error('title')
                            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                        @enderror
                        <input type="text" class="form-control" name="title" id="title"
                            value="{{ old('title') }}">
                    </div>

                    {{-- <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="categories[]" id="category" multiple>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    
                    <label for="category">Category</label>
                    <select class="js-example-basic-multiple" name="categories[]" multiple="multiple">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <div class="form-group">
                        <label for="writer">Writer</label>
                        @error('writer')
                            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                        @enderror
                        <input type="text" class="form-control" name="writer" id="writer"
                            value="{{ old('writer') }}">
                    </div>

                    <div class="form-group">
                        <label for="publisher">Publisher</label>
                        @error('publisher')
                            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                        @enderror
                        <input type="text" class="form-control" name="publisher" id="publisher"
                            value="{{ old('publisher') }}">
                    </div>

                    <div class="form-group">
                        <label for="publication_year">Publication Year</label>
                        @error('publication_year')
                            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                        @enderror
                        <input type="number" class="form-control" name="publication_year" id="publication_year"
                            value="{{ old('publication_year') }}">
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock</label>
                        @error('stock')
                            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                        @enderror
                        <input type="number" class="form-control" name="stock" id="stock"
                            value="{{ old('stock') }}">
                    </div>

                    <div class="form-group">
                        <label>Book Cover</label>
                        @error('cover')
                            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                        @enderror
                        <input type="file" name="cover" id="cover" onchange="previewImage(this)"
                            class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button"
                                    onclick="clickFileInput()">Upload</button>
                            </span>
                        </div>
                        <img id="preview" src="#" alt="Preview"
                            style="display: none; max-width: 100px;; margin-top: 10px;">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>


    <script>
        function previewImage(input) {
            var preview = document.getElementById('preview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                preview.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }

        function clickFileInput() {
            document.getElementById('cover').click();
        }

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

@endsection
