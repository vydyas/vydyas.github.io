<?php
session_start();
require("../phpincludes/config.inc");
require("../phpincludes/phpfunctions.inc");
dbConnect();
$item=$_GET['itemid'];
$product_type = $_GET['product_type'];
$intialquantity=1;


$_SESSION['mobile_cart_item'][]=$item;
$_SESSION['mobile_itemquantities'][]=$intialquantity;
$_SESSION['cart_product_type'][] = $product_type;
echo substr(get_name_of_product($item,$product_type), 0, 30);



?>