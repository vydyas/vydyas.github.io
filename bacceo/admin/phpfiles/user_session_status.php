<?php 
session_start();
if(!isset($_SESSION['admin_user_id'])){
	
	echo 0;
	} else {
		
		echo $_SESSION['admin_user_id'];
		
		}
?>