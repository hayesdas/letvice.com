@extends('admin/layout/empty')
@section("title", "Create user")
@section('content')
    <div class="container">
        <div class="row justify-content-center vh-100">
            <div class="col-5 d-flex">
                <form class="align-self-center mb-5">
                    <div class="text-center mb-3">
                        <h1 class="h3 text-center">Admin-panel</h1>
                        <h5 class="">Create admin-user</h5>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInput" placeholder="Login">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="exampleInput" placeholder="Password">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-link">Create</button>
                    </div>
                    <div class="text-center text-danger">
                        Название ошибки
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
