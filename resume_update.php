<?php
    // 登录检测
    session_start();
    if (intval($_SESSION['uid']) < 1) {
        header("Location: user_login.php");
        die("请先<a href='user_login.php'>登录</a>在添加简历");
    }
    // 获取输入参数
    $resume_id = intval($_REQUEST['id']);
    $title = trim($_REQUEST["title"]);
    $content = trim($_REQUEST["content"]);
    // 参数检查
    if (mb_strlen($title) < 1) {
        die("简历名称不能为空");
    }
    if (mb_strlen($content) < 10) {
        die("简历内容不能小于10个字符");
    }
    try{
        //插入数据库
        $dbh = new PDO('mysql:host=127.0.0.1;dbname=resume','root','123123123');

        // 打开PDO的错误报告
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE `resume` SET `title` = ?, `content` = ? WHERE `id` = ? AND `uid` = ?";
        $sth = $dbh->prepare($sql);
        $sth->execute([$title, $content, intval($resume_id), $_SESSION['uid']]);
        die("简历修改成功!<script>location='resume_list.php'</script>");
    }catch(PDOException $e){
        print("Error !" .$e->getMessage() ."<br/>>");
        die();
    }
  


?>