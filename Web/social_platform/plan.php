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
<title>種植計畫</title>
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
    <div class="dark-wrapper">
      <div class="container inner">
        <div class="hero text-center">
          <p>Hello! Thanks for taking some time to visit Studio Juno's portfolio. <br class="hidden-xs hidden-sm" />
            Here you will be able to find our latest and favorite works.</p>
        </div>
        <!-- /.hero -->
        
        <div class="row text-center">
          <div class="col-sm-6 col-md-3">
            <div class="box"> <span class="icon icon-m"><i class="budicon-tree"></i></span>
              <h4>Nature</h4>
              <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio dapibus facilisis in egestas eget. </p>
            </div>
          </div>
          <!--/column -->
          <div class="col-sm-6 col-md-3">
            <div class="box"> <span class="icon icon-m"><i class="budicon-bulb"></i></span>
              <h4>Conceptual</h4>
              <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio dapibus facilisis in egestas eget. </p>
            </div>
          </div>
          <!--/column -->
          <div class="divide30 visible-sm"></div>
          <div class="col-sm-6 col-md-3">
            <div class="box"> <span class="icon icon-m"><i class="budicon-cocktail"></i></span>
              <h4>Food & Drink</h4>
              <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio dapibus facilisis in egestas eget. </p>
            </div>
          </div>
          <!--/column -->
          <div class="col-sm-6 col-md-3">
            <div class="box"> <span class="icon icon-m"><i class="budicon-image"></i></span>
              <h4>Portrait</h4>
              <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio dapibus facilisis in egestas eget. </p>
            </div>
          </div>
          <!--/column --> 
          
        </div>
        <!--/.row -->
        
        <div class="divide10"></div>
        <hr />
        <div class="row">
          <div class="col-sm-6">
            <h2 class="section-title">Our Featured Services</h2>
            <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Vestibulum id ligula porta felis.</p>
            <div class="feature"> <span class="icon icon-m"><i class="budicon-tree"></i></span>
              <h4>Nature</h4>
              <p>Nulla vitae libero pharetra augue. Etiam porta malesuada magna mollis euismod. Eget lacinia odio sem nec.</p>
            </div>
            <div class="feature"> <span class="icon icon-m"><i class="budicon-bulb"></i></span>
              <h4>Conceptual</h4>
              <p>Nulla vitae libero pharetra augue. Etiam porta malesuada magna mollis euismod. Eget lacinia odio sem nec.</p>
            </div>
            <div class="feature"> <span class="icon icon-m"><i class="budicon-cocktail"></i></span>
              <h4>Food & Drink</h4>
              <p>Nulla vitae libero pharetra augue. Etiam porta malesuada magna mollis euismod. Eget lacinia odio sem nec.</p>
            </div>
          </div>
          <div class="col-sm-6">
            <h2 class="section-title">Why Choose Us</h2>
            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="panel-title"><a data-toggle="collapse" class="panel-toggle active" data-parent="#accordion" href="#collapseOne">100% Responsive</a></div>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                  <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente. </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="panel-title"><a data-toggle="collapse" class="panel-toggle" data-parent="#accordion" href="#collapseTwo">Clean & Professional Design</a></div>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                  <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="panel-title"><a data-toggle="collapse" class="panel-toggle" data-parent="#accordion" href="#collapseThree">Pixel-Perfect Coding</a></div>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                  <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /column --> 
        </div>
        <!-- /.row -->
        
        <hr />
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <p class="lead text-center"><strong>Awesome</strong> deals with <strong>simple</strong> pricing model are here! We offer <strong>great</strong> prices, <strong>premium</strong> products and <strong>quality</strong> service for your business.</p>
          </div>
          <!-- /column --> 
        </div>
        <!-- /.row -->
        <div class="divide10"></div>
        <div class="row">
          <div class="col-sm-4">
            <div class="pricing panel">
              <div class="panel-heading">
                <div class="icon icon-m"><i class="budicon-author"></i></div>
                <h3 class="panel-title">Individuals <span class="panel-desc">Regular Websites</span></h3>
                <div class="price"> <span class="price-currency">$</span><span class="price-value">35</span> <span class="price-duration">year</span></div>
              </div>
              <!--/.panel-heading -->
              <div class="panel-body">
                <table class="table">
                  <tr>
                    <td><strong>1</strong> Project </td>
                  </tr>
                  <tr>
                    <td><strong>100K</strong> API Access </td>
                  </tr>
                  <tr>
                    <td><strong>100MB</strong> Storage </td>
                  </tr>
                  <tr>
                    <td> Custom <strong>Cloud</strong> Services </td>
                  </tr>
                  <tr>
                    <td> Weekly <strong>Reports</strong></td>
                  </tr>
                  <tr>
                    <td> 7/24 <strong>Support</strong></td>
                  </tr>
                </table>
              </div>
              <!--/.panel-body -->
              <div class="panel-footer"> <a href="#" class="btn btn-border dark" role="button">Choose Plan</a></div>
            </div>
            <!--/.pricing --> 
          </div>
          <!--/column -->
          <div class="col-sm-4">
            <div class="pricing panel">
              <div class="panel-heading">
                <div class="icon icon-m"><i class="budicon-authors"></i></div>
                <h3 class="panel-title">Small Team <span class="panel-desc">Small Businesses</span></h3>
                <div class="price"> <span class="price-currency">$</span><span class="price-value">45</span> <span class="price-duration">year</span></div>
              </div>
              <!--/.panel-heading -->
              <div class="panel-body">
                <table class="table">
                  <tr>
                    <td><strong>5</strong> Projects </td>
                  </tr>
                  <tr>
                    <td><strong>100K</strong> API Access </td>
                  </tr>
                  <tr>
                    <td><strong>200MB</strong> Storage </td>
                  </tr>
                  <tr>
                    <td> Custom <strong>Cloud</strong> Services </td>
                  </tr>
                  <tr>
                    <td> Weekly <strong>Reports</strong></td>
                  </tr>
                  <tr>
                    <td> 7/24 <strong>Support</strong></td>
                  </tr>
                </table>
              </div>
              <!--/.panel-body -->
              <div class="panel-footer"> <a href="#" class="btn btn-border dark" role="button">Choose Plan</a></div>
            </div>
            <!--/.pricing --> 
          </div>
          <!--/column -->
          <div class="col-sm-4">
            <div class="pricing panel">
              <div class="panel-heading">
                <div class="icon icon-m"><i class="budicon-home-1"></i></div>
                <h3 class="panel-title">Organization <span class="panel-desc">Large Businesses</span></h3>
                <div class="price"> <span class="price-currency">$</span><span class="price-value">55</span> <span class="price-duration">year</span></div>
              </div>
              <!--/.panel-heading -->
              <div class="panel-body">
                <table class="table">
                  <tr>
                    <td><strong>20</strong> Projects </td>
                  </tr>
                  <tr>
                    <td><strong>300K</strong> API Access </td>
                  </tr>
                  <tr>
                    <td><strong>500MB</strong> Storage </td>
                  </tr>
                  <tr>
                    <td> Custom <strong>Cloud</strong> Services </td>
                  </tr>
                  <tr>
                    <td> Weekly <strong>Reports</strong></td>
                  </tr>
                  <tr>
                    <td> 7/24 <strong>Support</strong></td>
                  </tr>
                </table>
              </div>
              <!--/.panel-body -->
              <div class="panel-footer"> <a href="#" class="btn btn-border dark" role="button">Choose Plan</a></div>
            </div>
            <!--/.pricing --> 
          </div>
          <!--/column --> 
        </div>
        <!--/.row -->
        
        <div class="divide10"></div>
        <hr />
        <div id="clients" class="cbp cbp-carousel">
          <div class="cbp-item"><img src="style/images/art/c1.png" alt="" /></div>
          <div class="cbp-item"><img src="style/images/art/c2.png" alt="" /></div>
          <div class="cbp-item"><img src="style/images/art/c3.png" alt="" /></div>
          <div class="cbp-item"><img src="style/images/art/c4.png" alt="" /></div>
          <div class="cbp-item"><img src="style/images/art/c5.png" alt="" /></div>
          <div class="cbp-item"><img src="style/images/art/c6.png" alt="" /></div>
          <div class="cbp-item"><img src="style/images/art/c7.png" alt="" /></div>
          <div class="cbp-item"><img src="style/images/art/c8.png" alt="" /></div>
          <div class="cbp-item"><img src="style/images/art/c9.png" alt="" /></div>
          <div class="cbp-item"><img src="style/images/art/c10.png" alt="" /></div>
        </div>
        <!-- /.cbp --> 
        
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
      <p class="pull-left">© 2016 Juno. All rights reserved. Theme by <a href="http://elemisfreebies.com">elemis</a></p>
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