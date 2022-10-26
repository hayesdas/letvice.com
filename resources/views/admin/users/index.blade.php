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
                <div class="mb-3">All users - <span class="badge badge-pill badge-info mr-5">{{ $users->count() }}</span> <a href="{{ route('admin.users.create') }}">create</a></div>
                <form class="" action="{{route('admin.users.search')}}">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search" name="login"> <span></span>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="overflow-auto" style="height: 300px">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Login</th>
                            <th scope="col">Register date</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->login }}</th>
                            <td>{{ $user->created_at->format('d.m.Y') }}</td>
                            <td><a href="{{route('admin.users.search', ['login' => $user->login])}}">View details</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
