<?php
class Connection
{
	var $servername;
	var $username;
	var $password;
	var $dbname;

	function Connection ($servername="localhost", $username="nifty_cms", $password="ashutosh@123", $dbname="nifty_cms")
	{
	    $this->host=$servername;
	    $this->dbname=$dbname;
	    $this->username=$username;
	    $this->password=$password;
	    $this->Connect();
	}	
	    function Connect ()
	{
	    $this->dbconnect =new mysqli($this->host, $this->username, $this->password, $this->dbname);
		    
	}
		
	function ExecQuery ($sql)
	{
	    $this->result=$this->dbconnect->query($sql);
		    //$this->query->Free();
	    return $this->result;
	}

	function FetchResult ()
	{
	    if ($this->result)
	    {
		$this->arr=$this->result->fetch_array ();
		return $this->arr;
	    }
	    else
	    {  
		return null;
	    }
	}
	function Error ()
	{
	    if (version_compare(phpversion(), "4.2.0", "ge")>0)
	    {
		$this->error=$this->dbconnect->errno;
		    return $this->error;
	    }
	}
	function numRows()
	{
		$this->rows=$this->result->num_rows;
		return $this->rows; 
	}
		
	function EscString($str)
	{
		$this->result=$this->dbconnect->real_escape_string($str);
		return $this->result;
	}

	function insertedId($sql)
	{
	    $this->Connect();
	    $this->dbconnect->query($sql);
	    $this->result=$this->dbconnect->insert_id;
	    return $this->result;
	}
	
	function getIndianCurrencyinWord($number)
	{
	$decimal = round($number - ($no = floor($number)), 2) * 100;
	$hundred = null;
	$digits_length = strlen($no);
	$i = 0;
	$str = array();
	$words = array(0 => '', 1 => 'one', 2 => 'two',
	    3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
	    7 => 'seven', 8 => 'eight', 9 => 'nine',
	    10 => 'ten', 11 => 'eleven', 12 => 'twelve',
	    13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
	    16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
	    19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
	    40 => 'forty', 50 => 'fifty', 60 => 'sixty',
	    70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
	$digits = array('', 'hundred','thousand','lakh', 'crore');
	while( $i < $digits_length ) {
	    $divider = ($i == 2) ? 10 : 100;
	    $number = floor($no % $divider);
	    $no = floor($no / $divider);
	    $i += $divider == 10 ? 1 : 2;
	    if ($number) {
		$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
		$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
		$str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
	    } else $str[] = null;
	}
	$Rupees = implode('', array_reverse($str));
	$paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
	return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise ;
	}
	
	      // ======================Function to send mail ===================  
    function Sendmail($strFrom, $strTo, $strSubject, $strMessage) {
	//echo $strFrom.','.$strTo.','.$strSubject.','.$strMessage;    exit;
        $MailMessage = "";
        $headers = "";
        //$name = ($name != '') ? $name : 'Sir / Madam';
        if ($strTo != "") {
            $mailTo = $strTo;
            $MailMessage.="<table cellspacing='0' cellpadding='2' border='0' bgcolor='#cccccc'>";
            $MailMessage.="<tr bgcolor='#FFFFFF'>";
            $MailMessage.="<td>" . $strMessage . "</td>";
            $MailMessage.="</tr>";
            $MailMessage.="</table>";
            $headers.= "FROM:" . $strFrom . "\n";
            $headers.= 'MIME-Version: 1.0' . "\n";
            $headers.= "Content-Type: text/html; charset=ISO-8859-1\n";            
            mail($mailTo, $strSubject, $MailMessage, $headers);            
        }
    }

}
?>