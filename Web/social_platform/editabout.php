<?php session_start(); 
include("mysql_connect.inc.php");
$email = $_SESSION['username'];
$name = $_POST['name'];
$about = $_POST['about'];

$sql = "SELECT * FROM user where user_email = '$email'";
$result = mysqli_query($link , $sql);
$rowname = mysqli_fetch_array($result);


if($email != null && $name !=null && $about !=null)
{
        //更新資料庫資料語法
        $sql2 = "UPDATE user set user_name='$name', user_about='$about' where user_email='$email'";
        if(mysqli_query($link , $sql2))
        {
                echo '修改成功！畫面將自動跳轉，請稍候';
                echo "<meta http-equiv=REFRESH CONTENT=2;url=\"http://120.110.113.70/rosefit_greenhouse/social_platform/profile_manage.php?id=".$rowname[0]."\">";
        }
        else
        {
                echo '修改失敗！畫面將自動跳轉，請稍候';
                echo "<meta http-equiv=REFRESH CONTENT=2;url=\"http://120.110.113.70/rosefit_greenhouse/social_platform/profile_manage.php?id=".$rowname[0]."\">";
        }
}
else
{
        echo '尚有空位，請重新輸入！畫面將自動跳轉，請稍候';
        echo "<meta http-equiv=REFRESH CONTENT=2;url=\"http://120.110.113.70/rosefit_greenhouse/social_platform/profile_manage.php?id=".$rowname[0]."\">";
}
?>