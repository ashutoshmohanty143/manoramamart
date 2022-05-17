<?php
//error_reporting(0);
session_start();
session_regenerate_id();
include("function.php");
$admin=new Admin();
if(isset($_POST['user_login']))
{	
	$username		= trim($_POST['username']);
	$password		= trim($_POST['password']);
	if(!empty($username) && !empty($password))
	{
		$login = $admin->adminLogin($username);
		$dbuser = trim($login['UserName']);
		$dbpass = trim($login['Password']);
		$intsalt = $_SESSION["salt"];
		//echo count($login)."============$username==$dbuser ========".md5($dbpass.$intsalt)."==$password";exit;
		if(count($login)!=0 && $username==$dbuser && md5($dbpass.$intsalt)==$password)
		{ 
			$userId = $login['UserId'];	
			$_SESSION['userId'] = $userId;		
			header("Location:dashboard.php");				
		}
		else
		{
			header("Location:index.php?msg=invalid username and password");			
		}
	}	
}
?>