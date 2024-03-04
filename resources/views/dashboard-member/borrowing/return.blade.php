@extends('layout.main')

@section('title', 'Book')

@section('content')

    {{-- <style>
        .wrapper {
            position: relative;
            display: inline-block;
            border: none;
            font-size: 14px;
            /* margin: auto; */
            /* left: 50%; */
            /* transform: translateX(-50%); */
            /* background-color: red; */
        }

        .wrapper input {
            border: 0;
            width: 1px;
            height: 1px;
            overflow: hidden;
            position: absolute !important;
            clip: rect(1px 1px 1px 1px);
            clip: rect(1px, 1px, 1px, 1px);
            opacity: 0;
        }

        .wrapper label {
            position: relative;
            float: right;
            color: #C8C8C8;
        }

        .wrapper label:before {
            margin: 5px;
            content: "\f005";
            font-family: FontAwesome;
            display: inline-block;
            font-size: 1.5em;
            color: #ccc;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .wrapper input:checked~label:before {
            color: #FFC107;
        }

        .wrapper label:hover~label:before {
            color: #ffdb70;
        }

        .wrapper label:hover:before {
            color: #FFC107;
        }
    </style> --}}

    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Return Book</h4>

                <div class="" style="width: 100%; margin-top: 1rem; ">

                    <img style="max-width: 15rem; box-shadow: 2px 2px 5px rgba(0,0,0,.3)"
                        src="{{ asset('/storage/book-cover/' . $book->cover) }}" alt="">
                    <div class="" style="margin: 1rem 0; ">
                        <p style="font-size: 18px; font-weight: bold; color: #000; margin: 0">{{ $book->title }}</p>
                        <p>{{ $book->writer }} - {{ $book->publisher }}</p>

                        <p style="margin: .3rem 0; font-size: 15px; font-weight: bold; color: #000;">Give Rating and Review
                        </p>

                        <form action="/dashboard-member/return/{{ $book->slug }}" method="post">
                            @csrf

                            <div class="wrapper">
                                <input type="radio" name="rating" id="st1" value="1" />
                                <input type="radio" name="rating" id="st2" value="2" />
                                <input type="radio" name="rating" id="st3" value="3" />
                                <input type="radio" name="rating" id="st4" value="4" />
                                <input type="radio" name="rating" id="st5" value="5" />
                            </div>
        
                            <div class="form-group">
                                <label for="review" style="margin: .3rem 0; font-size: 15px; font-weight: bold; color: #000;">Review</label>
                                <input type="text" class="form-control" name="review" id="review">
                            </div>

                            <button type="submit" style="font-size: 14px; color: white; text-decoration: none;" class="btn btn-primary mb-3" >Return</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <h1>Return Book</h1>

    <h3>Return the book on {{ \Carbon\Carbon::now()->format('j F Y') }}</h3>
    <p>{{ $book->title }}</p>
    <img style="width: 10rem" src="{{ asset('/storage/book-cover/' . $book->cover) }}" alt="">
    <p>{{ $book->writer }} - {{ $book->publisher }}</p>
    <p>Beri Rating</p>
    <form action="/dashboard-member/return/{{ $book->slug }}" method="post">
        @csrf

        <label for="review">Review</label>
        <input type="text" name="review">

        <input type="checkbox" name="rating" value="1">
        <input type="checkbox" name="rating" value="2">
        <input type="checkbox" name="rating" value="3">
        <input type="checkbox" name="rating" value="4">
        <input type="checkbox" name="rating" value="5">

        <button type="submit">Send</button>
    </form> --}}
@endsection
