<?php

//获取数据
$email = trim($_REQUEST["email"]);
$password1 = trim($_REQUEST["password1"]);
$password2 = trim($_REQUEST["password2"]);
//验证邮箱
if(strlen($email) < 1){
    die("emial不能为空");
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    die("email格式错误");
}
if($password1 != $password2){
    die("两次密码不一致！");
}


try{
    //插入数据库
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=resume','root','123123123');
    // 打开PDO的错误报告
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `user`(`email`,`password`,`created_at`) VALUES(?,?,?)";
    $sth = $dbh->prepare($sql);
    $sth->execute([$email,password_hash($password1,PASSWORD_DEFAULT),date('Y-m-d H:i:s')]);
    die("success!<script>location='user_login'</script>");
}catch(PDOException $e){
    print("Error !" .$e->getMessage() ."<br/>>");
    die();
}

