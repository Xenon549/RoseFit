<?php session_start(); //註冊一個變數到 session  
include("mysql_connect.inc.php");
$id = $_GET['id'];
$sql = "SELECT DISTINCT * FROM community_article where user_id = '$id' ORDER BY article_id DESC";
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


$sql3 = "SELECT * FROM user where user_id = '$id'";
$result3 = mysqli_query($link , $sql3);
$rowuser = mysqli_fetch_array($result3);
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="style/images/rosefit.png">
<title>Juno 6</title>
<link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style/css/plugins.css">
<link rel="stylesheet" type="text/css" href="style.css">
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
        <div class="blog row">
          <div class="col-sm-8 blog-content grid-view">
            <div class="blog-content">
              <div class="row blog-posts">
                <?php
                  
                  while(($rowname = mysqli_fetch_array($result)) && $i<$page*6){
                  $i++;
                  $sql2 = "SELECT DISTINCT * FROM community_image where article_id = '$rowname[0]'";
                  $result2 = mysqli_query($link , $sql2);
                  $rowimage = mysqli_fetch_array($result2);
                  echo '<div class="post col-sm-12 col-md-6">';
                  echo  '<div class="box">';
                  echo   "<figure class=\"overlay\"> <a href=\"http://120.110.113.70/rosefit_greenhouse/social_platform/blog-post.php?page=".$page."&bsn=".$rowname[0]."\"><img src=\"$rowimage[2]\"></a></figure>";
                  echo    '<div class="post-content">';                 
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
                  echo       '<h3 class="post-title">';
                  echo          $rowname[3];
                  echo       '</h3>';
                  echo      '<div class="meta"><span class="date">'.$time2[0].' '.$time[1].' '.$time[0].'</span></div>';
                  echo      "<p>456</p><a href=\"http://120.110.113.70/rosefit_greenhouse/social_platform/blog-post.php?page=".$page."&bsn=".$rowname[0]."\" class=\"more\">Read More</a>";
                  echo    '</div>';
                  echo    '</div>';
                  echo  '</div>';
                  }
                  
                
                ?>
                <!-- /.post -->

                <hr/ >
                <!--
                <div class="post col-sm-12 col-md-6">
                  <div class="box">
                    <figure class="overlay"><a href="#"><img src="style/images/art/b2.jpg" alt="" /></a></figure>
                    <div class="post-content">
                      <h3 class="post-title"><a href="blog-post.php">Tellus Adipiscing Nibh Mattis</a></h3>
                      <div class="meta"><span class="date">12 Nov 2014</span><span class="category"><a href="#">Still Life</a></span></div>
                      <p>Aenean lacinia bibendum nulla sed consectetur. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cum sociis natoque.</p>
                      <a href="blog-post.html" class="more">Read More</a> </div>
                     /.post-content 
                  </div>
                   /.box 
                </div>
              
                 /.post -->
                <hr />


              </div>
              <!-- /.blog-posts --> 
              
            </div>
            <!-- /.blog-content -->
            
            <div class="pagination" align="center">
              <?php
        $sql2 = "SELECT DISTINCT * FROM community_article where user_id = '$id' ORDER BY article_id DESC LIMIT $limit_start, $num";
        $result2 = mysqli_query($link , $sql2);
        $rowpage = mysqli_fetch_array($result);
        
        //echo "<td>資料總筆數：".$total."</td><br>";
        //echo "<td>目前頁數：".$page."/總頁數：".$pages."</td><br>";
        
        echo "<ul>"; 
        if($page > 1){
          echo "<li><a class=\"btn btn-square btn-icon\"href=\"http://120.110.113.70/rosefit_greenhouse/social_platform/blog.php?page=".$pre."&id=".$id."\"><i class=\"ion-android-arrow-back\"></i></a></li>";
          if($page > 3){
          echo "<li><a class=\"btn btn-square btn-icon\" href=\"http://120.110.113.70/rosefit_greenhouse/social_platform/blog.php?page=1&id=".$id."\"><span>1</span></a></li>";
          echo "<li><a class=\"btn btn-square btn-icon\"<span style='background: #fff0 !important;'>...</span></a></li>";
          }
        }

        if($pages <= $pageNum){
          for($i=$start;$i<=$pages;$i++){
            if($i==$page){
              echo "<li class=\"active\"><a class=\"btn btn-square\" href=\"http://120.110.113.70/rosefit_greenhouse/social_platform/blog.php?page=".$i."&id=".$id."\"<span>".$i."</span></a></li>";
            }
            else{
              //if($page > 3){
              echo "<li><a class=\"btn btn-square\" href=\"http://120.110.113.70/rosefit_greenhouse/social_platform/blog.php?page=".$i."&id=".$id."\"><span>".$i."</span></a></li>";
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
                echo "<li><a class=\"btn btn-square\" href=\"http://120.110.113.70/rosefit_greenhouse/social_platform/blog.php?page=".$i."&id=".$id."\"><span>".$i."</span></a></li>";
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
                echo "<li><a class=\"btn btn-square\" href=\"http://120.110.113.70/rosefit_greenhouse/social_platform/blog.php?page=".$i."&id=".$id."\"><span>".$i."</span></a></li>";
              }
            }
          }
        }
        if($page < $pages){
          if($page < $pages-2){
          echo "<li><a class=\"btn btn-square btn-icon\"<span style='background: #fff0 !important;'>...</span></a></li>";  
          echo "<li><a class=\"btn btn-square btn-icon\" href=\"http://120.110.113.70/rosefit_greenhouse/social_platform/blog.php?page=".$pages."&id=".$id."\"><span>".$pages."</span></a></li>";
          }
          echo "<li><a class=\"btn btn-square btn-icon\"href=\"http://120.110.113.70/rosefit_greenhouse/social_platform/blog.php?page=".$next."&id=".$id."\"><i class=\"ion-android-arrow-forward\"></i></a></li>";
        }
        echo "</ul>";        
        ?>
            </div>
            <!-- /.pagination --> 
            
          </div>
          <!-- /.blog-content -->
          
          <aside class="col-sm-4 sidebar">
            <div class="sidebox widget">
              <h3 class="widget-title">About Us</h3>
              <?php
                      echo "<figure><img src=\"$rowuser[4]\" class=\"img-auto\" alt=\"\"></figure>";
              ?>
              <div class="divide10"></div>
              <p><?php echo $rowuser[5] ?></p>
              <!--
              <ul class="social">
                <li> <a href="#"><i class="ion-social-rss"></i></a> </li>
                <li> <a href="#"><i class="ion-social-facebook"></i></a> </li>
                <li> <a href="#"><i class="ion-social-twitter"></i></a> </li>
                <li> <a href="#"><i class="ion-social-instagram"></i></a> </li>
                <li> <a href="#"><i class="ion-social-vimeo"></i></a> </li>
                <li> <a href="#"><i class="ion-social-whatsapp"></i></a> </li>
              </ul>
              -->
              <div class="clearfix"></div>
            </div>
            <!-- /.widget -->
            
            <div class="sidebox widget">
              <h3 class="widget-title">Popular Posts</h3>
              <ul class="post-list">
                <li>
                  <figure class="overlay small"> <a href="blog-post.html"><img src="style/images/art/a1.jpg" alt="" /> </a> </figure>
                  <div class="post-content">
                    <h4 class="post-title"> <a href="blog-post.html">Magna Mollis Ultricies Mauris</a> </h4>
                    <div class="meta"><span class="date">12 Nov 2014</span><span class="category"><a href="#">Urban</a></span></div>
                  </div>
                </li>
                <li>
                  <figure class="overlay small"> <a href="blog-post.html"><img src="style/images/art/a2.jpg" alt="" /> </a> </figure>
                  <div class="post-content">
                    <h4 class="post-title"> <a href="blog-post.html">Ornare Nullam Risus Cursus</a> </h4>
                    <div class="meta"><span class="date">12 Nov 2014</span><span class="category"><a href="#">Still Life</a></span></div>
                  </div>
                </li>
                <li>
                  <figure class="overlay small"> <a href="blog-post.html"><img src="style/images/art/a3.jpg" alt="" /> </a> </figure>
                  <div class="post-content">
                    <h4 class="post-title"> <a href="blog-post.html">Euismod Nullam Fusce Dapibus</a> </h4>
                    <div class="meta"><span class="date">12 Nov 2014</span><span class="category"><a href="#">Conceptual</a></span></div>
                  </div>
                </li>
              </ul>
              <!-- /.post-list --> 
            </div>
            <!-- /.widget -->
            
            <div class="sidebox widget">
              <h3 class="widget-title">Categories</h3>
              <ul class="list circled">
                <li><a href="#">Lifestyle (21)</a></li>
                <li><a href="#">Photography (19)</a></li>
                <li><a href="#">Journal (16)</a></li>
                <li><a href="#">Works (7)</a></li>
                <li><a href="#">Conceptual (12)</a></li>
                <li><a href="#">Videography</a></li>
              </ul>
            </div>
            <!-- /.widget -->
            
            <div class="sidebox widget">
              <h3 class="widget-title">Tags</h3>
              <ul class="tag-list">
                <li><a href="#" class="btn">Still Life</a></li>
                <li><a href="#" class="btn">Urban</a></li>
                <li><a href="#" class="btn">Journal</a></li>
                <li><a href="#" class="btn">Nature</a></li>
                <li><a href="#" class="btn">Landscape</a></li>
                <li><a href="#" class="btn">Macro</a></li>
                <li><a href="#" class="btn">Workshop</a></li>
                <li><a href="#" class="btn">Photography</a></li>
              </ul>
            </div>
            <!-- /.widget -->
            <!--
            <div class="sidebox widget">
              <h3 class="widget-title">Instagram</h3>
              <div class="tiles instagram">
                <div id="instafeed-widget" class="items row row-offset-0"></div>
              </div>
            -->
              <!--/.tiles --> 
            <!--</div>-->
            <!-- /.widget -->
            <!--
            <div class="sidebox widget">
              <h4 class="widget-title">Search</h4>
              <form class="searchform" method="get">
                <input type="text" id="s1" name="s" value="Search something" onfocus="this.value=''" onblur="this.value='Search something'">
              </form>
            </div>
            -->
            <!-- /.widget --> 
          </aside>
          <!-- /column .sidebar --> 
          
        </div>
        <!-- /.blog --> 
        
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
      <p class="pull-left">© 2016 Juno. All rights reserved. Theme by <a href="http://elemisfreebies.com">elemis</a></p>
    </div>
  </div>
</footer>
<script type="text/javascript" src="style/js/jquery.min.js"></script> 
<script type="text/javascript" src="style/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="style/js/plugins.js"></script> 
<script type="text/javascript" src="style/js/scripts.js"></script>
</body>
</html>