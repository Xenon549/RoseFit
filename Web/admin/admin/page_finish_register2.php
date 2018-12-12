<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
$email = $_SESSION['username'];
$separate = $_POST['separate'];
$greenhousename = $_POST['register-greenhousename'];
$key = $_POST['register-key'];
$r = rand(0,32767);
//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
$sql = "SELECT * FROM user where user_email = '$email'";
$result = mysqli_query($link , $sql);
$row = mysqli_fetch_array($result);

$sql2 = "SELECT * FROM greenhouse_user1 where user_id = '0'";
$result = mysqli_query($link , $sql2);
$row2 = mysqli_fetch_array($result);

if($separate != null && $greenhousename != null && $key != null &&  $row[2] == $email)
{
        if($row2[1] == $key && $row2[2] == '0')
        {
        //新增資料進資料庫語法
                $sql3 = "SELECT * FROM greenhouse_user1 where greenhouse_id = '$r'";
                $result = mysqli_query($link , $sql3);
                if($result == null)
                {
                //更新資料庫資料語法
                        $sql4 = "UPDATE greenhouse_user1 set gh_id='$r',user_id = '$row[0]', greenhouse_name= '$greenhousename'  where greenhouse_key='$key'";
                        if(mysqli_query($link , $sql4))
                        {
                                $sql5 = "INSERT into greenhouse_data (gh_id) values ('$r')";
                                if(mysqli_query($link , $sql5))
                                {
                                        if($separate == 'expert') //專家的userlevel為2
                                        {
                                                $sql6 = "UPDATE user set user_level = 2 where user_email = '$email'";    
                                                if(mysqli_query($link , $sql6))
                                                {
                                                        echo '註冊已完成，並成功綁定溫室，系統自動新增溫室空值至資料庫!';
                                                        echo '<meta http-equiv="refresh" CONTENT=2;url=http://120.110.113.70/rosefit_greenhouse/admin/admin/page_ready_login.php>';                                                        
                                                }
                                     
                                        }
                                        echo '註冊已完成，並成功綁定溫室，系統自動新增溫室空值至資料庫!';
                                        echo '<meta http-equiv="refresh" CONTENT=2;url=http://120.110.113.70/rosefit_greenhouse/admin/admin/page_ready_login.php>';
                                }
                                else
                                {
                                        echo "錯誤";
                                        echo '<meta http-equiv="refresh" CONTENT=2;url=http://120.110.113.70/rosefit_greenhouse/admin/admin/page_ready_register2.php>';
                                }
                        }
                        else
                        {
                               echo '溫室資料修改失敗!';
                               echo '<meta http-equiv="refresh" CONTENT=2;url=http://120.110.113.70/rosefit_greenhouse/admin/admin/page_ready_register2.php>';
                        }     
                }
                else
                {
                        $sqldelete = "DELETE FROM user where user_email = '$email'";
                        $result = mysqli_query($link , $sqldelete);
                        echo '找不到輸入的金鑰，或是金鑰已綁定！畫面將自動跳轉，請稍候';
                        echo '<meta http-equiv=REFRESH CONTENT=5;url=http://120.110.113.70/rosefit_greenhouse/admin/admin/page_ready_register.php>';
                }
        }
        else
        {
                echo '找不到輸入的金鑰，或是金鑰已綁定！畫面將自動跳轉，請稍候';
                $sqldelete = "DELETE FROM user where user_email = '$email'";
                $result = mysqli_query($link , $sqldelete);
                echo '<meta http-equiv=REFRESH CONTENT=5;url=http://120.110.113.70/rosefit_greenhouse/admin/admin/page_ready_register.php>';
        }

}
else
{
        echo '輸入有空值，請重新輸入！畫面將自動跳轉，請稍候';
        $sqldelete = "DELETE FROM user where user_email = '$email'";
        $result = mysqli_query($link , $sqldelete);
        echo '<meta http-equiv=REFRESH CONTENT=5;url=http://120.110.113.70/rosefit_greenhouse/admin/admin/page_ready_register.php>';
}
?>