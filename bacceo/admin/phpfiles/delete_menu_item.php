<?php 
require("../../mobile/phpfiles/phpincludes/config.inc");
dbconnect();
$menu_table_name = $_GET['menu_table_name'];
$menu_item_id=$_GET['id'];
if($menu_table_name=="super_menu"){
	$query=mysql_query("select * from main_menu where super_menu_id=$menu_item_id ");
	$query_data=mysql_fetch_array($query);
	
	if(count($query_data)>1){
		
		$result[]=array("status_id" =>1, "data"=>"Sorry! Please Delete Main Menu List Under This Catlog first and Try again");
		echo json_encode($result, JSON_PRETTY_PRINT);
		}else if(mysql_query("DELETE FROM $menu_table_name WHERE super_menu_id = $menu_item_id ")) {
			
			$result[]=array("status_id" =>2, "data"=>"Successfully Deteted ! ");
			echo json_encode($result, JSON_PRETTY_PRINT);
			}
		
	}
if($menu_table_name=="main_menu"){
	$query=mysql_query("select * from submenu where main_menu_id=$menu_item_id ");
	$query_data=mysql_fetch_array($query);
	
	if(count($query_data)>1){
		
		$result[]=array("status_id" =>1, "data"=>"Sorry! Please Delete Main Menu List Under This Catlog first and Try again");
		echo json_encode($result, JSON_PRETTY_PRINT);
		}else if(mysql_query("DELETE FROM $menu_table_name WHERE main_menu_id = $menu_item_id ")) {
			
			$result[]=array("status_id" =>2, "data"=>"Successfully Deteted ! ");
			echo json_encode($result, JSON_PRETTY_PRINT);
			}
		
	}
	if($menu_table_name=="submenu"){
		$query=mysql_query("select * from grocery_products where cat_id=$menu_item_id ");
	$query_data=mysql_fetch_array($query);
	
	if(count($query_data)>1){
		
		$result[]=array("status_id" =>1, "data"=>"Sorry! This cat Contains items Please Make it Empty and Try Again");
		echo json_encode($result, JSON_PRETTY_PRINT);
		}else if(mysql_query("DELETE FROM $menu_table_name WHERE submenu_id = $menu_item_id ")) {
			
			$result[]=array("status_id" =>2, "data"=>"Successfully Deteted ! ");
			echo json_encode($result, JSON_PRETTY_PRINT);
			}
		
	}
?>