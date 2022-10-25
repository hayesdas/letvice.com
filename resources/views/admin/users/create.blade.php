@extends('admin/layout/empty')
@section("title", "Create user")
@section('content')
    <div class="container">
        <div class="row justify-content-center vh-100">
            <div class="col-5 d-flex">
                <form class="align-self-center mb-5" method="post" action="{{ route('admin.users.store') }}">
                    @csrf
                    <div class="text-center mb-3">
                        <h1 class="h3 text-center">Admin-panel</h1>
                        <h5 class="">Create user</h5>
                    </div>
                    <div class="form-group">
                        <input required type="text" class="form-control" id="exampleInput" name="name" placeholder="Login">
                    </div>
                    <div class="form-group">
                        <input required type="password" class="form-control" id="exampleInput" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input required type="text" class="form-control" id="exampleInput" name="email" placeholder="Email">
                    </div>
                    <div class="input-group mb-3">
                        <select class="custom-select" id="inputGroupSelect01" required="required" name="role">
                            <option disabled selected value="">Role</option>
                            <option value="User">User</option>
                            <option value="Seller">Seller</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-link">Create</button>
                    </div>
                    @foreach($errors->all() as $error)
                    <div class="text-center text-danger">
                        {{ $error }}
                    </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection
