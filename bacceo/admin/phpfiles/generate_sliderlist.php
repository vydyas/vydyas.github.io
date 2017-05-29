<?php 
require("../../mobile/phpfiles/phpincludes/config.inc");
require("../../mobile/phpfiles/phpincludes/phpfunctions.inc");
dbconnect();
$forpage = mysql_real_escape_string($_GET['forpage']);
$query = mysql_query("select * from homesliders where for_page = '$forpage'")or die(mysql_error());
if(mysql_num_rows($query)>0){
	
while($row = mysql_fetch_array($query))
	{
	?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin:5px">
      <img src="../img/homepageslider/<?php echo $row['img_path'] ?>" width="100%">
      <button class="btn btn-sm btn-danger" onclick='delete_slider(<?php echo $row['id']; ?>)'>Delete</button>
    </div>
	<?php
	}
}
?>
