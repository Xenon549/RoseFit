<?php session_start(); //註冊一個變數到 session  
include("mysql_connect.inc.php");
if(isset($_GET['bsn'])){
  $article_id = $_GET['bsn'];
}
$sql = "SELECT DISTINCT * FROM community_article where article_id = '$article_id'";
$result = mysqli_query($link , $sql);
$rowname = mysqli_fetch_array($result);

$sql2 = "SELECT DISTINCT * FROM community_image where article_id = '$article_id'";
$result = mysqli_query($link , $sql2);
$rowimage = mysqli_fetch_array($result);

$email = $_SESSION['username'];
$sql3 = "SELECT * FROM user where user_email = '$email'";
$result = mysqli_query($link , $sql3);
$rowuser = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="style/images/favicon.png">
<title>Juno 6</title>
<link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style/css/plugins.css">
<link rel="stylesheet" type="text/css" href="style.css">
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
        <a href="index.php"><img src="#" srcset="style/images/rosefit.png 1x, style/images/rosefit.png 2x" alt="" /></a>
        <div class="navbar-brand1">
            <form>
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
        <div class="blog row">
          <div class="col-sm-8">
            <div class="blog-content classic-view single">
              <div class="blog-posts">
                <div class="post">
                  <div class="box">
                    <div class="post-content">
                      <?php
                      echo "<figure><img src=\"$rowimage[2]\" alt=\"\"></figure>";
                      ?>
                      <h1 class="post-title"><?php echo $rowname[3]?></h1>
                      <div class="meta"><span class="date"><?php echo $rowname[5]?></span><span class="comments"><a href="#">7 Comments</a></span><span class="category"><a href="#">Still Life</a></span></div>
                      <p>
                      <?php echo $rowname[4]; ?>
                      </p>
                      <!-- /.post-nav -->
                      
                      <hr />
                      <div class="about-author text-left">
                        <div class="author-image"> <img alt="" src="style/images/art/author.jpg" /> </div>
                        <h4>About the Author</h4>
                        <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Maecenas faucibus mollis interdum. Fusce dapibus, tellus ac.</p>
                        <ul class="social">
                          <li> <a href="#"><i class="ion-social-facebook"></i></a> </li>
                          <li> <a href="#"><i class="ion-social-twitter"></i></a> </li>
                          <li> <a href="#"><i class="ion-social-instagram"></i></a> </li>
                          <li> <a href="#"><i class="ion-social-vimeo"></i></a> </li>
                          <li> <a href="#"><i class="ion-social-linkedin"></i></a> </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <!-- .about-author -->
                      
                      <hr />
                      <div id="comments" class="text-left">
                        <h4>4 Comments on "Tellus Adipiscing Nibh Mattis Ligula"</h4>
                        <ol id="singlecomments" class="commentlist">
                          <li>
                            <div class="message">
                              <div class="user"><img alt="" src="style/images/art/u1.jpg" class="avatar" /></div>
                              <div class="message-inner">
                                <div class="info">
                                  <h5><a href="#">Connor Gibson</a></h5>
                                  <div class="meta"> <span class="date">January 14, 2010</span><span class="reply"><a class="link-effect" href="#">Reply</a></span> </div>
                                </div>
                                <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Sed posuere consectetur est at lobortis. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Vestibulum id ligula porta felis euismod semper.</p>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="message">
                              <div class="user"><img alt="" src="style/images/art/u2.jpg" class="avatar" /></div>
                              <div class="message-inner">
                                <div class="info">
                                  <h5><a href="#">Nikolas Brooten</a></h5>
                                  <div class="meta"> <span class="date">February 21, 2010</span><span class="reply"><a class="link-effect" href="#">Reply</a></span> </div>
                                </div>
                                <p>Quisque tristique tincidunt metus non aliquam. Quisque ac risus sit amet quam sollicitudin vestibulum vitae malesuada libero. Mauris magna elit, suscipit non ornare et, blandit a tellus. Pellentesque dignissim ornare elit, quis mattis eros sodales ac.</p>
                              </div>
                            </div>
                            <ul class="children">
                              <li class="bypostauthor">
                                <div class="message">
                                  <div class="user"><img alt="" src="style/images/art/u3.jpg" class="avatar" /></div>
                                  <div class="message-inner bypostauthor">
                                    <div class="info">
                                      <h5><a href="#">Pearce Frye</a></h5>
                                      <div class="meta"> <span class="date">February 22, 2010</span><span class="reply"><a class="link-effect" href="#">Reply</a></span> </div>
                                    </div>
                                    <p>Cras mattis consectetur purus sit amet fermentum. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Etiam porta sem malesuada magna mollis euismod. Maecenas sed diam eget risus varius blandit non.</p>
                                  </div>
                                </div>
                                <ul class="children">
                                  <li>
                                    <div class="message">
                                      <div class="user"><img alt="" src="style/images/art/u2.jpg" class="avatar" /></div>
                                      <div class="message-inner">
                                        <div class="info">
                                          <h5><a href="#">Nikolas Brooten</a></h5>
                                          <div class="meta"> <span class="date">April 4, 2010</span><span class="reply"><a class="link-effect" href="#">Reply</a></span> </div>
                                        </div>
                                        <p>Nullam id dolor id nibh ultricies vehicula ut id. Cras mattis consectetur purus sit amet fermentum. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
                                      </div>
                                    </div>
                                  </li>
                                </ul>
                              </li>
                            </ul>
                          </li>
                          <li>
                            <div class="message">
                              <div class="user"><img alt="" src="style/images/art/u4.jpg" class="avatar" /></div>
                              <div class="message-inner">
                                <div class="info">
                                  <h5><a href="#">Lou Bloxham</a></h5>
                                  <div class="meta"> <span class="date">May 03, 2010</span><span class="reply"><a class="link-effect" href="#">Reply</a></span> </div>
                                </div>
                                <p>Sed posuere consectetur est at lobortis. Vestibulum id ligula porta felis euismod semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                              </div>
                            </div>
                          </li>
                        </ol>
                      </div>
                      <!-- /#comments --> 
                      
                    </div>
                    <!-- /.post-content --> 
                  </div>
                  <!-- /.box --> 
                </div>
                <!-- /.post -->
                <div class="comment-form-wrapper text-left">
                  <h4>Would you like to share your thoughts?</h4>
                  <p>Your email address will not be published. Required fields are marked *</p>
                  <form class="comment-form" name="form_name" action="#" method="post">
                    <div class="name-field">
                      <input type="text" name="first" title="Name*"  value="Name*" onfocus="this.value=''" onblur="this.value='Name*'"/>
                    </div>
                    <div class="email-field">
                      <input type="text" name="first" title="Email*"  value="Email*" onfocus="this.value=''" onblur="this.value='Email*'" />
                    </div>
                    <div class="website-field">
                      <input type="text" name="first" title="Website"  value="Website" onfocus="this.value=''" onblur="this.value='Website'" />
                    </div>
                    <div class="message-field">
                      <textarea name="textarea" id="textarea" rows="5" cols="30" title="Enter your comment here..."></textarea>
                    </div>
                    <input type="submit" value="Submit" name="submit" class="btn btn-submit" />
                  </form>
                </div>
                <!-- /.comment-form-wrapper --> 
                
              </div>
              <!-- /.blog-posts --> 
              
            </div>
            <!-- /.classic-view --> 
            
          </div>
          <!-- /.blog-content -->
          
          <aside class="col-sm-4 sidebar">
            <div class="sidebox widget">
              <h3 class="widget-title">About Us</h3>
              <?php
                      echo "<figure><img src=\"$rowuser[4]\" class=\"img-auto\" alt=\"\"></figure>";
              ?>
              <div class="divide10"></div>
              <p><?php echo $rowuser[5] ?></p>
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