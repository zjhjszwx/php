<?php
require_once('./tool.php');
$db = conn();

$id = get('id');
$sql = 'select * from noxue_chat where id>:id';
$stms = $db->prepare($sql);
$stms->execute([':id'=>$id]);
echo json_encode($stms->fetchAll());

?>