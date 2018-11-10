<?php
    require_once('./tool.php');
    $love_id = post('love_id');
    $content = post('content');

    $sql = 'insert into comment (love_id,content) values ('.$love_id.',"'.$content.'")';

    $db = conn();
    $count = $db->exec($sql);

    $db = null;
    header("location:content.php?id=".$love_id);
?>