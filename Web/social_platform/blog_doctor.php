<?php session_start(); //註冊一個變數到 session  
include("mysql_connect.inc.php");
$sql = "SELECT DISTINCT * FROM community_article where catalog_id = 'doctor' ORDER BY article_id DESC";
$result = mysqli_query($link , $sql);
$i = 0;

if(isset($_GET['page'])){
  $page = $_GET['page'];
}
else {
  $page = 1;
}

$num = 9;
$pageNum = 5;
$limit_start = ($page-1) * $num;
$start = (int)(($page-1) / $pageNum) * $pageNum + 1;
$end = $start + $pageNum -1;
$next = $page+1;
$pre = $page-1;

@$above = $_GET['page']*9+1;
$under = $above+8;

$total = mysqli_num_rows($result);
$pages = ceil($total / $num);

$offset = ($page -1)*$num;
mysqli_data_seek($result,$offset);


//$pages = 10;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/x-icon" href="style/images/rosefit.png" />
<title>植物醫生-專欄 </title>
<link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style/css/plugins.css">
<link rel="stylesheet" type="text/css" href="style.css?283">
<link rel="stylesheet" type="text/css" href="style/css/color/red.css">
<link rel="stylesheet" type="text/css" href="style/type/icons.css">
<link rel="stylesheet" type="text/css" href="search.css">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CKarla:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="content-wrapper">
  <div class="navbar navbar-default default classic full" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <div class="navbar-brand"><a href="index.php"><img src="#" srcset="style/images/rosefit.png 1x, style/images/rosefit.png 2x" alt="" /></a></div>
        <div class="navbar-brand1">
            <form action="search.php" method="post">
              <input type="text" name="search" placeholder="search..">
            </form>
        </div>
        <div class="nav-bars-wrapper">
          <div class="nav-bars-inner">
            <div class="nav-bars" data-toggle="collapse" data-target=".navbar-collapse"><span></span></div>
          </div>
          <!-- /.nav-bars-inner --> 
        </div>
        <!-- /.nav-bars-wrapper --> 
      </div>
      <!-- /.nav-header -->

      <!-- 登入狀態 -->
      <?php
      if(@$_SESSION['username']!=null){
        include("navbarlogin.php");
      }
      //<!-- 非登入狀態 -->
      else{
        include("navbarlogout.php");
      }
      ?>

      <!--/.nav-collapse --> 
    </div>
    <!--/.container-fluid --> 
  </div>
  <!--/.navbar -->
  <main>
    <div class="dark-wrapper">
      <div class="container inner">
        <div class="hero text-center">
          <p>植物醫生<br class="hidden-xs hidden-sm" />
            Here you will be able to find our latest and favorite works.</p>
        </div>
        <!-- /.hero -->
        
        <div class="tiles blog">
          <div class="items row row-offset-0">
          <?php

            while(($rowname = mysqli_fetch_array($result)) && $i<$page*9){
            $i++;
          echo  '<div class="item col-xs-12 col-sm-6 col-md-4 active">';
          echo   "<figure class=\"overlay\"> <a href=\"http://120.110.113.70/rosefit_greenhouse/social_platform/blog-post.php?page=".$page."&bsn=".$rowname[0]."\">";
          
          echo    '<div class="text-overlay caption">';                  
                  $time = (explode("-",$rowname[5]));
                  $time2 = (explode(" ",$time[2]));
                       if($time[1]=='01') $time[1] = 'JAN';
                  else if($time[1]=='02') $time[1] = 'FEB';
                  else if($time[1]=='03') $time[1] = 'MAR';
                  else if($time[1]=='04') $time[1] = 'APR';
                  else if($time[1]=='05') $time[1] = 'MAY';
                  else if($time[1]=='06') $time[1] = 'JUN';
                  else if($time[1]=='07') $time[1] = 'JUL';
                  else if($time[1]=='08') $time[1] = 'AUG';
                  else if($time[1]=='09') $time[1] = 'SEP';
                  else if($time[1]=='10') $time[1] = 'OCT';
                  else if($time[1]=='11') $time[1] = 'NOV';
                  else if($time[1]=='12') $time[1] = 'DEC';
                  $sql2 = "SELECT DISTINCT * FROM community_image where article_id = '$rowname[0]'";
                  $result2 = mysqli_query($link , $sql2);
                  $rowimage = mysqli_fetch_array($result2);
          echo    '<div class="date-wrapper">';
          echo      '<div class="date"><span class="day">'.$time2[0].'</span><span class="month">'.$time[1].'</span></div>';
          echo    '</div>';
          echo      '<div class="info">';
          echo       '<h2 class="post-title">';
          echo          $rowname[3].'<br>';
          echo       '</h2>';
          echo    '</div>';
          echo   '</div>';
          echo    '<img src="'.$rowimage[2].'" alt="" /></a> </figure>';
          echo  '</div>';
          }?>
          </div>
          <!--/.row --> 
        </div>
        <!-- /.tiles -->
        <div class="divide20"></div>
        <div class="pagination text-center">
        <?php
        $sql2 = "SELECT DISTINCT * FROM community_article where catalog_id = 'doctor' ORDER BY article_id DESC LIMIT $limit_start, $num";
        $result2 = mysqli_query($link , $sql2);
        $rowpage = mysqli_fetch_array($result);
        
        //echo "<td>資料總筆數：".$total."</td><br>";
        //echo "<td>目前頁數：".$page."/總頁數：".$pages."</td><br>";
        
        echo "<ul>"; 
        if($page > 1){
          echo "<li><a class=\"btn btn-square btn-icon\"href=\"http://120.110.113.70/rosefit_greenhouse/social_platform/blog_doctor.php?page=".$pre."\"><i class=\"ion-android-arrow-back\"></i></a></li>";
          if($page > 3){
          echo "<li><a class=\"btn btn-square btn-icon\" href=\"http://120.110.113.70/rosefit_greenhouse/social_platform/blog_doctor.php?page=1\"><span>1</span></a></li>";
          echo "<li><a class=\"btn btn-square btn-icon\"<span style='background: #fff0 !important;'>...</span></a></li>";
          }
        }

        if($pages <= $pageNum){
          for($i=$start;$i<=$pages;$i++){
            if($i==$page){
              echo "<li class=\"active\"><a class=\"btn btn-square\" href=\"http://120.110.113.70/rosefit_greenhouse/social_platform/blog_doctor.php?page=".$i."\"<span>".$i."</span></a></li>";
            }
            else{
              //if($page > 3){
              echo "<li><a class=\"btn btn-square\" href=\"http://120.110.113.70/rosefit_greenhouse/social_platform/blog_doctor.php?page=".$i."\"><span>".$i."</span></a></li>";
              //}
            }
          }
        }
        else{
          if($page >3){
            $end = $page+2; 
            if($end > $pages){ 
              $end = $pages;
            }
            $start = $end-4; 

            for($i=$start;$i<=$end;$i++){
              if($i==$page){
                echo "<li class=\"active\"><a class=\"btn btn-square\"<span>".$i."</span></a></li>";
              }
              else{
                echo "<li><a class=\"btn btn-square\" href=\"http://120.110.113.70/rosefit_greenhouse/social_platform/blog_doctor.php?page=".$i."\"><span>".$i."</span></a></li>";
              }
            }
          }
          else{
            if($end > $pages){
              $end = $pages;
            }
            for($i=$start;$i<=$end;$i++){
              if($i == $page){
                echo "<li class=\"active\"><a class=\"btn btn-square\"<span>".$i."</span></a></li>";
              }
              else{
                echo "<li><a class=\"btn btn-square\" href=\"http://120.110.113.70/rosefit_greenhouse/social_platform/blog_doctor.php?page=".$i."\"><span>".$i."</span></a></li>";
              }
            }
          }
        }
        if($page < $pages){
          if($page < $pages-2){
          echo "<li><a class=\"btn btn-square btn-icon\"<span style='background: #fff0 !important;'>...</span></a></li>";  
          echo "<li><a class=\"btn btn-square btn-icon\" href=\"http://120.110.113.70/rosefit_greenhouse/social_platform/blog_doctor.php?page=".$pages."\"><span>".$pages."</span></a></li>";
          }
          echo "<li><a class=\"btn btn-square btn-icon\"href=\"http://120.110.113.70/rosefit_greenhouse/social_platform/blog_doctor.php?page=".$next."\"><i class=\"ion-android-arrow-forward\"></i></a></li>";
        }
        echo "</ul>";        
        ?>
