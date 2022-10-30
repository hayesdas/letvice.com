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
                    <a href="/orders" class="header_a">Orders</a>
                    @if(Auth::check())
                    <a href="/products/create" class="header_a">Create Product</a>
                    @endif
                    @else
                    <a href="/auth" class="header_a">Auth</a>
                @endif
            </div>
        </header>
        
        <div class="filters">
            <div class="">Filters</div>
            <form action="" method="get" style="margin-bottom: 50px;">
                <input type="text" name="price_from" placeholder="Price From">
                <input type="text" name="price_to" placeholder="Price To">
                <button type="submit">Search</button>
                <a href="/" id="reset_filters">Reset</a>
            </form>
            
        </div>
        <div class="general_category" style="display: grid;grid-template-columns: 300px 300px 300px;gap: 100px;">
        <? foreach($mas as $shoes):?>
                <div class="d90sf2Ksl flex">
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
                </div>
        <? endforeach ?>            
        </div>

        
        
        <? if(isset($recommended)): ?>
            <div class="" style="margin-bottom: 20px;">Recommended for you</div>
            <div class="general_category" style="display: grid;grid-template-columns: 300px 300px 300px;gap: 100px;">
            <? foreach($recommended as $shoes):?>
                    <div class="d90sf2Ksl flex">
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
                    </div>
            <? endforeach ?>            
            </div>
        <? endif ?>   


    </div>
    <footer style="height: 100px;"></footer>
    <script src="{{mix('js/app.js')}}"></script>
</body>
</html>