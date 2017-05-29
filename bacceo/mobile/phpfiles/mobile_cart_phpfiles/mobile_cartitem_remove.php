<?php
session_start();
require("../phpincludes/config.inc");
require("../phpincludes/phpfunctions.inc");
dbConnect();
$item=$_GET['itemid'];
$product_type = $_GET['product_type'];
if(isset($_SESSION['mobile_cart_item'])){
	if(in_array($item,$_SESSION['mobile_cart_item']))
	{
	$get_key=array_search($item , $_SESSION['mobile_cart_item']);
	
	if(($_SESSION['cart_product_type'][$get_key] == $product_type)&&($_SESSION['mobile_itemquantities'][$get_key])>1){
		$_SESSION['mobile_itemquantities'][$get_key] = $_SESSION['mobile_itemquantities'][$get_key]-1;
		echo '"'.substr(get_name_of_product($item,$product_type), 0, 20).'"'.'Quantity Decreased by 1';
		}else {
			$itemindex = $get_key;
			$sizeofcart=sizeof($_SESSION['mobile_cart_item']);
			 
			 for($i=0;$i<$sizeofcart;$i++)
			 {
				$temp_cart[$i]=$_SESSION['mobile_cart_item'][$i];
				$temp_cartqunatity[$i]=$_SESSION['mobile_itemquantities'][$i];
				$temp_cart_product_type[$i] = $_SESSION['cart_product_type'][$i];
			 }
			unset($_SESSION['mobile_cart_item']);
			unset($_SESSION['mobile_itemquantities']);
			unset($_SESSION['cart_product_type']);
			$removeindex=$itemindex;
			for($i=0;$i<$removeindex;$i++)
			{
			$_SESSION['mobile_cart_item'][$i]=$temp_cart[$i];
			$_SESSION['mobile_itemquantities'][$i]=$temp_cartqunatity[$i];
			$_SESSION['cart_product_type'][$i] = $temp_cart_product_type[$i];
			}
			
			for($i=$removeindex,$j=$removeindex+1;$i<$sizeofcart-1;$i++,$j++)
			{
			$_SESSION['mobile_cart_item'][$i]=$temp_cart[$j];
			$_SESSION['mobile_itemquantities'][$i]=$temp_cartqunatity[$i];
			$_SESSION['cart_product_type'][$i] = $temp_cart_product_type[$i];
			
			}
			
			
			echo '"'.substr(get_name_of_product($item,$product_type), 0, 20).'"'.'is Removed from Cart';
			
			}
	
	
	}else echo 0;
	
}
else echo 0;




?>