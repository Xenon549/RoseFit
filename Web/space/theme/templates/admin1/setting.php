<?php session_start(); 
include("mysql_connect.inc.php");
$email = $_SESSION['username'];
$sql = "SELECT * FROM user where user_email = '$email'";
$result = mysqli_query($link , $sql);
$rowname = mysqli_fetch_array($result);

$newname = $_POST['greenhousename'];
$newplantname = $_POST['flowername'];
$newtag = $_POST['tag'];

if($newname!= null && $newplantname!= null && $newtag != null){
		$sql2 = "UPDATE greenhouse_user1 set greenhouse_name = '$newname',greenhouse_plantname = '$newplantname',greenhouse_tag = '$newtag'  where user_id='$rowname[0]'";
		if(mysqli_query($link , $sql2))
        {
                echo '修改成功！畫面將自動跳轉，請稍候';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/setup.php>';
        }
    	else
        {
                echo '修改失敗！畫面將自動跳轉，請稍候';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/setup.php>';
        }
}
else{
				echo '欄位尚有空值，請完整輸入，自動跳轉回上一頁';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/setup.php>';
}