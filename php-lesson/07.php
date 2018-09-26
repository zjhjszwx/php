<?php
$arr = [
    "baidu"=>"百度",
    "google"=>"谷歌",
    "google"=>"谷歌",
];
// //不会修改原数组
// foreach($arr as $k=>$v){
//     echo "$k:$v <br/>";
// }

// $arr = [
//     "不学网", 
//     "微软必应", 
//     "百度",
//     "百度"
// ];
//修改原数组
// for($i=0; $i<count($arr); $i++){
//     $arr[$i] = 2;
// }
// //print_r 也是用于输出数组，只是他不会输出类型，输出的数据更加纯净，只包含键值
// print_r($arr);

array_unique($arr);
print_r($arr);


?>