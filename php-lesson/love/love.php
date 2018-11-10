
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="20.php" method="post">
        <textarea name="content" id="" rows="10" cols="30"></textarea>
        <input type="submit" value="发布"/>
    </form>

</body>

<?php
    require_once('./tool.php');
    $db = conn();
    $sql = 'select * from love';
    $res = $db->query($sql);

    foreach ($res as $row) {
        // print_r($row);
        ?>
            <div class="item">
                <p><?=$row['content']?><a href="./content.php?id=<?=$row['id']?>">详细内容</a></p>
                <p><?=$row['create_at']?></p>
            </div>
        <?php
    }
?>
</html>