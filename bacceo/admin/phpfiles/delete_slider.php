<?php 
require("../../mobile/phpfiles/phpincludes/config.inc");
require("../../mobile/phpfiles/phpincludes/phpfunctions.inc");
dbconnect();
$id=$_GET['id'];
$query = mysql_fetch_array(mysql_query("select img_path from homesliders where id = $id"));
$file_tobe_delete = $query['img_path'];
if(mysql_query("DELETE FROM `homesliders` WHERE id=$id")){
	
		if(unlink('../../img/homepageslider/'.$file_tobe_delete)){
		echo "success";
		}
	}
?>
