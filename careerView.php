<?php
include("function.php");
$admin=new Admin();
if(!isset($_SESSION['userId'])){
	header('location: index.php');
}
$result = $admin->getAllUserinfo();
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
        <link rel="shortcut icon" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.17/jquery.datetimepicker.css" type="text/css" /> 
        
        <style>
        	.ui-widget-header {
		    border: 1px solid #e87c1b;
		    background: #ef7f1a url(images/ui-bg_highlight-soft_75_cccccc_1x100.png) 50% 50% repeat-x;
		    color: #ffffff;
		    font-weight: bold;
		    border-radius: 7px!important;
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
                                    <i class="fa fa-circle"></i>
                                </li>                                
                            </ul>                            
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> View Registrations </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">                                    
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                        <form action="" method="post" id="form_sample_2">
                                            <div class="row">   
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-md-2" style="color: #36c6d3;margin-top: 10px;">Choose From Date</label>
                                                        <div class="col-md-3">
                                                            <input class="form-control" id="datepicker" name="date_from" type="text" value="" placeholder="From Date">   
                                                        </div>          
                                                        <label class="col-md-2" style="color: #36c6d3;margin-top: 10px;"> Choose To Date</label>
                                                        <div class="col-md-3">
                                                        <input class="form-control" id="datepicker1" type="text" name="date_to" value="" placeholder="To Date"> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                         <label class="col-md-2" style="color: #36c6d3;margin-top: 10px;">Payment Status</label>
                                                        <div class="col-md-3">
                                                            <select class="form-control" name="paymentMode">
                                                                <option value="">---- Select ----</option>
                                                                <option value="Paytm">Paid</option>
                                                                <option value="Online">Unpaid</option>
                                                            </select>
                                                        </div> 
                                                        <label class="col-md-2" style="color: #36c6d3;margin-top: 10px;">Mobile Number</label>
                                                        <div class="col-md-3">
                                                        <input class="form-control" type="text" name="mobileNo" value="" placeholder="Mobile Number"> 
                                                        </div>   
                                                       
                                                    </div>
                                                    
                                                    <div class="form-group row center">
                                                        <div class="col-md-4"></div>
                                                         <div class="col-md-3">
                                                            <button type="submit" name="search" id="sample_editable_1_new" class="btn sbold green" style="    width: 100%;"> Submit</button>
                                                         </div> 
                                                    </div>
                                                </div>   
                                           </div>
                                          </form>
                                        </div>
                                        <div class="table-toolbar">
                                            <div class="row">
                                            
                                                <div class="col-md-6">
                                                    <!--<div class="btn-group">
                                                        <a href="gallery-add.php"><button id="sample_editable_1_new" class="btn sbold green"><i class="fa fa-plus"></i> Add Images</button></a>
                                                    </div>-->
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group pull-right">
                                                        <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-print"></i> Print </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th width="4%"> Sl.#</th>
                                                    <th width="12%"> Name/Email/Mobile </th>
                                                    <th width="12%"> Type </th>
                                                    <th width="12%"> Designation </th>
                                                    <th width="12%"> Institution </th>
                                                    <th width="12%"> Food Preference </th> 
                                                    <th width="12%"> Amount Paid  </th>    
                                                    <th width="12%"> Payment Status </th>   
                                                    <th width="12%"> Registration Date</th>          
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
											//$allPatients = $admin->viewPatientDetails();
											//echo '<pre>';print_r($allPatients);die;
                                            $ctr=1;
											foreach($result as $row)
											{
											?>
                                                <tr class="odd gradeX">
                                                    <td><?=$ctr++;?></td>
                                                    <td><?=$row['Name'].'<br/>'.$row['Email'].'<br/>'.$row['Mobile']; ?></td>
                                                    <td><?=$row['Type']?></td>
                                                    <td><?=$row['Designation']?></td>
                                                    <td><?=$row['Institution']?></td>
                                                    <td><?=$row['FoodPreference']?></td>
                                                    <td><?=$row['PayableAmount']?></td>
                                                    <td><?=($row['PaymentStatus']==1)?'Paid':'Not Paid';?></td>
                                                    <td><?=date("d-m-Y h:i A",strtotime($row['CreatedOn']))?></td>
                                                </tr>  
											<?php } ?>              
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.17/jquery.datetimepicker.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<script>
    $("#datepicker").datepicker({ 
    dateFormat: 'yy-mm-dd',
    //minDate: '1',
    onSelect: function(date){
        var selectedDate = new Date(date);
        var msecsInADay = 86400000;
        var endDate = new Date(selectedDate.getTime() + msecsInADay);
        $("#datepicker1").datepicker( "option", "minDate", endDate );
    }
    });

    $("#datepicker1").datepicker({ 
        dateFormat: 'yy-mm-dd',
        //minDate: '2',
    });
    </script>

</body>
</html>
