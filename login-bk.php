<?php
error_reporting(0);
session_start();
session_regenerate_id();
include("function.php");
$admin=new Admin();
if(isset($_POST['user_login']))
{	
	$username		= trim($_POST['username']);
	$password		= trim($_POST['password']);
	$haspassword 	= md5($password);
	if(!empty($username) && !empty($password))
	{
		$login = $admin->adminLogin($username,$haspassword);
		$dbuser = $login['username'];
		$dbpass = $login['password'];
		if(count($login)!=0 && $username==$dbuser && $dbpass==$haspassword)
		{ 
			$user_id = $login['user_id'];	
			$_SESSION['user_id'] = $user_id;		
			header("Location: dashboard.php");				
		}
		else
		{ 
			header("Location: index.php?msg=invalid username and password");			
		}
	}	
}
?>