<?php session_start(); ?>
<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Login Container -->
<div id="login-container">
    <!-- Register Header -->
    <h1 class="h2 text-light text-center push-top-bottom animation-slideDown">
        <i><img src="img/rosefit2.png"/></i>
    </h1>
    <!-- END Register Header -->

    <!-- Register Form -->
    <div class="block animation-fadeInQuickInv">
        <!-- Register Title -->
        <div class="block-title">
            <div class="block-options pull-right">
                <a href="#" class="btn btn-effect-ripple " data-toggle="tooltip" data-placement="left" title=""></a>
            </div>
            <h2>綁定種植計畫</h2>
        </div>
        <!-- END Register Title -->

        <!-- Register Form -->
        <form id="form-register" action="page_finish_register2.php" method="post" class="form-horizontal">
            <div class="form-group">
                <div class="col-xs-12">
                    種植計畫：<strong>玫瑰</strong>
                    
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    選擇搭配的溫室：
                    <select name="connect_plan">
                        <option value="greenhouse1">溫室名稱1</option>
                        <option value="greenhouse2">溫室名稱2</option>
                    </select>
                </div>
            </div>
            <br/>
            <div class="form-group form-actions">
                <div class="col-xs-6">
                    <!--<label class="csscheckbox csscheckbox-primary" data-toggle="tooltip" title="Agree to the terms">
                        <input type="checkbox" id="register-terms" name="register-terms">
                        <span></span>
                    </label>-->
                    <!--<a href="#modal-terms" data-toggle="modal">Terms</a>-->
                </div>
                <div class="col-xs-6 text-right">
                    <a href="http://120.110.113.70/rosefit_greenhouse/social_platform/plan_sell.php" class="btn btn-effect-ripple btn-success"><i class="fa fa-minus"></i> 取消</a>
                    <button type="submit" class="btn btn-effect-ripple btn-success"><i class="fa fa-plus"></i> 綁定</button>
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



<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/readyRegister.js"></script>
<script>$(function(){ ReadyRegister.init(); });</script>

<?php include 'inc/template_end.php'; ?>