<?php

$title =  trim(strip_tags($_REQUEST['title']));
$content = trim(strip_tags($_REQUEST['content']));
$file = trim(strip_tags($_REQUEST['file']));
echo $title,$content,$file;


$user = 'root';
$password = '123123123';
$dsn = 'mysql:host=127.0.0.1;dbname=fangtangdb';

// try{
//     $dsh = new PDO($dsn,$user,$password);
//     //query传入一个sql语句，返回一个数组
//     //FETCH_ASSOC取关联的数据
//     foreach($dsh->query('SELECT * From `user`',PDO::FETCH_ASSOC) as $row){
//         print_r($row);
//     }
// }catch(PDOException $e){
//     print("Error !" .$e->getMessage() ."<br/>>");
//     die();
// }
// finally{
//     $dsn = null;
// }

//预处理语句
// try{
//     $dsh = new PDO($dsn,$user,$password);
//     $sql = "SELECT * FROM `user` WHERE `class` = :class";
//     $sth = $dsh->prepare($sql);
//     $sth->execute([":class"=>2]);
//     $info = $sth->fetchAll();
//     print_r($info);
// }catch(PDOException $e){
//     print("Error !" .$e->getMessage() ."<br/>>");
//     die();
// }
// finally{
//     $dsn = null;
// }

/**
 * 参数绑定
 */
// try{
//     $dsh = new PDO($dsn,$user,$password);
//     $sql = "SELECT * FROM `user` WHERE `class` = ?";
//     $sth = $dsh->prepare($sql);
//     $sth->bindValue(1,2);
//     $sth->execute();
//     $info = $sth->fetchAll();
//     print_r($info);
//     $sth->bindValue(1,1);
//     $sth->execute();
//     $info = $sth->fetchAll();
//     print_r($info);
// }catch(PDOException $e){
//     print("Error !" .$e->getMessage() ."<br/>>");
//     die();
// }
// finally{
//     $dsn = null;
// }


/**
 * bindParam绑定变量
 */
// try{
//     $dsh = new PDO($dsn,$user,$password);
//     $sql = "SELECT * FROM `user` WHERE `class` = ?";
//     $sth = $dsh->prepare($sql);
//     $a = 1;
//     $sth->bindParam(1,$a);
//     $sth->execute();
//     $info = $sth->fetchAll();
//     print_r($info);
//     $b = 3;
//     $sth->bindParam(1,$b);
//     $sth->execute();
//     $info = $sth->fetchAll();
//     print_r($info);
// }catch(PDOException $e){
//     print("Error !" .$e->getMessage() ."<br/>>");
//     die();
// }
// finally{
//     $dsn = null;
// }

/**
 * 事务
 */
try{
    $dsh = new PDO($dsn,$user,$password);
    $dsh->beginTransaction();
    $sql = "UPDATE `user` SET `name` = 'xiaozhang1111' WHERE `id` = 2";

    $sth = $dsh->exec($sql);

    $sql = "SELECT * FROM `user` WHERE `id` = 2";
    $sth = $dsh->prepare($sql);
    $sth->execute();
    $info = $sth->fetchAll();
    print_r($info);

    $dsh->rollBack();
    $sql = "SELECT * FROM `user` WHERE `id` = 2";
    $sth = $dsh->prepare($sql);
    $sth->execute();
    $info = $sth->fetchAll();
    print_r($info);
    
}catch(PDOException $e){
    print("Error !" .$e->getMessage() ."<br/>>");
    die();
}
finally{
    $dsn = null;
}
