<?php

//获取数据
$email = trim($_REQUEST["email"]);
$password = trim($_REQUEST["password"]);

if(strlen($email) < 1){
    die("email 不能为空");
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    die("email 格式错误");
}
if(strlen($password) < 1){
    die("密码不能为空");
}

try{
    //插入数据库
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=resume','root','123123123');
    $sql = "SELECT * FROM `user` WHERE `email` = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute([$email]);
    $user = $sth->fetch(PDO::FETCH_ASSOC);
    if(password_verify($password,$user['password'])){
        //开启session
        session_start();
        $_SESSIN['email'] = $email;
        $_SESSION['uid'] = $user['id'];
        die("登录成功<script>location='resume_list.php'</script>");
    }else{
        die("登陆失败");
    }

}catch(PDOException $e){
    print("Error !" .$e->getMessage() ."<br/>>");
    die();
}

