<?php
session_start();
require("phpincludes/config.inc");
require("phpincludes/phpfunctions.inc");
dbConnect();
$order_id=$_GET['id'];

$sql_query_order_list = mysql_fetch_array(mysql_query("select * from orders where id = $order_id "));	
?>
<script>
//get_total_cart_items();
</script>
<div class="row">
<div class="col-xs-12" style="text-align:center; background-color:#3498db">
<h5 style="color:#FFFFFF">Your Order Was Placed Successfully!</h5>
	
</div>
<hr>
</div>
<div class="row"  style="text-align:center; background-color:#FFFFFF">
	<div class="col-xs-4" >
    	<h6 style="margin-bottom:0px">Your Order Id: </h6>
        <h3 style="margin-top:0px"><?php echo $sql_query_order_list['id']; ?></h3>
    </div>
    <div class="col-xs-8">
    	<h6 style="margin-bottom:0px">Amount </h6>
        <h5 style="margin:0px"><span class="fa fa-inr" style=" font-size:20px; padding-right:5px"></span><?php echo ceil($sql_query_order_list['total_payable_amount'])."/-"; ?></h5>
                    <span  style="color:#838383; font-size:12px">Cash on delivey</span>
    </div>
</div> 
<hr style="margin:0px;  border-top: 1px solid #4C4C4C;">
<div class="row" style="text-align:center; background-color:#FFFFFF">
<div class="col-xs-4" >
<h6 style="margin-top:20%">Order Status:</h6>
</div>
<div class="col-xs-8" style="text-align:center; background-color:#FFFFFF">
<span style=""><?php echo order_status_name($sql_query_order_list['order_status_id']); ?></span>
<div class="" style="background-color:#FF8E00; height:8px; width:50%; border-top-left-radius:10px; border-bottom-left-radius:10px; margin-left:65px;border-top-right-radius:10px; border-bottom-right-radius:10px;"></div>                
       
</div>
</div>
<div class="row">
<div class="col-xs-12" style="text-align:center; background-color:#FFFFFF">
 <p style="background-color:#FFFFFF;"><?php echo $sql_query_order_list['remarks'] ?></p>
     
</div>

</div>
<hr style="margin:0px;  border-top: 1px solid #4C4C4C;">
<div class="row" style="text-align:center; background-color:#ecf0f1">
<div class="col-xs-6" style="text-align:center" >
<div class="trackmy_orders" style="background-color:#e74c3c; width:80px; height:80px; border-radius:50%; margin:20px auto 5px auto;" onClick="load_order_list();">
<span class="glyphicon glyphicon-map-marker" style="font-size:45px; color:#FFFFFF; margin-top:15px"></span>


</div>
<span>Track My Orders</span>
</div>
<div class="col-xs-6" style="text-align:center" >
<div class="my_home" style="background-color:#2c3e50; width:80px; height:80px; border-radius:50%; margin:20px auto 5px auto;" onClick="navigate_urls(1)">
<span class="glyphicon glyphicon-home" style="font-size:40px; color:#FFFFFF; margin-top:15px"></span>


</div>
<span>Go Home</span>
</div>

</div>