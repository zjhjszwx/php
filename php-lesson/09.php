<?php
$html = file_get_contents("https://www.taobao.com/");
echo file_put_contents("noxue.txt",$html);
?>