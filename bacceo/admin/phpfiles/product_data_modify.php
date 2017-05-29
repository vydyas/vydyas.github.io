<?php 
require("../../mobile/phpfiles/phpincludes/config.inc");
require("../../mobile/phpfiles/phpincludes/phpfunctions.inc");
dbconnect();
$product_type = $_GET['product_type'];
if(isset($_POST['pk'])){
$id= $_POST['pk'];
$col_name= $_POST['name'];
$value= $_POST['value'];
}
if(isset($_GET['pk'])){
$id= $_GET['pk'];
$col_name= $_GET['name'];
$value= $_GET['value'];	
	}
if($col_name == 'in_stock' ){
		
	$query_get_present_stock_of_product =mysql_fetch_array(mysql_query("select in_stock from ".$product_type." where p_id = $id"));
	$present_stock_value =$query_get_present_stock_of_product['in_stock'];
	$upadated_stock = ((int)$value)-((int)$present_stock_value);
	mysql_query("update grocery_products set in_stock = '".$upadated_stock ."' where p_id =". $id ) or die(mysql_error());		
	mysql_query("INSERT INTO `stock_mangement`(`p_id`, `product_type`,`added_stock`, `remaining_stock`, `remarks`,`on_date`) VALUES ('$id','$product_type','$upadated_stock','$value','Stock added by admin',now())")or die(mysql_error());
}
if($col_name == 'sell_price'){
	$discount_mode = $_GET['discount_mode'];
		if($discount_mode==0){
			$mrp = get_mrp_of_product($id,$product_type);
			$value = 100 - (($value*100)/$mrp);
		}
	}
mysql_query('update '.$product_type.' set '.mysql_real_escape_string($col_name).'="'.mysql_real_escape_string($value).'" where p_id = "'.mysql_real_escape_string($id).'"') or die(mysql_error());
	

?>