@include('layout.base')
<!DOCTYPE html>
<html lang="ru">
@yield('head')
<body>
    <div class="wrapper">
        @yield('header')
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