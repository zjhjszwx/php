<?php

function post($name){
    return isset($_POST[$name])? $_POST[$name] : '';
}

function get($name){
    $text = isset($_GET[$name])? $_GET[$name] : '';
    // $text = str_replace('<','&lt;',$text);
    // $text = str_replace('>','&gt;',$text);
    $text = htmlspecialchars($text);
    return $text;
}


//数据库连接
function conn(){
    $dns = "mysql:host=127.0.0.1;dbname=resume";
    return new PDO($dns, "root", "123123123");
}

?>