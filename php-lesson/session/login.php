<?php
session_start();

if($_POST['username'] == '1' && $_POST['password'] == '1'){

    $_SESSION['user']=['username'=>'1','password'=>'1'];
    echo '登陆成功';
}
?>