<?php
session_start();
if(isset($_SESSION['mobile_cart_item'])){
	
$sizeofcart=sizeof($_SESSION['mobile_cart_item']);
			 $total_items = 0;
			 for($i=0;$i<$sizeofcart;$i++)
			 {
				
				$total_items += $_SESSION['mobile_itemquantities'][$i];
			
			 }	

	echo $total_items;
}
else echo 0;
?>