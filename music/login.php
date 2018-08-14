<?php
    // 登录检测
    header('Access-Control-Allow-Origin:*');
    header("Access-Control-Allow-Headers", "Authentication,Origin, X-Requested-With, Content-Type, Accept");
    try{
        // 连接数据库
        $dbh = new PDO('mysql:host=127.0.0.1;dbname=resume','root','password');
        $sql = "SELECT * FROM `user` WHERE `id` = ?";
        $sth = $dbh->prepare($sql);
        $sth->execute([1]);
        $data = $sth->fetch(PDO::FETCH_ASSOC);

        print_r($data['id']);

        echo json_encode($data['id']);
    }catch(PDOException $e){
        die($e->getMessage());
    }

?>