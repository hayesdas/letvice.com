@extends('admin/layout/empty')
@section("title", "login")
@section('content')
    <div class="container">
        <div class="row justify-content-center vh-100">
            <div class="col-5 d-flex">
                <form class="align-self-center mb-5" method="post">
                    @csrf
                    <h1 class="mb-3">Admin-panel</h1>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Login" name="login">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-link">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
