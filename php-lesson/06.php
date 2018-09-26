<?php
// $a = [1=>1,3=>2];
// var_dump($a);

// $b =[1,23,4,'打断到'];
// var_dump($b);
//生成10个1-1000的随机数,保存在数组中
$rands = [];
for($i = 0; $i < 10; $i++){
    $rands[] = rand(1,1000);
}
// var_dump($rands);

//找出最大值
// $max = $rands[0];
// for($i=1; $i<count($rands); $i++){
//     if($max<$rands[$i]) 
//         $max = $rands[$i];
// }
// echo "最大值是:$max"

//删除数组重点大于指定的数字
$n = count($rands);
for($i = 0; $i < $n; $i++){
    if($rands[$i] > 500){
        unset($rands[$i]);
    }
}
// var_dump($rands);

//定义一个数组，把其中的元素倒序排列。如：
// [24, 44, 556, 74, 64]; 变成 [64, 74, 556, 44, 24]
$num = [24, 44, 556, 74, 64];
$len = count($num);
for($i = 0; $i < count($num)/2; $i++){
    $t = $num[$i];
    $num[$i] = $num[$len -$i -1];
    $num[$len -$i -1] = $t;
}

// var_dump($num);


?>