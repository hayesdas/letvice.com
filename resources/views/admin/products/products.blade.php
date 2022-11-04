@extends('admin/layout/panel')
@section("title", "Products query")
@section('content')
    <div class="mb-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="mb-3">All Products - <span class="badge badge-pill badge-info mr-5">{{ App\Models\Product::all()->count() }}</span> <a href="{{ route('admin.products.create') }}">create</a></div>
                <form class="" action="{{route('admin.products.search')}}">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search" name="name">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-6 mb-3">
                <div class="card">
                    <div class="card-header">
                       
                    </div>
                    <div class="card-body">
                        <p class="card-text">Name: {{ $product->name }}</p>
                        <p class="card-text">Description: {{ $product->name }}</p>
                        <p class="card-text">Category: {{ $product->category }}</p>
                        <p class="card-text">Firm: {{ $product->firm }}</p>
                        <p class="card-text">Price: {{ $product->price }}$</p>
                        @if(!empty($product->sale))
                        <p class="card-text">Sale: {{ $product->sale }}%</p>
                        <p class="card-text">Total price: <? echo $product->price - ($product->price * ($product->sale / 100));?>$</p>
                        @endif
                        @if(empty($product->sale))
                        <p class="card-text">Sale: 0%</p>
                        <p class="card-text">Total price: {{ $product->price }}$</p>
                        @endif
                        <img src="/storage/{{ $product->img }}" alt="" class="shoes_img" style="height: 100px;margin-bottom: 20px;">
                        <div style="display: flex;">
                            <form action="{{ route('admin.products.delete', ['id' => $product->id]) }}" method="post" onsubmit="return confirm('Вы уверены?')">
                                @csrf
                                <button class="btn btn-submit" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
