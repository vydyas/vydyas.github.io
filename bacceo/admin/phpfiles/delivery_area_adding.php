<?php 
require("../../mobile/phpfiles/phpincludes/config.inc");
dbconnect();
$area_name = mysql_real_escape_string($_GET['area_name']);
if(mysql_query("insert into delivery_areas (`area_name`) values ('$area_name')")) {
	echo $area_name;
	}
?>