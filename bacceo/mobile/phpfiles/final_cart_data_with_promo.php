<?php 
session_start();
require("phpincludes/config.inc");
dbConnect();
 if(!isset($_SESSION['total_order_amount'])){
	 $_SESSION['total_order_amount']=0;
	 } 	
  ?>  	
        
        
        
       <table width="100%">
                	<tr>
                    	<td align="right">Order Amount:</td>
                        <td style="padding-left:10px">Rs.</td>
                        <td style="padding-right:10px" align="right"><?php echo sprintf('%0.2f',$_SESSION['total_order_amount'])."/-";?></td>
                	</tr>
                    <?php 
				   if(isset($_SESSION['discount_valid'])){ ?>
					   
					<tr>
                    	<td align="right">Discount Applied:</td>
                    	<td style="padding-left:10px">Rs.</td>
                        <td style="padding-right:10px" align="right"><?php echo "-".sprintf('%0.2f',$_SESSION['discount_valid'])."/-";?></td>
                	</tr>
					
					<?php   } 
				   
				   ?>
                    <tr style="border-bottom-color::#000000; border-bottom-style:solid; border-bottom-width:1px">
                    	<td align="right">Delivery Charges:</td>
                    	<td style="padding-left:10px">Rs.</td>
                        <td style="padding-right:10px" align="right"><?php echo sprintf('%0.2f',$_SESSION['delivery_charge'])."/-";?></td>
                	</tr>
                   
                    <tr style="font-size:14px; border-bottom-color::#000000; border-bottom-style:solid; border-bottom-width:1px">
                    	<td align="right">Total Payable Amount:</td>
                        
                        <td style="padding-left:10px">Rs.</td>
                        <td style="padding-right:15px; font-weight:500; font-size:18px;" align="right">
							<?php
							if(isset($_SESSION['discount_valid'])){
							$discount_value =$_SESSION['discount_valid']; 
							} else { $discount_value =0 ; }
							$_SESSION['total_payable_amount'] = ($_SESSION['total_order_amount']- $discount_value) + $_SESSION['delivery_charge'];
                            echo sprintf('%0.2f',$_SESSION['total_payable_amount'])."/-";
                            ?>
                        </td>
                	</tr>
                </table> 
        
        
        
    