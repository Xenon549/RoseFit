<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
$key = $_POST['key'];
$email = $_SESSION['username'];
//紅色字體為判斷密碼是否填寫正確
$sql = "SELECT * FROM user where user_email = '$email'";
$result = mysqli_query($link , $sql);
$row = mysqli_fetch_array($result);
$r = rand(0,32767);

$sql2 = "SELECT * FROM greenhouse_user1 where user_id = '0'";
$result = mysqli_query($link , $sql2);
$rowkey = mysqli_fetch_array($result);
if($email != null && $key == $rowkey[1])
{
        $sql3 = "SELECT * FROM greenhouse_user1 where greenhouse_id = '$r'";
        $result = mysqli_query($link , $sql3);
        if($result == null)
        {
                //更新資料庫資料語法
                $sql4 = "UPDATE greenhouse_user1 set gh_id='$r',user_id = '$row[0]'  where greenhouse_key='$key'";
                if(mysqli_query($link , $sql4))
                {
                        $sql5 = "INSERT into greenhouse_data (gh_id) values ('$r')";
                        if(mysqli_query($link , $sql5))
                        {
                                echo '綁定成功，並新增溫室空值至資料庫!';
                                echo '<meta http-equiv="refresh" CONTENT=2;url=http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/setup.php>';
                        }
                        else
                        {
                                echo "錯誤";
                                echo '<meta http-equiv="refresh" CONTENT=2;url=http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/setup.php>';
                        }
                }
                else
                {
                        echo '修改失敗!';
                        echo '<meta http-equiv="refresh" CONTENT=2;url=http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/setup.php>';
                }
        }
}
else
{
        echo '溫室金鑰輸入錯誤，或目前溫室皆已綁定';
        echo '<meta http-equiv="refresh" CONTENT=2;url=http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/setup.php>';
}
?>