<!--
          <ul>
            <li><a class="btn btn-square btn-icon" href="#"><i class="ion-android-arrow-back"></i></a></li>
            <li class="active"><a class="btn btn-square" href="http://120.110.113.70/rosefit_greenhouse/social_platform/blog_doctor.php?page=1&bsn=1"><span>1</span></a></li>
            <li><a class="btn btn-square" href="http://120.110.113.70/rosefit_greenhouse/social_platform/blog_doctor.php?page=2&bsn=1"><span>2</span></a></li>
            <li><a class="btn btn-square" href="http://120.110.113.70/rosefit_greenhouse/social_platform/blog_doctor.php?page=3&bsn=1"><span>3</span></a></li>
            <li><a class="btn btn-square btn-icon" href="#"><i class="ion-android-arrow-forward"></i></a></li>
          </ul>
-->
        </div>
        <!-- /.pagination --> 
        
      </div>
      <!-- /.container --> 
    </div>
    <!-- /.dark-wrapper --> 
  </main>
</div>
<!-- /.content-wrapper -->
<footer>
  <div class="sub-footer">
    <div class="container-fluid inner">
      <p class="pull-left">© 2018 RoseFit. </p>
    </div>
  </div>
</footer>
<script type="text/javascript" src="style/js/jquery.min.js"></script> 
<script type="text/javascript" src="style/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="style/js/plugins.js"></script> 
<script type="text/javascript" src="style/js/scripts.js"></script>
</body>
</html>