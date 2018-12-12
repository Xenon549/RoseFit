<?php session_start(); 
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
<link rel="shortcut icon" href="style/images/rosefit.png">
<title><?php echo $rowname[1]; ?>的部落格</title>
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
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="current"><a href="#!">專欄<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="blog_doctor.php">植物醫生</a></li>
              <li><a href="blog_princess.php">小王子星球</a></li>
              <li><a href="blog_beauty.php">天生我最美</a></li>
            </ul>
          </li>
          <li><a href="#!">部落格<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="blog.php">每日一照</a></li>
              <li><a href="blog2.php">個人部落格</a></li>
            </ul>
          </li>
          <li><a href="about.php">關於<span class="caret"></span></a>
          </li>
          <li><a href="#!">會員專區<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="blog.php">溫室</a></li>
              <li><a href="blog2.php">設定</a></li>
              <li><a href="./blog_manage.php">新增文章</a></li>
              <li><a href="./blog_manage.php">部落格管理</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!--/.container-fluid --> 
  </div>
  <!--/.navbar -->
  <main>
    <div class="dark-wrapper">
      <div class="container inner">
        <div class="blog row">
          <div class="col-sm-8 blog-content grid-view">
            <div class="blog-content">
              <div class="row blog-posts">
                <div class="post col-sm-12 col-md-6">
                  <div class="box">
                    <figure class="overlay"><a href="#"> <img src="style/images/art/white.png" alt="" ></a></figure>
                    <div class="post-content">
                      <h3 class="post-title"><a href="blog-post.html">新增文章</a></h3>
                      <div ><span ></span><span ><a href="#"></a></span></div>
                      <a href="blog-post.html" ></a> </div>
                    <!-- /.post-content --> 
                  </div>
                  <!-- /.box --> 
                </div>
                <!-- /.post -->
                <hr />
                <!--
                <div class="post col-sm-12 col-md-6">
                  <div class="box">
                    <figure class="overlay"><a href="#"> <img src="style/images/art/white.png" alt="" ></a></figure>
                    <div class="post-content">
                      <h3 class="post-title"><a href="blog-post.html">新增文章</a></h3>
                      <div ><span ></span><span ><a href="#"></a></span>
                      </div>
                      <a href="blog-post.html" ></a> 
                    </div>
                  </div>
                </div>
              -->
              </div>
              
            </div>
            <!-- 範例
            <div class="post col-sm-12 col-md-6">
                  <div class="box">
                    <figure class="overlay"><a href="#"> <img src="style/images/art/b1.jpg" alt="" /></a></figure>
                    <div class="post-content">
                      <h3 class="post-title"><a href="blog-post.html">Ligula Tristique Malesuada Venenatis</a></h3>
                      <div class="meta"><span class="date">12 Nov 2014</span><span class="category"><a href="#">Urban</a></span></div>
                      <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Nullam quis risus eget urna mollis ornare vel.</p>
                      <a href="blog-post.html" class="more">Read More</a> </div>
                 
                  </div>
                 
                </div>
              -->
            <!-- /.blog-content -->
            <!-- 頁碼
            <div class="pagination">
              <ul>
                <li><a class="btn btn-square btn-icon" href="#"><i class="ion-android-arrow-back"></i></a></li>
                <li class="active"><a class="btn btn-square" href="#"><span>1</span></a></li>
                <li><a class="btn btn-square" href="#"><span>2</span></a></li>
                <li><a class="btn btn-square" href="#"><span>3</span></a></li>
                <li><a class="btn btn-square btn-icon" href="#"><i class="ion-android-arrow-forward"></i></a></li>
              </ul>
            </div> -->
            <!-- /.pagination --> 
            
          </div>
          <!-- /.blog-content -->
          
          <aside class="col-sm-4 sidebar">
            <div class="sidebox widget">
              <h3 class="widget-title">About Us</h3>
              <figure> <img src="<?php echo $rowname[4] ?>" class="img-auto" alt="" /> </figure>
              <div class="divide10"></div>
              <?php 
              echo $rowname[5];
              ?>
              <ul class="social">
                <li> <a href="#"><i class="ion-social-rss"></i></a> </li>
                <li> <a href="#"><i class="ion-social-facebook"></i></a> </li>
                <li> <a href="#"><i class="ion-social-twitter"></i></a> </li>
                <li> <a href="#"><i class="ion-social-instagram"></i></a> </li>
                <li> <a href="#"><i class="ion-social-vimeo"></i></a> </li>
                <li> <a href="#"><i class="ion-social-whatsapp"></i></a> </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <!-- /.widget -->
            
            <div class="sidebox widget">
              <h3 class="widget-title">Popular Posts</h3>
              <ul class="post-list">
                <li>
                  <figure class="overlay small"> <a href="blog-post.html"><img src="style/images/art/a1.jpg" alt="" /> </a> </figure>
                  <div class="post-content">
                    <h4 class="post-title"> <a href="blog-post.html">Magna Mollis Ultricies Mauris</a> </h4>
                    <div class="meta"><span class="date">12 Nov 2014</span><span class="category"><a href="#">Urban</a></span></div>
                  </div>
                </li>
                <li>
                  <figure class="overlay small"> <a href="blog-post.html"><img src="style/images/art/a2.jpg" alt="" /> </a> </figure>
                  <div class="post-content">
                    <h4 class="post-title"> <a href="blog-post.html">Ornare Nullam Risus Cursus</a> </h4>
                    <div class="meta"><span class="date">12 Nov 2014</span><span class="category"><a href="#">Still Life</a></span></div>
                  </div>
                </li>
                <li>
                  <figure class="overlay small"> <a href="blog-post.html"><img src="style/images/art/a3.jpg" alt="" /> </a> </figure>
                  <div class="post-content">
                    <h4 class="post-title"> <a href="blog-post.html">Euismod Nullam Fusce Dapibus</a> </h4>
                    <div class="meta"><span class="date">12 Nov 2014</span><span class="category"><a href="#">Conceptual</a></span></div>
                  </div>
                </li>
              </ul>
              <!-- /.post-list --> 
            </div>
            <!-- /.widget -->
            
            <div class="sidebox widget">
              <h3 class="widget-title">Categories</h3>
              <ul class="list circled">
                <li><a href="#">Lifestyle (21)</a></li>
                <li><a href="#">Photography (19)</a></li>
                <li><a href="#">Journal (16)</a></li>
                <li><a href="#">Works (7)</a></li>
                <li><a href="#">Conceptual (12)</a></li>
                <li><a href="#">Videography</a></li>
              </ul>
            </div>
            <!-- /.widget -->
            
            <div class="sidebox widget">
              <h3 class="widget-title">Tags</h3>
              <ul class="tag-list">
                <li><a href="#" class="btn">Still Life</a></li>
                <li><a href="#" class="btn">Urban</a></li>
                <li><a href="#" class="btn">Journal</a></li>
                <li><a href="#" class="btn">Nature</a></li>
                <li><a href="#" class="btn">Landscape</a></li>
                <li><a href="#" class="btn">Macro</a></li>
                <li><a href="#" class="btn">Workshop</a></li>
                <li><a href="#" class="btn">Photography</a></li>
              </ul>
            </div>
            <!-- /.widget -->
            <div class="sidebox widget">
              <h3 class="widget-title">Instagram</h3>
              <div class="tiles instagram">
                <div id="instafeed-widget" class="items row row-offset-0"></div>
              </div>
              <!--/.tiles --> 
            </div>
            <!-- /.widget -->
            <div class="sidebox widget">
              <h4 class="widget-title">Search</h4>
              <form class="searchform" method="get">
                <input type="text" id="s1" name="s" value="Search something" onfocus="this.value=''" onblur="this.value='Search something'">
              </form>
            </div>
            <!-- /.widget --> 
          </aside>
          <!-- /column .sidebar --> 
          
        </div>
        <!-- /.blog --> 
        
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