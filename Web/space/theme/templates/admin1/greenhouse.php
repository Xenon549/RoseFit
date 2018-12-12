<?php session_start(); 
//get username
include("mysql_connect.inc.php");
date_default_timezone_set('Asia/Taipei');
$email = $_SESSION['username'];
$sql = "SELECT * FROM user where user_email = '$email'";
$result = mysqli_query($link , $sql);
$rowname = mysqli_fetch_array($result);

$sql2 = "SELECT * FROM greenhouse_user1 where user_id = '$rowname[0]'";
$result = mysqli_query($link , $sql2);
$greenhouse = mysqli_fetch_array($result);

$tem = array();
$hum = array();
$datatime = array();
$array_labels = array();

$greenhouse_name = $greenhouse[4];
$greenhouse_plantname = $greenhouse[5];
if($greenhouse != null){
    $greenhouse_id = "SELECT DISTINCT * FROM greenhouse_data where gh_id = '$greenhouse[0]' ORDER BY data_id DESC";
    $rowgreen = array();
    $result = mysqli_query($link , $greenhouse_id);
    $i = 0;
    $memory = 0;
    while(($rowgreen = mysqli_fetch_array($result)) && $i<12){
        $i++;
        array_push($tem , $rowgreen[1]);
        array_push($hum , $rowgreen[2]);
        array_push($datatime , $rowgreen[6]);
    }

}

//drawing canvas
require 'class/ChartJS.php';
require 'class/ChartJS_Line.php';
require 'class/ChartJS_Bar.php';
require 'class/ChartJS_Radar.php';
require 'class/ChartJS_PolarArea.php';
require 'class/ChartJS_Pie.php';
require 'class/ChartJS_Doughnut.php';

ChartJS::addDefaultColor(array('fill' => '#f2b21a', 'stroke' => '#e5801d', 'point' => '#e5801d', 'pointStroke' => '#e5801d'));
ChartJS::addDefaultColor(array('fill' => 'rgba(28,116,190,.8)', 'stroke' => '#1c74be', 'point' => '#1c74be', 'pointStroke' => '#1c74be'));
ChartJS::addDefaultColor(array('fill' => 'rgba(212,41,31,.7)', 'stroke' => '#d4291f', 'point' => '#d4291f', 'pointStroke' => '#d4291f'));
ChartJS::addDefaultColor(array('fill' => '#dc693c', 'stroke' => '#ff0000', 'point' => '#ff0000', 'pointStroke' => '#ff0000'));
ChartJS::addDefaultColor(array('fill' => 'rgba(46,204,113,.8)', 'stroke' => '#2ecc71', 'point' => '#2ecc71', 'pointStroke' => '#2ecc71'));

 $array_values = array(array(0 , 0 , 0 , 0 , 0 , 0 , 0),array(0 , 0 , 0 , 0 , 0 , 0 , 0));

$Line = new ChartJS_Line('example_line', 1000, 1000);
$Line->addLine($tem);
$Line->addLabels($datatime);

$Line1 = new ChartJS_Line('example_line', 500, 500);
$Line1->addLine($hum);
$Line1->addLabels($datatime);

$Bar = new ChartJS_Bar('example_bar', 500, 500);
$Bar->addBars($array_values[0]);
$Bar->addBars($array_values[1]);
$Bar->addLabels($array_labels);

$Radar = new ChartJS_Radar('example_radar', 500, 500);
$Radar->addRadar($array_values[0]);
$Radar->addRadar($array_values[1]);
$Radar->addLabels($array_labels);

$PolarArea = new ChartJS_PolarArea('example_polararea', 500, 500);
$PolarArea->addSegment(65);
$PolarArea->addSegment(59);
$PolarArea->addSegment(80);
$PolarArea->addSegment(81);
$PolarArea->addSegment(56);
$PolarArea->addSegment(55);
$PolarArea->addSegment(40);
$PolarArea->addLabels($array_labels);

$Pie = new ChartJS_Pie('example_pie', 500, 500);
$Pie->addPart(65);
$Pie->addPart(59);
$Pie->addPart(80);
$Pie->addPart(81);
$Pie->addLabels($array_labels);

