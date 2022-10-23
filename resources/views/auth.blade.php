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
        Login:
        <form action="/auth/login" method="post">
            @csrf
            <input type="text" placeholder="Email" name="email" required>
            <input type="password" placeholder="Password" name="password" required>
            <button type="submit">Login</button>
            <? if(isset($error_login))  echo $error_login?>
        </form>
        Register:
        <form action="/auth/register" method="post">
            @csrf
            <input type="text" placeholder="Name" name="name" required>
            <input type="text" placeholder="Email" name="email" required>
            <input type="password" placeholder="Password" name="password" required>
            <input type="password" placeholder="Confirm password" name="confirm_password" required>
            <button type="submit">Register</button>
            <? if(isset($error_register))  echo $error_register?>
        </form>
    </div>
    <footer style="height: 100px;"></footer>
    
    <script>
        $('#view_all_products').click(function(){
            $('.all_products').css('display', 'block')
        })
    </script>
</body>
</html>