@extends('admin/layout/empty')
@section("title", "Create Firm")
@section('content')
    <div class="container">
        <div class="row justify-content-center vh-100">
            <div class="col-5 d-flex">
                <form class="align-self-center mb-5" method="post">
                    @csrf
                    <div class="text-center mb-3">
                        <h1 class="h3 text-center">Seller-panel</h1>
                        <h5 class="">Create firm</h5>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInput" placeholder="Firm" name="firm">
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