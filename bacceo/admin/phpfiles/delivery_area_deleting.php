<?php 
require("../../mobile/phpfiles/phpincludes/config.inc");
dbconnect();
$id = $_GET['id'];
if(mysql_query("DELETE FROM `delivery_areas` WHERE id = ".$id)) {
	echo 1;
} else {
	mysql_query("DELETE FROM `delivery_areas` WHERE id = "+$id) or die();
	}

?>