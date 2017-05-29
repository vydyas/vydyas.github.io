<?php 
session_start();
require("phpincludes/config.inc");
require("phpincludes/phpfunctions.inc");
dbConnect();
$p_id=$_GET['id'];
$product_type = $_GET['product_type'];
$product_data=mysql_fetch_array(mysql_query("select * from ".$product_type." where p_id = $p_id"));
?>
		   <div class="image_div" style="background-color:#F3F3F3; width:100%; min-height:110px;position:relative; background:url('../<?php echo $product_data['img_path']; ?>'); background-repeat:no-repeat; background-position:center; overflow:hidden ">
           		<div class="discount_lable_top"> </div>
               <div class="discount_show_lable" style="background-color:#27ae60; width:80px; height:80px; border-radius:100%; position:absolute; bottom:-20px; right:20%; text-align:center; color:#FFFFFF">
               <p>Just<br>Rs <span style="font-size:18px; font-weight:500"><?php echo ($product_data['mrp']-($product_data['mrp']*($product_data['sell_price']/100)))?> /-</span></p>
               </div>
           </div>
           <div class="product_details_warp" style="background-color:#FFFFFF; padding:0px 0px 10px 0px;">
           		<div class="product_name" style="background-color:#1B2F36; color:#FFFFFF; text-align:center; padding:2px 10px 2px 10px" ><h6 style="margin:0px; font-size:16px; color:#FFFFFF"><?php echo $product_data['name']; ?></h6></div>
                <hr style="margin:0px">
           		<div class="product_desc" style="background-color:#F7F7F7; margin-top:5px; padding:2px 10px 5px 10px">
                	<div class="heading" style="background-color:#E0E0E0; color:#000000;"><p style="margin-bottom:2px">DESCRIPTION</p></div>
                	<p align="left"> <?php echo $product_data['m_desc']; ?> </p>
                </div>
                <div class="operation" >
                	<div class="row" style="padding-top:10px;">
                        <div class="col-xs-8 col-sm-8 col-md-8">
                            <div>
                                <div class="price_lable" style="padding-left:10px">
                                	
                                    <span class="fa fa-inr" style="font-weight:700; font-size:20px; padding-right:10px"> <?php echo ($product_data['mrp']-($product_data['mrp']*($product_data['sell_price']/100)))?>/-</span><?php if($product_data['sell_price']>0){ ?><span style="font-size:15px; font-weight:700;   text-decoration: line-through;">Rs:<?php echo $product_data['mrp']?> /-</span> <?php } ?>
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4" style="text-align:center;">
                                <div class="quantity cart_operations_block_<?php echo $p_id ?>">
                                                    
                                                 <button class="btn btn-primary btn-xs remove_from_cart"  onClick="remove_from_cart(<?php echo $p_id ?>,<?php echo "'".$product_type."'" ?>); return false;"> <script>set_disabled_attr_for_cart_remove_button(<?php echo $p_id ?>,<?php echo "'".$product_type."'" ?>);</script><span class="glyphicon glyphicon-minus-sign" style="font-size:14px"></span> </button>
                                                 <span class="label label-default item_cart_quantity_status" ><script>set_this_quantity_lable(<?php echo $p_id?>,<?php echo "'".$product_type."'" ?>);</script></span>
                                                 <button class="btn btn-primary btn-xs add_to_cart" onClick="add_to_cart(<?php echo $p_id ?>,<?php echo "'".$product_type."'" ?>); return false;"><span class="glyphicon glyphicon-plus-sign" style="font-size:14px"></span> </button>
                                </div>
                        </div>
               		 </div>
                </div>
           </div>
          
