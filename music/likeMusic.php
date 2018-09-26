<?php
    header('Access-Control-Allow-Origin:*');
    header("Access-Control-Allow-Headers", "Authentication,Origin, X-Requested-With, Content-Type, Accept");

    if (isset($_REQUEST['name'])) {
        $name = $_REQUEST['name'];
    }
    if (isset($_REQUEST['author'])) {
        $author = $_REQUEST['author'];
    }
    if (isset($_REQUEST['pic'])) {
        $pic = $_REQUEST['pic'];
    }
    if (isset($_REQUEST['music'])) {
        $music = $_REQUEST['music'];
    }
    
   
    try{
        // 连接数据库
        $dbh = new PDO('mysql:host=127.0.0.1;dbname=resume','root','password');
        $sql = "SELECT * FROM `music` WHERE `name` = ?";
        $sth = $dbh->prepare($sql);
        $sth->execute([$name]);
        $data = $sth->fetch(PDO::FETCH_ASSOC);
        if($data['music']){
            $info = array(
                'success'=>true,
                'data'=>$data['music'],
            );
            echo json_encode($info);
        }else{
            $dbh = new PDO('mysql:host=127.0.0.1;dbname=resume','root','password');
            $sql = "INSERT INTO `music`(`name`,`author`,`pic`,`music`) VALUES (`$name`,`$author`,`$pic`,`$music`)";
            $res = $dbh->exec($sql);

            $info = array(
                'success'=>true,
                'data'=>$res,
            );

            var_dump($name,$author,$pic,$music);
            echo json_encode($info);

        }
        

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