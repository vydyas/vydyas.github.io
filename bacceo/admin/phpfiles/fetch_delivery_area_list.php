<?php 
require("../../mobile/phpfiles/phpincludes/config.inc");
require("../../mobile/phpfiles/phpincludes/phpfunctions.inc");
dbconnect();
$query = mysql_query("select * from delivery_areas");
while($row = mysql_fetch_array($query))
{ ?>
	<li class="list-group-item"><?php echo $row['area_name']; ?><span class="glyphicon glyphicon-remove-circle" style="float:right" onclick="delete_area(<?php echo $row['id'] ?>)"></span></li>
    
    
<?php }
							

?>