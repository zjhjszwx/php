<?php
    // 登录检测
    header('Access-Control-Allow-Origin:*');
    header("Access-Control-Allow-Headers", "Authentication,Origin, X-Requested-With, Content-Type, Accept");
    $username = trim($_REQUEST['username']);
    $password = trim($_REQUEST['password']);
    try{
       
        // 连接数据库
        $dbh = new PDO('mysql:host=127.0.0.1;dbname=resume','root','password');
        $sql = "SELECT * FROM `user` WHERE `username` = ?";
        $sth = $dbh->prepare($sql);
        $sth->execute([$password]);
        $data = $sth->fetch(PDO::FETCH_ASSOC);
        if($data['password'] == $password){
            $info = array(
                'success'=>true,
                'data'=>'',
            );
            echo json_encode($info);
        }else {
            $info = array(
                'success'=>false,
                'data'=>'',
                'error'=>'用户名或密码错误'
            );
            echo json_encode($info);
        }
    }catch(PDOException $e){
        die($e->getMessage());
    }

?>