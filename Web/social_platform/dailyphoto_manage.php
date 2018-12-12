<?php session_start(); //註冊一個變數到 session  
include("mysql_connect.inc.php");
$email = $_SESSION['username'];
$sql = "SELECT * FROM user where user_email = '$email'";
$result = mysqli_query($link , $sql);
$rowname = mysqli_fetch_array($result);

$sqlarticle = "SELECT * FROM community_article where user_id = '$rowname[0]' ORDER BY article_id DESC";
$result = mysqli_query($link , $sqlarticle);
$article = mysqli_fetch_array($result);

$sqltag = "SELECT * FROM community_tag where article_id = '$article[0]'";
$result = mysqli_query($link , $sqltag);
$tag = mysqli_fetch_array($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/x-icon" href="style/images/rosefit.png" />
<title>每日一照管理</title>
<link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css?1">
<link rel="stylesheet" type="text/css" href="style/css/plugins.css">
<link rel="stylesheet" type="text/css" href="style.css?283">
<link rel="stylesheet" type="text/css" href="style/css/color/red.css">
<link rel="stylesheet" type="text/css" href="style/type/icons.css">
<link rel="stylesheet" type="text/css" href="./bootstrap-tagsinput.css">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CKarla:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style type="text/css">
  .background-color{
     background-color: #e1e5e6!important; 
     border-color: #e1e5e6!important;
  }
  .color{
    color: #606060 !important;
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
          <h2>每日一照管理</h2>
        </div>

        <!-- /.hero -->
        
        <div class="tiles">
          <div class="items row row-offset-0">
            <div class="item col-xs-6 col-sm-6 col-md-4">
              <figure class="overlay"> <a href="?id=<?=$article[0]?>#myModal1" data-toggle="modal" data-target="#myModal1">
                <div class="text-overlay caption">
                  <div class="date-wrapper">
                    <div class="date"><span class="day">17</span><span class="month">Aug</span></div>
                  </div>
                  <div class="info">
                    <h2 class="post-title"><?php echo $article[3];?></h2>
                    <div class="meta"> <span class="count">點一下編輯</span></div>
                  </div>
                </div>
                <img src="style/images/art/daily (1).jpg" alt="" /></a> </figure>
            </div>
            <!--/column -->
            <div class="item col-xs-6 col-sm-6 col-md-4">
              <figure class="overlay"> <a href="#myModal1" data-toggle="modal" data-target="#myModal1">
                <div class="text-overlay caption">
                  <div class="date-wrapper">
                    <div class="date"><span class="day">17</span><span class="month">Aug</span></div>
                  </div>
                  <div class="info">
                    <h2 class="post-title">文章名稱</h2>
                    <div class="meta"> <span class="count">點一下編輯</span></div>
                  </div>
                </div>
                <img src="style/images/art/daily (2).jpg" alt="" /></a> </figure>
            </div>
            <!--/column -->
            
            <div class="item col-xs-6 col-sm-6 col-md-4">
              <figure class="overlay"> <a href="#myModal1" data-toggle="modal" data-target="#myModal1">
                <div class="text-overlay caption">
                  <div class="date-wrapper">
                    <div class="date"><span class="day">17</span><span class="month">Aug</span></div>
                  </div>
                  <div class="info">
                    <h2 class="post-title">文章名稱</h2>
                    <div class="meta"> <span class="count">點一下編輯</span></div>
                  </div>
                </div>
                <img src="style/images/art/daily (3).jpg" alt="" /></a> </figure>
            </div>
            <!--/column -->

            <div class="item col-xs-6 col-sm-6 col-md-4">
              <figure class="overlay"> <a href="?id=<?=$article[0]?>#myModal1" data-toggle="modal" data-target="#myModal1">
                <div class="text-overlay caption">
                  <div class="date-wrapper">
                    <div class="date"><span class="day">17</span><span class="month">Aug</span></div>
                  </div>
                  <div class="info">
                    <h2 class="post-title"><?php echo $article[3];?></h2>
                    <div class="meta"> <span class="count">點一下編輯</span></div>
                  </div>
                </div>
                <img src="style/images/art/daily (4).jpg" alt="" /></a> </figure>
            </div>
            <div class="item col-xs-6 col-sm-6 col-md-4">
              <figure class="overlay"> <a href="?id=<?=$article[0]?>#myModal1" data-toggle="modal" data-target="#myModal1">
                <div class="text-overlay caption">
                  <div class="date-wrapper">
                    <div class="date"><span class="day">17</span><span class="month">Aug</span></div>
                  </div>
                  <div class="info">
                    <h2 class="post-title"><?php echo $article[3];?></h2>
                    <div class="meta"> <span class="count">點一下編輯</span></div>
                  </div>
                </div>
                <img src="style/images/art/daily (5).jpg" alt="" /></a> </figure>
            </div>
          
            
          </div>
          <!--/.row --> 
        </div>
        <!-- /.tiles -->
        <div class="modal inverse-wrapper modal-transparent move-from-top" id="myModal1" tabindex="-1" role="dialog" style="background-image: url(style/images/art/background2.jpg);" data-backdrop="static" data-keyboard="false">
          <script>
          </script>

          <div class="modal-dialog modal-lg" role="document">
            <h2 class="post-title text-center color">每日一照管理</h2>
            <p class="text-center color">發佈此照片的文章</p>
            <div class="divide10"></div>
            <div class="form-container">

              <form action="editarticle.php" method="post" class="vanilla vanilla-form" novalidate="novalidate">
                <div class="row">
                  <div class="col-sm-6 rp10">
                    <div class="form-field">
                      <label >
                        <input type="text" name="title" value="<?php echo $article[3]?>" required="required" class="color background-color">
                      </label>
                    </div>
                    <!--/.form-field --> 
                  </div>
                  <!--/column -->
                  <div class="col-sm-6 lp10">
                    <div class="form-field ">
                      <label class="custom-select">
                        <select name="department" required="required" class="background-color" name="category">
                          <option value="">文章分類</option>
                          <option value="doctor">植物醫生</option>
                          <option value="prince">小王子星球</option>
                          <option value="beauty">天生我最美</option>
                          <option value="Other">沒有分類</option>
                        </select>
                        <span><!-- fake select handler --></span> </label>
                    </div>
                    <!--/.form-field --> 
                  </div>
                  <!--/column -->

                  <div class="col-sm-12">
                    <textarea name="message" value="" required="required" class="color background-color" name="article"><?php echo $article[4];?></textarea>

                    <input type="text" value="標籤<?php echo $tag[1];?>" data-role="tagsinput" name="tag">
                    <br/><br/>
                    <ul class="basic-gallery text-center">
                      <li><img src="style/images/art/daily (1).jpg" alt="" /></li>
                    </ul>
                    <br/>
                    <!--/.radio-set -->
                    <div align="center">
                      <input type="submit"  value="儲存編輯" data-error="錯誤" data-processing="儲存中.." data-success="已儲存" class="btn btn-lime" style="display:inline" > 
                      <a class="btn btn-lime" style="display:inline; padding-top: 13px;" onclick="myFunction();">放棄編輯</a>
                      <script type="text/javascript">
                        function myFunction(){
                          var msg=confirm("確定放棄編輯本文?");
                          if(msg==true){
                            window.location.replace("./dailyphoto_manage.php");
                          }else{
                            return false;
                          }
                        }
                      </script>
                      <input type="submit" value="發佈文章" class="btn btn-lime" style="display:inline;padding-top: 13px; " onclick="myFunction2();">
                      <script type="text/javascript">
                        function myFunction2(){
                          var msg=confirm("確定發佈?");
                          if(msg==true){
                            window.location.replace("./blog_manage.php");
                          }else{
                            return false;
                          }
                        }
                      </script>
                    </div>
                    <footer class="notification-box"></footer>
                  </div>
                  <!--/column --> 
                  
                </div>
                <!--/.row -->
                
              </form>
              <!--/.vanilla-form --> 
            </div>
            <!--/.form-container -->
          </div>
        </div>
        <!--/.modal -->
      
        
        <div class="modal inverse-wrapper modal-transparent move-from-top" id="myModal3" tabindex="-1" role="dialog"> <a href="#" class="btn close-button" data-dismiss="modal" aria-label="Close"></a>
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <h2 class="post-title text-center">Road Tripping</h2>
              <p class="text-center">Curabitur blandit tempus porttitor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur.</p>
              <ul class="basic-gallery text-center">
                <li><img src="style/images/art/pm3-full1.jpg" alt="" /></li>
                <li><img src="style/images/art/pm3-full2.jpg" alt="" /></li>
                <li><img src="style/images/art/pm3-full3.jpg" alt="" /></li>
                <li><img src="style/images/art/pm3-full4.jpg" alt="" /></li>
                <li><img src="style/images/art/pm3-full5.jpg" alt="" /></li>
                <li><img src="style/images/art/pm3-full6.jpg" alt="" /></li>
                <li><img src="style/images/art/pm3-full7.jpg" alt="" /></li>
              </ul>
            </div>
          </div>
        </div>
        <!--/.modal -->
        
        <div class="modal inverse-wrapper modal-transparent move-from-top" id="myModal4" tabindex="-1" role="dialog"> <a href="#" class="btn close-button" data-dismiss="modal" aria-label="Close"></a>
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <h2 class="post-title text-center">Riding My Bike</h2>
              <p class="text-center">Curabitur blandit tempus porttitor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur.</p>
              <ul class="basic-gallery text-center">
                <li><img src="style/images/art/pm4-full1.jpg" alt="" /></li>
                <li><img src="style/images/art/pm4-full2.jpg" alt="" /></li>
                <li><img src="style/images/art/pm4-full3.jpg" alt="" /></li>
                <li><img src="style/images/art/pm4-full4.jpg" alt="" /></li>
                <li><img src="style/images/art/pm4-full5.jpg" alt="" /></li>
                <li><img src="style/images/art/pm4-full6.jpg" alt="" /></li>
                <li><img src="style/images/art/pm4-full7.jpg" alt="" /></li>
              </ul>
            </div>
          </div>
        </div>
        <!--/.modal -->
        
        <div class="modal inverse-wrapper modal-transparent move-from-top" id="myModal5" tabindex="-1" role="dialog"> <a href="#" class="btn close-button" data-dismiss="modal" aria-label="Close"></a>
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <h2 class="post-title text-center">Summer is Here</h2>
              <p class="text-center">Curabitur blandit tempus porttitor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur.</p>
              <ul class="basic-gallery text-center">
                <li><img src="style/images/art/pm5-full1.jpg" alt="" /></li>
                <li><img src="style/images/art/pm5-full2.jpg" alt="" /></li>
                <li><img src="style/images/art/pm5-full3.jpg" alt="" /></li>
                <li><img src="style/images/art/pm5-full4.jpg" alt="" /></li>
                <li><img src="style/images/art/pm5-full5.jpg" alt="" /></li>
                <li><img src="style/images/art/pm5-full6.jpg" alt="" /></li>
                <li><img src="style/images/art/pm5-full7.jpg" alt="" /></li>
              </ul>
            </div>
          </div>
        </div>
        <!--/.modal -->
        
        <div class="modal inverse-wrapper modal-transparent move-from-top" id="myModal6" tabindex="-1" role="dialog"> <a href="#" class="btn close-button" data-dismiss="modal" aria-label="Close"></a>
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <h2 class="post-title text-center">Tying the Knot</h2>
              <p class="text-center">Curabitur blandit tempus porttitor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur.</p>
              <ul class="basic-gallery text-center">
                <li><img src="style/images/art/pm6-full1.jpg" alt="" /></li>
                <li><img src="style/images/art/pm6-full2.jpg" alt="" /></li>
                <li><img src="style/images/art/pm6-full3.jpg" alt="" /></li>
                <li><img src="style/images/art/pm6-full4.jpg" alt="" /></li>
                <li><img src="style/images/art/pm6-full5.jpg" alt="" /></li>
                <li><img src="style/images/art/pm6-full6.jpg" alt="" /></li>
                <li><img src="style/images/art/pm6-full7.jpg" alt="" /></li>
              </ul>
            </div>
          </div>
        </div>
        <!--/.modal -->
        
        <div class="modal inverse-wrapper modal-transparent move-from-top" id="myModal7" tabindex="-1" role="dialog"> <a href="#" class="btn close-button" data-dismiss="modal" aria-label="Close"></a>
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <h2 class="post-title text-center">Beautiful Models</h2>
              <p class="text-center">Curabitur blandit tempus porttitor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur.</p>
              <ul class="basic-gallery text-center">
                <li><img src="style/images/art/pm7-full1.jpg" alt="" /></li>
                <li><img src="style/images/art/pm7-full2.jpg" alt="" /></li>
                <li><img src="style/images/art/pm7-full3.jpg" alt="" /></li>
                <li><img src="style/images/art/pm7-full4.jpg" alt="" /></li>
                <li><img src="style/images/art/pm7-full5.jpg" alt="" /></li>
                <li><img src="style/images/art/pm7-full6.jpg" alt="" /></li>
                <li><img src="style/images/art/pm7-full7.jpg" alt="" /></li>
              </ul>
            </div>
          </div>
        </div>
        <!--/.modal -->
        
        <div class="modal inverse-wrapper modal-transparent move-from-top" id="myModal8" tabindex="-1" role="dialog"> <a href="#" class="btn close-button" data-dismiss="modal" aria-label="Close"></a>
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <h2 class="post-title text-center">Puppy Love</h2>
              <p class="text-center">Curabitur blandit tempus porttitor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur.</p>
              <ul class="basic-gallery text-center">
                <li><img src="style/images/art/pm8-full1.jpg" alt="" /></li>
                <li><img src="style/images/art/pm8-full2.jpg" alt="" /></li>
                <li><img src="style/images/art/pm8-full3.jpg" alt="" /></li>
                <li><img src="style/images/art/pm8-full4.jpg" alt="" /></li>
                <li><img src="style/images/art/pm8-full5.jpg" alt="" /></li>
                <li><img src="style/images/art/pm8-full6.jpg" alt="" /></li>
              </ul>
            </div>
          </div>
        </div>
        <!--/.modal -->
        
        <div class="modal inverse-wrapper modal-transparent move-from-top" id="myModal9" tabindex="-1" role="dialog"> <a href="#" class="btn close-button" data-dismiss="modal" aria-label="Close"></a>
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <h2 class="post-title text-center">Means of Transportation</h2>
              <p class="text-center">Curabitur blandit tempus porttitor. Nullam quis risus eget urna mollis ornare vel eu leo. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur.</p>
              <ul class="basic-gallery text-center">
                <li><img src="style/images/art/pm9-full1.jpg" alt="" /></li>
                <li><img src="style/images/art/pm9-full2.jpg" alt="" /></li>
                <li><img src="style/images/art/pm9-full3.jpg" alt="" /></li>
                <li><img src="style/images/art/pm9-full4.jpg" alt="" /></li>
                <li><img src="style/images/art/pm9-full5.jpg" alt="" /></li>
                <li><img src="style/images/art/pm9-full6.jpg" alt="" /></li>
              </ul>
            </div>
          </div>
        </div>
        <!--/.modal --> 
        
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
      <p class="pull-left">© 2018 RoseFit. </p>
      
    </div>
  </div>
</footer>
<script type="text/javascript" src="style/js/jquery.min.js"></script> 
<script type="text/javascript" src="style/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="style/js/plugins.js"></script> 
<script type="text/javascript" src="style/js/scripts.js"></script>
<script type="text/javascript" src="./bootstrap-tagsinput.js"></script>
</body>
</html>