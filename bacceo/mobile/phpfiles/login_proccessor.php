<?php
session_start();
require("phpincludes/config.inc");
dbConnect();
$mobile_no=mysql_real_escape_string($_GET['mobile_no']);
$password=mysql_real_escape_string($_GET['pswrd']);
$userdata_query=mysql_query("select user_id from users where mobile_no = $mobile_no and password = '$password'");
$userdata=mysql_fetch_array($userdata_query);

if(mysql_num_rows($userdata_query) == 1)
{
$_SESSION['user_id']=$userdata['user_id'];

echo 1;
}
else{
	echo "Invalid User ! Please Check your login details ";
}
?>
