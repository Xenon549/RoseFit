<?php session_start(); //註冊一個變數到 session 
include("mysql_connect.inc.php");
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
          <form action="upload.php" method="post" class="vanilla vanilla-form" novalidate="novalidate" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-12 rp10" align="center">
                    <div class="form-field">
                      <label >
                        <input type="text" name="title" value="座右銘。" required="required" class="color background-color" style="max-width:50%; color: black !important;">
                        <!--
                        <input type="file" class="form-control" style="margin-top:10px;margin-bottom:-14px; background-color:  white !important; border-color: white!important; max-width:50%; color: black !important; display:inline;" name="img" value="open">-->
                        <br/>

                        <input type="file" name="fileToUpload" id="fileToUpload" size="20" class="ifile"
                           onchange="
                              this.form.upfile.value=this.value.substr(this.value.lastIndexOf('\\')+1);
                            " style="margin-top:10px;margin-bottom:-14px; background-color:  white !important; border-color: white!important; max-width:50%; color: black !important; display:inline;" !important;">
                        
                        <input type="text" name="upfile" size="20" readonly style="margin-top:-15px;margin-bottom:-14px; background-color:  white !important; border-color: white!important; max-width:35%; color: black !important; display:inline;" !important;">
                        <input type="button" value="選擇背景" onclick="this.form.file.click();" class="btn btn-blue" style="display:inline; padding-top: 13px;">

                        <input type="submit" name="submit" value="變更" class="btn btn-blue" style="display:inline; padding-top: 13px;">

                        <style type="text/css">
                        .ifile {position:absolute;opacity:0;filter:alpha(opacity=0);}
                        </style>
                      </label>
                    </div>
                    <!--/.form-field --> 
                  </div>
                  <!--/column -->
                </div>
              </form>
        </div>
        <!-- /.hero --> 
        
      </div>
      <!-- /.container --> 
      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
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
            <form action="editabout.php" method="post">
              <h3><input type="text"  name="name" value="<?php echo $rowname[1]?>" required="required" class="color background-color" style="max-width:50%; color: black !important;"></h3>
              <p><textarea name="about" required="required" class="color background-color" style="max-width:100%; color: black !important;"><?php echo $rowname[5]?></textarea></p>
              
              <h3>信箱:<?php echo $rowname[2]?></h3> <input type="radio" name="public" value="公開"/>公開
              <input type="radio" name="public" value="不公開"/>不公開
              <br/><br/><br/>
              <input type="submit"  value="儲存編輯" data-error="錯誤" data-processing="儲存中.." data-success="已儲存" class="btn btn-blue" style="display:inline" > 
            </form>
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