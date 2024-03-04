@extends('layout.main')

@section('title', 'Generate Report')

@section('content')

    <div class="content-wrapper">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Generate Borrowing Report</h4>
                <div class="" style="display: flex; justify-content: space-between">
                    <form action="/dashboard-admin/generate-report" style="margin: 1rem 0">
                        @csrf
                
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" id="start_date">
                
                        <label for="end_date">End Date</label>
                        <input type="date" name="end_date" id="end_date">
                
                        <button type="submit">Apply</button>
                    </form>
                
                    @if (request('start_date'))
                        <a href="/generate-excel-admin?start_date={{ request('start_date') }}&end_date={{ request('end_date') }}">
                            <button class="btn btn-primary mr-2">Export</button>
                        </a>
                        {{-- <a href="/generate-excel?start_date={{ request('start_date') }}&end_date={{ request('end_date') }}">Export</a> --}}
                    @endif
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Borrower</th>
                            <th>Book Title</th>
                            <th>Writer</th>
                            <th>Loan Date</th>
                            <th>Date of Return</th>
                            <th>Loan Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (request('start_date'))
                            @foreach ($borrowings as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->fullname }}</td>
                                    <td>{{ $item->book->title }}</td>
                                    <td>{{ $item->book->writer }}</td>
                                    <td>{{ $item->loan_date }}</td>
                                    <td>{{ $item->date_of_return }}</td>
                                    <td>{{ $item->loan_status == 1 ? 'borrowed' : 'returned' }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
