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
<link rel="shortcut icon" href="style/images/rosefit.png">
<title>RoseFit</title>
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
<style type="text/css">
  .index_font{
    color: #fff !important;
  }
</style>
</head>

<body>
<div class="content-wrapper">
  <div class="navbar navbar-default default classic full" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <div class="navbar-brand">
          <a href="index.php"><img src="#" srcset="style/images/rosefit.png 1x, style/images/rosefit.png 2x" alt="" /></a>
        </div>
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
        <!-- /.nav-bars-wrapper --><br/>
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
    <div class="light-wrapper">
      <div class="container-fluid">
        <div class="swiper-container-wrapper image-carousel-wrapper">
          <div class="swiper-container image-carousel">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <figure class="overlay">
                  <div class="text-overlay caption">
                    <div class="info">
                      <h2 class="post-title">植物醫生</h2>
                      <a href="#myModal1" class="btn btn-white" data-toggle="modal" data-target="#myModal1">專欄介紹</a> </div>
                  </div>
                  <img src="img/rose2.jpg" alt="" /> </figure>
              </div>
              <!--/.swiper-slide -->
              <div class="swiper-slide">
                <figure class="overlay">
                  <div class="text-overlay caption">
                    <div class="info">
                      <h2 class="post-title">小王子星球</h2>
                      <a href="#myModal2" class="btn btn-white" data-toggle="modal" data-target="#myModal2">專欄介紹</a> </div>
                  </div>
                  <img src="img/rose4.jpg" alt="" /></figure>
              </div>
              <!--/.swiper-slide -->
              
              <div class="swiper-slide">
                <figure class="overlay">
                  <div class="text-overlay caption">
                    <div class="info">
                      <h2 class="post-title">天生我最美</h2>
                      <a href="#myModal3" class="btn btn-white" data-toggle="modal" data-target="#myModal3">專欄介紹</a> </div>
                  </div>
                  <img src="img/rose3.jpg" alt="" /></figure>
              </div>
              <!--/.swiper-slide -->
            </div>
          </div>
          <div class="swiper-button-next btn"></div>
          <div class="swiper-button-prev btn"></div>
        </div>

        <div class="modal inverse-wrapper modal-transparent move-from-top" id="myModal1" tabindex="-1" role="dialog"> <a href="#" class="btn close-button" data-dismiss="modal" aria-label="Close"></a>
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <h2 class="post-title text-center"><a href="blog_doctor.php" class="index_font">植物醫生</a></h2>
              <br/>
              <p class="text-center index_font">植物醫生專欄，有問題隨時提問!</p>
              <div class="divide10"></div>
              <br/>
              <div align="center">
                <a href="blog_doctor.php" class="btn btn-rose">進入專欄</a>
              </div>
            </div>
          </div>
        </div>
        <!--/.modal -->
        
        <div class="modal inverse-wrapper modal-transparent move-from-top" id="myModal2" tabindex="-1" role="dialog"> <a href="#" class="btn close-button" data-dismiss="modal" aria-label="Close"></a>
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <h2 class="post-title text-center"><a href="blog_doctor.php" class="index_font">小王子星球</a></h2>
              <br/>
              <p class="text-center index_font">Curabitur blandit tempus porttitor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur.</p>
              <!--
              <ul class="basic-gallery text-center">
                <li><img src="style/images/art/pm2-full1.jpg" alt="" /></li>
              </ul>
              -->
              <br/>
              <div align="center">
                <a href="blog_princess.php" class="btn btn-rose">進入專欄</a>
              </div>
            </div>
          </div>
        </div>
        <!--/.modal -->
        
        <div class="modal inverse-wrapper modal-transparent move-from-top" id="myModal3" tabindex="-1" role="dialog"> <a href="#" class="btn close-button" data-dismiss="modal" aria-label="Close"></a>
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <h2 class="post-title text-center"><a href="blog_doctor.php" class="index_font">天生我最美</a></h2>
              <br/>
              <p class="text-center index_font">Curabitur blandit tempus porttitor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur.</p>
            </div>
            <br/>
            <div align="center">
              <a href="blog_beauty.php" class="btn btn-rose">進入專欄</a>
            </div>
          </div>
        </div>
        <!--/.modal -->
      </div>
      <!-- /.container-fluid --> 
    </div>
    <!-- /.light-wrapper --> 
  </main>
</div>
<!-- /.content-wrapper -->
<footer>
  <div class="sub-footer">
    <div class="container-fluid inner">
      <p class="pull-left">© 2018 RoseFit</p>
      
    </div>
  </div>
</footer>
<script type="text/javascript" src="style/js/jquery.min.js"></script> 
<script type="text/javascript" src="style/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="style/js/plugins.js"></script> 
<script type="text/javascript" src="style/js/scripts.js"></script>
</body>
</html>
