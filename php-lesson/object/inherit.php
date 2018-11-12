<?php


//类常量
class myClass {
    const constant = "constant";
    function showConstant(){
        echo self::constant . "\n";
    }
}

$c = new myClass();
$c->showConstant();
//两种调用方法
echo $c::constant;
echo myClass::constant;

//自动加载器
// spl_autoload_register(function($name){
//     echo "=$name==";
//     require_once "$name.php";
// })

//静态方法和属性
// 声明类属性或方法为静态，就可以不实例化类而直接访问。静态属性不能通过一个类已实例化的对象来访问（但静态方法可以）

class Foo {
    //静态变量，属于这个类
    public static $my_static = "foo";
    public function staticValue(){
        return self::$my_static;
    }
    //静态方法不能调用非静态方法，以及不能使用非静态字段
    public static function tt(){
        echo "tttt";
    }
}

echo Foo::$my_static."</br>";
$foo = new Foo();
echo $foo::$my_static."</br>";
$foo::$my_static = "noxue";
echo $foo::$my_static."</br>";

//继承
// this 指向创建之后的对象。
// self是指向类本身，也就是self是不指向任何已经实例化的对象，一般self使用来指向类中的静态变量。
// parent 指向该类的父类。一般用于调用父类被覆盖的方法或字段。
//如果子类没有构造函数，那么会有一个默认的构造函数，并自动调用父类的构造函数
// 覆盖父类方法
// 方法名和参数必须跟父类中的一样
// 保护权限要比被覆盖的方法权限要宽松，例如，父类方法protected，子类至少要是protected或public，不能是private权限。
class Animal {
    public $hp = 100;
    private $t = 'ttt';
    protected $id = "ddd";
    function __construct(){
        echo "动物背创造";
    }
    public function run(){
        echo "行走";
    }

}

class Cat extends Animal {
    function __construct(){
        echo "cat被创造.</br>";
    }
    public function test(){
        echo $this->t;
    }
}

$cat = new Cat();
$cat->test();
?>