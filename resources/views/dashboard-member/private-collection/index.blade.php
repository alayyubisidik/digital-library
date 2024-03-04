@extends('layout.main')

@section('title', 'Private Collection')

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
                <h4 class="card-title">Private Collection</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Cover</th>
                            <th>Title</th>
                            <th>Writer</th>
                            <th>Publisher</th>
                            <th>Publication Year</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($private_collections as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img style="max-width: 200px; border-radius: 0%" src="{{ asset('/storage/book-cover/' . $item->cover) }}"
                                        alt="">
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->writer }}</td>
                                <td>{{ $item->publisher }}</td>
                                <td>{{ $item->publication_year }}</td>
                                <td>{{ $item->stock }}</td>
                                <td>
                                    <a style="color: white; text-decoration: none;"  href="/dashboard-member/borrowing/create?book_id={{ $item->id }}">
                                        <button class="badge badge-success ">Borrow</button>
                                    </a>
                                    <a style="color: white; text-decoration: none;"  href="/dashboard-member/private-collection/delete?user_id={{ Auth::user()->id }}&book_id={{ $item->id }}">
                                        <button class="badge badge-danger ">Delete</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
