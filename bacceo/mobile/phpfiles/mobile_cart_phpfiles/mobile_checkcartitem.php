<?php
session_start();
$item=$_GET['itemid'];
$product_type = $_GET['product_type'];
if(isset($_SESSION['mobile_cart_item']))
{
			
	
	
	if(in_array($item,$_SESSION['mobile_cart_item']))
	{
		$key = array_search($item , $_SESSION['mobile_cart_item']);	
		if($_SESSION['cart_product_type'][$key] == $product_type){
			
			echo array_search($item , $_SESSION['mobile_cart_item']);
		} else {
			echo "add";
			}
	
	}
	else {
	echo "add";
	}

}

else
{
echo "add";
}

?>