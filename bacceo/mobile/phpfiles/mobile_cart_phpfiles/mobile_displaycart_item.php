<?php
session_start();
$sizeofcart=sizeof($_SESSION['mobile_cart_item']);
for($i=0;$i<$sizeofcart;$i++)
{
echo $_SESSION['mobile_cart_item'][$i]."||".$_SESSION['mobile_itemquantities'][$i]."<br />";
			
}	
?>
