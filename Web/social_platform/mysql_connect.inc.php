
<?php
//資料庫設定
//資料庫位置
$db_host = "localhost";
//資料庫名稱
$db_name = "new_rosefit";
//資料庫管理者帳號
$db_user = "rosefit";
//資料庫管理者密碼
$db_password = "rosefit";
//對資料庫連線
$link = mysqli_connect($db_host, $db_user, $db_password);

if($link)
        echo "";

//資料庫連線採UTF8
mysqli_set_charset($link, "UTF8");

//選擇資料庫
if(mysqli_select_db($link , $db_name))
        echo "";
?> 