$Doughnut = new ChartJS_Doughnut('example_doughnut', 500, 500);
$Doughnut->addPart(65);
$Doughnut->addPart(59);
$Doughnut->addPart(80);
$Doughnut->addPart(81);
$Doughnut->addLabels($array_labels);
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
        <link rel="shortcut icon" href="../../assets/images/rosefit.png">
        <!-- Title -->
        <title><?php echo $rowname[1]; ?>的會員專區</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../../assets/plugins/icomoon/style.css" rel="stylesheet">
        <link href="../../assets/plugins/uniform/css/default.css" rel="stylesheet"/>
        <link href="../../assets/plugins/switchery/switchery.min.css" rel="stylesheet"/>
        <link href="../../assets/plugins/nvd3/nv.d3.min.css" rel="stylesheet">  
      
        <!-- Theme Styles -->
        <link href="../../assets/css/space.min.css" rel="stylesheet">
        <link href="../../assets/css/custom.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            body{
                background-color: #faebec!important;
            }
            .page-inner{
                background: #faebec!important;
            }
        </style>
    </head>
    <body>
        
        <!-- Page Container -->
        <div class="page-container container">
            <!-- Page Sidebar -->
            <div class="page-sidebar">
                <a class="logo-box" href="http://120.110.113.70/rosefit_greenhouse/index/index.php">
                    <span style="color: green;"><img src="../../assets/images/rosefit2.png"></span>
                    <!--<i class="icon-radio_button_unchecked" id="fixed-sidebar-toggle-button"></i>-->
                    <i class="icon-close" id="sidebar-toggle-button-close" class="icon-radio_button_unchecked"></i>
                </a>
                <div class="page-sidebar-inner">
                    <div class="page-sidebar-menu">
                        <ul class="accordion-menu">
                            <li>
                                <a href="index.php">
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <!--
                            <li>
                                <a href="email.html">
                                    <i class="menu-icon icon-inbox"></i><span>Email</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon icon-flash_on"></i><span>UI Kits</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="ui-alerts.html">Alerts</a></li>
                                    <li><a href="ui-buttons.html">Buttons</a></li>
                                    <li><a href="ui-icons.html">Icons</a></li>
                                    <li><a href="ui-typography.html">Typography</a></li>
                                    <li><a href="ui-notifications.html">Notifications</a></li>
                                    <li><a href="ui-modals.html">Modals</a></li>
                                    <li><a href="ui-progress.html">Progress Bars</a></li>
                                    <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
                                    <li><a href="ui-tree-view.html">Tree View</a></li>
                                    <li><a href="ui-nestable.html">Nestable</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon icon-layers"></i><span>Layouts</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="layout-blank.html">Blank Page</a></li>
                                    <li><a href="layout-boxed.html">Boxed Layout</a></li>
                                    <li><a href="layout-collapsed-sidebar.html">Collapsed Sidebar</a></li>
                                    <li><a href="layout-fixed-header.html">Fixed Header</a></li>
                                    <li><a href="layout-fixed-sidebar.html">Fixed Sidebar</a></li>
                                    <li><a href="layout-fixed-sidebar-header.html">Fixed Sidebar &amp; Header</a></li>
                                </ul>
                            </li>
                            -->
                            
                            <!--
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon icon-code"></i><span>Forms</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="form-elements.html">Elements</a></li>
                                    <li><a href="form-wizard.html">Form Wizard</a></li>
                                    <li><a href="form-file-upload.html">File Upload</a></li>
                                    <li><a href="form-image-crop.html">Image Crop</a></li>
                                    <li><a href="form-image-zoom.html">Image Zoom</a></li>
                                    <li><a href="form-x-editable.html">X-editable</a></li>
                                </ul>
                            </li>
                            -->
                            <!--
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon icon-format_list_bulleted"></i><span>Tables</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="table-static.html">Static</a></li>
                                    <li><a href="table-responsive.html">Responsive</a></li>
                                    <li><a href="table-data.html">Data Tables</a></li>
                                </ul>
                            </li>
                            -->
                            <li class="active-page">
                                <a href="greenhouse.php">
                                    <span>Green House</span>
                                </a>
                            </li>
                            <li>
                                <a href="setup.php">
                                    <span>Setup</span>
                                </a>
                            </li>
                            <li>
                                <a href="http://120.110.113.70/rosefit_greenhouse/social_platform/index.php">
                                    <span>Social Platform</span>
                                </a>
                            </li>
                            <!--
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon icon-my_location"></i><span>Maps</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="maps-google.html">Google</a></li>
                                    <li><a href="maps-vector.html">Vector</a></li>
                                </ul>
                            </li>
                            -->
                            <!--
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon icon-star"></i><span>Extra</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="invoice.html">Invoice</a></li>
                                    <li><a href="404.html">404 Page</a></li>
                                    <li><a href="500.html">500 Page</a></li>
                                    <li><a href="profile.html">Profile</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <li><a href="lockscreen.html">Lockscreen</a></li>
                                    <li><a href="todo.html">Todo</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                    <li><a href="pricing-tables.html">Pricing Tables</a></li>
                                    <li><a href="timeline.html">Timeline</a></li>
                                </ul>
                            </li>
                            -->
                            <!--
                            <li class="menu-divider"></li>
                            <li>
                                <a href="index.html">
                                    <i class="menu-icon icon-help_outline"></i><span>Documentation</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html">
                                    <i class="menu-icon icon-public"></i><span>Changelog</span><span class="label label-danger">1.0</span>
                                </a>
                            </li>
                            -->
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
                                    <a class="logo-box" href="greenhouse.php"><span>Green House</span></a>
                                </div>
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
                    <!--
                    <div class="page-title">
                        <h3 class="breadcrumb-header">Chart.js</h3>
                    </div>
                    
                    <div class="alert alert-default" role="alert">
                        Simple, clean and engaging charts for designers and developers.
                    </div>
                    -->
                    <?php 
                    if($greenhouse != null){
                        include("chart.php");
                    }
                    else{
                        include("chart2.php");
                    }
                    ?>
                <div class="page-right-sidebar" id="main-right-sidebar">
                    <div class="page-right-sidebar-inner">
                        <div class="right-sidebar-top">
                            <div class="right-sidebar-tabs">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active" id="chat-tab"><a href="#chat" aria-controls="chat" role="tab" data-toggle="tab">chat</a></li>
                                    <li role="presentation" id="settings-tab"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">settings</a></li>
                                </ul>
                            </div>
                            <a href="javascript:void(0)" class="right-sidebar-toggle right-sidebar-close" data-sidebar-id="main-right-sidebar"><i class="icon-close"></i></a>
                        </div>
                        <div class="right-sidebar-content">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="chat">
                                    <div class="chat-list">
                                        <span class="chat-title">Recent</span>
                                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item unread" data-sidebar-id="chat-right-sidebar">
                                            <div class="user-avatar">
                                                <img src="http://via.placeholder.com/40x40" alt="">
                                            </div>
                                            <div class="chat-info">
                                                <span class="chat-author">David</span>
                                                <span class="chat-text">where u at?</span>
                                                <span class="chat-time">08:50</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item unread active-user" data-sidebar-id="chat-right-sidebar">
                                            <div class="user-avatar">
                                                <img src="http://via.placeholder.com/40x40" alt="">
                                            </div>
                                            <div class="chat-info">
                                                <span class="chat-author">Daisy</span>
                                                <span class="chat-text">Daisy sent a photo.</span>
                                                <span class="chat-time">11:34</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="chat-list">
                                        <span class="chat-title">Older</span>
                                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item" data-sidebar-id="chat-right-sidebar">
                                            <div class="user-avatar">
                                                <img src="http://via.placeholder.com/40x40" alt="">
                                            </div>
                                            <div class="chat-info">
                                                <span class="chat-author">Tom</span>
                                                <span class="chat-text">You: ok</span>
                                                <span class="chat-time">2d</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item active-user" data-sidebar-id="chat-right-sidebar">
                                            <div class="user-avatar">
                                                <img src="http://via.placeholder.com/40x40" alt="">
                                            </div>
                                            <div class="chat-info">
                                                <span class="chat-author">Anna</span>
                                                <span class="chat-text">asdasdasd</span>
                                                <span class="chat-time">4d</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item active-user" data-sidebar-id="chat-right-sidebar">
                                            <div class="user-avatar">
                                                <img src="http://via.placeholder.com/40x40" alt="">
                                            </div>
                                            <div class="chat-info">
                                                <span class="chat-author">Liza</span>
                                                <span class="chat-text">asdasdasd</span>
                                                <span class="chat-time">&nbsp;</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="load-more-messages"  data-toggle="tooltip" data-placement="bottom" title="Load More">&bull;&bull;&bull;</a>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="settings">
                                    <div class="right-sidebar-settings">
                                        <span class="settings-title">General Settings</span>
                                        <ul class="sidebar-setting-list list-unstyled">
                                            <li>
                                                <span class="settings-option">Notifications</span><input type="checkbox" class="js-switch" checked />
                                            </li>
                                            <li>
                                                <span class="settings-option">Activity log</span><input type="checkbox" class="js-switch" checked />
                                            </li>
                                            <li>
                                                <span class="settings-option">Automatic updates</span><input type="checkbox" class="js-switch" />
                                            </li>
                                            <li>
                                                <span class="settings-option">Allow backups</span><input type="checkbox" class="js-switch" />
                                            </li>
                                        </ul>
                                        <span class="settings-title">Account Settings</span>
                                        <ul class="sidebar-setting-list list-unstyled">
                                            <li>
                                                <span class="settings-option">Chat</span><input type="checkbox" class="js-switch" checked />
                                            </li>
                                            <li>
                                                <span class="settings-option">Incognito mode</span><input type="checkbox" class="js-switch" />
                                            </li>
                                            <li>
                                                <span class="settings-option">Public profile</span><input type="checkbox" class="js-switch" />
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-right-sidebar" id="chat-right-sidebar">
                    <div class="page-right-sidebar-inner">
                        <div class="right-sidebar-top">
                            <div class="chat-top-info">
                                <span class="chat-name">Noah</span>
                                <span class="chat-state">2h ago</span>
                            </div>
                            <a href="javascript:void(0)" class="right-sidebar-toggle chat-sidebar-close pull-right" data-sidebar-id="chat-right-sidebar"><i class="icon-keyboard_arrow_right"></i></a>
                        </div>
                        <div class="right-sidebar-content">
                            <div class="right-sidebar-chat slimscroll">
                                <div class="chat-bubbles">
                                <div class="chat-start-date">02/06/2017 5:58PM</div>
                                    <div class="chat-bubble them">
                                        <div class="chat-bubble-img-container">
                                            <img src="http://via.placeholder.com/38x38" alt="">
                                        </div>
                                        <div class="chat-bubble-text-container">
                                            <span class="chat-bubble-text">Hello</span>
                                        </div>
                                    </div>
                                    <div class="chat-bubble me">
                                        <div class="chat-bubble-text-container">
                                            <span class="chat-bubble-text">Hello!</span>
                                        </div>
                                    </div>
                                <div class="chat-start-date">03/06/2017 4:22AM</div>
                                    <div class="chat-bubble me">
                                        <div class="chat-bubble-text-container">
                                            <span class="chat-bubble-text">lorem</span>
                                        </div>
                                    </div>
                                    <div class="chat-bubble them">
                                        <div class="chat-bubble-img-container">
                                            <img src="http://via.placeholder.com/38x38" alt="">
                                        </div>
                                        <div class="chat-bubble-text-container">
                                            <span class="chat-bubble-text">ipsum dolor sit amet</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-write">
                                <form class="form-horizontal" action="javascript:void(0);">
                                    <input type="text" class="form-control" placeholder="Say something">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
        
        
        <!-- Javascripts -->
        <script src="../../assets/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../../assets/plugins/uniform/js/jquery.uniform.standalone.js"></script>
        <script src="../../assets/plugins/switchery/switchery.min.js"></script>
        <script src="../../assets/plugins/chartjs/chart.min.js"></script>
        <script src="../../assets/plugins/d3/d3.min.js"></script>
        <script src="../../assets/plugins/nvd3/nv.d3.min.js"></script>
        <script src="../../assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="../../assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="../../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="../../assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="../../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="../../assets/plugins/flot/jquery.flot.pie.min.js"></script>
        <script src="../../assets/js/space.min.js"></script>
        <script src="../../assets/js/pages/chart.js"></script>
    </body>
</html>