<?php session_start(); //註冊一個變數到 session  
include("mysql_connect.inc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="style/images/favicon.png">
<title>專欄</title>
<link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style/css/plugins.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style/css/color/red.css">
<link rel="stylesheet" type="text/css" href="style/type/icons.css">
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
          <h1>專欄名稱</h1>
        </div>
        <!-- /.hero -->
        
        <div class="tiles">
          <div class="items row row-offset-0">
            <div class="item col-xs-6 col-sm-6 col-md-4">
              <figure class="overlay"> <a href="./visitor-blog-post.php" data-toggle="modal" >
                <div class="text-overlay caption">
                  <div class="info">
                    <h2 class="post-title">Holding Green</h2>
                    <div class="meta"> <span class="count">5 Photos</span> <span class="category">Macro</span></div>
                  </div>
                </div>
                <img src="style/images/art/pmt1.jpg" alt="" /></a> </figure>
            </div>
            <!--/column -->
            <div class="item col-xs-6 col-sm-6 col-md-4">
              <figure class="overlay"> <a href="./visitor-blog-post.php" data-toggle="modal" >
                <div class="text-overlay caption">
                  <div class="info">
                    <h2 class="post-title">Walking on Sunshine</h2>
                    <div class="meta"> <span class="count">7 Photos</span> <span class="category">Nature</span></div>
                  </div>
                </div>
                <img src="style/images/art/pmt2.jpg" alt="" /></a> </figure>
            </div>
            <!--/column -->
            
            <div class="item col-xs-6 col-sm-6 col-md-4">
              <figure class="overlay"> <a href="./visitor-blog-post.php" data-toggle="modal" >
                <div class="text-overlay caption">
                  <div class="info">
                    <h2 class="post-title">Road Tripping</h2>
                    <div class="meta"> <span class="count">7 Photos</span> <span class="category">Travel</span></div>
                  </div>
                </div>
                <img src="style/images/art/pmt3.jpg" alt="" /></a> </figure>
            </div>
            <!--/column -->
            <div class="item col-xs-6 col-sm-6 col-md-4">
              <figure class="overlay"> <a href="./visitor-blog-post.php" data-toggle="modal" >
                <div class="text-overlay caption">
                  <div class="info">
                    <h2 class="post-title">Riding My Bike</h2>
                    <div class="meta"> <span class="count">7 Photos</span> <span class="category">Hobby</span></div>
                  </div>
                </div>
                <img src="style/images/art/pmt4.jpg" alt="" /></a> </figure>
            </div>
            <!--/column -->
            <div class="item col-xs-6 col-sm-6 col-md-4">
              <figure class="overlay"> <a href="./visitor-blog-post.php" data-toggle="modal" >
                <div class="text-overlay caption">
                  <div class="info">
                    <h2 class="post-title">Summer is Here</h2>
                    <div class="meta"> <span class="count">7 Photos</span> <span class="category">Vacation</span></div>
                  </div>
                </div>
                <img src="style/images/art/pmt5.jpg" alt="" /></a> </figure>
            </div>
            <!--/column -->
            
            <div class="item col-xs-6 col-sm-6 col-md-4">
              <figure class="overlay"> <a href="./visitor-blog-post.php" data-toggle="modal" >
                <div class="text-overlay caption">
                  <div class="info">
                    <h2 class="post-title">Tying the Knot</h2>
                    <div class="meta"> <span class="count">7 Photos</span> <span class="category">Wedding</span></div>
                  </div>
                </div>
                <img src="style/images/art/pmt6.jpg" alt="" /></a> </figure>
            </div>
            <!--/column -->
            <div class="item col-xs-6 col-sm-6 col-md-4">
              <figure class="overlay"> <a href="./visitor-blog-post.php" data-toggle="modal" >
                <div class="text-overlay caption">
                  <div class="info">
                    <h2 class="post-title">Beautiful Models</h2>
                    <div class="meta"> <span class="count">7 Photos</span> <span class="category">People</span></div>
                  </div>
                </div>
                <img src="style/images/art/pmt7.jpg" alt="" /></a> </figure>
            </div>
            <!--/column -->
            <div class="item col-xs-6 col-sm-6 col-md-4">
              <figure class="overlay"> <a href="./visitor-blog-post.php" data-toggle="modal" >
                <div class="text-overlay caption">
                  <div class="info">
                    <h2 class="post-title">Puppy Love</h2>
                    <div class="meta"> <span class="count">6 Photos</span> <span class="category">Animals</span></div>
                  </div>
                </div>
                <img src="style/images/art/pmt8.jpg" alt="" /></a> </figure>
            </div>
            <!--/column -->
            
            <div class="item col-xs-6 col-sm-6 col-md-4">
              <figure class="overlay"> <a href="./visitor-blog-post.php" data-toggle="modal" >
                <div class="text-overlay caption">
                  <div class="info">
                    <h2 class="post-title">Means of Transportation</h2>
                    <div class="meta"> <span class="count">6 Photos</span> <span class="category">Travel</span></div>
                  </div>
                </div>
                <img src="style/images/art/pmt9.jpg" alt="" /></a> </figure>
            </div>
            <!--/column --> 
            
          </div>
          <!--/.row --> 
        </div>
        <!-- /.tiles -->
        <div class="modal inverse-wrapper modal-transparent move-from-top" id="myModal1" tabindex="-1" role="dialog"> <a href="#" class="btn close-button" data-dismiss="modal" aria-label="Close"></a>
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <h2 class="post-title text-center">Holding Green</h2>
              <p class="text-center">Curabitur blandit tempus porttitor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur.</p>
              <div class="divide10"></div>
              <ul class="basic-gallery text-center">
                <li><img src="style/images/art/pm1-full1.jpg" alt="" /></li>
                <li><img src="style/images/art/pm1-full2.jpg" alt="" /></li>
                <li><img src="style/images/art/pm1-full3.jpg" alt="" /></li>
                <li><img src="style/images/art/pm1-full4.jpg" alt="" /></li>
                <li><img src="style/images/art/pm1-full5.jpg" alt="" /></li>
              </ul>
            </div>
          </div>
        </div>
        <!--/.modal -->
        
        <div class="modal inverse-wrapper modal-transparent move-from-top" id="myModal2" tabindex="-1" role="dialog"> <a href="#" class="btn close-button" data-dismiss="modal" aria-label="Close"></a>
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <h2 class="post-title text-center">Walking on Sunshine</h2>
              <p class="text-center">Curabitur blandit tempus porttitor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur.</p>
              <ul class="basic-gallery text-center">
                <li><img src="style/images/art/pm2-full1.jpg" alt="" /></li>
                <li><img src="style/images/art/pm2-full2.jpg" alt="" /></li>
                <li><img src="style/images/art/pm2-full3.jpg" alt="" /></li>
                <li><img src="style/images/art/pm2-full4.jpg" alt="" /></li>
                <li><img src="style/images/art/pm2-full5.jpg" alt="" /></li>
                <li><img src="style/images/art/pm2-full6.jpg" alt="" /></li>
                <li><img src="style/images/art/pm2-full7.jpg" alt="" /></li>
              </ul>
            </div>
          </div>
        </div>
        <!--/.modal -->
        
        <div class="modal inverse-wrapper modal-transparent move-from-top" id="myModal3" tabindex="-1" role="dialog"> <a href="#" class="btn close-button" data-dismiss="modal" aria-label="Close"></a>
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <h2 class="post-title text-center">Road Tripping</h2>
              <p class="text-center">Curabitur blandit tempus porttitor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur.</p>
              <ul class="basic-gallery text-center">
                <li><img src="style/images/art/pm3-full1.jpg" alt="" /></li>
                <li><img src="style/images/art/pm3-full2.jpg" alt="" /></li>
                <li><img src="style/images/art/pm3-full3.jpg" alt="" /></li>
                <li><img src="style/images/art/pm3-full4.jpg" alt="" /></li>
                <li><img src="style/images/art/pm3-full5.jpg" alt="" /></li>
                <li><img src="style/images/art/pm3-full6.jpg" alt="" /></li>
                <li><img src="style/images/art/pm3-full7.jpg" alt="" /></li>
              </ul>
            </div>
          </div>
        </div>
        <!--/.modal -->
        
        <div class="modal inverse-wrapper modal-transparent move-from-top" id="myModal4" tabindex="-1" role="dialog"> <a href="#" class="btn close-button" data-dismiss="modal" aria-label="Close"></a>
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <h2 class="post-title text-center">Riding My Bike</h2>
              <p class="text-center">Curabitur blandit tempus porttitor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur.</p>
              <ul class="basic-gallery text-center">
                <li><img src="style/images/art/pm4-full1.jpg" alt="" /></li>
                <li><img src="style/images/art/pm4-full2.jpg" alt="" /></li>
                <li><img src="style/images/art/pm4-full3.jpg" alt="" /></li>
                <li><img src="style/images/art/pm4-full4.jpg" alt="" /></li>
                <li><img src="style/images/art/pm4-full5.jpg" alt="" /></li>
                <li><img src="style/images/art/pm4-full6.jpg" alt="" /></li>
                <li><img src="style/images/art/pm4-full7.jpg" alt="" /></li>
              </ul>
            </div>
          </div>
        </div>
        <!--/.modal -->
        
        <div class="modal inverse-wrapper modal-transparent move-from-top" id="myModal5" tabindex="-1" role="dialog"> <a href="#" class="btn close-button" data-dismiss="modal" aria-label="Close"></a>
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <h2 class="post-title text-center">Summer is Here</h2>
              <p class="text-center">Curabitur blandit tempus porttitor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur.</p>
              <ul class="basic-gallery text-center">
                <li><img src="style/images/art/pm5-full1.jpg" alt="" /></li>
                <li><img src="style/images/art/pm5-full2.jpg" alt="" /></li>
                <li><img src="style/images/art/pm5-full3.jpg" alt="" /></li>
                <li><img src="style/images/art/pm5-full4.jpg" alt="" /></li>
                <li><img src="style/images/art/pm5-full5.jpg" alt="" /></li>
                <li><img src="style/images/art/pm5-full6.jpg" alt="" /></li>
                <li><img src="style/images/art/pm5-full7.jpg" alt="" /></li>
              </ul>
            </div>
          </div>
        </div>
        <!--/.modal -->
        
        <div class="modal inverse-wrapper modal-transparent move-from-top" id="myModal6" tabindex="-1" role="dialog"> <a href="#" class="btn close-button" data-dismiss="modal" aria-label="Close"></a>
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <h2 class="post-title text-center">Tying the Knot</h2>
              <p class="text-center">Curabitur blandit tempus porttitor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur.</p>
              <ul class="basic-gallery text-center">
                <li><img src="style/images/art/pm6-full1.jpg" alt="" /></li>
                <li><img src="style/images/art/pm6-full2.jpg" alt="" /></li>
                <li><img src="style/images/art/pm6-full3.jpg" alt="" /></li>
                <li><img src="style/images/art/pm6-full4.jpg" alt="" /></li>
                <li><img src="style/images/art/pm6-full5.jpg" alt="" /></li>
                <li><img src="style/images/art/pm6-full6.jpg" alt="" /></li>
                <li><img src="style/images/art/pm6-full7.jpg" alt="" /></li>
              </ul>
            </div>
          </div>
        </div>
        <!--/.modal -->
        
        <div class="modal inverse-wrapper modal-transparent move-from-top" id="myModal7" tabindex="-1" role="dialog"> <a href="#" class="btn close-button" data-dismiss="modal" aria-label="Close"></a>
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <h2 class="post-title text-center">Beautiful Models</h2>
              <p class="text-center">Curabitur blandit tempus porttitor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur.</p>
              <ul class="basic-gallery text-center">
                <li><img src="style/images/art/pm7-full1.jpg" alt="" /></li>
                <li><img src="style/images/art/pm7-full2.jpg" alt="" /></li>
                <li><img src="style/images/art/pm7-full3.jpg" alt="" /></li>
                <li><img src="style/images/art/pm7-full4.jpg" alt="" /></li>
                <li><img src="style/images/art/pm7-full5.jpg" alt="" /></li>
                <li><img src="style/images/art/pm7-full6.jpg" alt="" /></li>
                <li><img src="style/images/art/pm7-full7.jpg" alt="" /></li>
              </ul>
            </div>
          </div>
        </div>
        <!--/.modal -->
        
        <div class="modal inverse-wrapper modal-transparent move-from-top" id="myModal8" tabindex="-1" role="dialog"> <a href="#" class="btn close-button" data-dismiss="modal" aria-label="Close"></a>
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <h2 class="post-title text-center">Puppy Love</h2>
              <p class="text-center">Curabitur blandit tempus porttitor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur.</p>
              <ul class="basic-gallery text-center">
                <li><img src="style/images/art/pm8-full1.jpg" alt="" /></li>
                <li><img src="style/images/art/pm8-full2.jpg" alt="" /></li>
                <li><img src="style/images/art/pm8-full3.jpg" alt="" /></li>
                <li><img src="style/images/art/pm8-full4.jpg" alt="" /></li>
                <li><img src="style/images/art/pm8-full5.jpg" alt="" /></li>
                <li><img src="style/images/art/pm8-full6.jpg" alt="" /></li>
              </ul>
            </div>
          </div>
        </div>
        <!--/.modal -->
        
        <div class="modal inverse-wrapper modal-transparent move-from-top" id="myModal9" tabindex="-1" role="dialog"> <a href="#" class="btn close-button" data-dismiss="modal" aria-label="Close"></a>
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <h2 class="post-title text-center">Means of Transportation</h2>
              <p class="text-center">Curabitur blandit tempus porttitor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur.</p>
              <ul class="basic-gallery text-center">
                <li><img src="style/images/art/pm9-full1.jpg" alt="" /></li>
                <li><img src="style/images/art/pm9-full2.jpg" alt="" /></li>
                <li><img src="style/images/art/pm9-full3.jpg" alt="" /></li>
                <li><img src="style/images/art/pm9-full4.jpg" alt="" /></li>
                <li><img src="style/images/art/pm9-full5.jpg" alt="" /></li>
                <li><img src="style/images/art/pm9-full6.jpg" alt="" /></li>
              </ul>
            </div>
          </div>
        </div>
        <!--/.modal --> 
        
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
      <ul class="social pull-right">
        <li> <a href="#"><i class="ion-social-rss"></i></a> </li>
        <li> <a href="#"><i class="ion-social-facebook"></i></a> </li>
        <li> <a href="#"><i class="ion-social-twitter"></i></a> </li>
        <li> <a href="#"><i class="ion-social-instagram"></i></a> </li>
        <li> <a href="#"><i class="ion-social-vimeo"></i></a> </li>
        <li> <a href="#"><i class="ion-social-whatsapp"></i></a> </li>
      </ul>
    </div>
  </div>
</footer>
<script type="text/javascript" src="style/js/jquery.min.js"></script> 
<script type="text/javascript" src="style/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="style/js/plugins.js"></script> 
<script type="text/javascript" src="style/js/scripts.js"></script>
</body>
</html>