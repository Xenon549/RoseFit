<?php session_start(); 
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
<title>每日一照</title>
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
            <form>
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
          <p> 每日一照<br class="hidden-xs hidden-sm" />
            Here you will be able to find our latest and favorite works.</p>
        </div>
        <!-- /.hero -->
        
        <div class="tiles blog">
          <div class="items row row-offset-0">
            <div class="item col-xs-12 col-sm-6 col-md-4">
              <figure class="overlay"> <a href="#">
                <div class="text-overlay caption">
                  <div class="date-wrapper">
                    <div class="date"><span class="day">17</span><span class="month">Aug</span></div>
                  </div>
                  <div class="info">
                    <h2 class="post-title">Aenean Etiam Sem Malesuada Purus Magna Ornare Cursus</h2>
                    <div class="meta"><span class="comments">7 Comments</span><span class="category">Urban, Conceptual</span></div>
                    <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus...</p>
                  </div>
                </div>
                <img src="style/images/art/ib1.jpg" alt="" /></a> </figure>
            </div>
            <!--/column -->
            <div class="item col-xs-12 col-sm-6 col-md-4">
              <figure class="overlay"> <a href="#">
                <div class="text-overlay caption">
                  <div class="date-wrapper">
                    <div class="date"><span class="day">08</span><span class="month">Jul</span></div>
                  </div>
                  <div class="info">
                    <h2 class="post-title">Aenean Sem Ultricies</h2>
                    <div class="meta"><span class="comments">3 Comments</span><span class="category">Still Life</span></div>
                    <p>Donec sed odio dui. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor...</p>
                  </div>
                </div>
                <img src="style/images/art/ib2.jpg" alt="" /></a> </figure>
            </div>
            <!--/column -->
            
            <div class="item col-xs-12 col-sm-6 col-md-4">
              <figure class="overlay"> <a href="#">
                <div class="text-overlay caption">
                  <div class="date-wrapper">
                    <div class="date"><span class="day">04</span><span class="month">Jul</span></div>
                  </div>
                  <div class="info">
                    <h2 class="post-title">Ullamcorper Vulputate</h2>
                    <div class="meta"><span class="comments">8 Comments</span><span class="category">Urban</span></div>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et donec sed...</p>
                  </div>
                </div>
                <img src="style/images/art/ib3.jpg" alt="" /></a> </figure>
            </div>
            
            <!--/column --> 
            
          </div>
          <!--/.row --> 
        </div>
        <!-- /.tiles -->
        <div class="divide20"></div>
        <div class="pagination text-center">
          <ul>
            <li><a class="btn btn-square btn-icon" href="#"><i class="ion-android-arrow-back"></i></a></li>
            <li class="active"><a class="btn btn-square" href="#"><span>1</span></a></li>
            <li><a class="btn btn-square" href="#"><span>2</span></a></li>
            <li><a class="btn btn-square" href="#"><span>3</span></a></li>
            <li><a class="btn btn-square btn-icon" href="#"><i class="ion-android-arrow-forward"></i></a></li>
          </ul>
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