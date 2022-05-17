<?php
session_start();
session_regenerate_id();
$random = (rand() % 1000);
$_SESSION["salt"] = $random;
if(isset($_SESSION['user_id'])){
	header('location: dashboard.php');
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
        <meta charset="utf-8" />
        <title>Admin | Admin Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="favicon.ico" /> 
</head>
    <!-- END HEAD -->

    <body class="login" >
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.php">
                <img src="img/logo.png" alt="logo" style="width: 250px;margin-right: 5px;" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form role="form" action="login.php" method="post">
                <h3 class="form-title font-green">Sign In</h3>
                <p align="center" style="color: #29585d;">Login to Signin your Account</p>               
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" id="username" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" id="password" /> </div>                
                <div class="create-account">
                    <p>
                        <button type="submit" id="register-btn" name="user_login" class="btn green uppercase">Login</button><!--onClick="return Validate();"-->
                    </p>
                </div>
            </form>
            <!-- END LOGIN FORM -->
                       
        </div>
        <div class="copyright"> <?php echo date('Y'); ?> &copy; Copyright Protected .. </div>
        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/login.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <script src="assets/js/md5.js"></script>
    <!-- Google Tag Manager -->
    <script>
    	$(document).ready(function(){
    		$('#username').focus();
		    $('form').attr('autocomplete', 'off');
		});
		function Validate()
		{
			alert($("#password").val());
			alert(hex_md5($("#password").val()) + "<?php echo $random; ?>");
			alert(hex_md5(hex_md5($("#password").val()) + "<?php echo $random; ?>"));
			
			
			var strPassword = hex_md5($("#password").val()) + "<?php echo $random; ?>";
			$("#password").val(strPassword);
			//event.preventDefault();
		}
    </script>
</body>
</html>