<?php session_start(); 
include("mysql_connect.inc.php");
$email = $_SESSION['username'];
$sql = "SELECT * FROM user where user_email = '$email'";
$result = mysqli_query($link , $sql);
$rowname = mysqli_fetch_array($result);

$sql2 = "SELECT * FROM greenhouse_user1 where user_id = '$rowname[0]'";
$result = mysqli_query($link , $sql2);
$greenhouse = mysqli_fetch_array($result);

$greenhouse_name = $greenhouse[4];
$greenhouse_plantname = $greenhouse[5];
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
        <link href="../../assets/plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css"/>
      
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
                background-color: #00aa55!important;
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
                            <li >
                                <a href="index_1.php">
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="album.php">
                                    <span>相簿</span>
                                </a>
                            </li>
                            <li class="active-page">
                                <a href="setup.php">
                                    <span>個人資料</span>
                                </a>
                            </li>
                            <li>
                                <a href="http://120.110.113.70/rosefit_greenhouse/social_platform/plan_sell.php">
                                    <span>商店</span>
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
                                    <a class="logo-box" href="setup.php"><span>Setup</span></a>
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
                    <div class="page-title">
                        <h3 class="breadcrumb-header">Setup</h3>
                    </div>
                <div id="main-wrapper">
                    <div class="row">
                        <!--
                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">設定溫室名稱與種植植物</h4>
                                </div>
                                <div class="panel-body">
                                    <form action="setting.php" method="post">
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">溫室名稱</label>
                                        <input type="text" class="form-control" id="greenhousename" name="greenhousename" value=<?php //echo $greenhouse_name;?>>
                                      </div>
                                      
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">花兒名稱</label>
                                        <input type="text" class="form-control" id="flowername" name="flowername" value=<?php //echo $greenhouse_plantname;?>>
                                      </div>
                                      
                                      
                                        
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">花兒種類</label>
                                            <select class="form-control" name="tag" id="tag">
                                            <option value="薔薇屬">薔薇屬</option>
                                            <option value="水瓶座">水瓶座</option>
                                            <option value="其他">其他</option>
                                          </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        -->
                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">修改會員密碼</h4>
                                </div>
                                <div class="panel-body">
                                    <form action="page_finish_updata.php" method="post">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" id="login-password">Old Password</label>
                                            <input type="password" class="form-control" id="inputPassword" name="inputPassword-old" placeholder="old password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" id="login-password">New Password</label>
                                            <input type="password" class="form-control" id="inputPassword" name="inputPassword-new" placeholder="new password">
                                        </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail1">New Password</label>
                                            <input type="password" class="form-control" id="inputPassword" name="inputPassword-new2" placeholder="verify new password">
                                        </div><br/>
                                        <span id="tishi"></span>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">修改</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">更改大頭照</h4>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" action="upload.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="file" class="form-control" style="margin-top:10px;margin-bottom:-14px; background-color: #63cb89!important; border-color: #63cb89!important;" value="choose" name="fileToUpload" id="fileToUpload">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success" style="margin-top:10px;margin-bottom:-14px;">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">金鑰設定</h4>
                                </div>
                                <div class="panel-body">
                                    <form action="binding_greenhouse.php" method="post">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" id="login-password">請輸入您溫室上的金鑰，將會綁定溫室</label>
                                            <input type="text" class="form-control" id="key" name="key" placeholder="please enter the keywords">
                                        </div>
                                        <span id="tishi"></span>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">設定</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        -->
                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">登出</h4>
                                </div>
                                <div class="panel-body">
                                    <form action="http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/logout.php" method="">
                                        <span id="tishi"></span>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" style="background-color: #ec5e69 !important; border-color: #ec5e69 !important;">Log Out</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-md-12">
                            <div class="panel panel-white">
                                
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Inline Form</h4>
                                </div>
                                <div class="panel-body">
                                    <form class="form-inline">
                                      <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail3">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                                      </div>
                                      <div class="form-group">
                                        <label class="sr-only" for="exampleInputPassword3">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                                      </div>
                                      <div class="checkbox">
                                        <label>
                                          <input type="checkbox"> Remember me
                                        </label>
                                      </div>
                                      <button type="submit" class="btn btn-danger">Sign in</button>
                                    </form>
                                </div>
                            </div>-->
                            <!--
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Form Elements</h4>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Default</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-Default">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-help-block" class="col-sm-2 control-label">Help Block</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-help-block">
                                                <p class="help-block">Example block-level help text here.</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-placeholder" class="col-sm-2 control-label">Placeholder</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-placeholder" placeholder="placeholder">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-rounded" class="col-sm-2 control-label">Rounded Input</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control input-rounded" id="input-rounded">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-disabled" class="col-sm-2 control-label">Disabled Input</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-disabled" placeholder="You can't type here..." disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-readonly" class="col-sm-2 control-label">ReadOnly Input</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-readonly" placeholder="This is readonly input..." readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Static Control</label>
                                            <div class="col-sm-10">
                                                <p class="form-control-static">email@example.com</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-password" class="col-sm-2 control-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password" class="password form-control" id="input-password" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="input-success" class="col-sm-2 control-label">Input with success</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-success">
                                            </div>
                                        </div>
                                        <div class="form-group has-warning">
                                            <label for="input-warning" class="col-sm-2 control-label">Input with warning</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-warning">
                                            </div>
                                        </div>
                                        <div class="form-group has-error">
                                            <label for="input-error" class="col-sm-2 control-label">Input with error</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-error">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Checkboxes</label>
                                            <div class="col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox">Unchecked
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" checked>Checked
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" checked disabled>Checked &amp; Disabled
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" disabled>Disabled
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Select</label>
                                            <div class="col-sm-10">
                                                <select style="margin-bottom:15px;" class="form-control">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                                <select multiple class="form-control">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Control sizing</label>
                                            <div class="col-sm-10">
                                                <input style="margin-bottom:15px;" class="form-control input-lg" type="text" placeholder=".input-lg">
                                                <input style="margin-bottom:15px;" class="form-control" type="text" placeholder="Default input">
                                                <input class="form-control input-sm" type="text" placeholder=".input-sm">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Column sizing</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control" placeholder=".col-md-2">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control" placeholder=".col-md-3">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder=".col-md-4">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Input groups</label>
                                            <div class="col-sm-10">
                                                <div style="margin-bottom:15px;" class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1">@</span>
                                                    <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                                                </div>
                                                <div style="margin-bottom:15px;" class="input-group">
                                                    <input type="text" class="form-control" aria-describedby="basic-addon2">
                                                    <span class="input-group-addon" id="basic-addon2">.00</span>
                                                </div>
                                                <div style="margin-bottom:15px;" class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="checkbox" aria-label="...">
                                                    </span>
                                                    <input type="text" class="form-control" aria-label="...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Button addons</label>
                                            <div class="col-sm-10">
                                                <div style="margin-bottom:15px;" class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button">Go!</button>
                                                    </span>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div style="margin-bottom:15px;" class="input-group">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-success" type="button">Go!</button>
                                                    </span>
                                                </div>
                                                <div style="margin-bottom:15px;" class="input-group">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="#">Action</a></li>
                                                            <li><a href="#">Another action</a></li>
                                                            <li><a href="#">Something else here</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#">Separated link</a></li>
                                                        </ul>
                                                    </div>
                                                    <input type="text" class="form-control" aria-label="...">
                                                </div>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" aria-label="...">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                            <li><a href="#">Action</a></li>
                                                            <li><a href="#">Another action</a></li>
                                                            <li><a href="#">Something else here</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#">Separated link</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Date Picker</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control date-picker">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Time Picker</label>
                                            <div class="col-sm-10">
                                                <div class="input-group input-append bootstrap-timepicker">
                                                    <input id="timepicker1" type="text" class="form-control">
                                                    <span class="input-group-addon add-on"><i class="fa fa-clock-o"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Color Picker</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="cp1" value="#d43e3e">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">RGBA</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="cp2" value="rgba(68,89,204,1)" data-color-format="rgba">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Tags Input</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Wysiwyg</label>
                                            <div class="col-sm-10">
                                                <div class="summernote"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>-->
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <p></p>
                </div>
                </div><!-- /Page Inner -->
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
        <script src="../../assets/plugins/summernote-master/summernote.min.js"></script>
        <script src="../../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="../../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
        <script src="../../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
        <script src="../../assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        <script src="../../assets/js/space.min.js"></script>
        <script src="../../assets/js/pages/form-elements.js"></script>
    </body>
</html>