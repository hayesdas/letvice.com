@include('layout.base')
<!DOCTYPE html>
<html lang="ru">
    @yield('head')
<body>
    <div class="wrapper">

        @yield('header')
        
        <div class="filters">
            <div class="">Filters</div>
            <form action="" method="get" style="margin-bottom: 50px;">
                @foreach($filters as $filter)
                    @include('layout.filters.'.$filter)
                @endforeach
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