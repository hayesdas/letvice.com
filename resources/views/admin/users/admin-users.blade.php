@extends('admin/layout/panel')
@section("title", "Admin-Users")
@section('content')
    <div class="mb-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="mb-3">All admins - <span class="badge badge-pill badge-info mr-5">3</span> <a href="#">Create admin-user</a></div>
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
