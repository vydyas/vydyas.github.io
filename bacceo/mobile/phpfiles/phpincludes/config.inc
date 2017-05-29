<?php
function dbconnect()
{
$dbserver="localhost";
$dbuser="root";
$dbpassword="";
$dbname="grawity";
$dbcon=mysql_connect("$dbserver","$dbuser","$dbpassword") or die ("couldnt connect db ".mysql_error()); 
mysql_select_db("$dbname",$dbcon);
date_default_timezone_set("Asia/Calcutta");

}
/*
 * Google API Key
 */
define("GOOGLE_API_KEY", "AIzaSyADqJBoiyCZwyi9a-OKkIuC_YfQ24dZ6hA"); // Place your Google API Key
?>