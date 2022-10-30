@extends('admin/layout/empty')
@section("title", "login")
@section('content')
    <div class="container">
        <div class="row justify-content-center vh-100">
            <div class="col-5 d-flex">
                <form class="align-self-center mb-5" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="text-center mb-3">
                        <h1 class="h3 text-center">Seller-panel</h1>
                        <h5 class="">Create product</h5>
                    </div>
                    <div class="form-group">
                        <input required type="text" class="form-control" id="exampleInput" placeholder="Name" name="name">
                    </div>
                    <div class="form-group">
                        <textarea required class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">Description</textarea>
                    </div>
                    <div class="form-group">
                        <input required type="text" class="form-control" id="exampleInput" placeholder="Firm" name="firm" value="{{ auth()->user()->firm }}">
                    </div>
                    <div class="input-group mb-3">
                        <select required class="custom-select" id="inputGroupSelect01" name="category">
                            <option disabled selected>Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input required type="text" class="form-control" id="exampleInput" placeholder="Price" name="price">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInput" placeholder="Sale(optional)" name="sale">
                    </div>
                    <div class="form-group">
                        <input required type="file" id="exampleInput" placeholder="Firm" name="img">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-link">Create</button>
                    </div>
                    <div class="text-center text-danger">
                        <? if(isset($error)) echo $error ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection