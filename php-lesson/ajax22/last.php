<?php
    require_once('./tool.php');
    $db = conn();

    $sql = 'select * from noxue_chat order by id desc limit 0,1';
    $stms = $db->prepare($sql);
    $stms->execute();
    $res = $stms->fetch();
    echo $res;
?>