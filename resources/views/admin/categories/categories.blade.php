@extends('admin/layout/panel')
@section("title", "Users")
@section('content')
    <div class="mb-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-5">
                @if(session('message'))
                <div class="alert alert-warning" role="alert">
                    {{ session('message') }}
                </div>
                @endif
                <div class="mb-3">All categories - <span class="badge badge-pill badge-info mr-5">{{ App\Models\Category::all()->count() }}</span> <a href="{{ route('admin.categories.create') }}">create</a></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="overflow-auto" style="height: 300px">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Products</th>
                            <th scope="col">Register date</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->name }}</th>
                            <td>{{ App\Models\Product::where('category', $category->name)->count() }}</td>
                            <td>{{ $category->created_at->format('d.m.Y') }}</td>
                            <td><a href="{{ route('admin.categories.delete', ['id' => $category->id]) }}">Delete</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
