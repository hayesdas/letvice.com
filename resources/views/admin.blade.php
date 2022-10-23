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

        All Product: <?=$all_product_count?>
        <button id="view_all_products">View all</button>
        <div class="all_products" style="display: none;">
            <? foreach($products as $product): ?>
                <div class="all_product_name"><?=$product->name?></div>
            <? endforeach ?>
        </div>
    </div>
    <footer style="height: 100px;"></footer>
    
    <script>
        $('#view_all_products').click(function(){
            $('.all_products').css('display', 'block')
        })
    </script>
</body>
</html>