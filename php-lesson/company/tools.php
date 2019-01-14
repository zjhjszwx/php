<?php
/**
 * Created by PhpStorm.
 * User: noxue
 * Date: 2017/8/14
 * Time: 15:36
 */


function get($name){
    return isset($_GET[$name])?$_GET[$name]:"";
}
function post($name){
    return isset($_POST[$name])?$_POST[$name]:"";
}
function conn(){
// 数据库驱动类型:host=主机名;dbname=数据库名
    $dns = "mysql:host=127.0.0.1;dbname=noxue";
//连接字符串，账号，密码
    $db  = new PDO($dns, "root", "123123123");
    $db->exec("set names utf8");
    return $db;
}
