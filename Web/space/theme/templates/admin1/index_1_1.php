<?php session_start(); 
include("mysql_connect.inc.php");
$email = $_SESSION['username'];
$key = $_GET['house'];
$sql = "SELECT * FROM user where user_email = '$email'";
$result = mysqli_query($link , $sql);
$rowname = mysqli_fetch_array($result);

$greenhouse = "SELECT * FROM greenhouse_user1 where greenhouse_key = '$key'";
$result = mysqli_query($link , $greenhouse);
$row = mysqli_fetch_array($result);

$greenhouse_id = "SELECT * FROM greenhouse_data where gh_id = '$row[0]' ORDER BY data_id DESC";
$result = mysqli_query($link , $greenhouse_id);
$rowgreen = mysqli_fetch_array($result);

$project = "SELECT * FROM project where user_id ='$rowname[0]' and greenhouse_key ='$row[1]'";
$result = mysqli_query($link , $project);
$rowproject = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../../assets/plugins/icomoon/style.css" rel="stylesheet">
        <link href="../../assets/plugins/uniform/css/default.css" rel="stylesheet"/>
        <link href="../../assets/plugins/switchery/switchery.min.css" rel="stylesheet"/>
        <link href="../../assets/plugins/gridgallery/css/component.css" rel="stylesheet">
      
        <!-- Theme Styles -->
        <link href="../../assets/css/space.min.css" rel="stylesheet">
        <link href="../../assets/css/custom.css" rel="stylesheet">

        <script src="../../assets/plugins/gridgallery/js/modernizr.custom.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            body{
                background-color: #0099aa!important;
            }
            /*.pricing li:nth-last-child(2) {
                padding: 30px 13px;
            }*/
            .page-inner {
                position: relative;
                min-height: calc(100% - 81px);
                padding: 5px 40px 42px 30px;
                background: #0099aa !important;
            }
            .panel {
                padding: 28px;
                border-color: #E6E8EB;
            }

        </style>
    </head>
    <body>
        
        <!-- Page Container -->
        <div class="page-container container">
            <!-- Page Sidebar -->
            <div class="page-sidebar">
                <!--
                <a class="logo-box" href="http://120.110.113.70/rosefit_greenhouse/index/index.html"><img src="../../assets/images/logo.png">
                <i class="icon-close" id="sidebar-toggle-button-close"></i>
                </a>-->
                <a class="logo-box" href="http://120.110.113.70/rosefit_greenhouse/index/index.php">
                    <span style="color: green;"><img src="../../assets/images/rosefit2.png"></span>
                    <!--<i class="icon-radio_button_unchecked" id="fixed-sidebar-toggle-button"></i>-->
                    <i class="icon-close" id="sidebar-toggle-button-close" class="icon-radio_button_unchecked"></i>
                </a>
                <div class="page-sidebar-inner">
                    <div class="page-sidebar-menu">
                        <ul class="accordion-menu">
                            <li class="active-page">
                                <a href="index_1.php">
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="album.php">
                                    <span>相簿</span>
                                </a>
                            </li>
                            <li>
                                <a href="set.php">
                                    <span>個人資料</span>
                                </a>
                            </li>
                            <li>
                                <a href="http://120.110.113.70/rosefit_greenhouse/social_platform/plan_sell.php">
                                    <span>種植計畫</span>
                                </a>
                            </li>
                            <li>
                                <a href="http://120.110.113.70/rosefit_greenhouse/social_platform/index.php">
                                    <span>社群</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div><!-- /Page Sidebar -->
            
            <!-- Page Content -->
            <div class="page-content">            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="search-form">
                        <form action="#" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control search-input" placeholder="Type something...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="close-search" type="button"><i class="icon-close"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <div class="logo-sm">
                                    <a href="javascript:void(0)" id="sidebar-toggle-button"><i class="fa fa-bars"></i></a>
                                    <a class="logo-box" href="index.php"><span>RoseFit</span></a>
                                </div><!--
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                            -->
                            </div>
                        
                            <!-- Collect the nav links, forms, and other content for toggling -->
                        
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <?php 
                                                echo"<img src='$rowname[4]' alt='' class='img-circle'>"
                                            ?>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/logout.php">Log Out</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div><!-- /Page Header -->



                <!-- Page Inner -->
                <div class="page-inner no-page-title">
                    <div id="main-wrapper">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-white">
                                    <div class="panel-heading clearfix">
                                        <h4 class="panel-title">基本資訊</h4>
                                    </div>
                                    <div class="panel-body user-profile-panel">
                                        <img src="<?php echo "$rowname[4]"?>" class="user-profile-image img-circle" alt="">
                                        <h4 class="text-center m-t-lg"><?php echo $rowproject[1]; ?></h4>
                                        <p class="text-center"><i class="fa fa-drivers-license-o"></i> 身分：專家</p>
                                        <hr>
                                        <ul class="list-unstyled text-left">
                                            <li><p><i class="fa fa-tree"></i> 溫室名稱：<?php echo $rowproject[2]; ?></p></li>
                                            <li><p><i class="fa fa-tree"></i> 植物名稱：<?php echo $rowproject[3]; ?></p></li>
                                            <li><p><i class="fa fa-tree"></i> 植物種類：<?php echo $rowproject[4]; ?></a></li>
                                            <li><p><i class="fa fa-user-secret"></i> 金鑰：<?php echo $rowproject[6]; ?></p></li>
                                        </ul>
                                        <hr>
                                        <button class="btn btn-info btn-block">啟動專案</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="panel panel-white stats-widget">
                                    <div class="panel-body">
                                        <div class="pull-left">
                                            <span class="stats-number">溫室溫度：
                                                <?php 
                                                    echo $rowgreen[1];
                                                ?>
                                                °C
                                            </span>
                                            <p class="stats-info"></p>
                                        </div>
                                        <div class="pull-right">
                                            <!--<i class="icon-arrow_upward stats-icon"></i> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="panel panel-white stats-widget">
                                    <div class="panel-body">
                                        <div class="pull-left">
                                            <span class="stats-number">溫室濕度：
                                                <?php 
                                                    echo $rowgreen[2];
                                                ?>
                                                %
                                            </span>
                                            <p class="stats-info"></p>
                                        </div>
                                        <div class="pull-right">
                                            <!--<i class="icon-arrow_upward stats-icon"></i> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="panel panel-white stats-widget">
                                    <div class="panel-body">
                                        <div class="pull-left">
                                            <span class="stats-number">土壤濕度：
                                                <?php 
                                                    echo $rowgreen[3];
                                                ?>
                                                %
                                            </span>
                                            <p class="stats-info"></p>
                                        </div>
                                        <div class="pull-right">
                                            <!--<i class="icon-arrow_upward stats-icon"></i> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="panel panel-white stats-widget">
                                    <div class="panel-body">
                                        <div class="pull-left">
                                            <span class="stats-number">馬達：
                                                <?php 
                                                    if($rowgreen[4] =='0')
                                                        echo "關";
                                                    else{
                                                        echo "開";
                                                    }
                                                ?>
                                            </span>
                                            <p class="stats-info"></p>
                                        </div>
                                        <div class="pull-right">
                                            <!--<i class="icon-arrow_upward stats-icon"></i> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="panel panel-white stats-widget">
                                    <div class="panel-body">
                                        <div class="pull-left">
                                            <span class="stats-number">植物燈：
                                                <?php 
                                                    if($rowgreen[5] =='0')
                                                        echo "關";
                                                    else{
                                                        echo "開";
                                                    }
                                                ?>
                                            </span>
                                            <p class="stats-info"></p>
                                        </div>
                                        <div class="pull-right">
                                            <!--<i class="icon-arrow_upward stats-icon"></i> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="panel panel-white stats-widget">
                                    <div class="panel-body">
                                        <div class="pull-left">
                                            <span class="stats-number">風扇：
                                                <?php 
                                                    if($rowgreen[6] =='0')
                                                        echo "關";
                                                    else{
                                                        echo "開";
                                                    }
                                                ?>
                                            </span>
                                            <p class="stats-info"></p>
                                        </div>
                                        <div class="pull-right">
                                            <!--<i class="icon-arrow_upward stats-icon"></i> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading clearfix">
                                        <h4 class="panel-title">即時影像</h4>
                                    </div>
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
                                    <hr>
                                    <button class="btn btn-info btn-block">拍照</button>
                                    <!--<input type="file" accept="image/*;capture=camera" value="拍照">-->

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading clearfix">
                                        <h4 class="panel-title">今日拍照結果</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div id="grid-gallery" class="grid-gallery">
                                            <section class="grid-wrap">
                                                <ul class="grid">
                                                    <li class="grid-sizer"></li>
                                                    <li>
                                                        <figure>
                                                            
                                                            <img src="http://via.placeholder.com/800x577" />
                                                            <figcaption>
                                                                <label>
                                                                  <div class="checker"><span><input type="checkbox"></span></div>選擇
                                                                </label>
                                                            </figcaption>
                                                            
                                                        </figure>
                                                    </li>
                                                    <li>
                                                        
                                                        <figure>
                                                            <img src="http://via.placeholder.com/800x577" alt="img01"/>
                                                            <figcaption>
                                                                <label>
                                                                  <div class="checker"><span><input type="checkbox"></span></div>選擇
                                                                </label>
                                                            </figcaption>
                                                        </figure>
                                                    </li>
                                                    <li>
                                                        <figure>
                                                            <img src="http://via.placeholder.com/800x577" alt="img01"/>
                                                            <figcaption>
                                                                <label>
                                                                  <div class="checker"><span><input type="checkbox"></span></div>選擇
                                                                </label>
                                                            </figcaption>
                                                        </figure>
                                                    </li>
                                                    <li>
                                                        <figure>
                                                            <img src="http://via.placeholder.com/800x577" alt="img01"/>
                                                            <figcaption>
                                                                <label>
                                                                  <div class="checker"><span><input type="checkbox"></span></div>選擇
                                                                </label>
                                                            </figcaption>
                                                        </figure>
                                                    </li>
                                                    <li>
                                                        <figure>
                                                            <img src="http://via.placeholder.com/800x577" alt="img01"/>
                                                            <figcaption>
                                                                <label>
                                                                  <div class="checker"><span><input type="checkbox"></span></div>選擇
                                                                </label>
                                                            </figcaption>
                                                        </figure>
                                                    </li>
                                                    <li>
                                                        <figure>
                                                            <img src="http://via.placeholder.com/800x577" alt="img01"/>
                                                            <figcaption>
                                                                <label>
                                                                  <div class="checker"><span><input type="checkbox"></span></div>選擇
                                                                </label>
                                                            </figcaption>
                                                        </figure>
                                                    </li>
                                                    <li>
                                                        <figure>
                                                            <img src="http://via.placeholder.com/800x577" alt="img01"/>
                                                            <figcaption>
                                                                <label>
                                                                  <div class="checker"><span><input type="checkbox"></span></div>選擇
                                                                </label>
                                                            </figcaption>
                                                        </figure>
                                                    </li>
                                                </ul>
                                            </section>
                                        </div>
                                    </div>
                                    <hr>
                                    <button class="btn btn-info btn-block">儲存</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading clearfix">
                                        <h4 class="panel-title">設定</h4>
                                    </div>
                                    <form action="send_json.php?house=<?php echo $key;  ?>"method="post">
                                        <div class="panel-body">
                                        
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1" id="temp">溫室溫度</label>
                                                <input type="text" class="form-control" id="atemperature" name="atemperature" placeholder="28">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1" id="temp">溫室濕度</label>
                                                <input type="text" class="form-control" id="ahumidity" name="ahumidity" placeholder="28">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1" id="temp">土壤濕度</label>
                                                <input type="text" class="form-control" id="shumidity" name="shumidity" placeholder="28">
                                            </div>
                                            <!--
                                            
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1">馬達</label>
                                                <select class="form-control" name="water" id="water">
                                                    <option value="close">關</option>
                                                    <option value="open">澆水</option>
                                                </select>
                                            </div>
                                            -->
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1">植物燈</label>
                                                <select class="form-control" name="light_status" id="light_status">
                                                    <option value="close">關</option>
                                                    <option value="open">開</option>
                                                </select>
                                            </div>
                                            <!--
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1">風扇</label>
                                                <select class="form-control" name="water" id="water">
                                                    <option value="close">關</option>
                                                    <option value="open">開</option>
                                                </select>
                                            </div>--><br/>
                                            <span id="tishi"></span>
                                        </div>
                                        <hr>
                                        <button class="btn btn-info btn-block">設定</button>
                                    </form>
                                </div>
                            </div>
                            

                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
        
        
        <!-- Javascripts -->
        <script src="../../assets/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../../assets/plugins/uniform/js/jquery.uniform.standalone.js"></script>
        <script src="../../assets/plugins/switchery/switchery.min.js"></script>
        <script src="../../assets/plugins/gridgallery/js/imagesloaded.pkgd.min.js"></script>
        <script src="../../assets/plugins/gridgallery/js/masonry.pkgd.min.js"></script>
        <script src="../../assets/plugins/gridgallery/js/classie.js"></script>
        <script src="../../assets/plugins/gridgallery/js/cbpgridgallery.js"></script>
        <script src="../../assets/js/space.min.js"></script>
        <script src="../../assets/js/pages/gallery.js"></script>
    </body>
</html>