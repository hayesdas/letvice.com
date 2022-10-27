@extends('admin/layout/panel')
@section("title", "Admin-Users")
@section('content')
    <div class="mb-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="mb-3">All admins - <span class="badge badge-pill badge-info mr-5">3</span> <a href="{{ route('admin.create') }}">Create admin-user</a></div>
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
                        @foreach($admin_users as $admin)
                        <tr>
                            <th scope="row">{{ $admin->login }}</th>
                            <td>{{ $admin->created_at->format('d.m.Y') }}</td>
                            <td>
                                <a href="/admin/admin-user/delete?s=<?=md5(time())?>&d={{ $admin->id }}&c={{ $admin->id }}42&k={{ $admin->id + 1 }}&q=<?=md5(time() + 10)?>">Delete</a>
                                
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
