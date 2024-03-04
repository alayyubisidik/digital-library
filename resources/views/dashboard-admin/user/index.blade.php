@extends('layout.main')

@section('title', 'User')

@section('content')

    <style>
        td,
        th {
            padding: 1rem
        }
    </style>

    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User Manajemen</h4>
                </p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Fullname</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Role</th>
                            <th>Borrowing Count</th>
                            <th>Access Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->fullname }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    @if ($user->role == 'member')
                                        {{ $user->borrowings_count }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <form action="/dashboard/user/change-access-status-user" method="post">
                                        @csrf

                                        <input type="hidden" name="access_status"
                                            value="{{ $user->access_status === 1 ? 0 : 1 }}">
                                        <input type="hidden" name="username" value="{{ $user->username }}">

                                        <div class="" style="display: flex; gap: 1rem">
                                            @if ($user->access_status === 1)
                                                <button class="badge badge-success"
                                                    type="submit">Active</button>
                                            @else
                                                <button class="badge badge-danger"
                                                    type="submit">Blocked</button>
                                            @endif
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
