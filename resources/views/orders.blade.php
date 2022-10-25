<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Letvice</title>
</head>
<body>
    <div class="wrapper">

    
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
                    @else
                    <a href="/auth" class="header_a">Auth</a>
                @endif
                <a href="/orders" class="header_a">Orders</a>
            </div>
        </header>
        <? $i = 0 ?>
        <? foreach($ordersByUser as $order):?>
            <? $i++ ?>
            <h4>Order <?=$i?>:</h4> <br>
            Id: <?=$order->id?> <br>
            Key: <?=$order->key?> <br>
            Email: <?=$order->email?> <br>
            Total Price: <?=$order->total_price?>$ <br> <br>

        <? endforeach ?>

    </div>
    <footer style="height: 100px;"></footer>
    <script src="{{mix('js/app.js')}}"></script>
</body>
</html>