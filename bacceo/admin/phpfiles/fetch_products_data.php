<?php 
require("../../mobile/phpfiles/phpincludes/config.inc");
require("../../mobile/phpfiles/phpincludes/phpfunctions.inc");
dbconnect();

$super_menu_id=$_GET['super_menu_id'];
if($super_menu_id != 0){
$main_menu_id=$_GET['main_menu_id'];
$submenu_id=$_GET['submenu_id'];
$product_type = get_product_table_name($super_menu_id);
$editmode = $_GET['editmode'];
$discountmode = $_GET['discount_mode'];
if($main_menu_id==0){
$query=mysql_query("select * from submenu");
while($row = mysql_fetch_array($query)){
	 $allsubmenu_ids[]=$row['submenu_id'];
	 }
implode(",",$allsubmenu_ids);

} 
if($main_menu_id!=0 && $submenu_id==0){
	$query=mysql_query("select * from submenu where main_menu_id= $main_menu_id");
while($row = mysql_fetch_array($query)){
	 $allsubmenu_ids[]=$row['submenu_id'];
	 }

	
	
	}
if($main_menu_id!=0 && $submenu_id!=0){
	
$allsubmenu_ids[]=$submenu_id;
	

	
	
	}

?>
<style>
.modal-backdrop {
	z-index:0 !important;
}
</style>
<div style='overflow-x:scroll;'>
<table width="100%" border="1">
         <tr style="background-color:#20253A; color:#FFFFFF">
              <th>#</th>
              <th>Image</th>
              <th>Name</th>
              <th>M_Desc</th>
              <th>QTY</th>
              <th>MRP</th>
              <th>Discount in</th>
              <th>Cat_Name</th>
              <th>In Stock</th>
              <th>Operations</th>
         </tr>
                        
                        
                      
<?php
$submenu_id_final=implode(",",$allsubmenu_ids);
$product_fetch_query=mysql_query("select * from ".$product_type." where cat_id in ($submenu_id_final)");
$i=1;
//echo $submenu_id_final;
while($products_row=mysql_fetch_array($product_fetch_query)){
	
?>	
                        
                       <tr class="<?php echo $products_row['p_id']; ?>">
                        	<td><?php echo $i; ?>.</td>
                            <td style="text-align:center">
                <div class="img-rounded image_check" style="width:90px; height:90px; float:left; background:url(../<?php echo str_replace(' ', '%20',$products_row['img_path']); ?>); background-size: cover; margin:2px 10px 10px 15px">
                </div><?php if($editmode == 1){ ?> <a href="#" onClick="change_image(<?php echo $products_row['p_id']; ?>,<?php echo "'" .$product_type."'" ?>)">Change</a> <?php } ?></td>
                            <td>
                            <a class="product_name" href="#" data-type="text" data-pk="<?php echo $products_row['p_id']; ?>" data-name="name" data-url="phpfiles/product_data_modify.php?product_type=<?php echo $product_type; ?>" title="Name Of the Product"><?php echo $products_row['name']; ?></a>
                            </td>
                            <td><a class="product_desc" href="#" data-type="text" data-pk="<?php echo $products_row['p_id']; ?>" data-name="m_desc" data-url="phpfiles/product_data_modify.php?product_type=<?php echo $product_type; ?>" title="Desc Of the Product"><?php echo $products_row['m_desc']; ?></a></td>
                            <td><a class="product_qty" href="#" data-type="text" data-pk="<?php echo $products_row['p_id']; ?>" data-name="qty" data-url="phpfiles/product_data_modify.php?product_type=<?php echo $product_type; ?>" title="Product Quantity"><?php echo $products_row['qty']; ?></a></td>
                            <td>Rs.<a class="product_mrp" href="#" data-type="text" data-pk="<?php echo $products_row['p_id']; ?>" data-name="mrp" data-url="phpfiles/product_data_modify.php?product_type=<?php echo $product_type; ?>" title="MRP"><?php echo $products_row['mrp']; ?></a>/-</td>
                            <?php if($discountmode == 1) { ?>
                            <td><a class="product_sell_price_percetage" href="#" data-type="text" data-pk="<?php echo $products_row['p_id']; ?>" data-name="sell_price" data-url="phpfiles/product_data_modify.php?product_type=<?php echo $product_type; ?>&discount_mode=1" title="Discount in Percentage"><?php echo sprintf("%.2f",$products_row['sell_price']); ?></a>%</td> 
                            <?php } else { ?>
                             <td>Rs.<a class="product_sell_price" href="#" data-type="text" data-pk="<?php echo $products_row['p_id']; ?>" data-name="sell_price" data-url="phpfiles/product_data_modify.php?product_type=<?php echo $product_type; ?>&discount_mode=0" title="Discount in Final Rupee" data-mrp="<?php echo $products_row['mrp']; ?>"><?php echo get_price_of_the_product($products_row['p_id'],$product_type); ?></a>/-</td> 
                            <?php } ?>
                            <td><?php echo get_submenu_name($products_row['cat_id'])?></td>
                            <td><a class="stock" href="#" data-type="text" data-pk="<?php echo $products_row['p_id']; ?>" data-name="in_stock" data-url="phpfiles/product_data_modify.php?product_type=<?php echo $product_type; ?>" title="Stock In"><?php echo $products_row['in_stock']; ?></a>Pcs</td>
                            <td align="center"><?php if($editmode == 1){ ?> <input type="checkbox" <?php if($products_row['show_status'] == 1 ) { ?> checked <?php } ?> class="product_show_hide_toggle" data-pk="<?php echo $products_row['p_id']; ?>" data-name="show_status" ><?php } ?><button class="btn btn-danger" style="margin:10px" onClick="delete_product(<?php echo $products_row['p_id']; ?>)"><span class="glyphicon glyphicon-trash"></span></button> </td>
                            
                        </tr>
                        
                        
                        
                        
                        
                        
                        

<?php	
$i++;
}

?>
</table>
</div>
<div id="image_change_popup" class="modal-demo" style="border-radius:0px; background-color:#FFFFFF; opacity:0.9">
            <div class="text" style="text-align:center; padding:0px">
              <h5>Changing image is under construction! Wait for Update</h5>
              <button class="btn btn-danger" onClick="Custombox.close();">Close</button>
   			</div> 
</div>  
  <!-- Modal -->
  <div class="modal fade" id="image_Change_modal" role="dialog">
    <div class="modal-dialog" style="margin:150px auto">
    
      <!-- Modal content-->
      <div class="modal-content image_modal_content">
        
      </div>
      
    </div>
  </div>
<?php } else {?>


<?php } ?>
<?php if($editmode == 1){ ?>
<script>
$(".product_name,.product_desc,.product_mrp,.stock,.product_qty").editable({
				inputclass: 'example_test',
				/*success: function(data) {
					alert(data);
				} */
				validate: function(value) {
							if($.trim(value) == '') {
								return 'This field is required';
							}
						}
				});
$(".product_sell_price_percetage").editable({
				inputclass: 'example_test',
				validate: function(value) {
						if($.trim(value) == '') {
							return 'This field is required';
							}
						if(value >=100 || value < 0){
							return 'value Should be 0 to 99';
							}
						if(value < 0){
							return 'value Should be 0 to 99';
							}
						
						}
						
						
				});
$(".product_sell_price").editable({
				inputclass: 'example_test',
				validate: function(value) {
						var mrp = parseInt($(this).attr('data-mrp'));
						//alert(mrp + "  " +value );
						if($.trim(value) == '') {
							return 'This field is required';
							}
							if(value>mrp || value < 0 ){
							return 'Value should be between Rs.0 to Rs.'+mrp;
							}
							if(value < 0 ){
							return 'Your Valu eshoud not be lessthan MRP';
							}					
						}
						
				});
	$(function() {
    	$('.product_show_hide_toggle').bootstrapToggle({
			on: 'show',
			off: 'hide'
		
		});
 	 });
	 
$(".product_show_hide_toggle").change(function(){
	if($(this).prop('checked')==true){
		var show_status = 1;
		
		} else {
			var show_status = 0;
			
			}
		var id = $(this).attr('data-pk');
		var col_name=$(this).attr('data-name');
		
		$.ajax({
			url:"phpfiles/product_data_modify.php?product_type=<?php echo $product_type; ?>&name="+col_name+"&pk="+id+"&value="+show_status,
			dataType:"text",
			type:"GET",
			success: function(data){
			//alert(data);
			}
		});  
	});
// product image function 
function change_image(p_id,product_type) {
	$.ajax({
			url:"phpfiles/productimage_change_popupcontent.php?p_id="+p_id+"&product_type="+product_type,
			dataType:"text",
			type:"GET",
			success: function(data){
			$(".image_modal_content").html(data);
			$("#image_Change_modal").modal('show');
			}
		});  
	
	}
</script>
<?php } ?>