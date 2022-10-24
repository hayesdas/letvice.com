@extends('admin/layout/panel')
@section("title", "Users")
@section('content')
    <div class="mb-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="mb-3">All users - <span class="badge badge-pill badge-info mr-5">198</span> <a href="{{ route('admin.users.create') }}">create</a></div>
                <form class="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
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
                        <tr>
                            <th scope="row">hayes</th>
                            <td>23.10.2022</td>
                            <td><a href="#">View details</a></td>
                        </tr>
                        <tr>
                            <th scope="row">fury</th>
                            <td>12.10.2022</td>
                            <td><a href="#">View details</a></td>
                        </tr>
                        <tr>
                            <th scope="row">heager</th>
                            <td>02.09.2022</td>
                            <td><a href="#">View details</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
