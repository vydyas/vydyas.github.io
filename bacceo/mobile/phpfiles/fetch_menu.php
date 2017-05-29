<?php 
require("phpincludes/config.inc");
dbconnect();
$menu_table_name = $_GET['menu_table_name'];
if($menu_table_name == 'main_menu'){
	$upper_menu_name = 'super_menu_id';
	} else if($menu_table_name == 'submenu'){
		$upper_menu_name = 'main_menu_id';
		}
$id = $_GET['id'];
if($id==0){
$query_for_fetch_cat_list = mysql_query("select * from $menu_table_name");
//$cat=array();
while($row = mysql_fetch_array($query_for_fetch_cat_list)){
$list[]=array("id" =>$row[$menu_table_name .'_id'], "name"=>ucfirst($row['name']));	
}
echo json_encode($list, JSON_PRETTY_PRINT);
}
else {
	
	$query_for_fetch_cat_list = mysql_query("select * from $menu_table_name where $upper_menu_name = $id ");
//$cat=array();
if(mysql_num_rows($query_for_fetch_cat_list)>0){
while($row = mysql_fetch_array($query_for_fetch_cat_list)){
$list[]=array("id" =>$row[$menu_table_name .'_id'], "name"=>ucfirst($row['name']));	
}
echo json_encode($list, JSON_PRETTY_PRINT);
	
} else {
	$list[]=array("id" =>0, "name"=>"No Items");
	echo json_encode($list, JSON_PRETTY_PRINT);
	}


}
?>