<?php
    $myfile = fopen("noxue.txt", "r") or die("文件打开失败");
    echo fread($myfile,filesize("noxue.txt"));
    fclose($myfile);

    $myfile = fopen("noxue.txt","w") or die("文件打开失败");
    $txt = "不学网\r\n";
    fwrite($myfile,$txt);
    
?>