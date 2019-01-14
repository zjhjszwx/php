<?php

// 抽象类
// PHP 5 支持抽象类和抽象方法。定义为抽象的类不能被实例化。任何一个类，如果它里面至少有一个方法是被声明为抽象的，那么这个类就必须被声明为抽象的。被定义为抽象的方法只是声明了其调用方式（参数），不能定义其具体的功能实现。
//抽象类可以继承抽象类。抽象类中的抽象方法不能是private

abstract class Animal{
    //抽象方法，必须在子类实现
    abstract function eat($something);

}
class Cat extends Animal
{
    function eat($something){
        echo "eat$something</br>";
    }

}
$cat = new Cat();
$cat->eat("apple");

// 对象接口
// 使用接口（interface），可以指定某个类必须实现哪些方法，但不需要定义这些方法的具体内容。
// 定义接口
// 接口是通过 interface 关键字来定义的，就像定义一个标准的类一样，但其中定义所有的方法都是空的。
// 接口中定义的所有方法都必须是公有，这是接口的特性。
//一个接口相当于一个规范
//接口继承

interface IUsb {
    public function write($msg);
    function read();
}
class Upan implements IUsb {
    public function write($msg){
        echo "写入$msg</br>";
    }

    function read(){
        return "一段数据";
    }
}
class Neicunka implements IUsb {
    public function write($msg){
        echo "写入$msg</br>";
    }

    function read(){
        return "一段数据";
    }
}



$pan = new Upan();
$pan->write("数据!");
function test(Upan $u){
    $u->write("数据1111");
}
test($pan);

//Trait
// 自 PHP 5.4.0 起，PHP 实现了一种代码复用的方法，称为 trait。
// 优先级
// 从基类继承的成员会被 trait 插入的成员所覆盖。优先顺序是来自当前类的成员覆盖了 trait 的方法，而 trait 则覆盖了被继承的方法。
trait logTrait{
    public function log($msg){
        echo $this->name."日志</br>";
    }
}
class Test1{
    public $name = "test1";
    use logTrait;
}
class Test2{
    public $name = "test2";
    use logTrait;
    
}
class Test3{
    public $name = "test3";
    use logTrait;
    
}

$t1 = new Test1();
$t1->log("日志");
$t2 = new Test2();
$t2->log("日志");
$t3 = new Test3();
$t3->log("日志");
?>