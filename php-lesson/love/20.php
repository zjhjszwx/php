<?php

require_once('./tool.php');
$content = post("content");

$sql = 'insert into love (content) values("'.$content.'")';
echo $sql; 

$db = conn();
$count = $db->exec($sql);
echo $count;

$db = null;