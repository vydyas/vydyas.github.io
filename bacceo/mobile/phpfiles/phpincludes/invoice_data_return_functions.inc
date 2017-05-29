<?php 
dbconnect();
function get_shipping_address($user_address_book_id) {
	$query =mysql_fetch_array( mysql_query('select * from user_address_book where id ='.$user_address_book_id));
	$deliver_area_id = $query['delivery_area_id'];
	$query_area=mysql_fetch_array(mysql_query("SELECT * FROM delivery_areas WHERE id =".$deliver_area_id));
	 
	$address = '<span><strong>'.$query["full_name"].'</strong> <br># '.$query["door_no"].'<br>'.$query["landmark"].' , '.$query['street_sector_block'].'<br>'.$query_area["area_name"].'<br>'.$query['city'].'<br>'.$query['mobile_no'].'</span>';	
return $address;
}
	
?>