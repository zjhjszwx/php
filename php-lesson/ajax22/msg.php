<?php
header('Access-Control-Allow-Origin:*');
header("Access-Control-Allow-Headers", "Authentication,Origin, X-Requested-With, Content-Type, Accept");

// print_r($_POST);
require_once('./tool.php');
$db = conn();

$nickname = $_POST['nickname'];
$msg = $_POST['msg'];

$sql = 'insert into noxue_chat(nickname,msg) value(:nickname,:msg)';
$stms = $db->prepare($sql);
$stms->execute([':nickname'=>$nickname,':msg'=>$msg]);
header('Content-type:application/json');

//执行sql，绑定参数
if($db->lastInsertId()>0){
    echo json_encode(['code'=>0,'msg'=>'success']);
}else{
    echo json_encode(['code'=>1,'msg'=>'error']);
}
?>