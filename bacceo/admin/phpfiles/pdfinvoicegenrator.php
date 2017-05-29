<?php
require("../../mobile/phpfiles/phpincludes/config.inc");
require("../../mobile/phpfiles/phpincludes/phpfunctions.inc");
require("../../mobile/phpfiles/phpincludes/invoice_data_return_functions.inc");
include('../../plugins/mpdf/mpdf.php');
dbconnect();
$order_id = $_GET['order_id'];
$forcancel =$_GET['cancel'];
$order_details = mysql_fetch_array(mysql_query('select * from orders where id = '.$order_id));
$shiping_address_id = $order_details['user_address_book_id'];
$pdf_file_name = $order_id.'.pdf';
$shiping_details = get_shipping_address($shiping_address_id);
$date_time= strtotime($order_details['date_time']);
$date_of_order =  date("d-M-y",$date_time);
if(isset($_GET['retailer'])){
	$retailer_id = $_GET['retailer'];
	$query_retailer = mysql_fetch_array(mysql_query('select * from retailers where id='.$retailer_id));
	
	$retailer_info = '<div style="box-shadow: 0px 1px 1px rgba(111, 111, 111, 0.3); margin-bottom:10px; ">
			<div style="padding:5px 10px; background-color: #F5F5F5; height: 2px"></div>
			<div style="padding:15px 15px; background-color: #FFFFFF;">
			<table>
                                	<tr>
                                    	<td style="padding:5px;"><strong>Retailer Name</strong></td>
                                        <td>:</td>
                                        <td style="padding:5px; padding-left:5px">'.$query_retailer['shop_name'].'</td>
                                    </tr>
                                    <tr>
                                    	<td style="padding:5px; font-weight:600"><strong>TIN No</strong></td>
                                        <td>:</td>
                                        <td style="padding:5px; padding-left:5px">'.$query_retailer['tin_no'].' </td>
                                    </tr>
                                    
                                </table>
			</div>
			
		</div>';
	
	}else {
		$retailer_info =' ';
}

$ordered_products = explode(',',$order_details['products']);
$ordered_product_type = explode(',',$order_details['product_types']);
$ordered_quantities = explode(',',$order_details['quantities']);
$price_of_product_at_ordertime = explode(',',$order_details['product_prices']);
$no_of_products = sizeof($ordered_products);
$j=1;
//for customer_invoice
for($i=0; $i < $no_of_products; $i++){
	$product_id = $ordered_products[$i];
	$product_table_name = $ordered_product_type[$i];
	$query_product_data =mysql_fetch_array(mysql_query("select name from ".$product_table_name." where p_id = ".$product_id));
	$name_of_product = ucfirst($query_product_data['name']);
	$product_price = sprintf("%.2f",$ordered_quantities[$i]*$price_of_product_at_ordertime[$i]);
	$products_content .= '<tr class="product_detail_row">
                            	<td>'.$j.'.</td>
                                <td align="left">'.$name_of_product.'</td>
                                <td align="center">'.$ordered_quantities[$i].'</td>
                                <td align="right" style="padding-right:10px">'.$product_price.'</td>
                            </tr>';
							$j++;
						
	}

$sub_total = sprintf("%.2f",ceil($order_details['cart_amount']));
$discount_amount = sprintf("%.2f",ceil($order_details['discount_valid']));
$delivery_charges = sprintf("%.2f",ceil($order_details['delivery_charge']));
$total_payable_amount =sprintf("%.2f",ceil($order_details['total_payable_amount']));
//for provider_purpose
$j=1;
for($i=0; $i < $no_of_products; $i++){
	$product_id = $ordered_products[$i];
	$product_table_name = $ordered_product_type[$i];
	$query_product_data =mysql_fetch_array(mysql_query("select name from ".$product_table_name." where p_id = ".$product_id));
	$name_of_product = ucfirst($query_product_data['name']);
	$products_content_for_provider_purpose .= '<tr>
			<td  align="center">'.$j.'.</td>
			<td>'.$name_of_product.'</td>
			<td align="center">'.$ordered_quantities[$i].'</td>
		</tr>';
		$j++;
}
// total_no_products
$total_no_of_products=0;
for($i=0; $i < $no_of_products; $i++){
$total_no_of_products = $total_no_of_products + $ordered_quantities[$i];
}


