@include('layout.base')
<!DOCTYPE html>
<html lang="ru">
    @yield('head')
<body>
    <div class="wrapper">
        @yield('header')
        <div class="general_category">
            <div class="general_category_name"><?=$category_name?></div>
            <div class="d90sf2Ksl flex flex-wrap">
                <? foreach($products as $shoes): ?>
                <div class="shoes" style="margin-bottom: 50px;">
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
