<?php
    require_once('./tool.php');
    $id = get("id");
    $love_id = get("love_id");
    $db = conn();
    $sql = 'delete from comment where id =:id';
    //预处理sql语句
    $stmt = $db->prepare($sql);
    //绑定对应的参数
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    header('location:content.php?id='.$love_id);
?>