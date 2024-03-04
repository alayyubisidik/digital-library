@extends('layout.main')

@section('title', 'Book')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Category Manajemen</h4>
                <a href="/dashboard-officer/category/create">
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
                                    <button class="badge badge-danger mr-3">
                                        <a style="color: white; text-decoration: none;" href="/dashboard-officer/category/delete/{{ $category->slug }}">Hapus</a>
                                    </button>
                                    <button class="badge badge-primary ">
                                        <a style="color: white; text-decoration: none;"  href="/dashboard-officer/category/edit/{{ $category->slug }}">Edit</a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection