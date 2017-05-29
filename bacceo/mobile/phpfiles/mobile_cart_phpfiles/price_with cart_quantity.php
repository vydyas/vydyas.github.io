<?php
session_start();
require("../phpincludes/config.inc");
require("../phpincludes/phpfunctions.inc");
dbConnect();
$item = $_GET['itemid'];
$product_type = $_GET['product_type'];
if(isset($_SESSION['mobile_cart_item'])){
$sizeofcart=sizeof($_SESSION['mobile_cart_item']);
	if(in_array($item,$_SESSION['mobile_cart_item']))
	{
	$get_key=array_search($item , $_SESSION['mobile_cart_item']);		 
	$price = (get_price_of_the_product($_SESSION['mobile_cart_item'][$get_key],$_SESSION['cart_product_type'][$get_key])*($_SESSION['mobile_itemquantities'][$get_key]));
	$padded = sprintf('%0.2f', $price); 
	echo $padded;
	}

}
?>
