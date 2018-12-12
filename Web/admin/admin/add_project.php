<?php session_start(); ?>
<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Login Container -->
<div id="login-container">
    <!-- Register Header -->
    <h1 class="h2 text-light text-center push-top-bottom animation-slideDown">
        <i><a href="http://120.110.113.70/rosefit_greenhouse/index/index.php"><img src="img/rosefit2.png" alt="Home menu" /></i>
    </h1>
    <!-- END Register Header -->

    <!-- Register Form -->
    <div class="block animation-fadeInQuickInv">
        <!-- Register Title -->
        <div class="block-title">
            <div class="block-options pull-right">
                <a href="#" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip" data-placement="left" title=""></a>
            </div>
            <h2>新增專案</h2>
        </div>
        <!-- END Register Title -->

        <!-- Register Form -->
        <form id="form-register" action="add_projectaction.php" method="post" class="form-horizontal">
            <div class="form-group">
                <div class="col-xs-12">
                    <select id="separate" name="separate" onchange="separate_function()">
                        <option value="commonuser">一般使用者</option>
                        <option value="expert">專家</option>
                    </select>
                    <p id="note">一般使用者模式，將享有全自動溫室控制服務。</p>
                    <script type="text/javascript">
                        function separate_function(){
                            var x = document.getElementById("separate").value;
                            if (x == "expert") {
                                document.getElementById("note").innerHTML = "專家模式，您將可調控溫室數據。";
                            }
                        }
                    </script>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="text" id="planname" name="planname" class="form-control" placeholder="專案名稱">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="text" id="greenhousename" name="greenhousename" class="form-control" placeholder="溫室名稱">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="text" id="plantname" name="plantname" class="form-control" placeholder="幫植物取名吧!">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="text" id="plantkind" name="plantkind" class="form-control" placeholder="植物種類">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="text" id="key" name="key" class="form-control" placeholder="溫室金鑰輸入">
                </div>
            </div>
            
            <div class="form-group form-actions">
                <div class="col-xs-6">
                    <!--<label class="csscheckbox csscheckbox-primary" data-toggle="tooltip" title="Agree to the terms">
                        <input type="checkbox" id="register-terms" name="register-terms">
                        <span></span>
                    </label>-->
                    <!--<a href="#modal-terms" data-toggle="modal">Terms</a>-->
                </div>
                <div class="col-xs-6 text-right">
                    <button type="submit" class="btn btn-effect-ripple btn-success"><i class="fa fa-plus"></i> 新增</button>
                </div>
            </div>

        </form>
        <!-- END Register Form -->
    </div>
    <!-- END Register Block -->

    <!-- Footer -->
    <footer class="text-muted text-center animation-pullUp">
        <small><span id="year-copy"></span> &copy; <a href="http://120.110.113.70/rosefit_greenhouse/index/index.php" target="_blank"><?php echo $template['name'] . ' ' . $template['version']; ?></a></small>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Login Container -->

<!-- Modal Terms
<div id="modal-terms" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center"><strong>RoseFit介紹</strong></h3>
            </div>
            <div class="modal-body">
                <h4 class="page-header">1. <strong>背景</strong></h4>
                <p>物聯網的發展士、農、工、商，無論是什麼產業或領域，無一不受到科技衝擊正站在轉型巨浪上。農漁畜牧業也是，進入機械時代後，農友在許多工作上有機械代勞，自然省去不少身體勞動，然而另外還有很多環節，尚須仰賴大量人力與非結構化的種植、養殖經驗；但以物聯網、大數據為核心的新一波「智慧農業」興起後，這種情況正在快速大幅被扭轉，帶領農業進入下一波的飛速發展。</p>
                <h4 class="page-header">2. <strong>動機</strong></h4>
                <p>我們幾個因為熱愛植物，在種植上常常有交流，大二開始漸漸學到可以利用Arduino監控植物的生長，但監控並無法改善植物的生長狀況，所以我們組織讀書會一起研究微控制器如何調控植物的生活，漸漸的我們也學習怎麼使用資料庫紀錄我們感測出來的值，也學會使用網頁呈現我們的結果。直至大三畢業專題，我們決定延伸我們的興趣至課業上，組織名為「RoseFit」的團隊，因為我們就像珍惜玫瑰的小王子一樣，想建造出連玫瑰都能好好照料的系統。</p>
            </div>
            <div class="modal-footer">
                <div class="text-center">
                    <button type="button" class="btn btn-effect-ripple btn-sm btn-primary" data-dismiss="modal">I've read them!</button>
                </div>
            </div>
        </div>
    </div>
</div>
SEND Modal Terms -->

<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/readyRegister.js"></script>
<script>$(function(){ ReadyRegister.init(); });</script>

<?php include 'inc/template_end.php'; ?>