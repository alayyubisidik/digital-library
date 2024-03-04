@extends('layout.main')

@section('title', 'Book')

@section('content')
    <h1>Borrowing</h1>

    <style>
        td, th{
            padding: 1rem
        }
    </style>


    <table>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Title</th>
            <th>Loan Date</th>
            <th>Date of Reeturn</th>
            <th>Loan Status</th>
            <th>Action</th>
        </tr>
        @foreach ($borrowings as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->fullname }}</td>
                <td>{{ $item->book->title }}</td>
                <td>{{ $item->loan_date }}</td>
                <td>{{ $item->date_of_return == null ? "-" : $item->date_of_return }}</td>
                <td>{{ $item->loan_status == 1 ? "borrowed" : "returned" }}</td>
            </tr>
        @endforeach
    </table>
@endsection