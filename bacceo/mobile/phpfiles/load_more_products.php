<?php
session_start();
require("phpincludes/config.inc");
require("phpincludes/phpfunctions.inc");
dbConnect();
$tab_id = $_GET['activeid'];
$main_menu_id = $_GET['main_menu_id'];
$last_p_id = $_GET['last_product_id'];
$product_table_name = $_GET['product_type'];
$query_for_submenu_list_data_fetch =mysql_query("select * from submenu where main_menu_id =$main_menu_id");
 while($row = mysql_fetch_array($query_for_submenu_list_data_fetch)){
	 $submenu_ids[]=$row['submenu_id'];
	 }
if($tab_id == 'all'){
	$required_submenu_ids = implode("," , $submenu_ids);
$query_for_product_data_fetch =mysql_query("select * from grocery_products where cat_id in ($required_submenu_ids) AND p_id>$last_p_id AND show_status = 1 LIMIT 10");
			
			while($row = mysql_fetch_array($query_for_product_data_fetch)){ ?>
				<div class="item_list_container product_items" style="overflow:hidden" data-id="<?php echo $row['p_id'] ?>">
                   	 <div class="list-group">
                            <a class="list-group-item" onClick="return false;">
                               <div class="img-rounded" style="background:url('<?php echo "../".$row['img_path']; ?>'); background-repeat: no-repeat;background-size: 60px 60px;" onClick="product_popup(<?php echo $row['p_id'] ?>,<?php echo "'" .$product_table_name."'" ?>)">
                                </div>
                                <?php if($row['sell_price']>0){ ?><div class="discount_lable" ><p>Save<br>Rs <?php echo sprintf('%.2f',($row['mrp']*($row['sell_price']/100)))?> /-</p></div> <?php } ?>
                                
                                <h4 class="list-group-item-heading" ><?php echo ucfirst(substr($row['name'], 0, 20))?></h4>
                                <p class="p_desc"> <span><i>Qty : <?php echo $row['qty']  ?></i></span> </p>
                                <div class="operations">
                                <p class="p_price"><span class="fa fa-inr" style="font-weight:700; font-size:12px; padding-right:10px"> <?php echo ($row['mrp']-($row['mrp']*($row['sell_price']/100)))?>/-</span><?php if($row['sell_price']>0){ ?> <span style="font-size:10px; font-weight:700;   text-decoration: line-through;">Rs:<?php echo $row['mrp']?> /-</span><?php } ?></p>
                                
                               <?php if(get_product_avail($row['p_id'],$product_table_name)>0){ ?>
                                <div class="quantity cart_operations_block_<?php echo $row['p_id']?>">
                                	
                                 <button class="btn btn-primary btn-xs remove_from_cart" style="padding: 3px 5px;" onClick="remove_from_cart(<?php echo $row['p_id']?>,<?php echo "'" .$product_table_name."'" ?>); return false;"> <script>set_disabled_attr_for_cart_remove_button(<?php echo $row['p_id']?>,<?php echo "'" .$product_table_name."'" ?>);</script><span class="glyphicon glyphicon-minus-sign" style="font-size:14px"></span> </button>
                                 <span class="label label-default item_cart_quantity_status" ><script>set_this_quantity_lable(<?php echo $row['p_id']?>,<?php echo "'".$product_table_name."'" ?>);</script></span>
                                 <button class="btn btn-primary btn-xs add_to_cart" style="padding: 3px 5px;" onClick="add_to_cart(<?php echo $row['p_id']?>,<?php echo "'" .$product_table_name."'" ?>); return false;"><span class="glyphicon glyphicon-plus-sign" style="font-size:14px"></span> </button>
                                 
                                 </div>
                                 <?php } else { ?>
                                	<div class="quantity cart_operations_block_<?php echo $row['p_id']?>">
                                    	<span style="font-weight:400; color:#FF0004">Out of Stock</span>
                                    </div>
								<?php } ?>
                                </div>
                              </a>
                              
                         </div>
					</div> 
				
		<?php }
				
} else {
	
	$query_for_product_data_fetch =mysql_query("select * from grocery_products where cat_id in ($tab_id) AND p_id>$last_p_id AND show_status = 1 LIMIT 10");
			while($row = mysql_fetch_array($query_for_product_data_fetch)){ ?>
					  <div class="item_list_container product_items" style="overflow:hidden" data-id="<?php echo $row['p_id'] ?>">
                   	 <div class="list-group">
                            <a class="list-group-item" onClick="return false;">
                               <div class="img-rounded" style="background:url('<?php echo "../".$row['img_path']; ?>'); background-repeat: no-repeat;background-size: 60px 60px;" onClick="product_popup(<?php echo $row['p_id'] ?>,<?php echo "'" .$product_table_name."'" ?>)">
                                </div>
                                <?php if($row['sell_price']>0){ ?><div class="discount_lable" ><p>Save<br>Rs <?php echo sprintf('%.2f',($row['mrp']*($row['sell_price']/100)))?> /-</p></div> <?php } ?>
                                
                                <h4 class="list-group-item-heading" ><?php echo ucfirst(substr($row['name'], 0, 20))?></h4>
                                <p class="p_desc"> <span><i>Qty : <?php echo $row['qty']  ?></i></span> </p>
                                <div class="operations">
                                <p class="p_price"><span class="fa fa-inr" style="font-weight:700; font-size:12px; padding-right:10px"> <?php echo ($row['mrp']-($row['mrp']*($row['sell_price']/100)))?>/-</span><?php if($row['sell_price']>0){ ?> <span style="font-size:10px; font-weight:700;   text-decoration: line-through;">Rs:<?php echo $row['mrp']?> /-</span><?php } ?></p>
                                
                               <?php if(get_product_avail($row['p_id'],$product_table_name)>0){ ?>
                                <div class="quantity cart_operations_block_<?php echo $row['p_id']?>">
                                	
                                 <button class="btn btn-primary btn-xs remove_from_cart"  style="padding: 3px 5px;" onClick="remove_from_cart(<?php echo $row['p_id']?>,<?php echo "'" .$product_table_name."'" ?>); return false;"> <script>set_disabled_attr_for_cart_remove_button(<?php echo $row['p_id']?>,<?php echo "'" .$product_table_name."'" ?>);</script><span class="glyphicon glyphicon-minus-sign" style="font-size:14px"></span> </button>
                                 <span class="label label-default item_cart_quantity_status" ><script>set_this_quantity_lable(<?php echo $row['p_id']?>,<?php echo "'".$product_table_name."'" ?>);</script></span>
                                 <button class="btn btn-primary btn-xs add_to_cart" style="padding: 3px 5px;" onClick="add_to_cart(<?php echo $row['p_id']?>,<?php echo "'" .$product_table_name."'" ?>); return false;"><span class="glyphicon glyphicon-plus-sign" style="font-size:14px"></span> </button>
                                 
                                 </div>
                                 <?php } else { ?>
                                	<div class="quantity cart_operations_block_<?php echo $row['p_id']?>">
                                    	<span style="font-weight:400; color:#FF0004">Out of Stock</span>
                                    </div>
								<?php } ?>
                                </div>
                              </a>
                              
                         </div>
					</div> 
				
				
<?php }
}
?>      
