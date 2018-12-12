<?php session_start(); //註冊一個變數到 session  
include("mysql_connect.inc.php");
$id = $_GET['id'];
$sql2 = "SELECT DISTINCT * FROM greenhouse_user1 where user_id = '$id' ORDER BY gh_id ASC";
$result1 = mysqli_query($link , $sql2);
$rowname = mysqli_fetch_array($result1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="style/images/rosefit.png">
<title>即時影像</title>
<link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style/css/plugins.css">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style/css/color/red.css">
<link rel="stylesheet" type="text/css" href="style/type/icons.css">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CKarla:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

<!--<link href="http://vjs.zencdn.net/5.20.1/video-js.css" rel="stylesheet">-->
<script src="http://vjs.zencdn.net/5.20.1/videojs-ie8.min.js"></script>
<!--
<link rel="stylesheet" href="./video-js-7.2.4/video-js.css"/>
<script src="./video-js-7.2.4/video.js"></script>
-->
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
        <div class="navbar-brand">
          <a href="index.php"><img src="#" srcset="style/images/rosefit.png 1x, style/images/rosefit.png 2x" alt="" /></a>
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
          <p><span>一號溫室</span>即時影像</p>
        </div>
        <!-- /.hero -->

        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <!--
            <div id="js-video-grid-filter" class="cbp-filter-container text-center">
              <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"><span>All</span></div>
              <div data-filter=".animation" class="cbp-filter-item"><span>Animation</span></div>
              <div data-filter=".cartoon" class="cbp-filter-item"><span>Cartoon</span></div>
              <div data-filter=".independent" class="cbp-filter-item"><span>Independent</span></div>
            </div>
            -->
            <div class="clearfix"></div>
            <div class="divide25"></div>
            <div class="cbp-inline2">
            <figure class="embed-responsive embed-responsive-16by9">
                <!--
                <iframe id="example_video_1" class="embed-responsive-item video-js vjs-default-skin" controls preload="auto" src="rtmp://120.110.113.70/live/stream"  data-setup="{}"  type="rtmp/flv" width="500" height="281" allowfullscreen></iframe>
                -->
                
                <video id="example_video_1" class="video-js vjs-default-skin" controls preload="auto"  width="500" height="281" allowfullscreen poster="" data-setup="{}" class="embed-responsive embed-responsive-16by9" class="embed-responsive-item">
                  <source src="rtmp://120.110.113.70/live/stream" type="rtmp/flv" >
                  
                  <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                </video>
                
              </figure>
              <script src="http://vjs.zencdn.net/5.20.1/video.js"></script>
              <!--
                      <section class="content">
            <div class="player-wrapper" style="margin:0 auto;width:80%;position:relative;">

                <div class="video-wrapper" style="padding-bottom:55%;position:relative;margin:0 auto;">
                    <div class="video-inner" style="position:absolute;top:0;bottom:0;left:0;right:0;">
                        <video id="videojs" class="video-js vjs-default-skin vjs-big-play-centered" style="width: 50%; height: 50%;" controls preload="none"
                               poster="" x5-video-player-fullscreen=”true”，x5-video-player-type=”h5”>
                            <source src="rtmp://120.110.113.70/live/stream" type="rtmp/flv"></source>
                            <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a web browser that
                                <a href="http://videojs.com/html5-video-support/" target="_blank">
                                    supports HTML5 video
                                </a>
                            </p>
                        </video>
                    </div>
                </div>
            </div>
            -->
            <!-- wrapper-->
            <!--
            <script>
                videojs.options.flash.swf = './video-js-7.2.4/video-js-fixed.swf';
                videojs.options.techOrder = ['html5','flash'];
                var player = videojs('vid');
                //var player = null;
             
                player = videojs("videojs",{
                    notSupportedMessage : '您的浏览器没有安装或开启Flash,戳我开启！',
                    techOrder : ["flash"],
                    autoplay : true
                });
                player.on("error",function(e){
                    var $e = $(".vjs-error .vjs-error-display .vjs-modal-dialog-content");
                    var $a = $("<a href='http://www.adobe.com/go/getflashplayer' target='_blank'></a>").text($e.text());
                    $e.empty().append($a);
                });

            </script>
             -->
             <div class="divide15"></div>
              <h2 class="post-title">溫室資訊</h2><br/>
              <p>溫室名稱: <?php echo $rowname[4]; ?></p>
              <p>花兒名稱: <?php echo $rowname[5]; ?></p>
              <p>花兒種類: <?php echo $rowname[6]; ?></p>
            </div>
        </section>

             

            <!-- /.cbp --> 
          </div>
          <!-- /column --> 
        </div>
        <!-- /.row --> 
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