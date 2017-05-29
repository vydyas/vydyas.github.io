<?php 
require("../../mobile/phpfiles/phpincludes/config.inc");
require("../../mobile/phpfiles/phpincludes/phpfunctions.inc");
dbconnect();
/* [{text: "group1", children: [{value: 1, text: "text1"}, {value: 2, text: "text2"}]},{text: "group1", children: [{value: 1, text: "text1"}, {value: 2, text: "text2"}]}]
 */
 
?>
[

<?php 
$query_main_menu = mysql_query("select * from main_menu");
while($mainmenu_row = mysql_fetch_array($query_main_menu)){
?>
{text: "<?php echo $mainmenu_row['name']; ?>", 
children: [<?php 
$main_menu_id=$mainmenu_row['main_menu_id'];
	$query_submenu = mysql_query("select * from submenu where main_menu_id =$main_menu_id");
	$i = 0; 
while($submenu_row = mysql_fetch_array($query_submenu)){
	
?>{value:<?php echo $submenu_row['submenu_id'] ?>, text:"<?php echo $submenu_row['name'] ?>"},
<?php 

}

?>


]},
<?php }?>



] 