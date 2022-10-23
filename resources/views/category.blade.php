<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ mix('css/style.css') }}" rel="stylesheet">
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
        </header>
        <div class="general_category">
            <div class="general_category_name"><?=$category_name?></div>
            <div class="d90sf2Ksl flex">
                <? foreach($products as $shoes): ?>
                <div class="shoes">
                    <a href="/article/<?=$shoes->name?>"><img src="/storage/<?=$shoes->img?>" alt="" class="shoes_img"></a>
                    <div class="shoes_info">
                        <div class="shoes_category"><?=$shoes->category?></div>
                        <div class="shoes_name"><?=$shoes->name?></div>
                    </div>
                    <div class="shoes_price">
                        <? if(empty($shoes->sale)): ?>
                        <div class="price"><?=$shoes->price.'$'?></div>    
                        <? else: ?>
                        <div class="price sale_price"><? echo $shoes->price - ($shoes->price * ($shoes->sale / 100));?>$</div>
                        <div class="start_price">
                            Start price - <span class="decor_text"><?=$shoes->price.'$'?></span> <span class="sale_price"> -<?=$shoes->sale?>%</span> 
                        </div>
                        <? endif ?>
                    </div>
                </div>
                <? endforeach ?>
            </div>
        </div>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
</body>
</html>