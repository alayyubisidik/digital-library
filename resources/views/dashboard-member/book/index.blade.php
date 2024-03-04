@extends('layout.main')

@section('title', 'Book')

@section('content')

<div class="content-wrapper">
        @if (session('message-success'))
            <div class="alert alert-success" role="alert">
                {{ session('message-success') }}
            </div>
        @endif
        @if (session('message-error'))
            <div class="alert alert-danger" role="alert">
                {{ session('message-error') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Book List</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Cover</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Writer</th>
                                <th>Publisher</th>
                                <th>Publication_year</th>
                                <th>Stock</th>
                                <th>Rating</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img style="max-width: 200px; border-radius: 0%" src="{{ asset('/storage/book-cover/' . $book->cover) }}" alt="">
                                    </td>
                                    <td>{{ $book->title }}</td>
                                    <td>
                                        @foreach ($book->bookCategory as $item)
                                            {{ $item->name }}
                                        @endforeach
                                    </td>
                                    <td>{{ $book->writer }}</td>
                                    <td>{{ $book->publisher }}</td>
                                    <td>{{ $book->publication_year }}</td>
                                    <td>{{ $book->stock == 0 ? "out of stock" : $book->stock }}</td>
                                    <td>
                                        @php
                                            $roundedRating = round($book->book_reviews_avg_rating);
                                        @endphp
                                        
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $roundedRating)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gold" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-star" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                            @endif
                                        @endfor
                                    </td>
                                    
                                    <td style="display: flex; flex-wrap: wrap; gap: .3rem">
                                        <a style="color: white; text-decoration: none;"  href="/dashboard-member/borrowing/create?book_id={{ $book->id }}">
                                            <button class="badge badge-success ">Borrow</button>
                                        </a>
                                        <a style="color: white; text-decoration: none;"  href="/dashboard-member/private-collection/create?user_id={{ Auth::user()->id }}&book_id={{ $book->id }}">
                                            <button class="badge badge-primary ">Add to collection</button>
                                        </a>
                                        <a style="color: white; text-decoration: none;"  href="/dashboard-member/book/rating/{{ $book->id }}">
                                            <button class="badge badge-info ">Detail Review</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    

    {{-- <form action="/dashboard-member/book" >
        <input type="text" name="search" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    <table>
        <tr>
            <th>No</th>
            <th>Cover</th>
            <th>Title</th>
            <th>Category</th>
            <th>Writer</th>
            <th>Publisher</th>
            <th>Publication_year</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img style="width: 10rem" src="{{ asset('/storage/book-cover/' . $book->cover) }}" alt="">
                </td>
                <td>{{ $book->title }}</td>
                <td>
                    @foreach ($book->bookCategory as $item)
                        {{ $item->name }}
                    @endforeach
                </td>
                <td>{{ $book->writer }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->publication_year }}</td>
                <td>{{ $book->stock == 0 ? "out of stock" : $book->stock }}</td>
                <td>
                    <a href="/dashboard-member/borrowing/create?book_id={{ $book->id }}">Borrow</a>
                    <a href="/dashboard-member/private-collection/create?user_id={{ Auth::user()->id }}&book_id={{ $book->id }}">Add to collection</a>
                </td>
            </tr>
        @endforeach
    </table> --}}
@endsection