@extends('layout.main')

@section('title', 'Book')

@section('content')

    <div class="content-wrapper">
        @if (session('message-success'))
            <div class="alert alert-success" role="alert">
                {{ session('message-success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Borrowing</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Loan Date</th>
                            <th>Date of Return</th>
                            <th>Loan Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($borrowings as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->book->title }}</td>
                                <td>{{ $item->loan_date }}</td>
                                <td>{{ $item->date_of_return == null ? '-' : $item->date_of_return }}</td>
                                <td>{{ $item->loan_status == 1 ? 'borrowed' : 'returned' }}</td>
                                <td>
                                    @if ($item->loan_status == 1)
                                        <a style="color: white; text-decoration: none;"  href="/dashboard-member/return/{{ $item->book->slug }}">
                                            <button class="badge badge-warning ">Return</button>
                                        </a>
                                    @else
                                        <a style="color: white; text-decoration: none;"  href="#">
                                            <button class="badge badge-success ">Returned</button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
