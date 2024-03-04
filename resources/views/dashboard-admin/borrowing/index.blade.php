@extends('layout.main')

@section('title', 'Borrowing')

@section('content')

    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Borrowing</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Loan Date</th>
                            <th>Date of Reeturn</th>
                            <th>Loan Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($borrowings as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->fullname }}</td>
                                <td>{{ $item->book->title }}</td>
                                <td>{{ $item->loan_date }}</td>
                                <td>{{ $item->date_of_return == null ? '-' : $item->date_of_return }}</td>
                                <td>{{ $item->loan_status == 1 ? 'borrowed' : 'returned' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
