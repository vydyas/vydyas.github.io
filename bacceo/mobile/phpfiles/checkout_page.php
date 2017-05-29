<?php
session_start();
require("phpincludes/config.inc");
require("phpincludes/phpfunctions.inc");
dbConnect();
//$_SESSION['mobile_cart_item'];
//$_SESSION['mobile_itemquantities'];
?>


<div class="cart_data_display" style="">
<?php               	
if(isset($_SESSION['mobile_cart_item'])){
	$sizeofcart=sizeof($_SESSION['mobile_cart_item']);
	for($i=0; $i<$sizeofcart; $i++){
	?>
	
	<div class="item_list_container cart_item_block_<?php echo $_SESSION['mobile_cart_item'][$i]?>" >
						 <div class="list-group">
								<a href="#" class="list-group-item" style=" padding: 10px; ">
									
									
									
									<div class="operations ">
									<h6 class="list-group-item-heading" ><?php echo substr(get_name_of_product($_SESSION['mobile_cart_item'][$i],$_SESSION['cart_product_type'][$i]), 0, 20)  ?></h6>
									 <div class="checkout_quantity cart_operations_block_<?php echo $_SESSION['mobile_cart_item'][$i]?>" style="float:left">
									 <button class="btn btn-primary btn-xs remove_from_cart" style="margin-left:20px" onClick="remove_from_cart(<?php echo $_SESSION['mobile_cart_item'][$i]?>,<?php echo "'".$_SESSION['cart_product_type'][$i]."'"?>); return false;"><script>set_disabled_attr_for_cart_remove_button(<?php echo $_SESSION['mobile_cart_item'][$i]?>,<?php echo "'".$_SESSION['cart_product_type'][$i]."'"?>);</script><span class="glyphicon glyphicon-minus-sign" style="font-size:14px"></span> </button>
									 <span class="label label-default item_cart_quantity_status" style=" margin-left:2px; padding:1px 2px 1px 1px; background-color:#FFFFFF; color:#F52C2F; font-size:15px"><script>set_this_quantity_lable(<?php echo $_SESSION['mobile_cart_item'][$i]?>,<?php echo "'".$_SESSION['cart_product_type'][$i]."'"?>);</script></span>
									 <button class="btn btn-primary btn-xs add_to_cart"  onClick="add_to_cart(<?php echo $_SESSION['mobile_cart_item'][$i]?>,<?php echo "'".$_SESSION['cart_product_type'][$i]."'"?>); return false;"><span class="glyphicon glyphicon-plus-sign" style="font-size:14px"></span> </button>
									 </div>
									<p class="p_price" style="float:left"><span class="fa fa-inr" style="font-weight:700; font-size:12px; padding-right:10px"> <?php echo get_price_of_the_product($_SESSION['mobile_cart_item'][$i],$_SESSION['cart_product_type'][$i])?></span></p>
									
									<p style="margin-bottom:0px; font-weight:800;">X</p>
								   <div class="total_price_of_cart" style="position:absolute; bottom:-5px; right:40px">
									<h5><span class="fa fa-inr" style="font-weight:200; font-size:12px; padding-right:2px"></span><span class="price_product_with_qunatity_<?php echo $_SESSION['mobile_cart_item'][$i]?>" style="font-size:14px; font-weight:500"><script type="text/javascript">product_price_with_qunatity(<?php echo $_SESSION['mobile_cart_item'][$i]?>,<?php echo "'".$_SESSION['cart_product_type'][$i]."'"?>); </script><span></h5>
									</div>
									</div>
									<span style="position:absolute; bottom:-5px; right:0px; font-size:20px; padding:25px 10px 20px 10px;" class="glyphicon glyphicon-remove-circle" onClick="direct_remove_from_cart(<?php echo $_SESSION['mobile_cart_item'][$i]?>,<?php echo "'".$_SESSION['cart_product_type'][$i]."'"?>); return false;"></span>
								  </a>
							 </div>
						</div> 
	<?php
	}
}else {
?>
<div class="item_list_container wow flipInX" >
        <div class="list-group">
               <a href="#" class="list-group-item" style=" padding: 10px; ">
                                
                     <h5>Your Basket is Empty !</h5>
                       <span>Go to Home</span>
               </a>
       </div>
</div> 
<?php
}                            
 ?>   
<div class="adjucement_bottom" style="min-height:125px; width:100%">

</div>                       
   <!--                          
 <div class="item_list_container wow flipInX" >
                   	 <div class="list-group">
                            <a href="#" class="list-group-item" style=" padding: 10px; ">
                                
                                
                                
                                <div class="operations">
                                <h5 class="list-group-item-heading" >Oil Packet 200 Ltrs</h5>
                                 <div class="checkout_quantity" style="float:left">
                                 <button class="btn btn-primary btn-xs remove_from_cart" style="margin-left:20px" disabled><span class="glyphicon glyphicon-minus-sign" style="font-size:10px"></span> </button>
                                 <span class="label label-default " style=" margin-left:2px; padding:1px 2px 1px 1px; background-color:#FFFFFF; color:#F52C2F; font-size:15px">0</span>
                                 <button class="btn btn-primary btn-xs add_to_cart"><span class="glyphicon glyphicon-plus-sign" style="font-size:10px"></span> </button>
                                 </div>
                                <p class="p_price"><span class="fa fa-inr" style="font-weight:700; font-size:12px; padding-right:10px"> 600/-</span></p>
                                
                                <p style="margin-bottom:0px; font-weight:800">X</p>
                               <div class="total_price_of_cart" style="position:absolute; bottom:-5px; right:60px">
                                <h5><span class="fa fa-inr" style="font-weight:200; font-size:16px; padding-right:2px"></span>500</h5>
                                </div>
                                </div>
                                <span style="position:absolute; bottom:-5px; right:0px; font-size:20px; padding:25px 10px 20px 10px;" class="glyphicon glyphicon-remove-circle"></span>
                              </a>
                         </div>
					</div> 
                            
                            
              -->              
                            
                            
                            
                      
                
 </div>