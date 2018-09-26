<?php 
//判断三角形
$a = @$_POST['a'];
$b = @$_POST['b'];
$c = @$_POST['c'];

if( $a+$b>$c && $a+$c>$b && $b+$c>$a){
    echo "三角型";
}else {
    echo "不是三角型";
}

//生成随机数
$e = rand() . "\n";
echo $e;

$d = @$_POST['d'];
if(isset($_POST['d'])){
    if($d>0 && $d<=60){
        echo "不及格";
    }elseif($d>60 && $d <= 85){
        echo "合格";
    }else if($d > 85 && $d <= 100){
        echo "优秀";
    }
}else {
?>
    <form action="" method="post">
        <input type="text" name="d"/>
        <input type="submit" name="submit" value="提交"/>
    </form>
<?php 
}
?>

<html>
    <head>
    </head>
    <body>
        <form action="" method="POST">
            <input type="text" name="a"/>
            <input type="text" name="b"/>
            <input type="text" name="c"/>
            <input type="submit" name="submit" value="提交"/>
        </form>
    </body>
</html>

