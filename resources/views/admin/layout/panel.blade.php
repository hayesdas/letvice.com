<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>@yield("title")</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-2">
            <h4 class="mb-5">Admin-Panel</h4>
            <li>
                    <form action="{{route('admin.logout')}}" method="post">
                        @csrf
                       <button type="submit" class="btn btn-link px-0">Logout</button>
                    </form>
                </li>
            <ul class="list-unstyled">
                <li><a href="{{ route('admin.index') }}">Index</a></li>
                <li><a href="{{ route('admin.users.index') }}">Users</a></li>
                <li><a href="{{ route('admin.categories.create') }}">Categories</a></li>
                <li><a href="{{ route('admin.products.create') }}">Products</a></li>
            </ul>
        </div>
        <div class="col-10">
            @yield("content")
        </div>
    </div>
</div>

</body>
</html>
