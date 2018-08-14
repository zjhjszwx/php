<?php
    // 登录检测
    session_start();
    if (intval($_SESSION['uid']) < 1) {
        die("请先<a href='user_login.php'>登录</a>在添加简历");
    }
    $title = trim($_REQUEST['title']);
    $content = trim($_REQUEST['content']);
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
        $sql = "INSERT INTO `resume` (`title`,`content`,`uid`,`created_at`) VALUES(?,?,?,?)";
        $sth = $dbh->prepare($sql);
        $sth->execute([$title,$content,intval($_SESSION['uid']),date('Y-m-d H:i:s')]);
        die("简历保存成功!<script>location='resume_list.php'</script>");
    }catch(PDOException $e){
        print("Error !" .$e->getMessage() ."<br/>>");
        die();
    }
?>