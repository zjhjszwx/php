<?php
    // 登录检测
    session_start();
    if (intval($_SESSION['uid']) < 1) {
        header("Location: user_login.php");
        die("请先<a href='user_login.php'>登录</a>在添加简历");
    }
    $resume_id = intval($_REQUEST['id']);
    try{
        // 连接数据库
        $dbh = new PDO('mysql:host=127.0.0.1;dbname=resume','root','123123123');
        $sql = "SELECT * FROM `resume` WHERE `id` = ?";
        $sth = $dbh->prepare($sql);
        $sth->execute([$resume_id]);
        $data = $sth->fetch(PDO::FETCH_ASSOC);

        if($data['uid'] != $_SESSION['uid']){
            die('无法修改其他人的简历');
        }   
    }catch(PDOException $e){
        die($e->getMessage());
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
    <h1>修改简历</h1>
    <form action="resume_update.php" method="post">
        <input type="hidden" name="id" value="<?= $resume_id ?>">
        <p><input name="title" type="text" placeholder="简历名称" value="<?=$data['title']?>"/></p>
        <p><textarea name='content' placeholder="简历内容，支持markdown"><?=$data['content']?></textarea></p>
        <p><input type="submit" value="保存"/></p>
    </form>
</body>
</html>