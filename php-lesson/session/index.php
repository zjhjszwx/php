<?php
setcookie('n','u');
echo $_COOKIE['n'];
// session_start();
print_r($_SESSION);


if(isset($_SESSION['user'])){
    exit("已经登陆！<a href='reg.php'>注销</a>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <p><input type="text" name="username"></p>
        <p><input type="password" name="password"></p>
        <input type="submit" value="登陆" name="" id="">
    </form>
</body>
</html>