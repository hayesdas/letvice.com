@include('layout.base')
<!DOCTYPE html>
<html lang="ru">
@yield('head')
<body>
    <div class="wrapper">

    
        @yield('header')
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