<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$oldpassword = $_POST['inputPassword-old']
$password = $_POST['inputPassword-new'];
$password2 = $_POST['inputPassword-new2'];
//紅色字體為判斷密碼是否填寫正確
$sql = "SELECT * FROM user where user_email = '$email'";
$result = mysqli_query($link , $sql);
$row = mysqli_fetch_array($result);

$oldpassword = md5($oldpassword);

if($_SESSION['username'] != null && $oldpassword == $row[3])
{
        if ($password != null && $password2 != null && $password == $password2)
        $email = $_SESSION['username'];
        $md5 = md5($password);
        //更新資料庫資料語法
        $sql = "UPDATE user(user_password) set user_password='$md5'where email='$email'";
        if(mysqli_query($link , $sql))
        {
                echo '修改成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/setup.php>';
        }
        else
        {
                echo '修改失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/setup.php>';
        }
}
else
{
        echo '舊密碼錯誤，請重新輸入';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/setup.php>';
}
?>