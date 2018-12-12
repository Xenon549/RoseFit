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
<style type="text/css">
  .fontcolor{
    color: black !important;
  }
</style>
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
          <p>種植計畫 購買專區</p>
        </div>
        <!-- /.hero -->
        
        <div class="row text-center">
          <div class="col-sm-6 col-md-4">
            <div class="box"> <span class="icon icon-m"><i class="budicon-tree"></i></span>
              <h4>植物種類</h4>
              <p>以下種植計畫，依照植物種類為主，您可以找尋您喜愛的種植計畫。</p>
            </div>
          </div>
          <!--/column -->
          <div class="col-sm-6 col-md-4">
            <div class="box"> <span class="icon icon-m"><i class="budicon-bulb"></i></span>
              <h4>自動照顧</h4>
              <p>溫室將依據您選擇的種植計畫，自動調節為最適宜的植物生長環境。</p>
            </div>
          </div>
          <!--/column -->
          <div class="divide30 visible-sm"></div>
          <div class="col-sm-6 col-md-4">
            <div class="box"> <span class="icon icon-m"><i class="budicon-book-1"></i></span>
              <h4>每日記錄</h4>
              <p>您可以在您的會員專區中，查看自己的種植計畫，也可以查看目前的溫室狀況。</p>
            </div>
          </div>
          <!--/column -->
           
          
        </div>
        <!--/.row -->
        <!--
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
        </div>
        -->
        
        <hr />
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <p class="lead text-center">選擇<strong> 一項種植計畫 </strong>，新增到專案中</p>
          </div>
          <!-- /column --> 
        </div>
        <!-- /.row -->
        <div class="divide10"></div>
        <div class="row">
          <div class="col-sm-4">
            <div class="pricing panel">
              <div class="panel-heading">
                <div class="icon icon-m"><img src="img/flower.png"></div>
                <h3 class="panel-title">玫瑰<span class="panel-desc">種類：薔薇科</span><span class="panel-desc">提供者：王先生</span></h3>
                <div class="price"> <span class="price-currency">$</span><span class="price-value">0</span> <span class="price-duration">year</span></div>
              </div>
              <!--/.panel-heading -->
              <div class="panel-body">
                全自動照顧
                <!--
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
                -->
              </div>
              <!--/.panel-body -->
              <div class="panel-footer"><a href="#myModal1" class="btn btn-white" data-toggle="modal" data-target="#myModal1">查看</a><a href="http://120.110.113.70/rosefit_greenhouse/admin/admin/connect_plan.php" class="btn btn-border dark" role="button">選擇此計畫</a></div>
            </div>
            <!--/.pricing --> 
          </div>
          <!--/column -->
          <div class="col-sm-4">
            <div class="pricing panel">
              <div class="panel-heading">
                <div class="icon icon-m"><img src="img/growth.png"></div>
                <h3 class="panel-title">札米<span class="panel-desc">種類：天南星科</span><span class="panel-desc">提供者：葛太太</span></h3>
                <div class="price"> <span class="price-currency">$</span><span class="price-value">0</span> <span class="price-duration">year</span></div>
              </div>
              <!--/.panel-heading -->
              <div class="panel-body">
                全自動照顧
                <!--
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
                -->
              </div>
              <!--/.panel-body -->
              <div class="panel-footer"><a href="#myModal1" class="btn btn-white" data-toggle="modal" data-target="#myModal1">查看</a><a href="#" class="btn btn-border dark" role="button">選擇此計畫</a></div>
            </div>
            <!--/.pricing --> 
          </div>
          <!--/column -->
          <div class="col-sm-4">
            <div class="pricing panel">
              <div class="panel-heading">
                <div class="icon icon-m"><img src="img/idea.png"></div>
                <h3 class="panel-title">創意<span class="panel-desc">種類：RoseFit</span><span class="panel-desc">提供者：RoseFit</span></h3>
                <div class="price"> <span class="price-currency">$</span><span class="price-value">0</span> <span class="price-duration">year</span></div>
              </div>
              <!--/.panel-heading -->
              <div class="panel-body">
                提供最佳的溫室照顧
                <!--
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
                -->
              </div>
              <!--/.panel-body -->
              <div class="panel-footer"><a href="#myModal1" class="btn btn-white" data-toggle="modal" data-target="#myModal1">查看</a><a href="#" class="btn btn-border dark" role="button">選擇此計畫</a></div>
            </div>
            <!--/.pricing --> 
          </div>
          <!--/column --> 
        </div>
        <!--/.row -->
        
      </div>
      <!-- /.container -->

      <!--model the content of the plan-->
      <div class="modal inverse-wrapper modal-transparent move-from-top" id="myModal1" tabindex="-1" role="dialog"> <a href="#" class="btn close-button" data-dismiss="modal" aria-label="Close"></a>
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <h1 class="post-title text-center fontcolor">玫瑰</h1>
              <p class="text-center fontcolor">種植計畫三步曲</p>
              <div class="divide10"></div>
              <div class="col-sm-12">
            <h3 class="fontcolor">Tabs</h3>
            <ul id="tab1" class="nav nav-tabs">
              <li class="active"><a href="#tab1-1" data-toggle="tab" class="fontcolor">第一步</a></li>
              <li><a href="#tab1-2" data-toggle="tab" class="fontcolor">第二步</a></li>
              <li><a href="#tab1-3" data-toggle="tab" class="fontcolor">第三步</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade in active" id="tab1-1">
                <p class="fontcolor">Aenean lacinia bibendum nulla sed consectetur. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Vestibulum id ligula porta felis euismod semper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                <p class="fontcolor">Donec sed odio dui. Donec sed odio dui. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Maecenas faucibus mollis interdum.</p>
                <ul class="circled fontcolor">
                  <li>Mauris lacinia dui non metus dignissim venenatis.</li>
                  <li>Etiam elit tellus, condimentum tempor lobortis non.</li>
                  <li>Aliquam pharetra vestibulum arcu, eget iaculis. </li>
                </ul>
              </div>
              <div class="tab-pane fade" id="tab1-2">
                <p class="fontcolor">Sed posuere consectetur est at lobortis. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas faucibus mollis interdum. Maecenas faucibus mollis interdum. Sed posuere consectetur est at lobortis. Vestibulum id ligula porta felis euismod.</p>
                <p class="fontcolor"> Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor vel scelerisque nisl consectetur et.</p>
                <p class="fontcolor">Maecenas faucibus mollis interdum. Sed posuere consectetur est at lobortis. Maecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta gravida at eget metus. Curabitur blandit tempus porttitor. Nullam id dolor id nibh ultricies vehicula ut id elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus.</p>
              </div>
              <div class="tab-pane fade" id="tab1-3">
                <p class="fontcolor">Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <p class="fontcolor">Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nullam id dolor id nibh ultricies vehicula ut id elit. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
              </div>
            </div>
          </div>
          <!-- /column -->
            </div>
          </div>
        </div>
        <!--/.modal --> 
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