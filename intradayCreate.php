<?php
include_once('intradayCreateInner.php');
$numRows = $admin->fetchIntradayCount();
if($numRows > 0){
    $intradayRes = $admin->fetchIntraday();
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        <meta charset="utf-8" />
        <title>Admin | Dashboard</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        
        <link rel="stylesheet" href="assets/css/jquery-ui.css"/>
        
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
        <style>
    	.btn.green:not(.btn-outline) {
		    color: #FFF;
		    background-color: #ef7f1a;
		    border-color: #ef7f1a;
		}
		.ui-widget-header {
		    border: 1px solid #4faeef;
		    background: #4faeef url(images/ui-bg_highlight-soft_75_cccccc_1x100.png) 50% 50% repeat-x;
		    color: #ffffff;
		    font-weight: bold;
		    border-radius: 7px!important;
		}
        .portlet.box.yellow>.portlet-title, .portlet.yellow, .portlet>.portlet-body.yellow {
            background-color: #4faeef;
        }
        .portlet.box.yellow {
            border: 1px solid #4faeef;
            border-top: 0;
        }
        .portlet.box.yellow>.portlet-title, .portlet.yellow, .portlet>.portlet-body.yellow{
            background-color: #4faeef;
        }
        </style>
      </head>  
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
        
            <!-- BEGIN HEADER -->
            <?php include('include/header.php'); ?>
            <!-- END HEADER -->
            
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <?php include('include/sidebar.php'); ?>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->                        
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="dashboard.php">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <a href="#.">Dashboard</a>
                                </li>                                
                            </ul>                            
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Manage Intraday</h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet box yellow">
                                    <div class="portlet-title">
                                        <div class="caption"><i class="fa fa-gift"></i> Intraday Form </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <!-- BEGIN FORM-->
                                        <form role="form" action="#" id="intradayAdd" method="post" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="control-label">Posting date</label>
                                                    <input type="text" name="date" id="datepicker" class="form-control" value="<?php echo $intradayRes['dates']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Technical Trend</label>
                                                    <textarea name="technicalTrend" id="technicalTrend" class="form-control"><?php echo $intradayRes['techTrend']; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Support & Resistance</label>
                                                    <textarea name="support" id="support" rows="5" cols="5" class="form-control"><?php echo $intradayRes['support']; ?></textarea>			
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">News</label>
                                                    <textarea name="news" id="news" rows="5" cols="5" class="form-control"><?php echo $intradayRes['news']; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Image</label>
                                                    <input type="file" name="imageIntraday" id="imageIntraday" class="form-control" onChange="readImage(this);">

                                                    <span class="imgErrIntraday" style="color: red;"></span> <br>
                                                    <span class="imgErrIntradaytype" style="color: red;"></span>

                                                    <div>
                                                        <img <?php if(!empty($intradayRes['image'])){ ?> src="uploadDocuments/<?php echo $intradayRes['image']; ?>" <?php } ?> id="imgIntraday" width="120" height="80" style="display: <?php if(!empty($intradayRes['image'])){ ?> block <?php }else{ ?> none <?php } ?>;margin-top: 10px;">
                                                        <img id="close" src="images/close.png" style="width: 22px;display: <?php if(!empty($intradayRes['image'])){ ?> block <?php }else{ ?> none <?php } ?>;">
                                                    </div>
                                                    <span class="imgErr1" style="color: #43bd48;">Note - Image size cannot be more than 300KB. <br> Image Size Width : 200px to 400px and Height : 200px to 300px</span>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="btn-set pull-right">
                                                    <a href="intradayCreate.php" type="button" class="btn green">Reset</a>
                                                    <button type="submit" name="intraday" class="btn green">Submit</button>
                                                </div>
                                                
                                            </div>
                                        </form>
                                        <!-- END FORM-->
                                    </div>
                                </div>
                            </div>
                        </div>                      
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->               
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <?php include('include/footer.php'); ?>
            <!-- END FOOTER -->
        </div>
        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui.js"></script>

<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<!-- <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script> -->
<script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
<script>
$(document).ready(function(){
	//$('#datepicker').focus();
    $('form').attr('autocomplete', 'off');
    var editor=CKEDITOR.replace('technicalTrend');
    var editor=CKEDITOR.replace('support');
    var editor=CKEDITOR.replace('news');
    
    $('#close').on('click',function(){
           $('#imgIntraday').attr('src','');
           $(".imgErrIntraday").html('');
           $("#imageIntraday").val('');
           $('#imgIntraday,#close').hide();
    });
});
</script>
<script>
	$("#datepicker").datepicker({ 
    	dateFormat: 'yy-mm-dd',
    	minDate: '0',
    });
    function readImage(input) {            
        $('#imgIntraday').show();
        $('#close').show();
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgIntraday').attr('src', e.target.result);
                $('#imgMsg').css('margin-left', '110px');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    //Image Validation
    var width, height=0;
    var _URL = window.URL || window.webkitURL;
    var fileName, fileExtension;
	
    $("#imageIntraday").change(function (e) {
        var file, img;
        var fileSize_inKB = Math.round(($("#imageIntraday")[0].files[0].size / 1024));
        var fileName = e.target.files[0].name;
        var ext = fileName.split('.').pop();

        //alert(ext);
        
        if(ext != 'jpeg' && ext != 'jpg' && ext != 'png' && ext != 'gif'){
        	$(".imgErrIntradaytype").html('Invalid filetype!!');
        }
        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function () {
                height = this.height;
                width = this.width;
                if(width>200 && width<400 && height>200 && height<300){
	            	if (fileSize_inKB > 900) {
		          		$(".imgErrIntraday").html('Image size cannot be more than 300KB.'); 
		          	}
	            } else{
	               	$(".imgErrIntraday").html('Error!!! Image Size Width : 200px to 400px and Height : 200px to 300px'); 
	            } 
            };
            img.src = _URL.createObjectURL(file);
        }
    });

    $( "#intradayAdd" ).submit(function( event ) {
    	var fileSize_inKB = Math.round(($("#imageIntraday")[0].files[0].size / 1024));
        var errFlag = 0;
        var ext = $("#imageIntraday").val().split('.').pop();
        if(ext != 'jpeg' && ext != 'jpg' && ext != 'png' && ext != 'gif'){
        	$(".imgErrIntradaytype").html('Invalid filetype!!');
        }
        if(width>200 && width<400 && height>200 && height<300){
        	if (fileSize_inKB > 900) {
          		$(".imgErrIntraday").html('Error!!! Image size cannot be more than 300KB.'); 
              	errFlag++;
          	}
        } else{
           	$(".imgErrIntraday").html('Error!!! Image Size Width : 200px to 400px and Height : 200px to 300px'); 
           	errFlag++;
        }   
        if(errFlag > 0){
        	return false;
        } else {
        	return true;
        }                           
    }); 
</script>
</body>
</html>
