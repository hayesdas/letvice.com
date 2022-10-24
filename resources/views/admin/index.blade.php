@extends('admin/layout/panel')
@section("title", "Users")
@section('content')
    <div class="mb-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-6 mb-3">
                <div class="">All users - <span class="badge badge-pill badge-info mr-5">198</span></div>
                <div class="">New users - <span class="text-success">33(+17%)</span></div>
            </div>
            <div class="col-6 mb-3">
                <div class="">All time earnings - <span class="badge badge-pill badge-info mr-5">768$</span></div>
                <div class="">Earnings for today - <span class="text-success">198$(+33%)</span></div>
            </div>
            <div class="col-6 mb-3">
                <div class="">All categories - <span class="badge badge-pill badge-info mr-5">12</span></div>
                <div class="">New categories created - <span class="text-success">1</span></div>
            </div>
            <div class="col-6 mb-3">
                <div class="">All products - <span class="badge badge-pill badge-info mr-5">54</span></div>
                <div class="">New products created - <span class="text-success">19</span></div>
            </div>
        </div>
    </div>
@endsection
