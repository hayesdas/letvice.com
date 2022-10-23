<!-- <!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" placeholder="Name" name="name"><br>
            <textarea name="description" id="" cols="30" rows="10"></textarea><br>
            <input type="text" placeholder="Name Firm" name="firm"><br>
            <input type="text" placeholder="Category" name="category"><br>
            <input type="text" placeholder="Price" name="price"><br>
            <input type="file" src="" alt="s" name="img"><br>
            <button type="submit">Отправить</button>
        </form>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Letvice</title>
</head>
<body>
    <div class="wrapper">
        <h3>Create</h3> <br>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" placeholder="Name" name="name" required> <br> <br>
            <textarea required name="description" id="" cols="30" rows="10" placeholder="Description"></textarea> <br>
            <input type="text" placeholder="Firm" name="firm" required> <br> <br>
            <select name="category" id="">
                <? foreach($categories as $category): ?>
                    <option value="<?=$category->name?>"><?=$category->name?></option>
                <? endforeach ?>
            </select>
            <input type="text" placeholder="Price" name="price" required> <br> <br>
            <input type="file" name="img" required> <br> <br>
            <button type="submit">Create</button>
        </form>        
    </div>

</body>
</html>
