<?php
/**
 * Created by PhpStorm.
 * User: noxue
 * Date: 2017/8/14
 * Time: 15:35
 */

require_once "../tools.php";

$typename = post('typename');

$db = conn();

$sql = 'insert into nx_type(name) values(:name)';

$stmt = $db->prepare($sql);

$stmt->execute([':name'=>$typename]);

//判断是否插入成功，也就是获取最后插入的id，如果>0表示成功
if($db->lastInsertId()>0){
    header("Location:./typelist.php");
} else {
    echo "error";
}

