<? ob_start(); ?>
<?php
include("head_top.php");

$clid=$_GET['clid'];

$qry=mysql_query("SELECT * FROM circular WHERE cl_id='$clid' AND (type='Student' OR type='All') AND (b_id=$bid OR b_id='0')");							
			 $row=mysql_fetch_array($qry);
 $filename=$row['file'];
// $file="circular/$filename";
$file="../schoolerp/circular/$filename"; /* Oline Code*/
$len = filesize($file); // Calculate File Size
ob_clean();
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: public"); 
header("Content-Description: File Transfer");
header("Content-Type:application/pdf"); // Send type of file
$header="Content-Disposition: attachment; filename=$filename;"; // Send File Name
header($header );
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".$len); // Send File Size
@readfile($file);

/*$uid=$_SESSION['uid'];

date_default_timezone_set("Asia/Calcutta"); 
	$date=date("d/m/Y H:i:s");
	$lid=$_SESSION['lastid'];
	$qry=mysql_query("INSERT INTO down_detail (d_date,u_id,r_id,l_id) VALUES
('$date','$uid','$id','$lid')");*/

exit;

?><? ob_flush(); ?>