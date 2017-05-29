<?php 
session_start();
require("phpincludes/config.inc");
require("phpincludes/phpfunctions.inc");
dbconnect();

$p_name=mysql_real_escape_string($_GET['p_name']);
$s_desc=mysql_real_escape_string($_GET['s_desc']);
$supermenu_id=mysql_real_escape_string($_GET['supermenuid']);
$cat_id=mysql_real_escape_string($_GET['cat_id']);
$main_menu_id=mysql_real_escape_string($_GET['main_menu_id']);
$mrp_price=mysql_real_escape_string($_GET['mrp_price']);
$d_price=mysql_real_escape_string($_GET['d_price']);
$in_stock = mysql_real_escape_string($_GET['in_stock']);
$product_table = get_product_table_name($supermenu_id);
$discount_mode = mysql_real_escape_string($_GET['discount_mode']);
$p_qty =$_GET['p_qty'];
if($discount_mode == 1 ){
	$discount_final = $d_price;
}
if($discount_mode == 0 ){
	if($d_price!=$mrp_price) {
	$discount_final = 100 - (($d_price*100)/$mrp_price);
	} else {
		$discount_final = 0;
		}

}
$unique_id = $_SESSION['unique_id'];
$file_tmp = "../../imgs/temp/preview_".$unique_id.".jpg";

//trimes all special characters
$new_p_name = preg_replace("/[^A-Za-z0-9 ]/", '', $p_name);
$new_p_name = str_replace(" ","",$new_p_name);
$new_file_name =$new_p_name.date("H_i_s_d_m_y").".jpg";

$file_destination = "../../imgs/product_imgs/".$new_file_name;
if(copy($file_tmp, $file_destination)){
	$img_path ="imgs/product_imgs/".$new_file_name;
mysql_query("INSERT INTO `".$product_table."`(`name`, `m_desc`,`qty`, `mrp`, `sell_price`, `main_menu_id`,`cat_id`,`in_stock`,`img_path`,`show_status`) VALUES ('$p_name','$s_desc','$p_qty',$mrp_price,'$discount_final','$main_menu_id','$cat_id','$in_stock','$img_path',1)");
}
echo mysql_insert_id();
?>