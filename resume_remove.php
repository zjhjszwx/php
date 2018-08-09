<?php
// 登录检测
session_start();
if (intval($_SESSION['uid']) < 1) {
  header("Location: user_login.php");
  die("请先<a href='user_login.php'>登录</a>在添加简历");
}
$resume_id = intval($_REQUEST['id']);
if ($resume_id < 1) {
  die("错误的简历ID");
}
try{
    //插入数据库
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=resume','root','123123123');

    // 打开PDO的错误报告
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM `resume` WHERE `id` = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute([$resume_id]);
    die("简历删除成功!<script>location='resume_list.php'</script>");
}catch(PDOException $e){
    print("Error !" .$e->getMessage() ."<br/>>");
    die();
}

?>