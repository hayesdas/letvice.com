@extends('admin/layout/empty')
@section("title", "login")
@section('content')
    <div class="container">
        <div class="row justify-content-center vh-100">
            <div class="col-5 d-flex">
                <form class="align-self-center mb-5">
                    @csrf
                    <div class="text-center mb-3">
                        <h1 class="h3 text-center">Admin-panel</h1>
                        <h5 class="">Create category</h5>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInput" placeholder="Name">
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
