<?php

//创建一个类，用来创建人的信息
class Person {
    //定义一个共有的字段
    public $age = 20;
    public $sex = "男";

    //私有字段只能在类里面访问
    private $name = "jake";

     

    public function __construct($age){
        //this指向当前对象
        $this->age = $age;
    }
    public function __destruct(){
        echo "exit";
    }
    //方法
    function hello(){
        echo "你好";
    }
}
//通过关键字 new，定义对象
$person = new Person(50);
$person->hello();
echo $person->age;


class File{
    private $fp;

    function __construct($filename){
        $this->filename = $filename;
        $this->fp = fopen($filename,'w+');
        if(!$this->fp){
            exit("error");
        }
        echo "success";
    }

    function write($msg){
        fwrite($this->fp,$msg);
    }

    function readAll(){
        return fread($this->fp,filesize($this->$filename));
    }

    function __destruct(){
        fclose($this->fp);
    }
}

$file = new File('./1.txt');
$file->write("wwww.baidu.com ");

//封装数据库方法
class Db{

    private $db;

    public function Db($host,$dbname,$username,$password){
        $this->db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $this->db->exec("set names utf8");
    }
    public function select($sql,$vs=[]){
        $sql = "select * from nx where id=1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($vs);
        return $stmt->fetchAll();
    }
}

$db = new Db('127.0.0.1','noxue','root','123123123');


?>