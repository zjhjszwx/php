<?php
require_once('../tools.php');

$content = $_POST['content'];
print_r($content);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <script id="container" name="content"></script>
        <button>提交</button>
    </form>

    <script src="./editor/ueditor.config.js"></script>
    <script src="./editor/ueditor.all.js"></script>
    <script>
        var ue = UE.getEditor("container");

    </script>
</body>
</html>