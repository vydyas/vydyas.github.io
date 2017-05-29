<?php 
require("phpincludes/config.inc");
dbconnect();
$menu_table_name = $_GET['menu_table_name'];
$value = $_GET['value'];
$id=$_GET['id'];
if($_GET['id']==0){

mysql_query("INSERT INTO `$menu_table_name`(`name`) VALUES ('$value')");
}else{
	if($menu_table_name == 'main_menu'){
	$upper_menu_name = 'super_menu_id';
	} else if($menu_table_name == 'submenu'){
		$upper_menu_name = 'main_menu_id';
		}
	mysql_query("INSERT INTO `$menu_table_name`(`name`,`$upper_menu_name`) VALUES ('$value',$id)");
	
	}
?>