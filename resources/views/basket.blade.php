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
                    <button type="submit" class="delete_basket_product">Delete</button>
                    SIze: <?=$product['size']?>
                    Count: <?=$product['count']?>
                </div>
            </div>
            <? endforeach ?>
            Sum: <?=$sum?>$
            <button id="checkout">Checkout</button>
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
            blocks = $('.block')
            $.each(blocks, function (index, value) { 
                div = this
                $(div).find('.delete_basket_product').click(function(){
                    $.ajax({
                        type: "post",
                        url: "/basket/delete",
                        data: {
                            'name': $(blocks[index]).find('.basket-shoes_name').text()
                        },
                        success: function (response) {
                            location.reload()
                        }
                    });
                })
            });
            $("#checkout").click(function(){
                $.ajax({
                    type: "post",
                    url: "/order/8b1df807913bf7cfa8058ee1edd7d7e6",
                    data: {
                        'k': '<?=md5(time()+1)?>',
                        'q': '<?=md5(time()+2)?>',
                        'w': '<?=md5(time())?>',
                        'm': '<?=md5(time()+3)?>',
                    },
                    success: function (response) {
                        @if(Auth::check())
                            location.href = '/order?key=<?=md5(time())?>'
                            @else
                                location.href = '/auth'
                        @endif
                    }
                });
            })
        })
    </script>                      
</body>
</html>