<?php
session_start(); 
require("../../mobile/phpfiles/phpincludes/config.inc");
require("../../mobile/phpfiles/phpincludes/phpfunctions.inc");
dbconnect();
$order_id = $_GET['order_id'];
$order_data=mysql_fetch_array(mysql_query("select * from orders where id = $order_id"));
$user_id = $order_data['user_id'];
$cart_amount = $order_data['cart_amount'];
$discount_amount = $order_data['discount_valid'];
$delivery_charge = $order_data['delivery_charge'];
$coupon_id = $order_data['coupon_id'];
$shipping_address_book_id = $order_data['user_address_book_id'];
$payment_method_id =$order_data['payment_method_id'];
$ordered_date_time = $order_data['date_time'];
$product_list_array = explode(",",$order_data['products']);
$product_type_list =explode(",",$order_data['product_types']);
$quantity_list_array = explode(",",$order_data['quantities']);
$product_prices=explode(",",$order_data['product_prices']);
$total_payable_amount = $order_data['total_payable_amount'];
$verfication_status = $order_data['order_details_verified'];
$order_status_id = $order_data['order_status_id'];
$invoice_id = $order_data['invoice_id'];

?>
<style>
.table_order_details tr td{
	text-align:left;
	padding-right:10px;
	}
.table_order_products tr th {
	padding:2px 10px 2px 10px;
	background-color:#0F2627;
	color:#FFFFFF;
	
	}
.table_order_products tr td, .shippingaddress_table tr td {
	padding:1px 10px 1px 10px;
	
	
	}
.table_order_products tr td:last-child {
	text-align:right;
	
	
	}
.shippingaddress_table tr td {
	text-align:left;
	}
</style>
<h4>Order ID :<?php echo $order_id ?></h4> <span><?php echo $ordered_date_time ?></span>
<hr style="margin:4px">
<!-- <div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
</div> -->
<div class="row">
<div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">

<div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">User Details</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
        	<div class="row">
            	<div class="col-lg-7 col-xs-7 col-sm-7 col-md-7" style="border-right-color: #000;
