<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户注册</title>
</head>
<body>
    <h1>用户注册</h1>
    <form action="user_save.php" method="post">
        <p><input type="text" name="email" placeholder="Email"/></p>
        <p><input type="password" name="password1" placeholder="密码"/></p>
        <p><input type="password" name="password2" placeholder="重复密码"/></p>
        <p><input type="submit" value="注册"/></p>
    </form>
</body>
</html>