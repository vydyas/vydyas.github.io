<?php 
require("../../mobile/phpfiles/phpincludes/config.inc");
dbconnect();
$forpage = $_GET['forpage'];
$slider_name = $_GET['slider_name'];
$slider_image = $_FILES['file'];
$type_of_navigation = $_GET['type_of_navigation'];
$value = $_GET['value'];
$file_tmp = $slider_image['tmp_name'];
$file_name = $slider_name.'.jpg';
$file_destination = '../../img/homepageslider/'.$file_name;
if(move_uploaded_file($file_tmp, $file_destination)){
	if(mysql_query("insert into homesliders (`name`, `img_path`, `for_page`, `type_of_navigation`, `value`) values ('$slider_name','$file_name','$forpage','$type_of_navigation','$value')")){
		echo "success";
		} else {
			echo "not inserted";
			}
	 
}else {
	echo "something went wrong with your file";
	}

?>