border-right-width: 1px;
border-right-style: double;">
                	<table class="table_order_details">
                    	<tr>
                        	<td>Name</td>
                            <td>:</td>
                            <td><?php echo get_user_name($user_id) ?></td>
                        </tr>
                        <tr>
                        	<td>User Id</td>
                            <td>:</td>
                            <td><?php echo $user_id ?></td>
                        </tr>
                        <tr>
                        	<td>Mobile No</td>
                            <td>:</td>
                            <td><?php echo get_user_mbl($user_id) ?></td>
                        </tr>
                    
                    </table>
                
                </div>
                <div class="col-lg-5 col-xs-5 col-sm-5 col-md-5">
                	
                      <label style="padding:2px 5px 2px 5px"><input type="checkbox" class="user_verfy_checkbox verfication_checkbox" <?php if($verfication_status == "verfied"){ ?> checked disabled <?php } ?> style="margin: 2px 5px;"/>Verified</label>
       
                
                </div>
            
            </div>
        
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Order Product Details</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
        	<div class="row">
            	<div  class="col-lg-9 col-sm-9 col-md-9 col-xs-9" style="border-right-color: #000;border-right-width: 1px;border-right-style: double;">
        	<table border="1px" class="table_order_products">
            	<tr>
                	<th>#</th>
                	<th>Products</th>
                    <th>Qty</th>
                    <th>Price</th>
                </tr>
                <?php 
				$j=1;
				for($i=0; $i<sizeof($product_list_array);$i++)
				{
				?>
                
                
                <tr>
                	<td><?php echo $j ?></td>
                    <td><a href="#" class="product_popover" title="Product Details" data-toggle="popover" data-trigger="focus"  data-placement="top"><?php echo substr(get_name_of_product($product_list_array[$i],$product_type_list[$i]), 0, 20); ?></a>
                    <div class="product_popover-content hide">
                    <div class="image" style="float:left">
                    	<img src="../<?php echo get_img_of_product($product_list_array[$i],$product_type_list[$i]); ?>" width="50px" height="50px">
                    </div>
                    <h6><?php echo get_name_of_product($product_list_array[$i],$product_type_list[$i]); ?></h6>
                    
                    </div>
                    </td>
                    <td><?php echo $quantity_list_array[$i] ?></td>
                    <td><?php echo sprintf("%.2f", $product_prices[$i]*$quantity_list_array[$i]) ?></td>
                </tr>
             <?php $j++; } ?>  
             	<tr>
                    
                    <td colspan="3" style="text-align:right">Sub Total</td>
                    <td><?php echo sprintf("%.2f",$cart_amount); ?></td>
                </tr>
                <tr>
                    
                    <td colspan="3" style="text-align:right">Discount Amount</td>
                    <td><?php echo "-".sprintf("%.2f",$discount_amount); ?></td>
                </tr>
             	<tr>
                    
                    <td colspan="3" style="text-align:right">Delivery or Shipping Charges</td>
                    <td><?php echo sprintf("%.2f",$delivery_charge); ?></td>
                </tr>
                <tr>
                    
                    <td colspan="3" style="text-align:right">Total Payable Amount</td>
                    <td><strong><?php echo sprintf("%.2f", ceil($total_payable_amount)); ?></strong></td>
                </tr>
            </table>
        	</div>
            	
                
            	<div  class="col-lg-3 col-sm-3 col-md-3 col-xs-3">	
            		<label style="padding:2px 5px 2px 5px"><input type="checkbox" class="products_verfy_checkbox verfication_checkbox" <?php if($verfication_status == "verfied"){ ?> checked disabled <?php } ?> style="margin: 2px 5px;"/>Verified</label>
                </div>
            </div>
        
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Shipping Details</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
        	<div class="row">
            	<div  class="col-lg-6 col-sm-6 col-md-6 col-xs-6" style="border-right-color: #000;border-right-width: 1px;border-right-style: double;">
			<?php 
				$shipping_address_data = mysql_fetch_array(mysql_query("SELECT * FROM `user_address_book` WHERE id = $shipping_address_book_id"));
				
			?>
            <table class="shippingaddress_table">
            	<tr>
                	<td>DoorNo </td>
                    <td>:</td>
                    <td><?php echo $shipping_address_data['door_no'] ?></td>
                </tr>
              	<tr>
                	<td>Mobile No </td>
                    <td>:</td>
                    <td><?php echo $shipping_address_data['mobile_no'] ?></td>
                </tr>
                <tr>
                	<td>Landmark </td>
                    <td>:</td>
                    <td><?php echo $shipping_address_data['landmark'] ?></td>
                </tr>
                <tr>
                	<td>Street Or Sector </td>
                    <td>:</td>
                    <td><?php echo $shipping_address_data['street_sector_block'] ?></td>
                </tr>
                <tr>
                	<td>Area </td>
                    <td>:</td>
                    <td><?php echo get_area_name($shipping_address_data['delivery_area_id']) ?></td>
                </tr>
                <tr>
                	<td>City </td>
                    <td>:</td>
                    <td><?php echo $shipping_address_data['city'] ?></td>
                </tr>
                
            </table>
            	</div>
            	
                
            	<div  class="col-lg-6 col-sm-6 col-md-6 col-xs-6">	
            		<label style="padding:2px 5px 2px 5px"><input type="checkbox" class="addres_verfy_checkbox verfication_checkbox" <?php if($verfication_status == "verfied"){ ?> checked disabled <?php } ?> style="margin: 2px 5px;"/>Verified</label>
                </div>
            </div>
        
        </div>
      </div>
    </div>
  </div> 
</div>

</div>
<div class="row">

	<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
    	<select class="form-control order_status_selectbox" id="select" disabled>
          <?php 
		  if($order_status_id==1){
			 $status_id_tobe ='1,2,3'; 
			  } else if($order_status_id==2){
			 $status_id_tobe ='2,5,3'; 
			  } else if($order_status_id==5){
			 $status_id_tobe ='5,8,3'; 
			  } else if($order_status_id==8){
			 $status_id_tobe ='8,7,3'; 
			  } else if($order_status_id==7){
			 $status_id_tobe ='7,6,3'; 
			  } else if($order_status_id == 3 ){
				$status_id_tobe ='3'; 
			}
			else if($order_status_id == 6 ){
				$status_id_tobe ='6'; 
			}
			 
		  $orders_status_list_query = mysql_query("select * from order_status where id in ($status_id_tobe)");
		  while($status = mysql_fetch_array($orders_status_list_query)) {
		  
		  ?>
          
          <option value="<?php echo $status['id'] ?>" <?php if($order_status_id == $status['id']){ echo "selected"; } ?> ><?php echo ucfirst($status['status_name']) ?></option>
        
		
		<?php } ?>
        </select>
    </div>

</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="text-align:center; margin-top:30px">
    	<?php if($invoice_id == ''){ ?><button class="btn btn-sm btn-success generate_invoce_btn" disabled>Generate Invoice</button> <?php } else { ?> <button class="btn btn-sm btn-default invoice_status_btn" disabled>Invoice Genrated</button> <a class="btn btn-info btn-sm" href='invoice_data/<?php echo $order_id.'.pdf' ?>' target="_blank">Print</a><?php } ?>
      <?php if($invoice_id != ''){ ?>  <button class="btn btn-sm btn-danger cancel_invoice" >Re-Generate Cancel Invoice</button> <?php } ?>
    </div>
