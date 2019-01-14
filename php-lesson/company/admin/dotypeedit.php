<?php
/**
 * Created by PhpStorm.
 * User: noxue
 * Date: 2017/8/14
 * Time: 15:35
 */

require_once "../tools.php";

$id = post('id');
$typename = post('typename');

$db = conn();

$sql = 'update nx_type set name=:name where id=:id';

$stmt = $db->prepare($sql);

$stmt->execute([':id'=>$id,':name'=>$typename]);

header("Location:typelist.php");
