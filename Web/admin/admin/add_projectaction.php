<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
$email = $_SESSION['username'];
$separate = $_POST['separate'];
$planname=$_POST['planname'];
$greenhousename = $_POST['greenhousename'];
$plantname = $_POST['plantname'];
$plantkind = $_POST['plantkind'];
$key = $_POST['key'];

$sql = "SELECT * FROM user where user_email = '$email'";
$result = mysqli_query($link , $sql);
$row = mysqli_fetch_array($result);

$sql1 = "SELECT * FROM greenhouse_user1 where user_id = '$row[0]' and greenhouse_key = '$key'";
$result1 = mysqli_query($link , $sql1);
$row2 = mysqli_fetch_array($result1);

if($separate != null && $greenhousename != null && $key != null &&  $planname != null && $plantname != null && $plantkind != null  && $row[2] == $email && $separate == 'expert')
{
    $sql2 = "INSERT into project (project_name,greenhouse_name,plant_name,plant_species,user_id,greenhouse_key,plan_using,user_mode,finish) values('$planname','$greenhousename','$plantname','$plantkind','$row[0]','$row2[1]',0,1,0)";
    if(mysqli_query($link , $sql2))
    {
        echo '新增專案成功！';
        echo '<meta http-equiv=REFRESH CONTENT=5;url=http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/index_1.php>';
    }
}
else
{
        echo '輸入有空值，請重新輸入！畫面將自動跳轉，請稍候';
        echo '<meta http-equiv=REFRESH CONTENT=5;url=http://120.110.113.70/rosefit_greenhouse/admin/admin/add_project.php>';
}
?>