<?php
session_start();
require("phpincludes/config.inc");
dbConnect();

$userdata_query=mysql_query("select user_id from users where mobile_no = 'guest' and password = 'guest'");
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
