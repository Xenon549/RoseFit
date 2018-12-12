<?php session_start(); //註冊一個變數到 session  
include("mysql_connect.inc.php");
$id = $_GET['id'];
$email = $_SESSION['username'];
$sql = "SELECT * FROM user where user_email = '$email'";
$result = mysqli_query($link , $sql);
$rowname = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/x-icon" href="style/images/rosefit.png" />
<title>關於</title>
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
    <div class="parallax inverse-wrapper parallax1">
      <div class="container inner">
        <div class="hero text-center">
          <p>座右銘：</p>
        </div>
        <!-- /.hero --> 
        
      </div>
      <!-- /.container --> 
      
    </div>
    <!-- /.parallax -->
    <div class="dark-wrapper">
      <div class="container inner">
        <div class="row">
          <div class="col-md-5 rp20 bm20">
            <figure><img src="<?php echo $rowname[4]?>" alt="" /></figure>
          </div>
          <!-- /column -->
          <div class="col-md-7">
            <h3><?php echo $rowname[1]?></h3>
            <p><?php echo $rowname[5]?></p>
          </div>
          <!-- /column --> 
          
        </div>
        <!-- /.row -->
        
        <!--/.row --> 
        
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