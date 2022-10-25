@extends('admin/layout/panel')
@section("title", "Users")
@section('content')
    <div class="mb-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-6 mb-3">
                <div class="">All users - <span class="badge badge-pill badge-info mr-5">{{ $all_users }}</span></div>
                <div class="">New users - <span class="text-success">{{ $new_users }}(+<? echo floor(100 - ($new_users/$all_users) * 100) ?>%)</span></div>
            </div>
            <div class="col-6 mb-3">
                <div class="">All time earnings - <span class="badge badge-pill badge-info mr-5">{{ $all_time_earnings }}$</span></div>
                <div class="">Earnings for today - <span class="text-success">{{ $today_time_earnings }}$(+<? echo floor(100 - ($today_time_earnings/$all_time_earnings) * 100) ?>%)</span></div>
            </div>
            <div class="col-6 mb-3">
                <div class="">All categories - <span class="badge badge-pill badge-info mr-5">{{ $all_categories }}</span></div>
                <div class="">New categories created - <span class="text-success">{{ $new_categories }}</span></div>
            </div>
            <div class="col-6 mb-3">
                <div class="">All products - <span class="badge badge-pill badge-info mr-5">{{ $all_products }}</span></div>
                <div class="">New products created - <span class="text-success">{{ $new_products }}</span></div>
            </div>
        </div>
    </div>
@endsection
