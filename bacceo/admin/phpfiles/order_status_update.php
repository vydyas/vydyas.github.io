<?php 
require("../../mobile/phpfiles/phpincludes/config.inc");
require("../../mobile/phpfiles/phpincludes/phpfunctions.inc");
dbconnect();
$status_id = mysql_real_escape_string($_GET['status_id']);
$verfication_status = $_GET['verfication'];
$order_id = mysql_real_escape_string($_GET['order_id']);
$remarks = mysql_real_escape_string($_GET['remarks']);
if($status_id==3){
stock_managment_after_cancel($order_id);
}
mysql_query('update orders set order_status_id='.$status_id.', order_details_verified = "'.$verfication_status.'",remarks="'.$remarks.'" where id = '.$order_id) or die(mysql_error());
echo '<h5 style="text-align:center">Orders Status Changed Successfully!</h5><button class="btn btn-danger" onClick="Custombox.close();">Close</button>'
?>