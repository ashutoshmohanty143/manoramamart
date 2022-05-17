<?php
define("size600KB","600000");
error_reporting(0);
ini_set( 'session.use_only_cookies', TRUE );                
ini_set( 'session.use_trans_sid', FALSE );
session_start();
session_regenerate_id();
if(!isset($_SESSION['userId'])){
    header('location: index.php');
}
include("function.php");
$admin=new Admin();
if(isset($_POST['stockTrend'])){

    $dates        = $_REQUEST['date'];
    $bullish    = $_REQUEST['bullish'];
    $bearish      = $_REQUEST['bearish'];

    $fileDocument = $_FILES['imagestockTrend']['name'];
    $fileSize = $_FILES['imagestockTrend']['size'];
    $fileType = $_FILES['imagestockTrend']['type'];
    $fileTemp = $_FILES['imagestockTrend']['tmp_name'];
    $ext = pathinfo($fileDocument, PATHINFO_EXTENSION);
    $fileDocument = ($fileDocument != '') ? 'upload' . date("Ymd_His") . '.' . $ext : '';

    if ($fileSize > size600KB) {
        $errFlag               = 1;
        $flag                  = 1;
        $outMsg = 'File size can not more than 300 KB';
    } 
    if($fileDocument != ''){
        if($fileType == 'image/jpg' || $fileType == 'image/jpeg' || $fileType == 'image/JPEG' || $fileType == 'image/gif' || $fileType == 'image/png')
        {
            $folder="uploadDocuments/";
            $filename = $folder.$fileDocument; 
            $copied = copy($fileTemp, $filename);
        }
        else{
            $errFlag               = 1;
            $flag                  = 1;
            $outMsg = 'Invalid file types. Upload only jpeg,jpg,gif';
        }
    }
    $numRows = $admin->fetchStockTrendCount();
    $result = $admin->addStockTrend($numRows,$dates,$bullish,$bearish,$fileDocument);
}
?>