<?php
session_start();
require("phpincludes/config.inc");
require_once("phpincludes/php-image-magician/php_image_magician.php");
dbConnect();
array_map('unlink', glob("../../imgs/temp/*"));
$imagefile = $_FILES['file'];
$width = $_GET['w'];
$height = $_GET['h'];
$unique_id = $_SESSION['unique_id'];
$file_tmp = $imagefile['tmp_name'];
$new_file_name =$imagefile['name'];
$file_destination = '../../img/temp/temp_'.$unique_id.'.jpg';
move_uploaded_file($file_tmp, $file_destination);
//print_r($imagefile);

// *** Open JPG image
$magicianObj = new imageLib($file_destination);
//echo "<img src='backend".$file_destination."'>";
 $magicianObj -> resizeImage($width,$height,'auto');
  // *** Resize to best fit then crop
  $magicianObj -> resizeImage($width,$height, array('crop', 'm'));

  // *** Save resized image as a PNG
  $magicianObj -> saveImage('../../imgs/temp/preview_'.$unique_id.'.jpg');
	echo "../imgs/temp/preview_".$unique_id.".jpg"; 

?>