if($forcancel == 0){
		echo "INSERT INTO `invoice_data` (`order_id`, `pdf_name`, `date_genrated`) VALUES ('$order_id','$pdf_file_name',now())";
		if(mysql_query("INSERT INTO `invoice_data` (`order_id`, `pdf_name`, `date_gerated`) VALUES ('$order_id','$pdf_file_name',now())")){
			$invoice_no = mysql_insert_id();
			mysql_query('UPDATE `orders` SET invoice_id ='.$invoice_no.' WHERE id ='.$order_id);
		} 
}


$mpdf=new mPDF('','A4', 0, '', 15, 15, 10, 16, 9, 9);
$mpdf->SetWatermarkText('CANCELED');
$stylesheet1 = file_get_contents('../../css/bootstrap.min.css');
$stylesheet2 = file_get_contents('../../css/invoicestyles.css');
$mpdf->WriteHTML($stylesheet1,1);
$mpdf->WriteHTML($stylesheet2,1);
$content = '

<div>
	<div style="height:5px; width:100%; background-color:#f44336; margin-bottom:5px"></div>
	<div style="float: left; width: 28%;">
		<img src="../../img/ayyappa-grocery-logo-black.png" width="80%">
	</div>
	<div style="float: right; width: 54%; text-align:right; padding:5px 5px 0px 0px">
		<h4 style="margin-bottom:0px">INVOICE</h4>
		<h6 style="padding-right:10px; margin-top:0px;margin-bottom:0px"># '.$invoice_no.'</h6>
	</div>
</div>
<hr style="margin-top:15px; margin-bottom:10px; border-color: #C2C2C2">
<div>
	<div style="float: left; width: 50%; margin-right: 20px">
		<div style="box-shadow: 0px 1px 1px rgba(111, 111, 111, 0.3);">
			<div style="padding:5px 10px; background-color: #F5F5F5;">Billing & Shipping Address</div>
			<div style="padding:15px 15px; background-color: #FFFFFF;">
				'.$shiping_details.'
			</div>
		</div>
	</div>
	<div style="float: right; width: 45%; margin-left:10px ">
		'.$retailer_info.'
		<div style="box-shadow: 0px 1px 1px rgba(111, 111, 111, 0.3);">
			<div style="padding:5px 10px; background-color: #F5F5F5; height: 2px"></div>
			<div style="padding:15px 15px; background-color: #FFFFFF;">
				<table>
                                	<tr>
                                    	<td style="padding:5px; font-weight:600"><strong>Order ID</strong></td>
                                        <td>:</td>
                                        <td style="padding:5px; padding-left:5px">'.$order_id.'</td>
                                    </tr>
                                    <tr>
                                    	<td style="padding:5px; font-weight:600"><strong>Date of Order</strong></td>
                                        <td>:</td>
                                        <td style="padding:5px; padding-left:5px">'.$date_of_order.' </td>
                                    </tr>
                                    
                                </table>
			</div>
			
		</div>
	</div>
</div>
<hr style="margin-top:15px; margin-bottom:10px; border-color: #C2C2C2">
<div>
<table class="invoice_product_list_table" width="100%" border="1">
                        	<tr>
                            	<th width="5%">#</td>
                                <th>Products</td>
                                <th width="15%">Qty</td>
                                <th width="15%">Price (Rs.)</td>
                            </tr>
                          	'.$products_content.'
                             <tr class="padding-top-10">
                            	<td colspan="3" style="text-align:right; padding-right:10px">Sub Total :</td>
                                <td style="text-align:right;padding-right:10px; font-weight:600" ><strong>'.$sub_total.'</strong></td>
                            </tr>
                            <tr class="padding-top-10">
                            	<td colspan="3" style="text-align:right; padding-right:10px">Discount Applied :</td>
                                <td style="text-align:right;padding-right:10px; font-weight:600" ><strong>-'.$discount_amount.'</strong></td>
                            </tr>
                            <tr  class="padding-top-10 ">
                            	<td colspan="3" style="text-align:right; padding-right:10px">Delivery or Shipping Charges :</td>
                                <td style="text-align:right;padding-right:10px; font-weight:600" > <strong>'.$delivery_charges.'</strong></td>
                            </tr>
                            <tr  class="padding-top-10">
                            	<td colspan="3" style="text-align:right; padding-right:10px">Total Payable Amount (Inclusion of all taxes) :</td>
                                <td style="text-align:right;padding-right:10px; font-weight:600" ><strong>'.$total_payable_amount.'</strong></td>
                            </tr>
                        </table>
