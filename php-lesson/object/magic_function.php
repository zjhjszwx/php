<?php

require_once "./namespace.php";
//导入命名空间
use App\Person as Ceo;
$person = new Ceo();
//魔术方法
class Test{
    function __call($name,$argu){
        echo $name."页面不存在.</br>";
    }

    function __toString(){}

}
$t = new Test();
$t->admin(1,2,3,"xxx");
// Final 关键字
// PHP 5 新增了一个 final 关键字。如果父类中的方法被声明为 final，则子类无法覆盖该方法。如果一个类被声明为 final，则不能被继承。

//匿名类
function log1($class){
    $class->log("日志");
}
log1(new Class{
    function log($msg){
        echo $msg;
    }
})


?>