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
                        <h5 class="">Create product</h5>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInput" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">Description</textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInput" placeholder="Firm">
                    </div>
                    <div class="input-group mb-3">
                        <select class="custom-select" id="inputGroupSelect01">
                            <option disabled selected>Category</option>
                            <option value="1">Category name</option>
                        </select>
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
