<?php
session_start();
require("phpincludes/config.inc");
dbConnect();
$super_menu_id=$_GET['id'];
$sql_query_for_fetch_main_cat = mysql_query("select * from main_menu where super_menu_id = $super_menu_id");

?>
<ul class="list-group">
<?php
while($row = mysql_fetch_array($sql_query_for_fetch_main_cat)){
?>
	<li class="list-group-item" onClick="load_product_page_data('phpfiles/product_data.php',<?php echo $row['main_menu_id']; ?>,' <?php echo $row['name']; ?>',<?php echo $super_menu_id; ?>);"><span class="fa fa-dashboard"></span> <?php echo ucfirst($row['name']); ?></li>
<?php }
?>
</ul>

<!-- url_string,submenu_id,page_name,main_menu_id,super_menu_id -->