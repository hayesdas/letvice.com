@section('head')

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/alert.css') }}">
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Letvice</title>
</head>

@endsection

@section('header')

<header class="header flex">
            <div class="logo">Letvice.com</div>
            <div class="dropdown">
                <a class="dropbtn">Categories</a>
                <div class="dropdown-content">
                    <? foreach($categories as $category): ?>
                        <a href="/category/<?=$category->name?>"><?=$category->name?></a>
                    <? endforeach ?>
                </div>
            </div>
            <a href="/basket" class="header_a">Basket</a>
            <form action="" method="get" class="search_form">
                <input type="search" name="s" id="search" placeholder="Search...">
            </form>
            <div class="auth_div" style="margin-left: 50px;">
                @if(Auth::check())
                    <a href="/logout" class="header_a">Logout</a>
                    <a href="/orders" class="header_a">Orders</a>
                    @if(Auth::check())
                    <a href="/products/create" class="header_a">Create Product</a>
                    @endif
                    @else
                    <a href="/auth" class="header_a">Auth</a>
                @endif
            </div>
        </header>

@endsection