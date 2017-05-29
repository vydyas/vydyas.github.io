<?php
session_start();
require("phpincludes/config.inc");
require("phpincludes/phpfunctions.inc");
dbConnect();


$order_id = mysql_real_escape_string($_GET['order_id']);
$mbl_no = mysql_real_escape_string($_GET['mobile_no']);

if($order_id == ""){
	$query =mysql_query("select * from user_address_book where `mobile_no` = $mbl_no");
	if(mysql_num_rows($query) >0){
		while($row= mysql_fetch_array($query)){
			$address_id_list[]= $row['id'];
			}
			$adress_id_list_string = implode(",",$address_id_list);
			$query = mysql_query("select * from orders where user_address_book_id in ($adress_id_list_string) ORDER BY date_time DESC");
			if(mysql_num_rows($query) >0){
				while($row = mysql_fetch_array($query)) {	
								
								?>
							
							<div class="order_list_wrapper" style="margin-top:10px">
								<div class="container">
							   
									<div class="order_list_item " style="min-height:150px; background-color:#FFFFFF; padding-top:5px">
										 <div class="top-header">
											
											
											<p style="margin:5px 15px 5px 10px; font-size:9px;" >
											<?php 
											$date_time= strtotime($row['date_time']);
											echo date("d,M-y - h:i A",$date_time);
											
											 ?> <!--<a class="pull-right">View</a> --></p>
											
											<hr style="margin-top:3px; margin-bottom:3px">
										
										</div>
										<div class="order_item_body">
										<div class="row">
											<div class="col-xs-5" style="text-align:center; border-right: 1px solid #C8C8C8;">
												<span style="color:#838383"> Order ID </span>
												<h5 style="margin:0px"><?php echo $row['id']; ?></h5>
												
											</div>
											<div class="col-xs-7" style="text-align:center; border-right: 1px solid #C8C8C8;">
												<span  style="color:#838383">Amount </span>
												<h5 style="margin:0px"><span class="fa fa-inr" style=" font-size:20px; padding-right:5px"></span><?php echo ceil($row['total_payable_amount']); ?></h5>
												<span  style="color:#838383; font-size:12px">Cash on delivey</span>
												
											</div>
										 </div>
									   </div>
									  
									   <div class="order_footer" style="text-align:center">
									   
									  <hr style="margin-top:3px; margin-bottom:10px">
									  
									   <?php 
									   if($row['order_status_id']==1){ ?>
										   
											<div class="row" style="margin:0px; background-color:#F0F0F0">
										<div class="col-xs-4" style="padding-left:10px; padding-right:2px">
											<span><?php echo order_status_name($row['order_status_id']); ?></span>
											<div class="" style="background-color:#FF7600; height:8px; width:100%; border-top-left-radius:10px; border-bottom-left-radius:10px; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:2px">
											<span>Proccessing</span>
											<div class="" style="background-color:#A6A6A6; height:8px; width:100%; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:10px">
											 <span>Delivering</span> 
											<div class="" style="background-color:#A6A6A6; height:8px; width:100%; border-top-right-radius:10px; border-bottom-right-radius:10px; margin-right:10px; "></div>
											
										</div>
									   </div>
									   <div class="row" style="margin:10px 0px 0px 0px">
											
											<div class="descrption" style="position:relative">
											
											<p style="background-color:#FFFFFF;"><?php echo $row['remarks']; ?>
											
									   
											</p>
											</div>
									   
									   </div>     
											   
										   
										   
										   
										<?php   } // confirmed order  status display
										else if($row['order_status_id']==2){
											 ?>
											
											
											<div class="row" style="margin:0px; background-color:#F0F0F0">
										<div class="col-xs-4" style="padding-left:10px; padding-right:2px">
											<span><?php echo order_status_name($row['order_status_id']); ?></span>
											<div class="" style="background-color:#27ae60; height:8px; width:100%; border-top-left-radius:10px; border-bottom-left-radius:10px; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:2px">
											<span>Proccessing</span>
											<div class="" style="background-color:#A6A6A6; height:8px; width:100%; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:10px">
											 <span>Delivering</span> 
											<div class="" style="background-color:#A6A6A6; height:8px; width:100%; border-top-right-radius:10px; border-bottom-right-radius:10px; margin-right:10px; "></div>
											
										</div>
									   </div>
									   <div class="row" style="margin:10px 0px 0px 0px">
											
											<div class="descrption" style="position:relative">
											
											<p style="background-color:#FFFFFF;"><?php echo $row['remarks']; ?>
											
									   
											</p>
											</div>
									   
									   </div>     
											
											
										<?php 	} // order processing status
										else if($row['order_status_id']==5){ 
										?>
											
											<div class="row" style="margin:0px; background-color:#F0F0F0">
										<div class="col-xs-4" style="padding-left:10px; padding-right:2px">
											<span><?php echo order_status_name(2); ?></span>
											<div class="" style="background-color:#27ae60; height:8px; width:100%; border-top-left-radius:10px; border-bottom-left-radius:10px; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:2px">
											<span><?php echo order_status_name($row['order_status_id']); ?></span>
											<div class="" style="background-color:#FF7600; height:8px; width:100%; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:10px">
											 <span>Delivering</span> 
											<div class="" style="background-color:#A6A6A6; height:8px; width:100%; border-top-right-radius:10px; border-bottom-right-radius:10px; margin-right:10px; "></div>
											
										</div>
									   </div>
									   <div class="row" style="margin:10px 0px 0px 0px">
											
											<div class="descrption" style="position:relative">
											
											<p style="background-color:#FFFFFF;"><?php echo $row['remarks']; ?>
											
									   
											</p>
											</div>
									   
									   </div>     
											
											
										<?php	} // on delivering process 
										else if($row['order_status_id']==7 || $row['order_status_id']==8 ){ $row['order_status_id']=7 ?>
											
											
											<div class="row" style="margin:0px; background-color:#F0F0F0">
										<div class="col-xs-4" style="padding-left:10px; padding-right:2px">
											<span><?php echo order_status_name(2); ?></span>
											<div class="" style="background-color:#27ae60; height:8px; width:100%; border-top-left-radius:10px; border-bottom-left-radius:10px; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:2px">
											<span><?php echo order_status_name(8); ?></span>
											<div class="" style="background-color:#27ae60; height:8px; width:100%; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:10px">
											 <span><?php echo order_status_name($row['order_status_id']); ?></span> 
											<div class="" style="background-color:#FF7600; height:8px; width:100%; border-top-right-radius:10px; border-bottom-right-radius:10px; margin-right:10px; "></div>
											
										</div>
									   </div>
									   <div class="row" style="margin:10px 0px 0px 0px">
											
											<div class="descrption" style="position:relative">
											
											<p style="background-color:#FFFFFF;"><?php echo $row['remarks']; ?>
											
									   
											</p>
											</div>
									   
									   </div>     
											
											<?php }// on Deliverd process 
										else if($row['order_status_id']==6){ ?>
											
											
											<div class="row" style="margin:0px; background-color:#F0F0F0">
										<div class="col-xs-4" style="padding-left:10px; padding-right:2px">
											<span><?php echo order_status_name(2); ?></span>
											<div class="" style="background-color:#27ae60; height:8px; width:100%; border-top-left-radius:10px; border-bottom-left-radius:10px; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:2px">
											<span><?php echo order_status_name(8); ?></span>
											<div class="" style="background-color:#27ae60; height:8px; width:100%; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:10px">
											 <span><?php echo order_status_name($row['order_status_id']); ?></span> 
											<div class="" style="background-color:#27ae60; height:8px; width:100%; border-top-right-radius:10px; border-bottom-right-radius:10px; margin-right:10px; "></div>
											
										</div>
									   </div>
									   <div class="row" style="margin:10px 0px 0px 0px">
											
											<div class="descrption" style="position:relative">
											
											<p style="background-color:#FFFFFF;"><?php echo $row['remarks']; ?>
											
									   
											</p>
											</div>
									   
									   </div>     
											
											<?php }// on Deliverd process 
										else if($row['order_status_id']==3){?>
											
											<span> <?php echo order_status_name($row['order_status_id']); ?></span>
											<div class="row" style="margin:0px; background-color:#F0F0F0">
										<div class="col-xs-4" style="padding-left:10px; padding-right:2px">
											
											<div class="" style="background-color:#FF0004; height:8px; width:100%; border-top-left-radius:10px; border-bottom-left-radius:10px; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:2px">
											
											<div class="" style="background-color:#FF0004; height:8px; width:100%; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:10px">
											 
											<div class="" style="background-color:#FF0004; height:8px; width:100%; border-top-right-radius:10px; border-bottom-right-radius:10px; margin-right:10px; "></div>
											
										</div>
									   </div>
									   <div class="row" style="margin:10px 0px 0px 0px">
											
											<div class="descrption" style="position:relative">
											
											<p style="background-color:#FFFFFF;"><?php echo $row['remarks']; ?>
											
									   
											</p>
											</div>
									   
									   </div>     
											
											<?php }
									   
									   
									   ?>
											
									</div>
									
								</div>
							</div>
							</div>
							<?php } 
				
				
				}else {
					?>
						<div class="order_list_wrapper" style="margin-top:10px; padding-top:5px">
							<div class="container" style="text-align:center; background-color:#FFFFFF; ">
								<span style="color:#FF3A3D; padding:10px 5px">No Order Placed with this mobile No : <?php echo $mbl_no ?></span>	
							</div>
						</div>
				
					<?php	
					
					
					}
					
					
					
					
		} else {
			?>
				<div class="order_list_wrapper" style="margin-top:10px; padding-top:5px">
					<div class="container" style="text-align:center; background-color:#FFFFFF; ">
                    	<span style="color:#FF3A3D; padding:10px 5px">No Order Placed with this mobile No : <?php echo $mbl_no ?></span>	
                    </div>
                </div>
        
		<?php	
		}



} else {
	
	$query = mysql_query("select * from orders where id = $order_id");
			if(mysql_num_rows($query) >0){
				while($row = mysql_fetch_array($query)) {	
								
								?>
							
							<div class="order_list_wrapper" style="margin-top:10px">
								<div class="container">
							   
									<div class="order_list_item " style="min-height:150px; background-color:#FFFFFF; padding-top:5px">
										 <div class="top-header">
											
											
											<p style="margin:5px 15px 5px 10px; font-size:9px;" >
											<?php 
											$date_time= strtotime($row['date_time']);
											echo date("d,M-y - h:i A",$date_time);
											
											 ?> <!--<a class="pull-right">View</a> --></p>
											
											<hr style="margin-top:3px; margin-bottom:3px">
										
										</div>
										<div class="order_item_body">
										<div class="row">
											<div class="col-xs-5" style="text-align:center; border-right: 1px solid #C8C8C8;">
												<span style="color:#838383"> Order ID </span>
												<h5 style="margin:0px"><?php echo $row['id']; ?></h5>
												
											</div>
											<div class="col-xs-7" style="text-align:center; border-right: 1px solid #C8C8C8;">
												<span  style="color:#838383">Amount </span>
												<h5 style="margin:0px"><span class="fa fa-inr" style=" font-size:20px; padding-right:5px"></span><?php echo ceil($row['total_payable_amount']); ?></h5>
												<span  style="color:#838383; font-size:12px">Cash on delivey</span>
												
											</div>
										 </div>
									   </div>
									  
									   <div class="order_footer" style="text-align:center">
									   
									  <hr style="margin-top:3px; margin-bottom:10px">
									  
									   <?php 
									   if($row['order_status_id']==1){ ?>
										   
											<div class="row" style="margin:0px; background-color:#F0F0F0">
										<div class="col-xs-4" style="padding-left:10px; padding-right:2px">
											<span><?php echo order_status_name($row['order_status_id']); ?></span>
											<div class="" style="background-color:#FF7600; height:8px; width:100%; border-top-left-radius:10px; border-bottom-left-radius:10px; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:2px">
											<span>Proccessing</span>
											<div class="" style="background-color:#A6A6A6; height:8px; width:100%; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:10px">
											 <span>Delivering</span> 
											<div class="" style="background-color:#A6A6A6; height:8px; width:100%; border-top-right-radius:10px; border-bottom-right-radius:10px; margin-right:10px; "></div>
											
										</div>
									   </div>
									   <div class="row" style="margin:10px 0px 0px 0px">
											
											<div class="descrption" style="position:relative">
											
											<p style="background-color:#FFFFFF;"><?php echo $row['remarks']; ?>
									   
											</p>
											</div>
									   
									   </div>     
											   
										   
										   
										   
										<?php   } // confirmed order  status display
										else if($row['order_status_id']==2){
											 ?>
											
											
											<div class="row" style="margin:0px; background-color:#F0F0F0">
										<div class="col-xs-4" style="padding-left:10px; padding-right:2px">
											<span><?php echo order_status_name($row['order_status_id']); ?></span>
											<div class="" style="background-color:#27ae60; height:8px; width:100%; border-top-left-radius:10px; border-bottom-left-radius:10px; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:2px">
											<span>Proccessing</span>
											<div class="" style="background-color:#A6A6A6; height:8px; width:100%; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:10px">
											 <span>Delivering</span> 
											<div class="" style="background-color:#A6A6A6; height:8px; width:100%; border-top-right-radius:10px; border-bottom-right-radius:10px; margin-right:10px; "></div>
											
										</div>
									   </div>
									   <div class="row" style="margin:10px 0px 0px 0px">
											
											<div class="descrption" style="position:relative">
											
											<p style="background-color:#FFFFFF;"><?php echo $row['remarks']; ?>
									   
											</p>
											</div>
									   
									   </div>     
											
											
										<?php 	} // order processing status
										else if($row['order_status_id']==5){ 
										?>
											
											<div class="row" style="margin:0px; background-color:#F0F0F0">
										<div class="col-xs-4" style="padding-left:10px; padding-right:2px">
											<span><?php echo order_status_name(2); ?></span>
											<div class="" style="background-color:#27ae60; height:8px; width:100%; border-top-left-radius:10px; border-bottom-left-radius:10px; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:2px">
											<span><?php echo order_status_name($row['order_status_id']); ?></span>
											<div class="" style="background-color:#FF7600; height:8px; width:100%; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:10px">
											 <span>Delivering</span> 
											<div class="" style="background-color:#A6A6A6; height:8px; width:100%; border-top-right-radius:10px; border-bottom-right-radius:10px; margin-right:10px; "></div>
											
										</div>
									   </div>
									   <div class="row" style="margin:10px 0px 0px 0px">
											
											<div class="descrption" style="position:relative">
											
											<p style="background-color:#FFFFFF;"><?php echo $row['remarks']; ?>
											
									   
											</p>
											</div>
									   
									   </div>     
											
											
										<?php	} // on delivering process 
										else if($row['order_status_id']==7 || $row['order_status_id']==8 ){ $row['order_status_id']=7 ?>
											
											
											<div class="row" style="margin:0px; background-color:#F0F0F0">
										<div class="col-xs-4" style="padding-left:10px; padding-right:2px">
											<span><?php echo order_status_name(2); ?></span>
											<div class="" style="background-color:#27ae60; height:8px; width:100%; border-top-left-radius:10px; border-bottom-left-radius:10px; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:2px">
											<span><?php echo order_status_name(8); ?></span>
											<div class="" style="background-color:#27ae60; height:8px; width:100%; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:10px">
											 <span><?php echo order_status_name($row['order_status_id']); ?></span> 
											<div class="" style="background-color:#FF7600; height:8px; width:100%; border-top-right-radius:10px; border-bottom-right-radius:10px; margin-right:10px; "></div>
											
										</div>
									   </div>
									   <div class="row" style="margin:10px 0px 0px 0px">
											
											<div class="descrption" style="position:relative">
											
											<p style="background-color:#FFFFFF;"><?php echo $row['remarks']; ?>
											
									   
											</p>
											</div>
									   
									   </div>     
											
											<?php }// on Deliverd process 
										else if($row['order_status_id']==6){ ?>
											
											
											<div class="row" style="margin:0px; background-color:#F0F0F0">
										<div class="col-xs-4" style="padding-left:10px; padding-right:2px">
											<span><?php echo order_status_name(2); ?></span>
											<div class="" style="background-color:#27ae60; height:8px; width:100%; border-top-left-radius:10px; border-bottom-left-radius:10px; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:2px">
											<span><?php echo order_status_name(8); ?></span>
											<div class="" style="background-color:#27ae60; height:8px; width:100%; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:10px">
											 <span><?php echo order_status_name($row['order_status_id']); ?></span> 
											<div class="" style="background-color:#27ae60; height:8px; width:100%; border-top-right-radius:10px; border-bottom-right-radius:10px; margin-right:10px; "></div>
											
										</div>
									   </div>
									   <div class="row" style="margin:10px 0px 0px 0px">
											
											<div class="descrption" style="position:relative">
											
											<p style="background-color:#FFFFFF;"><?php echo $row['remarks']; ?>
											
									   
											</p>
											</div>
									   
									   </div>     
											
											<?php }// on Deliverd process 
										else if($row['order_status_id']==3){?>
											
											<span> <?php echo order_status_name($row['order_status_id']); ?></span>
											<div class="row" style="margin:0px; background-color:#F0F0F0">
										<div class="col-xs-4" style="padding-left:10px; padding-right:2px">
											
											<div class="" style="background-color:#FF0004; height:8px; width:100%; border-top-left-radius:10px; border-bottom-left-radius:10px; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:2px">
											
											<div class="" style="background-color:#FF0004; height:8px; width:100%; "></div>
											
										</div>
										<div class="col-xs-4" style="padding-left:2px; padding-right:10px">
											 
											<div class="" style="background-color:#FF0004; height:8px; width:100%; border-top-right-radius:10px; border-bottom-right-radius:10px; margin-right:10px; "></div>
											
										</div>
									   </div>
									   <div class="row" style="margin:10px 0px 0px 0px">
											
											<div class="descrption" style="position:relative">
											
											<p style="background-color:#FFFFFF;"><?php echo $row['remarks']; ?>
											
									   
											</p>
											</div>
									   
									   </div>     
											
											<?php }
									   
									   
									   ?>
											
									</div>
									
								</div>
							</div>
							</div>
							<?php } 
				
				
				}else {
					?>
						<div class="order_list_wrapper" style="margin-top:10px; padding-top:5px">
							<div class="container" style="text-align:center; background-color:#FFFFFF; ">
								<span style="color:#FF3A3D; padding:10px 5px">No Order Placed with this mobile No : <?php echo $mbl_no ?></span>	
							</div>
						</div>
				
					<?php	
					
					
					}
					
}








