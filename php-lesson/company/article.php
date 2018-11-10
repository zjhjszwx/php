<?php
require_once "tools.php";

$id = get('id');


$db = conn();

$sql = "select a.*,t.name from nx_article as a, nx_type as t where a.type_id=t.id and a.id=:id";

$stmt = $db->prepare($sql);

$stmt->execute([':id'=>$id]);

$article = $stmt->fetch();


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$article['title']?></title>
</head>
<body>
<h3><?=$article['title']?></h3>
<h4><?=$article['name']?><em><?=$article['created_at']?></em></h4>
<div>
    <?=$article['content']?>
</div>
</body>
</html>