</div>
<div>
<p><strong>**Thank you for using our service</strong></p>
</div>
<div>
	<h6 style="padding:30px; margin-top:20px; text-align:right">Signature and Seal</h6>
</div>

';
if($forcancel != 0){
$mpdf->showWatermarkText = true;
}
$mpdf->WriteHTML($content);
$mpdf->AddPage('L');
$page2content = '
<div style="width:45%; float:left;">
	<p>Please Pack Up below product for orderId:253</p>
	<table width="100%" border="1" class="provider_invoice">
		<tr>
			<th align="center">#</th>
			<th>Products</th>
			<th align="center">Qty</th>
		</tr>
		'.$products_content_for_provider_purpose.'
		
		<tr>
			<td colspan="2" align="right">Total No. Products</td>
			<td align="center"><strong>'.$total_no_of_products.'</strong></td>
		</tr>
	</table>
	<div style="margin-top:20px">
		<div style="float:left; border: 2px solid black; width:30%; height:100px; margin-right:10px; border-radius:1em">
		<p style="padding:5px; margin-bottom:0px"> Your Amount for this order is: </p>
		<h3 style="text-align:center; margin:5px; margin-top:0px"></h3>
		</div>
		<div style="float:right; border: 2px solid black; width:50%; height:100px; border-radius:1em; text-align:center">
		<span style="padding-top:80px"><strong>Signature and Stamp </srong></span>
		
		</div>
		
		
	</div>
	<div style="margin-top:10px">
	<p>Please sign and give this reciept after your amount recived from us</p>
		<p>Thank You For your support</p>
		
	</div>
	<div>
		<div style="float: left; width: 35%;">
		<img src="../../img/ayyappa-grocery-logo-black.png" width="100%">
	</div>
	</div>
	
</div>
<div style="width:45%; float:right;">
	<div style="text-align:center; margin-top:15px">
		<p>Delivery Acknowledment Reciept </p>
	</div>
	<div>
			<div style="width: 100%; margin-right: 20px">
				<div style="box-shadow: 0px 1px 1px rgba(111, 111, 111, 0.3);">
					<div style="padding:5px 10px; background-color: #F5F5F5;">Billing & Shipping Address</div>
						<div style="padding:15px 15px; background-color: #FFFFFF;">
							'.$shiping_details.'
						</div>
					</div>
				</div>
			</div>
			<div style="float: right; width: 100%; margin-top:20px">
				<div style="float:left; border: 2px solid black; height:80px; width:30%;  border-radius:1em; text-align:center; margin-right:10px">
					<span>Total No. Products</span>
					<h4>'.$total_no_of_products.'</h4>
				</div>
				<div style="float:left; border: 2px solid black; height:80px; width:30%;  border-radius:1em; text-align:center; margin-right:10px">
					<span>Order ID & Date</span>
					<h4 style="margin-bottom:0px; margin-top:0px">'.$order_id.'</h4> <span> '.$date_of_order.' </span>
				</div>
				<div style="float:left; border: 2px solid black; height:80px; width:30%;  border-radius:1em; text-align:center; margin-right:10px">
					<span>Amount</span>
					<h4>Rs.'.$total_payable_amount.'/-</h4>
				</div>
			</div>
			<div>
		<div style="float:left; border: 2px solid black; height:80px; width:100%;  border-radius:1em; text-align:center; margin-right:10px; margin-top:20px">
			<p>Customer Signature and Date of delivery</p>
		</div>
	</div>
	</div>
	
</div>

';
if($forcancel != 0){
$mpdf->showWatermarkText = true;
}
$mpdf->WriteHTML($page2content);
$mpdf->Output('../invoice_data/'.$pdf_file_name,'F');
echo 1;
exit();



?>

