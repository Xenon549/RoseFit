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
<title>部落格管理</title>
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
            <h2 class="post-title text-center color">新增文章</h2>
            <p class="text-center color">直接修改內文</p>
            <div class="divide10"></div>
            <div class="form-container">
              <form action="newarticle.php" method="post" class="vanilla vanilla-form" novalidate="novalidate">
                <div class="row">
                  <div class="col-sm-6 rp10">
                    <div class="form-field">
                      <label >
                        <input type="text" name="title" value="" required="required" class="color background-color">
                      </label>
                    </div>
                    <!--/.form-field --> 
                  </div>
                  <!--/column -->
                  <div class="col-sm-6 lp10">
                    <div class="form-field ">
                      <label class="custom-select">
                        <select name="department" required="required" class="background-color" name="category">
                          <option value="">文章分類</option>
                          <option value="doctor">植物醫生</option>
                          <option value="prince">小王子星球</option>
                          <option value="beauty">天生我最美</option>
                          <option value="Other">沒有分類</option>
                        </select>
                        <span><!-- fake select handler --></span> </label>
                    </div>
                    <!--/.form-field --> 
                  </div>
                  <!--/column -->
                  
                  <div class="col-sm-12">
                    <textarea name="message" value="" required="required" class="color background-color" name="article"></textarea>
                    <!--
                    <div class="radio-set">
                      <label>#標籤</label>
                      <label>
                        <input type="radio" name="subject" value="General">
                        <span></span> 花草世界</label>
                      <label>
                        <input type="radio" name="subject" value="Hi">
                        <span></span> 無可救藥</label>
                      <label>
                        <input type="radio" name="subject" value="Other">
                        <span></span> 其他標籤</label>
                    </div>
                    -->
                    <input type="file" class="form-control" style="margin-top:10px;margin-bottom:-14px; background-color: #e1e5e6!important; border-color: #e1e5e6!importantt; " type="file" name="img" multiple><br/>
                    <input type="text" value="標籤" data-role="tagsinput" name="tag" style="display:inline;">
                    <br/><br/>
                    <!--/.radio-set -->
                    <div align="right">
                      <input type="submit"  value="儲存編輯" data-error="錯誤" data-processing="儲存中.." data-success="已儲存" class="btn btn-blue" style="display:inline" > 
                      
                      <a class="btn btn-blue" style="display:inline; padding-top: 13px;" onclick="myFunction1();">放棄新增</a>
                      <script type="text/javascript">
                        function myFunction1(){
                          var msg=confirm("確定放棄新增文章?");
                          if(msg==true){
                            window.location.replace("./blog_manage.php");
                          }else{
                            return false;
                          }
                        }
                      </script>
                    </div>
                    <footer class="notification-box"></footer>
                  </div>
                  <!--/column --> 
                  
                </div>
                <!--/.row -->
                
              </form>
              <!--/.vanilla-form --> 
            </div>
            <!--/.form-container -->
          </div>
          
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