<?php

// response json
$json = array();
/**
 * Registering a user device
 * Store reg id in users table
*/
if (isset($_GET["name"]) && isset($_GET["email"]) && isset($_GET["regId"])) {
    $name = $_GET["name"];
    $mbl_no = $_GET["email"];
    $gcm_regid = $_GET["regId"]; 
	// GCM Registration ID
    // Store user details in db
    include_once './db_functions.php';
    include_once './GCM.php';

    $db = new DB_Functions();
    $gcm = new GCM();
	
		
	
		
	$res = $db->storeUser($name, $mbl_no, $gcm_regid);
	$db->store_userto_main_userslist($mbl_no, $name);
	
    if($res){

        echo "success";

    }else{

        echo "failure";
    }

    
} else {
    // user details missing
    echo "missing";
}
?>