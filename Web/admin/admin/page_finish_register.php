<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$username = $_POST['register-username'];
$email = $_POST['register-email'];
$password = $_POST['register-password'];
$password2 = $_POST['register-password-verify'];

//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
$sql = "SELECT * FROM user where user_email = '$email'";
$result = mysqli_query($link , $sql);
$row = mysqli_fetch_array($result);


if($email != null && $password != null && $password2 != null && $password == $password2 )
{
        if($row[2]=="")
        {
        //新增資料進資料庫語法
                $md5 = md5($password);
                $sql = "INSERT into user (user_name, user_email, user_password) values ('$username', '$email', '$md5')";
                if(mysqli_query($link,$sql))
                {
                        $_SESSION['username'] = $email;
                        $sql = "SELECT * FROM user where user_email = '$email'";
                        $result = mysqli_query($link , $sql);
                        $row = mysqli_fetch_array($result);
                        echo '<meta http-equiv=REFRESH CONTENT=0;url=http://120.110.113.70/rosefit_greenhouse/admin/admin/page_ready_register2.php?id='.$row[0].'>';
                }
        }
        else
        {
                echo '註冊失敗，使用者帳號已被使用！畫面將自動跳轉，請稍候';
                echo '<meta http-equiv=REFRESH CONTENT=5;url=http://120.110.113.70/rosefit_greenhouse/admin/admin/page_ready_register.php>';
        }

}
else
{
        echo '使用者註冊失敗！畫面將自動跳轉，請稍候';
        echo '<meta http-equiv=REFRESH CONTENT=5;url=http://120.110.113.70/rosefit_greenhouse/admin/admin/page_ready_register.php>';
}
?>