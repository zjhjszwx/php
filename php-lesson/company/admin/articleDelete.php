<?php
    require_once('../tools.php');
    $db = conn();
    $id = get('id');
    $sql = 'delete from nx_article where id=:id';
    $stms = $db->prepare($sql);
    $stms->execute(['id'=>$id]);
    header("location:articleList.php")
?>