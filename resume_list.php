<?php
    // 登录检测
    session_start();
    if (intval($_SESSION['uid']) < 1) {
        die("请先<a href='user_login.php'>登录</a>在添加简历");
    }

    try{
        //查询数据库
        $dbh = new PDO('mysql:host=127.0.0.1;dbname=resume','root','123123123');
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM `resume` WHERE `uid` = ?";
        $sth = $dbh->prepare($sql);
        $sth->execute([$_SESSION['uid']]);
        $resume_list = $sth->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        print("Error !" .$e->getMessage() ."<br/>>");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>简历列表</title>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="main.js"></script>
</head>
<body>
    <div>
        <?php if($resume_list):?>
            <ul>
                <?php foreach($resume_list as $item):?>
                <li id="rlist<?= $item['id'] ?>">
                    <a><?=$item['title']?></a>
                    <a href="resume_detail.php?id=<?= $item['id'] ?>" target="_blank">查看</a>
                    <a href="resume_modify.php?id=<?= $item['id'] ?>" target="_blank">编辑</a>
                    <a href="javascript:confirm_delete(<?= $item['id'] ?>);void(0)" target="_blank">删除</a>
                </li>
                <?php endforeach?>
            </ul>
        <?php endif?>
    </div>
    <p><a href="resume_add.php">添加简历</a></p>
</body>
</html>