<?php
/**
 * Created by PhpStorm.
 * User: noxue
 * Date: 2017/8/14
 * Time: 15:54
 */

require_once "../tools.php";


$db = conn();

$id = get('id');

$sql = "delete from nx_type where id=:id";

$stmt = $db->prepare($sql);

$stmt->execute([':id'=>$id]);

header("Location:typelist.php");
