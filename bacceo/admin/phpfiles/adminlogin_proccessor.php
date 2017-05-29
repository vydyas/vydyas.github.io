<?php 
session_start();
require("../../mobile/phpfiles/phpincludes/config.inc");
require("../../mobile/phpfiles/phpincludes/phpfunctions.inc");
dbconnect();
$username=mysql_real_escape_string($_GET['username']);
$password=mysql_real_escape_string($_GET['password']);
if($username=="ayyappa" && $password=="raju"){
	$_SESSION['admin_user_id']=1;
	$_SESSION['unique_id'] = uniqid();
	echo 1;
	} 
else {
		
	echo 0;	
}
?>