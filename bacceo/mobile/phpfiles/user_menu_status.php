<?php 
session_start();
require("phpincludes/config.inc");
require("phpincludes/phpfunctions.inc");
dbConnect();
if(isset($_SESSION['user_id'])){
?>
<li><a><span>Wellcome</span><h5 style="margin:0px"><?php echo get_user_name($_SESSION['user_id']) ?></h5></a></li>
  
  <li class="divider"></li>
  <li><a href="#" onClick="logout();">Logout</a></li>
  

<?php  } else { ?>

 <li><a href='#' onClick='load_login_url("phpfiles/login.php?navigate_id="+1);'>Login</a></li>

<?php  }

