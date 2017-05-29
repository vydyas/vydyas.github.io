<?php


if (isset($_GET["email_id"]) && isset($_GET["message"])) {
    $email = $_GET["email_id"];
    $message = $_GET["message"];
    
    include_once './GCM.php';
	include_once './db_functions.php';
    
    $gcm = new GCM();
 	$db = new DB_Functions();

    $regId=$db -> getGcmID($email);

    $registatoin_ids = array($regId);
    $message = array("text_message" => $message);

    $result = $gcm->send_notification($registatoin_ids, $message);

    echo $result;
}
?>
