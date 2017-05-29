<?php
session_start();
require("phpincludes/config.inc");
dbConnect();
$ful_name = mysql_real_escape_string($_GET['full_name']);
$mobile_no=mysql_real_escape_string($_GET['mobile_no']);
$password=mysql_real_escape_string($_GET['pswrd']);
$userdata_query=mysql_query("select user_id from users where mobile_no = $mobile_no");
$userdata=mysql_fetch_array($userdata_query);

if(mysql_num_rows($userdata_query) == 1)
{
	echo "This Mobile already registered";
}
else {
	
if(mysql_query("insert into users (`full_name`,`mobile_no`,`password`) values ('$ful_name','$mobile_no','$password') "))
	{
	$_SESSION['user_id']= mysql_insert_id();
	echo 1;
	}
}
?>
