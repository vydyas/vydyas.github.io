<?php
session_start();
$item=$_GET['itemid'];
$product_type = $_GET['product_type'];
if(isset($_SESSION['mobile_cart_item'])){
	if(in_array($item,$_SESSION['mobile_cart_item']))
	{
	$get_key=array_search($item , $_SESSION['mobile_cart_item']);
		if($_SESSION['cart_product_type'][$get_key] == $product_type){
			echo $_SESSION['mobile_itemquantities'][$get_key];
		} else echo 0;
		
	}else echo 0;
	
}
else echo 0;

?>
