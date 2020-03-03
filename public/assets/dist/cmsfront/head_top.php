<?php 
include("includes/config.php");

session_start();
$_SESSION['email']=$_SESSION['admin_no'];
$check=$_SESSION['admin_no'];

$query=mysql_query("select admission_number from student where admission_number='$check' ");

$data=mysql_fetch_array($query);

$admin_no=$data['admission_number'];
$user=$_SESSION['uname'];

$acyear=$_SESSION['ay_id'];

$ayear=mysql_query("SELECT * FROM year WHERE ay_id='$acyear'");
$ay=mysql_fetch_array($ayear);
$acyear_name=$ay['y_name'];

$ssid=$_SESSION['ss_id'];

$query1=mysql_query("select * from student where ss_id='$ssid' ");
$student1=mysql_fetch_array($query1);

$cid=$student1['c_id'];
$sid=$student1['s_id'];
$bid=$student1['b_id'];


if(isset($_SESSION['expiretime'])) {
    if($_SESSION['expiretime'] < time()) {
        header("Location:timeout.php");
    }
    else {
        $_SESSION['expiretime'] = time() + 6000;
    }
}

if(!isset($admin_no))

{
	
header("Location:404.php");

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>
School/College Management</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>

    <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
   