<?php session_start(); //註冊一個變數到 session  
include("mysql_connect.inc.php");
$email = $_SESSION['username'];
$sql = "SELECT * FROM user where user_email = '$email'";
$result = mysqli_query($link , $sql);
$rowname = mysqli_fetch_array($result);

$sqlarticle = "SELECT * FROM community_article where user_id = '$rowname[0]' ORDER BY article_id DESC";
$result = mysqli_query($link , $sqlarticle);
$article = mysqli_fetch_array($result);

$sqltag = "SELECT * FROM community_tag where article_id = '$article[0]'";
$result = mysqli_query($link , $sqltag);
$tag = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/x-icon" href="style/images/rosefit.png" />
<title>玫瑰 - 種植計畫</title>
<link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css?1">
<link rel="stylesheet" type="text/css" href="style/css/plugins.css">
<link rel="stylesheet" type="text/css" href="style.css?283">
<link rel="stylesheet" type="text/css" href="style/css/color/red.css">
<link rel="stylesheet" type="text/css" href="style/type/icons.css">
<link rel="stylesheet" type="text/css" href="./bootstrap-tagsinput.css">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CKarla:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style type="text/css">
  .background-color{
    background-color: #40404014 !important;
  }
  .color{
    color: #606060 !important;
  }
</style>
</head>
<body>
<div class="content-wrapper">
  <div class="navbar navbar-default default classic full" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <div class="navbar-brand"><a href="index.html"><img src="#" srcset="style/images/rosefit.png 1x, style/images/rosefit.png 2x" alt="" /></a></div>
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
      <!--/.nav-collapse --> 
    </div>
    <!--/.container-fluid --> 
  </div>
  <!--/.navbar -->
  <main>
    <div class="dark-wrapper">
      <div class="container inner">

          
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <h1 class="post-title text-center fontcolor">玫瑰</h1>
              <p class="text-center fontcolor">種植計畫三步曲</p>
              <div class="divide10"></div>
              <div class="col-sm-12">
            <h3 class="fontcolor">Tabs</h3>
            <ul id="tab1" class="nav nav-tabs">
              <li class="active"><a href="#tab1-1" data-toggle="tab" class="fontcolor">第一步</a></li>
              <li><a href="#tab1-2" data-toggle="tab" class="fontcolor">第二步</a></li>
              <li><a href="#tab1-3" data-toggle="tab" class="fontcolor">第三步</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade in active" id="tab1-1">
                <p class="fontcolor">12345</p>
                <p class="fontcolor">1233455</p>
                <ul class="circled fontcolor">
                  <li>Mauris lacinia dui non metus dignissim venenatis.</li>
                  <li>Etiam elit tellus, condimentum tempor lobortis non.</li>
                  <li>Aliquam pharetra vestibulum arcu, eget iaculis. </li>
                </ul>
              </div>
              <div class="tab-pane fade" id="tab1-2">
                <p class="fontcolor">1234</p>
                <p class="fontcolor">1234</p>
                <p class="fontcolor">1234</p>
              </div>
              <div class="tab-pane fade" id="tab1-3">
                <p class="fontcolor">1253</p>
                <p class="fontcolor">1253</p>
              </div>
            </div>
          </div>
          <!-- /column -->
            </div>
          </div>
        <!--/.modal --> 
      </div>
      <!-- /.container --> 
    </div>
    <!-- /.dark-wrapper --> 
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
<script type="text/javascript" src="./bootstrap-tagsinput.js"></script>
</body>
</html>