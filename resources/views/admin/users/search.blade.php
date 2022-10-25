@extends('admin/layout/panel')
@section("title", "Users")
@section('content')
    <div class="mb-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="mb-3">All users - <span class="badge badge-pill badge-info mr-5">{{ $userAmount }}</span> <a href="{{ route('admin.users.create') }}">create</a></div>
                <form class="" action="{{route('admin.users.search')}}">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search" name="name">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @foreach($users as $user)
            <div class="col-6 mb-3">
                <div class="card">
                    <div class="card-header">
                       {{$user->name}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">id: {{$user->id}}</p>
                        <p class="card-text">Amoutn of orders: 296$</p>
                        <p class="card-text">Role: {{$user->role}}</p>
                        <p class="card-text">New product created - 19</p>
                        <form action="{{route('admin.users.destroy', ['user' => $user->id])}}" method="post" onsubmit="return confirm('Вы уверены?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
