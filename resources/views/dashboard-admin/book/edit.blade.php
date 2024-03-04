@extends('layout.main')

@section('title', 'Book')

@section('content')

    <div class="content-wrapper">
        <a href="/dashboard-admin/book">
            <button type="button" class="btn btn-warning mr-2 mb-3">Back</button>
        </a>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Book</h4>
                <form class="forms-sample" action="/dashboard-admin/book/edit/{{ $book->slug }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label for="title">Title</label>
                        @error('title')
                            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                        @enderror
                        <input type="text" class="form-control" name="title" id="title"
                            value="{{ $book->title }}">
                    </div>

                    <div class="form-group">
                        <label for="writer">Writer</label>
                        @error('writer')
                            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                        @enderror
                        <input type="text" class="form-control" name="writer" id="writer"
                            value="{{ $book->writer }}">
                    </div>

                    <div class="form-group">
                        <label for="publisher">Publisher</label>
                        @error('publisher')
                            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                        @enderror
                        <input type="text" class="form-control" name="publisher" id="publisher"
                            value="{{ $book->publisher }}">
                    </div>

                    <div class="form-group">
                        <label for="publication_year">Publication Year</label>
                        @error('publication_year')
                            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                        @enderror
                        <input type="number" class="form-control" name="publication_year" id="publication_year"
                            value="{{ $book->publication_year }}">
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock</label>
                        @error('stock')
                            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
                        @enderror
                        <input type="number" class="form-control" name="stock" id="stock"
                            value="{{ $book->stock }}">
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
                        <img id="preview" src="{{  asset('/storage/book-cover/' . $book->cover) }}" alt="Preview" style=" max-width: 200px; margin-top: 10px;">

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
    </script>



    {{-- <h1>Edit Book</h1>

    <form action="/dashboard-admin/book/edit/{{ $book->slug }}" method="POST" enctype="multipart/form-data">

        @csrf

        <label style="margin: 1rem 0 .3rem; display: block" for="title">Title</label>
        @error('title')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="text" name="title" id="title" value="{{ $book->title }}" >
        
        <label style="margin: 1rem 0 .3rem; display: block" for="writer">Writer</label>
        @error('writer')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="text" name="writer" id="writer" value="{{ $book->writer }}"> 

        <label style="margin: 1rem 0 .3rem; display: block" for="publisher">Publisher</label>
        @error('publisher')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="text" name="publisher" id="publisher" value="{{ $book->publisher }}"> 

        <label style="margin: 1rem 0 .3rem; display: block" for="publication_year">Publication_year</label>
        @error('publication_year')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="number" name="publication_year" id="publication_year" value="{{ $book->publication_year }}"> 

        <label style="margin: 1rem 0 .3rem; display: block" for="stock">Stock</label>
        @error('stock')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="number" name="stock" id="stock" value="{{ $book->stock }}"> 

        <label style="margin: 1rem 0 .3rem; display: block" for="cover">Cover</label>
        @error('cover')
            <p style="color: red; margin:0; font-size: 14px;">{{ $message }}</p>
        @enderror
        <input type="file" name="cover" id="cover" onchange="previewImage(this)"> 
        <img id="preview" src="{{  asset('/storage/book-cover/' . $book->cover) }}" alt="Preview" style=" max-width: 200px; margin-top: 10px;">

        <button type="submit" style="display: block; margin: 2rem 0">Save</button>

    </form>

    
    <script>
        function previewImage(input) {
            var preview = document.getElementById('preview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
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
    </script> --}}

@endsection
