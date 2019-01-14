<?php
    // 登录检测
    header('Access-Control-Allow-Origin:*');
    header("Access-Control-Allow-Headers", "Authentication,Origin, X-Requested-With, Content-Type, Accept");
    // $username = trim($_REQUEST['username']);
    // $password = trim($_REQUEST['password']);
    try{
       
        // 连接数据库
        $db = new PDO('mysql:host=52.193.25.184;dbname=test','root','Zjhjszwx@1');
        $sql = 'insert into resume(id) value(1)';
        $stms = $db->prepare($sql);
        $stms->execute();

        // $sth = $dbh->prepare($sql);
        // $sth->execute([$password]);
        // $data = $sth->fetch(PDO::FETCH_ASSOC);
        // if($data['password'] == $password){
        //     $info = array(
        //         'success'=>true,
        //         'data'=>'',
        //     );
        //     echo json_encode($info);
        // }else {
        //     $info = array(
        //         'success'=>false,
        //         'data'=>'',
        //         'error'=>'用户名或密码错误'
        //     );
        //     echo json_encode($info);
        // }
    }catch(PDOException $e){
        die($e->getMessage());
    }

?>