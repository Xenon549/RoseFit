<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
include("mysql_connect.inc.php");
$email = $_POST['login-email'];
$password = $_POST['login-password'];
//搜尋資料庫資料
$sql = "SELECT * FROM user where user_email = '$email'";
$result = mysqli_query($link , $sql);
$row = mysqli_fetch_array($result);
//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
$md5 = md5($password);

if($email != null && $md5 != null && $row[2] == $email && $row[3] == $md5 )
{
        //將帳號寫入session，方便驗證使用者身份
        $_SESSION['username'] = $email; 
        echo '登入成功！畫面將自動跳轉，請稍候' ;  
        echo '<meta http-equiv="refresh" CONTENT=1;url=http://120.110.113.70/rosefit_greenhouse/social_platform/index.php>';
}
else
{
        echo '登入失敗!，5秒後返回登入畫面';
        echo '<meta http-equiv="refresh" CONTENT=5;url=page_ready_login.php>';
}
?>
<!-- 


?> -->