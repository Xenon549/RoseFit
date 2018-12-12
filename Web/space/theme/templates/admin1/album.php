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
                background-color: #ffe889!important;
            }
            .page-inner {
                position: relative;
                min-height: calc(100% - 81px);
                padding: 5px 40px 42px 30px;
                background: #ffe889 !important;
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
                                <a href="index_1.php">
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            
                            <li class="active-page">
                                <a href="album.php">
                                    <span>相簿</span>
                                </a>
                            </li>
                            <li >
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
                                    <a class="logo-box" href="set.php"><span>Set</span></a>
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
                        <h3 class="breadcrumb-header">相簿</h3>
                    </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div id="grid-gallery" class="grid-gallery">
                                        <section class="grid-wrap">
                                            <ul class="grid">
                                                <li class="grid-sizer"></li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/800x577" alt="img01"/>
                                                        <figcaption><h3>Letterpress asymmetrical</h3><p>Chillwave hoodie ea gentrify aute sriracha consequat.</p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/800x413" alt="img02"/>
                                                        <figcaption><h3>Vice velit chia</h3><p>Laborum tattooed iPhone, Schlitz irure nulla Tonx retro 90's chia cardigan quis asymmetrical paleo. </p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/674x800" alt="img03"/>
                                                        <figcaption><h3>Brunch semiotics</h3><p>Ex disrupt cray yr, butcher pour-over magna umami kitsch before they sold out commodo.</p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/800x533" alt="img04"/>
                                                        <figcaption><h3>Chillwave nihil occupy</h3><p>In post-ironic gluten-free deserunt, PBR&amp;B non pork belly cupidatat polaroid. </p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/533x800" alt="img05"/>
                                                        <figcaption><h3>Kale chips lomo biodiesel</h3><p>Pariatur food truck street art consequat sustainable, et kogi beard qui paleo. </p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/800x533" alt="img06"/>
                                                        <figcaption><h3>Exercitation occaecat</h3><p>Street chillwave hoodie ea gentrify.</p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/800x533" alt="img01"/>
                                                        <figcaption><h3>Selfies viral four</h3><p>Raw denim duis Tonx Shoreditch labore swag artisan High Life cred, stumptown Schlitz quinoa flexitarian mollit fanny pack.</p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/900x555" alt="img02"/>
                                                        <figcaption><h3>Photo booth skateboard</h3><p>Vinyl squid ex High Life. Paleo Neutra nulla master cleanse, Helvetica et enim nesciunt esse.</p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/900x600" alt="img03"/>
                                                        <figcaption><h3>Ex fashion axe</h3><p>Qui nesciunt et, in chia cliche irure. Eu YOLO nihil mollit twee locavore, tempor keytar asymmetrical irure aute sriracha consequat.</p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/900x541" alt="img04"/>
                                                        <figcaption><h3>Thundercats next level</h3><p>Portland nulla butcher ea XOXO, consequat Bushwick Pinterest elit twee pickled direct trade vero. </p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/900x600" alt="img05"/>
                                                        <figcaption><h3>Bushwick selvage synth</h3><p>Bicycle rights flannel Shoreditch, art party laboris Bushwick sriracha authentic chambray hella umami sed distillery master cleanse.</p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/900x600" alt="img01"/>
                                                        <figcaption><h3>Bottle wayfarers locavore</h3><p>Once there was a little asparagus, he was green and lonely.</p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/900x600" alt="img01"/>
                                                        <figcaption><h3>Letterpress asymmetrical</h3><p>Chillwave hoodie ea gentrify aute sriracha consequat.</p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/900x600" alt="img02"/>
                                                        <figcaption><h3>Vice velit chia</h3><p>Laborum tattooed iPhone, Schlitz irure nulla Tonx retro 90's chia cardigan quis asymmetrical paleo. </p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/900x600" alt="img03"/>
                                                        <figcaption><h3>Brunch semiotics</h3><p>Ex disrupt cray yr, butcher pour-over magna umami kitsch before they sold out commodo.</p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/900x600" alt="img04"/>
                                                        <figcaption><h3>Chillwave nihil occupy</h3><p>In post-ironic gluten-free deserunt, PBR&amp;B non pork belly cupidatat polaroid. </p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/900x541" alt="img05"/>
                                                        <figcaption><h3>Kale chips lomo biodiesel</h3><p>Pariatur food truck street art consequat sustainable, et kogi beard qui paleo. </p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/900x490" alt="img06"/>
                                                        <figcaption><h3>Exercitation occaecat</h3><p>Street chillwave hoodie ea gentrify.</p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/900x600" alt="img01"/>
                                                        <figcaption><h3>Selfies viral four</h3><p>Raw denim duis Tonx Shoreditch labore swag artisan High Life cred, stumptown Schlitz quinoa flexitarian mollit fanny pack.</p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/900x600" alt="img02"/>
                                                        <figcaption><h3>Photo booth skateboard</h3><p>Vinyl squid ex High Life. Paleo Neutra nulla master cleanse, Helvetica et enim nesciunt esse.</p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/900x600" alt="img03"/>
                                                        <figcaption><h3>Ex fashion axe</h3><p>Qui nesciunt et, in chia cliche irure. Eu YOLO nihil mollit twee locavore, tempor keytar asymmetrical irure aute sriracha consequat.</p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/900x600" alt="img04"/>
                                                        <figcaption><h3>Thundercats next level</h3><p>Portland nulla butcher ea XOXO, consequat Bushwick Pinterest elit twee pickled direct trade vero. </p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/900x600" alt="img05"/>
                                                        <figcaption><h3>Bushwick selvage synth</h3><p>Bicycle rights flannel Shoreditch, art party laboris Bushwick sriracha authentic chambray hella umami sed distillery master cleanse.</p></figcaption>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <img src="http://via.placeholder.com/900x600" alt="img01"/>
                                                        <figcaption><h3>Bottle wayfarers locavore</h3><p>Once there was a little asparagus, he was green and lonely.</p></figcaption>
                                                    </figure>
                                                </li>
                                            </ul>
                                        </section>
                                        <section class="slideshow">
                                            <ul>
                                                <li>
                                                    <figure>
                                                        <figcaption>
                                                            <h3>Letterpress asymmetrical</h3>
                                                            <p>Kale chips lomo biodiesel stumptown Godard Tumblr, mustache sriracha tattooed cray aute slow-carb placeat delectus. Letterpress asymmetrical fanny pack art party est pour-over skateboard anim quis, ullamco craft beer.</p>
                                                        </figcaption>
                                                        <img src="http://via.placeholder.com/800x577" alt="img01"/>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <figcaption>
                                                            <h3>Vice velit chia</h3>
                                                            <p>Chillwave Echo Park Etsy organic Cosby sweater seitan authentic pour-over. Occupy wolf selvage bespoke tattooed, cred sustainable Odd Future hashtag butcher.</p>
                                                        </figcaption>
                                                        <img src="http://via.placeholder.com/800x413" alt="img02"/>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <figcaption>
                                                            <h3>Brunch semiotics</h3>
                                                            <p>IPhone PBR polaroid before they sold out meh you probably haven't heard of them leggings tattooed tote bag, butcher paleo next level single-origin coffee photo booth.</p>
                                                        </figcaption>
                                                        <img src="http://via.placeholder.com/674x800" alt="img03"/>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <figcaption>
                                                            <h3>Chillwave nihil occupy</h3>
                                                            <p>Vice cliche locavore mumblecore vegan wayfarers asymmetrical letterpress hoodie mustache. Shabby chic lomo polaroid, scenester 8-bit Portland Pitchfork VHS tote bag.</p>
                                                        </figcaption>
                                                        <img src="http://via.placeholder.com/800x533" alt="img04"/>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <figcaption>
                                                            <h3>Kale chips lomo biodiesel</h3>
                                                            <p>Chambray Schlitz pug YOLO, PBR Tumblr semiotics. Flexitarian YOLO ennui Blue Bottle, forage dreamcatcher chillwave put a bird on it craft beer Etsy.</p>
                                                        </figcaption>
                                                        <img src="http://via.placeholder.com/533x800" alt="img05"/>
                                                    </figure>
                                                </li>
                                                
                                                <li>
                                                    <figure>
                                                        <figcaption>
                                                            <h3>Exercitation occaecat</h3>
                                                            <p>Skateboard Truffaut bicycle rights seitan normcore. Culpa lo-fi ennui, Pinterest before they sold out Echo Park roof party sapiente aesthetic consequat Truffaut freegan voluptate. Kogi banh mi vero nihil, freegan gluten-free cliche. Forage Etsy laboris anim normcore, McSweeney's ex.</p>
                                                        </figcaption>
                                                        <img src="http://via.placeholder.com/900x490" alt="img06"/>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <figcaption>
                                                            <h3>Selfies viral four</h3>
                                                            <p>Viral roof party locavore flexitarian nihil fanny pack actually Odd Future anim commodo. Sunt yr aute, enim quis plaid sartorial duis leggings lo-fi gluten-free. Tote bag flexitarian pug stumptown, Cosby sweater try-hard ethnic scenester. Mumblecore +1 hoodie accusamus skateboard slow-carb, Thundercats Godard placeat craft beer meh enim trust fund.</p>
                                                        </figcaption>
                                                        <img src="http://via.placeholder.com/900x600" alt="img01"/>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <figcaption>
                                                            <h3>Photo booth skateboard</h3>
                                                            <p>Culpa pour-over cray nesciunt dreamcatcher. Meggings distillery cillum raw denim voluptate, single-origin coffee lo-fi ethical iPhone four loko nihil salvia. Biodiesel ea Intelligentsia quis deep v, American Apparel trust fund slow-carb synth semiotics quinoa Brooklyn pour-over nulla Godard.</p>
                                                        </figcaption>
                                                        <img src="http://via.placeholder.com/900x600" alt="img02"/>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <figcaption>
                                                            <h3>Ex fashion axe</h3>
                                                            <p>Bespoke irony tousled nihil flexitarian, salvia tempor nostrud Bushwick hashtag Austin ethnic disrupt. Beard Helvetica nihil, chia craft beer Wes Anderson keytar dolore. Irure incididunt flexitarian photo booth cillum, YOLO deserunt Brooklyn artisan. Brunch assumenda irony, Blue Bottle roof party DIY ullamco quis.</p>
                                                        </figcaption>
                                                        <img src="http://via.placeholder.com/900x600" alt="img03"/>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <figcaption>
                                                            <h3>Thundercats next level</h3>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.</p>
                                                        </figcaption>
                                                        <img src="http://via.placeholder.com/900x600" alt="img04"/>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <figcaption>
                                                            <h3>Bushwick selvage synth</h3>
                                                            <p>Ethical Truffaut tofu food truck cred cornhole. Irure umami Austin cornhole blog ethical. Aliqua yr Truffaut, adipisicing hashtag Shoreditch eiusmod tempor literally vinyl.</p>
                                                        </figcaption>
                                                        <img src="http://via.placeholder.com/900x600" alt="img05"/>
                                                    </figure>
                                                </li>
                                                <li>
                                                    <figure>
                                                        <figcaption>
                                                            <h3>Bottle wayfarers locavore</h3>
                                                            <p>Pork belly irony Shoreditch fashion axe DIY. Portland banjo irony, squid gentrify Austin fixie church-key magna. Marfa artisan Echo Park, McSweeney's banjo sunt keytar tofu. Brooklyn PBR single-origin coffee disrupt polaroid ut, gluten-free XOXO plaid magna.</p>
                                                        </figcaption>
                                                        <img src="http://via.placeholder.com/900x600" alt="img01"/>
                                                    </figure>
                                                </li>
                                            </ul>
                                            <nav>
                                                <span class="fa fa-angle-left nav-prev"></span>
                                                <span class="fa fa-angle-right nav-next"></span>
                                                <span class="icon-close nav-close"></span>
                                            </nav>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                        
                                    </div>
                                </div>
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
        <script src="../../assets/plugins/gridgallery/js/imagesloaded.pkgd.min.js"></script>
        <script src="../../assets/plugins/gridgallery/js/masonry.pkgd.min.js"></script>
        <script src="../../assets/plugins/gridgallery/js/classie.js"></script>
        <script src="../../assets/plugins/gridgallery/js/cbpgridgallery.js"></script>
        <script src="../../assets/js/space.min.js"></script>
        <script src="../../assets/js/pages/gallery.js"></script>
    </body>
</html>