</div>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
    	<input type="text" class="remarks form-control " placeholder="Order Remarks">
    </div>

</div>

<div class="row">
	<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="text-align:center; margin-top:30px">

<button class="btn btn-danger" onClick="Custombox.close();">Cancel</button>
<button class="btn btn-success proccess_ord_btn" disabled>Proccess Order</button>
	</div>
</div>
<script>
$(document).ready(function(e) {
$(".cancel_invoice").hide();  
if(<?php echo $order_status_id ?> == 3 ){
	$(".generate_invoce_btn").prop("disabled", true);
	$(".order_status_selectbox").prop("disabled", true);
	} else {
		$(".generate_invoce_btn").prop("disabled", false);
		$(".order_status_selectbox").prop("disabled", false);
		}
	if($(".verfication_checkbox").length == $(".verfication_checkbox:checked").length){
		if(<?php echo $order_status_id ?> != 3 ) {
		$(".order_status_selectbox").prop("disabled", false);
		$(".generate_invoce_btn").prop("disabled", false);
		}
			} else {
				$(".order_status_selectbox").prop("disabled", true);
				$(".generate_invoce_btn").prop("disabled", true);
		}
	});
	$(".verfication_checkbox").change(function(){
		
		var checkbox_count = $(".verfication_checkbox").length;
		var checked_checkbox_count = $(".verfication_checkbox:checked").length
		
		if(checkbox_count==checked_checkbox_count){
			
				
				$(".order_status_selectbox").prop("disabled", false);
				//$(".generate_invoce_btn").prop("disabled", false);
			
			} else {
				$(".order_status_selectbox").prop("disabled", true);
				//$(".generate_invoce_btn").prop("disabled", true);
				}
		
		
		});
	
	
$(".order_status_selectbox").change(function(){
	var present_status_id = $(".order_status_selectbox option:selected").val();
	if(present_status_id == 3 && <?php echo $order_status_id ?> != 1 ) {
		$(".cancel_invoice").show();
		} else {
			$(".cancel_invoice").hide();
			}
	var status =get_staus_changed(present_status_id,<?php echo $order_status_id ?>);
	
	if(status == 1){
		if(present_status_id == 3 ){
			$(".generate_invoce_btn").prop("disabled", true);	
			} else {
			$(".generate_invoce_btn").prop("disabled", false);
		}
		$(".proccess_ord_btn").prop("disabled", false);
		
		} else {
			$(".proccess_ord_btn").prop("disabled", true);
				
			}
	});
	
$(".proccess_ord_btn").click(function(){
	var status_id=$(".order_status_selectbox option:selected").val();
	var verfication_status = "verfied";
	var remarks = $(".remarks").val();
	if(remarks.trim() == "" ){
		alert("Please enter remarks for this order update");
		return false;
		}
	$.ajax({
			url:"phpfiles/order_status_update.php?status_id="+status_id+"&remarks="+remarks+"&verfication="+verfication_status+"&order_id="+<?php echo $order_id ?>,
			dataType:"text",
			type:"GET",
			success: function(data){
			$(".order_data_wrapper").html(data);
		}
	});
	});	
	
	
	$(".generate_invoce_btn").click(function(e){
			e.preventDefault();
			var remarks = $(".remarks").val();
			if(remarks.trim() == "" ){
				alert("Please enter remarks for this order update");
			return false;
			}
			
			$.ajax({
					url:"phpfiles/pdfinvoicegenrator.php?cancel="+0+"&order_id="+<?php echo $order_id ?>,
					dataType:"text",
					type:"GET",
					success: function(data){
						alert(data);
						if(data){
							window.open('invoice_data/<?php echo $order_id.'.pdf' ?>', '_blank');
							$(".proccess_ord_btn").trigger('click');

							}
						}
				});
		
		});
	
	
$(".cancel_invoice").click(function(e){
		e.preventDefault();
			var remarks = $(".remarks").val();
			if(remarks.trim() == "" ){
				alert("Please enter remarks for this order update");
			return false;
			}
			$.ajax({
					url:"phpfiles/pdfinvoicegenrator.php?cancel="+1+"&order_id="+<?php echo $order_id ?>,
					dataType:"text",
					type:"GET",
					success: function(data){
						if(data){
							window.open('invoice_data/<?php echo $order_id.'.pdf' ?>', '_blank');
							$(".proccess_ord_btn").trigger('click');

							}
						}
				});
	});	
	
	
	
function get_staus_changed(present_status_id, before_status_id){
	if(present_status_id!=before_status_id){
		return 1;
		}
	
	}	

</script>