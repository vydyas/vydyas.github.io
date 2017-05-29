<?php
function get_product_table_name($supermenuid){
	$query = mysql_fetch_array(mysql_query("select * from super_menu where super_menu_id= $supermenuid"));
		return $query['table_name'];
	}
function get_name_of_address_holder($id){
		$query = mysql_fetch_array(mysql_query("select * from user_address_book where id= $id"));
		return ucfirst($query['full_name']);
	}

function get_submenu_name($id){
	
		$query =mysql_fetch_array(mysql_query("select name from submenu where submenu_id = $id"));
		return ucfirst($query['name']);
	
	
	}
function get_mainmenu_name($id){
	
		$query =mysql_fetch_array(mysql_query("select name from main_menu where main_menu_id = $id"));
		return ucfirst($query['name']);
	
	
	}

function get_price_of_the_product($id,$product_type){
	
	$query =mysql_fetch_array(mysql_query("select * from ".$product_type." where p_id = $id"));
	$price = ($query['mrp']-($query['mrp']*($query['sell_price']/100)));
	return $price;
	}
function get_name_of_product($id,$product_type){
	
		$query =mysql_fetch_array(mysql_query("select * from ".$product_type." where p_id = $id"));
		return ucfirst($query['name']);
	
	
	}
function get_img_of_product($id,$product_type){
	
		$query =mysql_fetch_array(mysql_query("select * from ".$product_type." where p_id = $id"));
		return $query['img_path'];
	
	
	}
function get_selling_price_of_product($id,$product_type){
	
		$query =mysql_fetch_array(mysql_query("select * from ".$product_type." where p_id = $id"));
		return $query['sell_price'];
	
	
	}
function get_mrp_of_product($id,$product_type){
	
		$query =mysql_fetch_array(mysql_query("select * from ".$product_type." where p_id = $id"));
		return $query['mrp'];
	
	
	}
function order_status_name($id){
		$query =mysql_fetch_array(mysql_query("select * from order_status where id = $id"));
		return ucfirst($query['status_name']);
	}

function get_product_avail($id,$product_type){
	$query =mysql_fetch_array(mysql_query("select * from ".$product_type." where p_id = $id"));
		return $query['in_stock'];
	
	}
function after_order_stock_managment($order_id){
	$sizeofcart=sizeof($_SESSION['mobile_cart_item']);
	for($i=0;$i<$sizeofcart;$i++){
	$order_qunatity = $_SESSION['mobile_itemquantities'][$i];
	$item_id =	$_SESSION['mobile_cart_item'][$i];
	$product_type = $_SESSION['cart_product_type'][$i];
	stock_updation($item_id,$product_type, $order_qunatity,$order_id);
	
	}
	return "success";
	}
function stock_updation($id,$product_type, $stock_value,$order_id){
	$query_get_present_stock_of_product =mysql_fetch_array(mysql_query("select * from ".$product_type." where p_id = $id"));
	$present_stock_value =$query_get_present_stock_of_product['in_stock'];
	$upadated_stock = ((int)$present_stock_value)-((int)$stock_value);
	mysql_query("update ".$product_type." set in_stock = '".$upadated_stock ."' where p_id =". $id ) or die(mysql_error());
	mysql_query("INSERT INTO `stock_mangement`(`p_id`,`product_type`, `moved_stock`, `remaining_stock`, `remarks`,`on_date`) VALUES ('$id','$product_type','$stock_value','$upadated_stock','Stock moved for order .$order_id',now())")or die(mysql_error());
	
	}
// stock adding due to cacel	
function stock_managment_after_cancel($order_id){
	$query=mysql_fetch_array(mysql_query('select * from orders where id = '.$order_id));
	$cart_products = explode(',',$query['products']);
	$cart_product_qunatities = explode(',',$query['quantities']);
	$product_type = explode(',',$query['product_types']);
	$sizeofcart=sizeof($cart_products);
	for($i=0;$i<$sizeofcart;$i++){
	$order_qunatity = $cart_product_qunatities[$i];
	$item_id =	$cart_products[$i];
	$this_product_type = $product_type[$i];
	stock_updation_for_adding($item_id,$this_product_type, $order_qunatity,$order_id);
	
	}
	return "success";
	}
function stock_updation_for_adding($id,$this_product_type, $stock_value,$order_id){
	$query_get_present_stock_of_product =mysql_fetch_array(mysql_query("select * from ".$this_product_type." where p_id = $id"));
	$present_stock_value =$query_get_present_stock_of_product['in_stock'];
	$upadated_stock = ((int)$present_stock_value)+((int)$stock_value);
	mysql_query("update ".$this_product_type." set in_stock = '".$upadated_stock ."' where p_id =". $id ) or die(mysql_error());
	mysql_query("INSERT INTO `stock_mangement`(`p_id`,`product_type`, `added_stock`, `remaining_stock`, `remarks`,`on_date`) VALUES ('$id','$this_product_type','$stock_value','$upadated_stock','Stock added due to cancel order .$order_id',now())")or die(mysql_error());
	
	}	
	
	
function get_user_name($user_id){
	$query=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE user_id= $user_id"));
	return ucfirst($query['full_name']);
	}
function get_user_mbl($user_id){
	$query=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE user_id= $user_id"));
	return ucfirst($query['mobile_no']);
	}
function cost_each_product_incart(){
	$sizeofcart=sizeof($_SESSION['mobile_cart_item']);
	for($i=0;$i<$sizeofcart;$i++){
	$order_qunatity = $_SESSION['mobile_itemquantities'][$i];
	$item_id =	$_SESSION['mobile_cart_item'][$i];
	$product_type = $_SESSION['cart_product_type'][$i];
	$product_price[] = get_price_of_the_product($item_id,$product_type);
	}
	return implode(",",$product_price);
	}
function get_area_name($id){
	$query=mysql_fetch_array(mysql_query("SELECT * FROM `delivery_areas` WHERE id = $id"));
	return ucfirst($query['area_name']);
	}
?>