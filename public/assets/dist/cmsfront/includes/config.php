<?php
ob_start();
error_reporting(0);
session_start();
// Make Database Connection
$con = mysql_connect("localhost", "tameasy_user", "tameasy_user@123") or die("Couldn't make connection.");
$db = mysql_select_db("tameasy_ultimate_college", $con) or die("Couldn't select database");
?>