<?php session_start(); 
include("mysql_connect.inc.php");
$email = $_SESSION['username'];
$title = $_POST['title'];
$category = $_POST['category'];
$article = $_POST['article'];
$tag = $_POST['tag'];
$id = $GET['id'];

$sql = "SELECT * FROM user where user_email = '$email'";
$result = mysqli_query($link , $sql);
$rowname = mysqli_fetch_array($result);

if(isset($_POST['submit'])){
if($title != null && $category !=null && $article !=null && $tag !=null && $email !=null)
{
        //更新資料庫資料語法
        $sql = "INSERT into community_article (user_id, catalog_id, title, article_content) values ('$rowname[0]','$category','$title','$article')";
        if(mysqli_query($link , $sql))
        {
                echo '新增成功！畫面將自動跳轉，請稍候';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=http://120.110.113.70/rosefit_greenhouse/social_platform/blog_manage.php>';
        }
        else
        {
                echo '修改失敗！畫面將自動跳轉，請稍候';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=http://120.110.113.70/rosefit_greenhouse/social_platform/blog_manage.php>';
        }
}
else
{
        echo '新增失敗，有空格尚未填寫，請重新輸入！畫面將自動跳轉，請稍候';
        echo '<meta http-equiv=REFRESH CONTENT=3;url=http://120.110.113.70/rosefit_greenhouse/social_platform/blog_manage.php';
}
}
?>