<?php
session_start();
require("phpincludes/config.inc");
require("phpincludes/phpfunctions.inc");
dbConnect();
if(isset($_SESSION['user_id']) && isset($_SESSION['mobile_cart_item']) && isset($_SESSION['mobile_itemquantities'])){
$dno = mysql_real_escape_string($_GET['dno']);
$full_name=mysql_real_escape_string($_GET['full_name']);
$mobile_no=mysql_real_escape_string($_GET['mobile_no']);
$landmark=mysql_real_escape_string($_GET['landmark']);
$street_sector=mysql_real_escape_string($_GET['street_sector']);
$area_id=mysql_real_escape_string($_GET['area_id']);
$city=mysql_real_escape_string($_GET['city']);
$user_id=mysql_real_escape_string($_SESSION['user_id']);
$payment_method_id=mysql_real_escape_string($_GET['payment_method_id']);
if(mysql_query("INSERT INTO `user_address_book`(`full_name`,`door_no`, `landmark`, `street_sector_block`, `delivery_area_id`, `city`, `mobile_no`, `user_id`) VALUES ('$full_name','$dno','$landmark','$street_sector','$area_id','$city','$mobile_no','$user_id')")){
	$address_id = mysql_insert_id();
		$total_payable_amount = $_SESSION['total_payable_amount'];
		$cart_order_amount = $_SESSION['total_order_amount'];
		$delivery_charges = $_SESSION['delivery_charge'];
		if(isset($_SESSION['discount_valid'])){ 
		$discount_valid = $_SESSION['discount_valid']; 
		} else $discount_valid = 0;
		if(isset($_SESSION['used_coupon_id'])){
		$used_coupon_id = $_SESSION['used_coupon_id'];
		} else $used_coupon_id = "Not Used";
		$cart_items=implode(",",$_SESSION['mobile_cart_item']);
		$cart_item_type=implode(",",$_SESSION['cart_product_type']);
		$cart_item_quantities=implode(",",$_SESSION['mobile_itemquantities']);
		$cart_all_product_prices_at_confm_time = cost_each_product_incart();
 		if(mysql_query("INSERT INTO `orders`(`products`,`product_types`, `quantities`,`product_prices`, `user_id`, `cart_amount`, `discount_valid`, `delivery_charge`, `total_payable_amount`,`coupon_id`, `user_address_book_id`,`payment_method_id`,`order_status_id`,`order_details_verified`,`date_time`,`remarks`) VALUES ('$cart_items','$cart_item_type','$cart_item_quantities','$cart_all_product_prices_at_confm_time','$user_id','$cart_order_amount','$discount_valid','$delivery_charges','$total_payable_amount','$used_coupon_id','$address_id','$payment_method_id','1','notverified',now(),'To confirm this order immediately call to this number 9966336336 and tell your order Id , Otherwise wait for Confirmation Call from Us  ')"))
		{
			
			$order_id = mysql_insert_id();
			$stock_proccess= after_order_stock_managment($order_id);
			if($stock_proccess == "success")
			{
					unset($_SESSION['mobile_cart_item']);
					unset($_SESSION['mobile_itemquantities']);
					unset($_SESSION['cart_product_type']);
					if(isset($_SESSION['discount_valid'])){ 
					unset($_SESSION['discount_valid']); 
					}
					unset($_SESSION['total_order_amount']); 
					unset($_SESSION['delivery_charge']);
					if($user_id==10){
					unset($_SESSION['user_id']);	
					}
					
				echo $order_id;	
			} 
			
		}
	

}
//echo mysql_insert_id();
} else {
	echo "Sorry ! Something Went Wrong.";
	}
?>

