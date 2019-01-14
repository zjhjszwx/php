<?php
    // 登录检测
    header('Access-Control-Allow-Origin:*');
    header("Access-Control-Allow-Headers", "Authentication,Origin, X-Requested-With, Content-Type, Accept");
    // $username = trim($_REQUEST['username']);
    // $password = trim($_REQUEST['password']);
    try{
       
        // 连接数据库
        $db = new PDO('mysql:host=52.193.25.184;dbname=test','root','Zjhjszwx@1');
        $sql = 'insert into user(id) value(1)';
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
        echo json_encode("success");
    }catch(PDOException $e){
        die($e->getMessage());
    }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>JS Bin</title>
</head>
<body>
  <p>Some paragraph text</p>
    <h1>some heading 1 text</h1>
    <h2>some heading 2 text</h2>

    <a href="#" id="size-12">12</a>
    <a href="#" id="size-14">14</a>
    <a href="#" id="size-16">16</a>
  
  <p id="help">Helpful notes will appear here</p>
<p>E-mail: <input type="text" id="email" name="email"></p>
<p>Name: <input type="text" id="name" name="name"></p>
<p>Age: <input type="text" id="age" name="age"></p>
  <script>
    
  </script>
</body>
</html>