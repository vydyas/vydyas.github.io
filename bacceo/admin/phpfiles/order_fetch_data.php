<?php
session_start(); 
require("../../mobile/phpfiles/phpincludes/config.inc");
require("../../mobile/phpfiles/phpincludes/phpfunctions.inc");
dbconnect();
$status_id=$_GET['status_id'];
if($status_id==0){
$orders_query = "select * from orders order by  id DESC";
} 
else {
$orders_query = "select * from orders where order_status_id=$status_id order by  id DESC";
}

?>
<div class="" style="background-color:#FFFFFF">
    	<div class="row">
            
            <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12" style="text-align:center">
            	<h4>Orders are Waiting !</h4>
            	<hr>
                <div class="row">
                	<div class="col-xs-12 col-lg-12 col-md-12 col-sm-12" style="margin-bottom:20px">
                    
                    <!--
                        id| status_name
                       --------------------
                        1	placed
                        2	confirmed
                        3	cancelled
                        4	returned
                        5	proccessing
                        6	delivered
                        7	Delivering
                        8	Packed
                     
                     -->
                        <button class="btn btn-defalut btn_status" onClick="orders_fetch(0);">All</button>
                        <button class="btn btn-defalut btn_status" onClick="orders_fetch(1);">Placed</button>
                        <button class="btn btn-defalut btn_status" onClick="orders_fetch(2);">Confirmed</button>
                        <button class="btn btn-defalut btn_status" onClick="orders_fetch(3);">Canceled</button>
                        <button class="btn btn-defalut btn_status" onClick="orders_fetch(5);">Proccessing</button>
                        <button class="btn btn-defalut btn_status" onClick="orders_fetch(8);">Packed</button>
                        <button class="btn btn-defalut btn_status" onClick="orders_fetch(7);">Delivering</button>
                        <button class="btn btn-defalut btn_status" onClick="orders_fetch(6);">Delivered</button>
                        <button class="btn btn-defalut btn_status" onClick="orders_fetch(4);">Returned</button>
                    </div>
                    <div class="row">
                        <div class="container">
                            <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
                                <div class="form-group has-success">
                                 
                                  <input type="text" class="form-control search" id="inputSuccess" placeholder="Search Order Id" style="text-align:center">
                                </div>
                            </div>
                        </div>
                   </div>
                                    
                </div>
                <div class="row">
                	<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="text-align:center">
                    	<h5><?php if($status_id==0){ echo "All"; } else { echo order_status_name($status_id); } ?> Orders</h5>
                    </div>
                </div>
                <div class="orders_placed_wrapper">
                
                	<table width="100%" border="1px" style="text-align:center" class="orders_list_table">
                    	<tr style="background-color:#E5E5E5">
                        	<th>#</th>
                            <th>Order Id</th>
                            <th>User Name</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Process</th>
                        </tr>
                        <?php
						$query=mysql_query($orders_query);
						$i=1;
						while($row = mysql_fetch_array($query)){
							?>
						
                       	<tr class="<?php echo $row['id']; ?>">
                       		<td ><?php echo $i; ?></td>
                            <td ><span style="font-size:16px; font-weight:500" class="order_id_td"><?php echo $row['id']; ?></span><br><span><?php echo $row['date_time']; ?></span></td>
                            <td><?php if($row['user_id']==10){ echo get_name_of_address_holder($row['user_address_book_id']); } else echo get_user_name($row['user_id']); ?></td>
                            <td>Rs.<?php echo $row['total_payable_amount']; ?>/-</td>
                            <td><?php echo order_status_name($row['order_status_id']); ?></td>
                            <td><button class="btn btn-warning"  style="margin:5px 5px 5px 5px; padding:5px 10px 5px 10px" onClick="order_proccess(<?php echo $row['id']; ?>);"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                            
                       </tr>
                       <?php $i++; }
						?>
                    </table>
                </div>
            </div>
        </div>   
        
     </div> 
     <div id="order_processing_popup" class="modal-demo" style="border-radius:0px; background-color:#FFFFFF">
      <!-- <button type="button" class="close" onclick="Custombox.close();"> 
          <span>&times;</span><span class="sr-only">Close</span>-->
      </button>
            <div class="text order_data_wrapper">
            <div style="text-align:center">
        <img src="../imgs/svg-loaders/circles.svg" width="20px">
        	</div>
   			</div> 
</div> 

<script>
$(".search").on("keyup", function() {
    var value = $(this).val();

    $(".orders_list_table tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td .order_id_td").text();

            if (id.indexOf(value) !== 0) {
                $row.hide();
            }
            else {
                $row.show();
            }
        }
    });
});
</script>