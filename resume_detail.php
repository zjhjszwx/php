<?php
    $resume_id = intval($_REQUEST['id']);
    try{
        // 连接数据库
        $dbh = new PDO('mysql:host=127.0.0.1;dbname=resume','root','123123123');
        $sql = "SELECT * FROM `resume` WHERE `id` = ?";
        $sth = $dbh->prepare($sql);
        $sth->execute([$resume_id]);
        $data = $sth->fetch(PDO::FETCH_ASSOC);
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
    <a href="resume_list.php">返回</a>
    <h1><?=$data['title']?></h1>
    <div>
        <?=$data['content']?>
    </div>
</body>
</html>