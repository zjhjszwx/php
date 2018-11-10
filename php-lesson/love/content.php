<?php
    require_once('./tool.php');
    $db = conn();
    $id = get('id');
    $sql = 'select * from love where id ='.$id;
    $res = $db->query($sql);
    $love;
    foreach($res as $row){
        $love = $row;
    }
    // $db = null;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <p><?=$love['create_at']?></p>
    <p><?=$love['content']?></p>
    <a href="love.php">返回列表</a>
    <form method="post" action="./comment.php">
        <input type="hidden" name="love_id" value="<?=$love['id']?>"/>
        <p><textarea name="content" id="" cols="30"></textarea></p>
        <p><input value="发表评论" type="submit"/></p>
    </form>
    <?php
        $sql = 'select * from comment where love_id ='.$id.' order by create_at desc';
        $res = $db->query($sql);

        foreach($res as $row){
            ?>
                <div>
                    <p><?=$row['content']?></p>
                    <p><?=$row['create_at']?></p>
                    <a href="delete.php?id=<?=$row['id']?>&love_id=<?=$id?>">删除</a>
                </div>
            <?php
        }
    ?>
</body>

</html>