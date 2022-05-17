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
if(isset($_POST['bankNifty'])){
    //echo 'Hiii';die;
    $dates        = $_REQUEST['date'];
    $techTrend    = $_REQUEST['technicalTrend'];
    $support      = $_REQUEST['support'];

    $fileDocument = $_FILES['imageBankNifty']['name'];
    $fileSize = $_FILES['imageBankNifty']['size'];
    $fileType = $_FILES['imageBankNifty']['type'];
    $fileTemp = $_FILES['imageBankNifty']['tmp_name'];
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
    $numRows = $admin->fetchBankNiftyCount();
    $result = $admin->addBankNifty($numRows,$dates,$techTrend,$support,$fileDocument);
}
?>