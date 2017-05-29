<?php
session_start();
require("../mobile/phpfiles/phpincludes/config.inc");
require("../mobile/phpfiles/phpincludes/phpfunctions.inc");
dbconnect();
$supermenu_id = $_GET['super_menu_id'];
$main_menu_id = $_GET['main_menu_id'];
$submenu_id = $_GET['submenu_id'];
$product_table_name = get_product_table_name($supermenu_id);
if($supermenu_id != 0){
$product_list_query="select * from ".$product_table_name;
$heading = 'Grocery';
}
if($main_menu_id != 0 && $submenu_id == 0){
$product_list_query .=" where main_menu_id=".$main_menu_id;
$heading .= ' > '.get_mainmenu_name($main_menu_id);
}
if($submenu_id !=0){
$product_list_query .=" where cat_id=".$submenu_id;	
$heading .= ' > '.get_mainmenu_name($main_menu_id).' >> '.get_submenu_name($submenu_id);
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Print Products</title>
<style>
@media print {

table, th, td {
    border: 1px solid black;
	font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif
}
table tr th {
	background-color:#000000;
	color:#FFFFFF;
	 border: 1px solid white;
    border-collapse:collapse;
}
}
table,  td {
    border: 1px solid black;
    border-collapse:collapse;
	font-size:12px
}
table tr th {
	background-color:#000000;
	color:#FFFFFF;
	 border: 1px solid white;
}



</style>
</head>

<body>
<br>
<div>
<img src="../img/ayyappa-grocery-logo-black.png" height="60px" draggable="false" style="float:left"/>
<div style="float:right" >
<h3 style="padding:0px; margin:0px">AyyappGrocery</h3>
<p style="padding:0px; margin:0px">Online Shopping</p>
<p style="padding:0px; margin:0px">9966 336 336</p>
</div>
</div>
<div style="text-align:center; padding:5px 20px 3px 20px; margin:5px 20px 3px 20px">
	<h4 style="padding:5px 20px 3px 20px;"><?php echo "All Products of ".$heading; ?></h4>	
</div>
<table border="1" style="width:100%">
	<tr>
    	<th>#</th>
        <th>P_ID</th>
        <th width="40%">Name</th>
        <th>Qty</th>
        <th>MRP</th>
        <th>Market Price</th>
        <th>Your Price?</th>
        <th width="10%">Avialble <small>(Yes/ No) </small></th>
    </tr>
    <?php 
		$query = mysql_query($product_list_query);
		$j=1;
		while($row = mysql_fetch_array($query)){
	?>
        <tr>
            <td><?php echo $j ?> </td>
            <td><?php echo $row['p_id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php /* echo get_submenu_name($row['cat_id'])*/ echo $row['qty']; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        
    <?php $j++; } ?>
</table>
<p style="margin-top:100px">Signature</p>
</body>
<script>
window.onload = function () {
    window.print();
}
</script>
</html>