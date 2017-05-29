<?php
session_start();
require("../phpincludes/config.inc");
require("../phpincludes/phpfunctions.inc");
dbConnect();
$itemindex=$_GET['itemindex'];
$product_type = $_GET['product_type'];
$item=$_SESSION['mobile_cart_item'][$itemindex];
$item_stock_limit = get_product_avail($item,$product_type);
//echo $_SESSION['mobile_itemquantities'][$itemindex] . $item_stock_limit;

if(($_SESSION['mobile_itemquantities'][$itemindex])< $item_stock_limit){
$_SESSION['mobile_itemquantities'][$itemindex]=$_SESSION['mobile_itemquantities'][$itemindex]+1;
$message = substr(get_name_of_product($item,$product_type), 0, 10);
$status = array("id"=>0 , "message"=>$message);
echo json_encode($status, JSON_PRETTY_PRINT);
} else {
	$status = array("id"=>1 , "message"=>"sry ! out of stock");
echo json_encode($status, JSON_PRETTY_PRINT);
	
}



?>