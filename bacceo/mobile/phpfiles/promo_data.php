<?php 
session_start();
	require("phpincludes/config.inc");
	dbConnect();
  	$promo_code_value = mysql_real_escape_string($_GET['promo_code']) ;
  	$coupon_data_query=mysql_query("select * from coupons where coupon_code = '$promo_code_value'");
	$coupon_data = mysql_fetch_array($coupon_data_query);
  	if(mysql_num_rows($coupon_data_query)==1){
		
		$coupon_start_time =$coupon_data['start_date'];
		$coupon_end_time = $coupon_data['end_date'];
		if((new DateTime() >= new DateTime($coupon_start_time)) && (new DateTime() <= new DateTime($coupon_end_time)) ){
			
			
			$cart_min_price=$coupon_data['min_price'];
			if($_SESSION['total_order_amount'] >= $cart_min_price){ 
			
				
				$coupon_value_type = $coupon_data['coupon_value_type'];
						if(isset($_SESSION['discount_valid'])){
							unset($_SESSION['discount_valid']);
						}
						if($coupon_value_type == 'percentage'){
							$coupon_value = $coupon_data['coupon_value'];
							$_SESSION['used_coupon_id']=$coupon_data['id'];
							$discount = ($_SESSION['total_order_amount']*$coupon_value)/100;
							$_SESSION['discount_valid']=$discount;
							
								?>
								<div class="row promocode_status" style="background-color:#FFFFFF; text-align:center">
									<div class="col-xs-12 col-md-12">
                                    	<div class="container">
										<p style="color:#00BC5B; margin-bottom:5px"> Congrats! <?php echo '"'.$promo_code_value.'"' ;?> Coupon Applied Successfully  </p>
										<p style="color:#00A86C; margin-bottom:1px"> Now Check your cart for final price  </p>
                                        </div>
									</div>
								</div>
								  
					
							<?php
							}else if( $coupon_value_type == 'fixed' ){
							$coupon_value = $coupon_data['coupon_value'];
							$discount = $coupon_value;
							$_SESSION['used_coupon_id']=$coupon_data['id'];
							$_SESSION['discount_valid']=$discount;
								
								?>
								<div class="row promocode_status" style="background-color:#FFFFFF; text-align:center">
									<div class="col-xs-12 col-md-12">
										<div class="container">
                                        <p style="color:#00BC5B; margin-bottom:5px"> Congrats! <?php echo '"'.$promo_code_value.'"' ;?> Coupon Applied Successfully  </p>
										<p style="color:#00A86C; margin-bottom:1px"> Now Check your cart for final price  </p>
									</div>
								</div>
								  
					
							<?php	
								
								
							}
						
						
				} else {
					?>
					<div class="row promocode_status" style="background-color:#FFFFFF; text-align:center">
        					<div class="col-xs-12 col-md-12">
                				<div class="container">
                                <p style="color:#E30003"> Sorry! this coupon valid for whose cart amount is more than or equal to <?php echo '" RS.'.$cart_min_price.'/-"' ?></p>
                                </div>
                			</div>
        			</div>
					
					
					<?php }
				
			}
			else { ?>
            
			<div class="row promocode_status" style="background-color:#FFFFFF; text-align:center">
        		<div class="col-xs-12 col-md-12">
                	<div class="container">
                    <p style="color:#E30003"> Sorry! Entered Coupon was Expired </p>
                    </div>
                </div>
        </div>
			
			<?php }
	} else 
	{
		
		?>
        <div class="row promocode_status" style="background-color:#FFFFFF; text-align:center">
        		<div class="col-xs-12 col-md-12">
                	<div class="container">
                    <p style="color:#E30003"> Sorry! Enter Coupon is Not Valid </p>
                    </div>
                </div>
        </div>
        
		<?php
		
		}
  ?>  	
        
        
        
        
        
        
        
    