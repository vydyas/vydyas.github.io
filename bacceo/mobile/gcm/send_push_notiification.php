<?php
require_once './db_functions.php'; 
include_once './GCM.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
if (isset($_GET["ntf_title"]) && isset($_GET["ntf_desc"])) {
    
	$db = new DB_Functions();
	$gcm = new GCM();
	$users = $db->getAllUsers();
	
	while($row = mysql_fetch_array($users)) {
		$regId = $row['gcm_regid'];
		$title = $_GET["ntf_title"];
		$message = $_GET["ntf_desc"];
		
		$registatoin_ids = array($regId);
		if(isset($_GET['ntf_img'])){
			$message = array("title" => $title,"text_message" => $message , "img"=>$_GET['ntf_img']);
			} else {
		$message = array("title" => $title,"text_message" => $message);
			}
		$result = $gcm->send_notification($registatoin_ids, $message);
	
		echo $result; 
			
	}
	
	
}
?>
