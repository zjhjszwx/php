<?php
    // 登录检测
    session_start();
    if (intval($_SESSION['uid']) < 1) {
    header("Location: user_login.php");
    die("请先<a href='user_login.php'>登录</a>在添加简历");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加简历</title>
</head>
<body>
    <h1>添加简历</h1>
    <form action="resume_save.php" method="post">
        <p><input name="title" type="text" placeholder="简历名称"/></p>
        <p><textarea name='content' placeholder="简历内容，支持markdown"></textarea></p>
        <p><input type="submit" value="保存"/></p>
    </form>
</body>
</html>