<?php
session_start();
require("phpincludes/config.inc");
require("phpincludes/phpfunctions.inc");
dbConnect();

if(isset($_SESSION['user_id']) &&  $_SESSION['user_id'] != 10){
	$user_id = $_SESSION['user_id'];
	$sql_query_order_list = mysql_query("select * from orders where user_id = $user_id ORDER BY date_time DESC ");
	//$query_data_check = mysql_fetch_array($sql_query_order_list);
	if (mysql_num_rows($sql_query_order_list) > 0) {
	while($row = mysql_fetch_array($sql_query_order_list)) {	
	
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
           		
                <p style="background-color:#FFFFFF;  padding:2px 10px 2px 10px"><?php echo $row['remarks']; ?>     
           
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
           		
                <p style="background-color:#FFFFFF;  padding:2px 10px 2px 10px"><?php echo $row['remarks']; ?>
                
           
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
           		
                <p style="background-color:#FFFFFF; padding:2px 10px 2px 10px"><?php echo $row['remarks']; ?>
                
           
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
           		
                <p style="background-color:#FFFFFF; padding:2px 10px 2px 10px"><?php echo $row['remarks']; ?> 
                
           
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
           		
                <p style="background-color:#FFFFFF;  padding:2px 10px 2px 10px"><?php echo $row['remarks']; ?>
                
           
                </p>
                </div>
           
           </div>     
				
				<?php }// on Cancelled process 
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
           		
                <p style="background-color:#FFFFFF; padding:2px 10px 2px 10px"><?php echo $row['remarks']; ?>
                
           
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


} else
	{ ?>
		<!-- if No order with this user displaying -->
        <div class="order_list_wrapper" style="margin-top:10px">
			<div class="container">
   
    			<div class="order_list_item " style="min-height:80px; background-color:#FFFFFF; padding-top:5px">
        	 			<div class="top-header">
            	
                
                
                
                		<hr style="margin-top:3px; margin-bottom:3px">
            
          			  </div>
            <div class="order_item_body">
            <div class="row">
            	<div class="col-xs-12" style="text-align:center; border-right: 1px solid #C8C8C8;">
                	
                    <h5 style="margin:0px">Sorry ! No Orders </h5>
                    
                </div>
           		
             </div>
           </div>
          
           <div class="order_footer" style="text-align:center">
           
          <hr style="margin-top:3px; margin-bottom:10px">
          <button class="btn btn-block btn-default"> Home Page </button> 
           
           
           </div>     
                    	
        </div>
		
    </div>
</div>

		
		
		<?php }

} else { ?>
	<!-- Track order for non register and guest users -->
	<div class="order_list_wrapper" style="margin-top:10px; background-color:#FFFFFF">
		<div class="container">
   		 <table width="100%" style="text-align:center;">
         	
            <tr>
            	<td style="padding:0px 5px 0px 5px; background-color:rgb(228, 228, 228); color:#000;"><span>Track Your Order By Order ID (OR) Mobile Number</span></td>
            </tr>
            <tr>
            	<td style="padding:5px 15px 5px 15px"><input type="text" class="form-control input-sm track_order_id" placeholder="Order ID" name="track_order_id"></td>
            </tr>
            <tr>
            	<td style="padding:0px 15px 0px 15px; color:#8A8A8A; font-size:10px" >-------------- OR --------------</td>
            </tr>
            <tr>
            	<td style="padding:5px 15px 5px 15px"><input type="text" class="form-control input-sm track_mobile_no" placeholder="Mobile Number" name="track_mobile_no"></td>
            </tr>
            <tr>
            	<td style="padding:5px 15px 5px 15px"><button type="submit" class="btn btn-block btn-danger track_orderId_mbl_btn">Track</button></td>
            </tr>
            <tr>
            	<td style="padding:5px 15px 5px 15px; color:#FF4346" class="error_display"></td>
            </tr>
          </table>
          <div>
          	
          </div>
        </div>
	</div>
    <div class="track_result_container">
    
    </div>
   <script>
   	$(".track_orderId_mbl_btn").click(function(e){
		e.preventDefault();
		var order_id = $(".track_order_id").val().trim();
		var mobile_no = $(".track_mobile_no").val().trim();
		if(order_id == "" && mobile_no =="") {
			swal({
				title: "",
				text: "Enter order ID or Mobile No to Track",
				confirmButtonColor:"#E02839"
				});
			return false;
		} else {
					 $.ajax({
						url:"phpfiles/order_list_byOrderId_MbNo.php?order_id="+order_id+"&mobile_no="+mobile_no,
						dataType:"text",
						type:"GET",
						success: function(data){
						$(".track_result_container").html(data);
						
						}
					});
			
			}	
		});
   
   </script>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
	<!-- <script>load_login_url("phpfiles/login.php?navigate_id="+4);</script> --> 
	<?php } ?>