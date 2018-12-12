<?php
include("mysql_connect.inc.php");
$email = $_SESSION['username'];
$sql = "SELECT * FROM user where user_email = '$email'";
$result4 = mysqli_query($link , $sql);
$rowname1 = mysqli_fetch_array($result4);

      echo "<div class=\"navbar-collapse collapse\">";
      echo "<ul class=\"nav navbar-nav\">";
      echo "<li><a href=\"http://120.110.113.70/rosefit_greenhouse/social_platform/index.php\">專欄<span class=\"caret\"></span></a>";
      echo "<ul class=\"dropdown-menu\">";
      echo "<li><a href=\"blog_doctor.php\">植物醫生</a></li>";
      echo "<li><a href=\"blog_princess.php\">小王子星球</a></li>";
      echo "<li><a href=\"blog_beauty.php\">天生我最美</a></li>";
      echo "</ul>";
      echo "</li>";
      echo "<li><a href=\"dailyphoto_album.php?id=".$rowname1[0]."\">溫室影像資訊<span class=\"caret\"></span></a></li>";
      echo "<li><a href=\"blog.php?id=".$rowname1[0]."\">個人部落格<span class=\"caret\"></span></a></li>";
      echo "<li><a href=\"about.php?id=".$rowname1[0]."\">關於<span class=\"caret\"></span></a></li>";
      echo "<li><a href=\"plan_sell.php?id=".$rowname1[0]."\">購物區<span class=\"caret\"></span></a></li>";
      echo "<li><a href=\"#!\">管理專區<span class=\"caret\"></span></a>";
      echo "<ul class=\"dropdown-menu\">";
      echo "<li><a href=\"http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/index_1.php\">會員專區</a></li>";
      echo "<li><a href=\"./dailyphoto_manage.php\">每日一照管理</a></li>";
      echo "<li><a href=\"./blog_manage.php\">部落格管理</a></li>";
      echo "<li><a href=\"./profile_manage.php?id=".$rowname1[0]."\">個人資料設定</a></li>";
      echo "</ul>";
      echo "</li>";
      echo "<li><a href=\"logout.php\">登出<span class=\"caret\"></span></a></li>";
      echo "</ul>";
      echo "</div>";
?>