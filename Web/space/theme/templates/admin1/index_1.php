<?php session_start(); 
include("mysql_connect.inc.php");
$email = $_SESSION['username'];
$sql = "SELECT * FROM user where user_email = '$email'";
$result = mysqli_query($link , $sql);
$rowname = mysqli_fetch_array($result);

$greenhouse = "SELECT * FROM greenhouse_user1 where user_id = '$rowname[0]'";
$result = mysqli_query($link , $greenhouse);
$row = mysqli_fetch_array($result);

$greenhouse_id = "SELECT * FROM greenhouse_data where gh_id = '$row[0]' ORDER BY data_id DESC";
$result = mysqli_query($link , $greenhouse_id);
$rowgreen = mysqli_fetch_array($result);

$project = "SELECT * FROM project where user_id ='$rowname[0]' ORDER BY project_id DESC";
$result = mysqli_query($link , $project);

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
        
        <!-- Title -->
        <title><?php echo $rowname[1]; ?>的會員專區</title>
        <link rel="shortcut icon" href="../../assets/images/rosefit.png">
        
        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../../assets/plugins/icomoon/style.css" rel="stylesheet">
        <link href="../../assets/plugins/uniform/css/default.css" rel="stylesheet"/>
        <link href="../../assets/plugins/switchery/switchery.min.css" rel="stylesheet"/>
        <link href="../../assets/plugins/nvd3/nv.d3.min.css" rel="stylesheet">  
      
        <!-- Theme Styles -->
        <link href="../../assets/css/space.min.css?1" rel="stylesheet">
        <link href="../../assets/css/custom.css" rel="stylesheet">

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
            .btn-success {
                border-color: #0099aa!important;
                background-color: #0099aa!important;
                transition: all .2s ease-in-out;
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
                <div class="page-inner">
                    <div class="page-title">
                        <h3 class="breadcrumb-header" style="color: white;">管理專案</h3>
                    </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12"> 
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div class="row white">
                                        <div class="block">

                    <div class="col-xs-12 col-sm-6 col-md-4">
                            <ul class="pricing" >
                                <li>
                                    <h1>新增專案</h1>
                                </li>
                                <li style="text-align:left;">溫室名稱：ex.小花兒</li>
                                <li style="text-align:left;">植物名稱：ex.小寶貝</li>
                                <li style="text-align:left;">植物種類：ex.杜鵑</li>
                                
                                <li>
                                    <button type="button" class="btn btn-success btn-rounded"><a href="../../../../admin/admin/add_project.php" style="color: white !important;">新增</a></button>
                                </li>
                            </ul>
                    </div>
                    <?php
                    $i=0;
                    while(($rowproject = mysqli_fetch_array($result)) && $i<9){
                        $i++;

                    echo '<div class="col-xs-12 col-sm-6 col-md-4">
                            <ul class="pricing">';
                    echo        '<li>';
                    echo               '<h1>'.$rowproject[1].'專案</h1>';
                    echo        '</li>';
                    echo        '<li style="text-align:left;">溫室名稱：'.$rowproject[2].'</li>';
                    echo        '<li style="text-align:left;">植物名稱：'.$rowproject[3].'</li>';
                    echo        '<li style="text-align:left;">植物種類：'.$rowproject[4].'</li>';
                    echo        '<li>';
                    if($rowproject[8] == '1'){
                        echo            "<button type=\"button\" class=\"btn btn-success btn-rounded\"><a href=\"./index_1_1.php?house=".$rowproject[6]."\"style=\"color: white !important;\">設定</a></button>";
                    }
                    else {
                        echo            "<button type=\"button\" class=\"btn btn-success btn-rounded\"><a href=\"./index_1_2.php?house=".$rowproject[6]."\"style=\"color: white !important;\">設定</a></button>";
                    }
                    echo        '</li>';
                    echo    '</ul>';
                    echo '</div>';

                    }
                    ?>
                </div><!-- /block -->
            </div><!-- /row -->
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
                
                </div><!-- /Page Inner -->
                
                
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
        
        
        <!-- Javascripts -->
        <script src="../../assets/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../../assets/plugins/uniform/js/jquery.uniform.standalone.js"></script>
        <script src="../../assets/plugins/switchery/switchery.min.js"></script>
        <script src="../../assets/plugins/d3/d3.min.js"></script>
        <script src="../../assets/plugins/nvd3/nv.d3.min.js"></script>
        <script src="../../assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="../../assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="../../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="../../assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="../../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="../../assets/plugins/flot/jquery.flot.pie.min.js"></script>
        <script src="../../assets/plugins/chartjs/chart.min.js"></script>
        <script src="../../assets/js/space.min.js"></script>
        <script src="../../assets/js/pages/dashboard.js"></script>
    </body>
</html>