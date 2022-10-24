<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        </header>
        <? if(isset($products)): ?>
        <div class="basket-products">
            <? $sum = 0 ?>
            <? foreach ($products as $a => $product): ?>
            <div class="basket-product flex">
                <img src="/storage/<?=$product['img']?>" alt="" class="basket-img">
                <div class="block">
                    <div class="basket-shoes_info">
                    <div class="basket-shoes_category"><?=$product['category']?></div>
                    <div class="basket-shoes_name"><?=$product['name']?></div>
                    </div>
                    <div class="shoes_price">
                        <? if(empty($product['sale'])): ?>
                        <? $sum+= $product['price'] * $product['count']?>    
                        <div class="price"><?=$product['price'].'$'?></div>    
                        <? else: ?>
                        <? $sum+= $product['price'] - ($product['price'] * ($product['sale'] / 100)) * $product['count']?>
                        <div class="price sale_price">
                            <? echo $product['price'] - ($product['price'] * ($product['sale'] / 100));?>$
                        </div>
                        <span class="basket-decor_text decor_text"><?=$product['price'].'$'?></span><span class="basket-sale_price"> -<?=$product['sale']?>%</span>
                        <? endif ?>
                    </div>
                    Size: <?=$product['size']?>
                    Count: <?=$product['count']?>
                </div>
            </div>
            <? endforeach ?>
            <table>
                <form action="" method="post">
                    @csrf
                    Address
                    <input type="text" name="address" required><br>
                    Sum: <?=$sum?>$ <br>
                    <button type="submit">Order</button>
                </form>
            </table>
            
        </div>
        <? endif ?>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function(){
            
        })
    </script>
</body>
</html>