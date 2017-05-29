<?php 
session_start();
require("../../mobile/phpfiles/phpincludes/config.inc");
require("../../mobile/phpfiles/phpincludes/phpfunctions.inc");
dbconnect();
$p_id = $_GET['p_id'];
$product_type = $_GET['product_type'];
$image_path_old = get_img_of_product($p_id,$product_type);

unlink('../../'.$image_path_old);
$unique_id = $_SESSION['unique_id'];
$file_tmp = "../../imgs/temp/preview_".$unique_id.".jpg";
$file_destination = '../../'.$image_path_old;
if(copy($file_tmp, $file_destination)){
	echo "success"; 
}
?>