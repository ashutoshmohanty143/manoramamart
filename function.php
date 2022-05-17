<?php
ini_set("display_errors",1);
ob_start();
session_start();
session_regenerate_id();
include("conection.php");
date_default_timezone_set('Asia/Kolkata');

//admin login
class Admin extends Connection
{
	function adminLogin($username)
	{
		$qry="SELECT * FROM Users WHERE UserName='$username' and RoleId=1";
		$this->ExecQuery($qry);
		$row=$this->FetchResult();
		return $row;	
	}
	function addIntraday($numRows,$dates,$techTrend,$support,$news,$fileDocument)
	{
		$status = 1;
		$rowIntraday = $this->fetchIntraday();
		$id = $rowIntraday['id'];
		if($numRows > 0){
			$qry = "UPDATE intraday set dates='$dates',techTrend='$techTrend',support='$support',news = '$news',image = '$fileDocument', status=1 where id='$id'";
			$this-> ExecQuery($qry);
		} else {
			$qry = "INSERT INTO intraday(dates,techTrend,support,news,image,status) VALUES ('$dates', '$techTrend', '$support', '$news','$fileDocument',$status')";
		}
		$insertedid = $this-> insertedId($qry);
		return $insertedid;
	}
	function fetchIntraday()
	{
		$qry="SELECT * FROM intraday ORDER BY id ASC LIMIT 0,1";
		$this->ExecQuery($qry);
		$row=$this->FetchResult();
		return $row;	
	}
	function fetchIntradayCount()
	{
		$qry="SELECT * FROM intraday ORDER BY id ASC LIMIT 0,1";
		$this->ExecQuery($qry);
		$numRow=$this->numRows();
		return $numRow;	
	}


	//Bank Nifty
	function addBankNifty($numRows,$dates,$techTrend,$support,$fileDocument)
	{
		$status = 1;
		$rowBankNifty = $this->fetchIntraday();
		$id = $rowBankNifty['id'];
		if($numRows > 0){
			$qry = "UPDATE bankNifty set dates='$dates',techTrend='$techTrend',support='$support',image = '$fileDocument', status=1 where id='$id'";
			$this-> ExecQuery($qry);
		} else {
			$qry = "INSERT INTO bankNifty(dates,techTrend,support,image,status) VALUES ('$dates','$techTrend','$support','$fileDocument','$status')";
		}
		$insertedid = $this-> insertedId($qry);
		return $insertedid;
	}
	function fetchBankNifty()
	{
		$qry="SELECT * FROM bankNifty ORDER BY id desc LIMIT 0,1";
		$this->ExecQuery($qry);
		$row=$this->FetchResult();
		return $row;	
	}
	function fetchBankNiftyCount()
	{
		$qry="SELECT * FROM bankNifty ORDER BY id desc LIMIT 0,1";
		$this->ExecQuery($qry);
		$numRow=$this->numRows();
		return $numRow;	
	}

	//Stock Trend
	function addStockTrend($numRows,$dates,$bullish,$bearish,$fileDocument)
	{
		$status = 1;
		$rowStockTrend = $this->fetchStockTrend();
		$id = $rowStockTrend['id'];
		if($numRows > 0){
			$qry = "UPDATE stockTrend set dates='$dates',bullish='$bullish',bearish='$bearish',image = '$fileDocument', status=1 where id='$id'";
			$this-> ExecQuery($qry);
		} else {
			$qry = "INSERT INTO stockTrend(dates,bullish,bearish,image,status) VALUES ('$dates','$bullish','$bearish','$fileDocument','$status')";
		}
		$insertedid = $this-> insertedId($qry);
		return $insertedid;
	}
	function fetchStockTrend()
	{
		$qry="SELECT * FROM stockTrend ORDER BY id desc LIMIT 0,1";
		$this->ExecQuery($qry);
		$row=$this->FetchResult();
		return $row;	
	}
	function fetchStockTrendCount()
	{
		$qry="SELECT * FROM stockTrend ORDER BY id desc LIMIT 0,1";
		$this->ExecQuery($qry);
		$numRow=$this->numRows();
		return $numRow;	
	}
}
?>