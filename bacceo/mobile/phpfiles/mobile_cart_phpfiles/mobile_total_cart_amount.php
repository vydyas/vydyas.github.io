<?php
session_start();
require("../phpincludes/config.inc");
require("../phpincludes/phpfunctions.inc");
dbConnect();
$total_price=0;
if(isset($_SESSION['mobile_cart_item'])){
	$sizeofcart=sizeof($_SESSION['mobile_cart_item']);
				 
	for($i=0;$i<$sizeofcart;$i++)
	 {
		$price_of_product = get_price_of_the_product($_SESSION['mobile_cart_item'][$i],$_SESSION['cart_product_type'][$i]);
		$quantity = $_SESSION['mobile_itemquantities'][$i];
		$product_type = $_SESSION['cart_product_type'][$i];
		$total_price +=$price_of_product*$quantity;
	 }
	$_SESSION['total_order_amount']=$total_price;
	 echo sprintf('%0.2f',$total_price);

} else {
	
	$total_price=0;
	echo sprintf('%0.2f',$total_price);
	unset($_SESSION['total_order_amount']);
	}
 if($total_price < 300 && $total_price > 0){
	 
	 $_SESSION['delivery_charge']=30;
	 } else if($total_price > 300 || $total_price ==0) {
		 
		 $_SESSION['delivery_charge']=0;
		 }
 
 ?>
