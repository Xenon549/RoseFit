<?php session_start(); 
include("mysql_connect.inc.php");
$title = $_POST['title'];
$category = $_POST['category'];
$article = $_POST['article'];
$tag = $_POST['tag'];
$id = $GET['id'];

$sqlarticle = "SELECT * FROM community_article where community_id = '$id'";
$result = mysqli_query($link , $sqlarticle);
$row = mysqli_fetch_array($result);
if(isset($_POST['submit'])){
if($title != null && $category !=null && $article !=null && $tag !=null)
{
        //更新資料庫資料語法
        $sql = "UPDATE community_article set catalog_id='$category', title='$title', article_content='$article' where article_id='$id'";
        if(mysqli_query($link , $sql))
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
else
{
        echo '舊密碼錯誤，請重新輸入！畫面將自動跳轉，請稍候';
        echo '<meta http-equiv=REFRESH CONTENT=3;url=http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/setup.php>';
}
}
?>