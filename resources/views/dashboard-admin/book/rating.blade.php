@extends('layout.main')

@section('title', 'Book')

@section('content')

<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Ratings and Reviews</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Borrower</th>
                            <th>Review</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ratings as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->fullname }}</td>
                                <td>{{ $item->review }}</td>
                                <td>
                                    @php
                                        $rating = round($item->rating);
                                    @endphp
                                    
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $rating)
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
                                <td>
                                    <a style="color: white; text-decoration: none;" href="/dashboard-admin/book/rating/delete/{{ $item->id }}">
                                        <button class="badge badge-danger mr-3">Hapus</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        {{-- @foreach ($books as $book)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img style="max-width: 200px; border-radius: 0%" src="{{ asset('/storage/book-cover/' . $book->cover) }}"alt="">
                                </td>
                                <td>{{ $book->title }}</td>
                                <td>
                                    @foreach ($book->bookCategory as $item)
                                        <p style="margin: 0">{{ $item->name }}</p>
                                    @endforeach
                                </td>
                                <td>{{ $book->writer }}</td>
                                <td>{{ $book->publisher }}</td>
                                <td>{{ $book->publication_year }}</td>
                                <td>{{ $book->stock }}</td>
                                <td>{{ $book->borrowings_count }}</td>
                                <td>{{ $book->book_reviews_count }}</td>
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
                                <td >
                                    <button class="badge badge-danger mr-3">
                                        <a style="color: white; text-decoration: none;" href="/dashboard-admin/book/delete/{{ $book->id }}">Hapus</a>
                                    </button>
                                    <button class="badge badge-primary ">
                                        <a style="color: white; text-decoration: none;"  href="/dashboard-admin/book/edit/{{ $book->slug }}">Edit</a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
