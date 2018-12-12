<?php session_start(); 
include("mysql_connect.inc.php");
$id = $_GET['id'];
$sql2 = "SELECT DISTINCT * FROM greenhouse_user1 where user_id = '$id' ORDER BY gh_id ASC";
$result1 = mysqli_query($link , $sql2);
$i = 0;
$check = 0;
$sql3 = "SELECT DISTINCT * FROM greenhouse_user1 where user_id = '$id' ORDER BY gh_id ASC";
$result2 = mysqli_query($link , $sql2);
while (($rowname = mysqli_fetch_array($result2)) !=null ){
  $i++;
  $check = 1;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="style/images/rosefit.png">
<title>溫室影像資訊</title>
<link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style/css/plugins.css">
<link rel="stylesheet" type="text/css" href="style.css?283">
<link rel="stylesheet" type="text/css" href="style/css/color/red.css">
<link rel="stylesheet" type="text/css" href="style/type/icons.css">
<link rel="stylesheet" type="text/css" href="search.css">
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
        <div class="navbar-brand1">
            <form  action="search.php" method="post">
              <input type="text" name="search" placeholder="search..">
            </form>
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
          <p> 溫室影像資訊</p><h6>每日一照 & 即時影像<h6>
            
        </div>
        <!-- /.hero -->
        
        <div class="tiles blog">
          <div class="items row row-offset-0">
            <div class="row">
          <div class="col-sm-12">
            <?php
            if($check == 1){
            
            echo '<h3>Tabs</h3>';
            
            echo "<ul id=\"tab1\" class=\"nav nav-tabs\">";
            for($j = 1 ; $j <=$i ;$j++){
              if($j == 1){
                echo "  <li class=\"active\"><a href=\"#tab1-".$j."\" data-toggle=\"tab\">$j";
                echo "號溫室</a></li>";
              }
              else{
                echo "  <li class=\"\"><a href=\"#tab1-".$j."\" data-toggle=\"tab\">$j";
                echo "號溫室</a></li>";
              }
            }
            echo "</ul>";
            echo "<div id=\"myTabContent\" class=\"tab-content\" style=\"\">";
            $j = 1;
            while(($rowname = mysqli_fetch_array($result1)) !=null ){
              
              if($j == 1){
                echo "  <div class=\"tab-pane fade in active\" id=\"tab1-".$j."\">";   
             }
             else{
                echo "  <div class=\"tab-pane fade\" id=\"tab1-".$j."\">";
              }            
            echo "      <div class=\"col-xs-6 col-sm-6 col-md-6\">";
            echo "        <figure class=\"overlay\"> <a href=\"./dailyphoto_manage.php?id=".$id."\">";
            echo "          <div class=\"text-overlay caption\">";
            echo "            <div class=\"date-wrapper\" style=\"width: auto;\">";
            echo "              <div class=\"date\"><span class=\"day\">每日一照相簿</span></div>";
            echo "            </div>";
            echo "            <div class=\"info\">";
            echo "              <h2 class=\"post-title\">$rowname[5]</h2>";
            echo "              <div class=\"meta\"><span class=\"comments\">目前狀況: </span><span class=\"category\">良好</span></div>";
            echo "            </div>";
            echo "          </div>";
            echo "          <img src=\"style/images/art/1926.jpg\" alt=\"點一下進入相簿\" /></a>"; 
            echo "        </figure>";
            echo "      </div>";
                
            echo "  <div class=\"col-xs-6 col-sm-6 col-md-6\">";
            echo "    <figure class=\"overlay\"> <a href=\"./videocase.php?id=".$id."\">";
            echo "      <div class=\"text-overlay caption\">";
            echo "        <div class=\"date-wrapper\" style=\"width: auto;\">";
            echo "          <div class=\"date\"><span class=\"day\">即時影像</span></div>";
            echo "        </div>";
            echo "        <div class=\"info\">";
            echo "          <h2 class=\"post-title\">$rowname[5]</h2>";
            echo "          <div class=\"meta\"><span class=\"comments\">目前狀況: </span><span class=\"category\">良好</span></div>";
            echo "        </div>";
            echo "      </div>";
            echo "      <img src=\"style/images/art/1927.jpg\" alt=\"點一下進入相簿\" /></a> </figure>";
            echo "  </div>";
            echo "  </div>";
            $j++;
            }
            }
            else{
              echo '<h3>尚未綁定溫室</h3>';
            }
              ?>
              <!--
              <div class="tab-pane fade" id="tab1-2">
                <div class="col-xs-6 col-sm-6 col-md-6">
                <figure class="overlay"> <a href="#">
                  <div class="text-overlay caption">
                    <div class="date-wrapper" style="width: auto;">
                      <div class="date"><span class="day">每日一照相簿</span></div>
                    </div>
                    <div class="info">
                      <h2 class="post-title">植物名稱</h2>
                      <div class="meta"><span class="comments">目前狀況: </span><span class="category">良好</span></div>
                      <p>Donec sed odio dui. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor...</p>
                    </div>
                  </div>
                  <img src="style/images/art/ib4.jpg" alt="點一下進入相簿" /></a> </figure>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <figure class="overlay"> <a href="#">
                  <div class="text-overlay caption">
                    <div class="date-wrapper" style="width: auto;">
                      <div class="date"><span class="day">即時影像</span></div>
                    </div>
                    <div class="info">
                      <h2 class="post-title">植物名稱</h2>
                      <div class="meta"><span class="comments">目前狀況: </span><span class="category">良好</span></div>
                      <p>Donec sed odio dui. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor...</p>
                    </div>
                  </div>
                  <img src="style/images/art/ib7.jpg" alt="點一下進入相簿" /></a> </figure>
              </div>
              </div>
            
              <div class="tab-pane fade" id="tab1-3">
                <div class="col-xs-6 col-sm-6 col-md-6">
                <figure class="overlay"> <a href="#">
                  <div class="text-overlay caption">
                    <div class="date-wrapper" style="width: auto;">
                      <div class="date"><span class="day">每日一照相簿</span></div>
                    </div>
                    <div class="info">
                      <h2 class="post-title">植物名稱</h2>
                      <div class="meta"><span class="comments">目前狀況: </span><span class="category">良好</span></div>
                      <p>Donec sed odio dui. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor...</p>
                    </div>
                  </div>
                  <img src="style/images/art/ib9.jpg" alt="點一下進入相簿" /></a> </figure>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <figure class="overlay"> <a href="#">
                  <div class="text-overlay caption">
                    <div class="date-wrapper" style="width: auto;">
                      <div class="date"><span class="day">即時影像</span></div>
                    </div>
                    <div class="info">
                      <h2 class="post-title">植物名稱</h2>
                      <div class="meta"><span class="comments">目前狀況: </span><span class="category">良好</span></div>
                      <p>Donec sed odio dui. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor...</p>
                    </div>
                  </div>
                  <img src="style/images/art/ib8.jpg" alt="點一下進入相簿" /></a> </figure>
              </div>
              </div>
            -->
            </div>
          </div>
          <!-- /column -->
          
        </div>
        <!-- /.row -->
            <!--
            <div class="item col-xs-12 col-sm-6 col-md-4">
              <figure class="overlay"> <a href="#">
                <div class="text-overlay caption">
                  <div class="date-wrapper">
                    <div class="date"><span class="day">1號</span></div>
                  </div>
                  <div class="info">
                    <h2 class="post-title">溫室名稱</h2>
                    <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus...</p>
                  </div>
                </div>
                <img src="style/images/art/ib1.jpg" alt="" /></a> </figure>
            </div>
            -->
            <!--/column -->
            <!--
            <div class="item col-xs-12 col-sm-6 col-md-4">
              <figure class="overlay"> <a href="#">
                <div class="text-overlay caption">
                  <div class="date-wrapper">
                    <div class="date"><span class="day">2號</span></div>
                  </div>
                  <div class="info">
                    <h2 class="post-title">Aenean Sem Ultricies</h2>
                    <div class="meta"><span class="comments">3 Comments</span><span class="category">Still Life</span></div>
                    <p>Donec sed odio dui. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor...</p>
                  </div>
                </div>
                <img src="style/images/art/ib2.jpg" alt="" /></a> </figure>
            </div>
            -->
            <!--/column -->
            <!--
            <div class="item col-xs-12 col-sm-6 col-md-4">
              <figure class="overlay"> <a href="#">
                <div class="text-overlay caption">
                  <div class="date-wrapper">
                    <div class="date"><span class="day">04</span><span class="month">Jul</span></div>
                  </div>
                  <div class="info">
                    <h2 class="post-title">Ullamcorper Vulputate</h2>
                    <div class="meta"><span class="comments">8 Comments</span><span class="category">Urban</span></div>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et donec sed...</p>
                  </div>
                </div>
                <img src="style/images/art/ib3.jpg" alt="" /></a> </figure>
            </div>
            -->
            <!--/column --> 
            
          </div>
          <!--/.row --> 
        </div>
        <!-- /.tiles -->
        
        <!-- /.pagination --> 
        
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