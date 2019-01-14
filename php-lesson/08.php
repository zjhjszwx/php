<?php
    //多维数组
    $school = [
        "class1"=>[
            "stu1"=>["name"=>"a","age"=>"11"]
        ],
        "class2"=>[
            "stu1"=>["name"=>"b","age"=>"11"]
        ]
    ];

    // print_r($school['class1']['stu1']);
    // echo file_get_contents("https://www.baidu.com");
    // echo file_put_contents("noxue.txt","www.noxue.com");
    $str = "大家好,这是我的qq:4412321";
    //`~!@#$%^&*-+*/都可以,但不能和正则表达式重复
    preg_match("#qq:[\d]+#",$str,$mat);
    // print_r($mat);

    $str1 = "<table><tr><td>不学网</td><td>www.noxue.com</td></tr></table>";
    preg_match("#<td>(.*?)</td><td>(.*?)</td>#",$str1,$mat1);
    print_r($mat1);
?>