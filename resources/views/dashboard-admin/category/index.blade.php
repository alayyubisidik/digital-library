@extends('layout.main')

@section('title', 'Category')

@section('content')
    {{-- <h1>manajemen Category</h1>

    @if (session('message-error'))
        <h1>{{ session('message-error') }}</h1>
    @endif
    @if (session('message-success'))
        <h1>{{ session('message-success') }}</h1>
    @endif --}}

    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Category Manajemen</h4>
                    <a href="/dashboard-admin/category/create">
                        <button  style="font-size: 14px; color: white; text-decoration: none;" class="btn btn-success mb-3" >Create a Category</button>
                    </a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td >
                                        <a style="color: white; text-decoration: none;" href="/dashboard-admin/category/delete/{{ $category->slug }}">
                                            <button class="badge badge-danger mr-3">Hapus</button>
                                        </a>
                                        <a style="color: white; text-decoration: none;"  href="/dashboard-admin/category/edit/{{ $category->slug }}">
                                            <button class="badge badge-primary ">Edit</button>
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
