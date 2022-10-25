@extends('admin/layout/empty')
@section("title", "login")
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="text-center mb-3">
                    <h1 class="h3 text-center">Pages list</h1>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a class="" href="{{route('admin.login')}}">admin.login</a>
                    </li>
                    <li class="list-group-item">
                        <a class="" href="{{route('admin.categories.create')}}">admin.categories.create</a>
                    </li>
                    <li class="list-group-item">
                        <a class="" href="{{route('admin.products.create')}}">admin.products.create</a>
                    </li>
{{--                    <li class="list-group-item">--}}
{{--                        <a class="" href="{{route('admin.users.create')}}">admin.users.create</a>--}}
{{--                    </li>--}}
{{--                    <li class="list-group-item">--}}
{{--                        <a class="" href="{{route('admin.users.index')}}">admin.users.index</a>--}}
{{--                    </li>--}}
                    <li class="list-group-item">
                        <a class="" href="{{route('admin.users.admin-users')}}">admin.admin-users.create</a>
                    </li>
                    <li class="list-group-item">
                        <a class="" href="{{route('admin.users.search')}}">admin.search</a>
                    </li>
                    <li class="list-group-item">
                        <a class="" href="{{route('admin.index')}}">admin.index</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
