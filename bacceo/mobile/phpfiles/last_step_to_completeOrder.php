<?php
session_start();
require("phpincludes/config.inc");
require("phpincludes/phpfunctions.inc");
dbConnect();
if(isset($_SESSION['discount_valid'])){
unset($_SESSION['discount_valid']);
}
//$_SESSION['mobile_cart_item'];
//$_SESSION['mobile_itemquantities'];

if(isset($_SESSION['user_id'])){

?>
<div class="confrim_order_proccess_wrapper">
    <div class="promo_coupons_wrapper" style="background-color:#FFFFFF">
    	<form style="margin:0px; padding-top:15px">
        <div class="row">
        	<div class="container">
        	<div class="col-xs-9">
                <div class="form-group">
                  <input type="text" class="form-control input-sm promo_code_data" placeholder="Have any Coupon?" oninput='this.value=this.value.toUpperCase();'>
                </div>
                </div>
                <div class="col-xs-3">
                 <button type="submit" class="btn btn-default btn-sm promo_apply ">Apply</button>
                 <button type="submit" class="btn btn-default btn-sm promo_change ">Change</button>
                </div>
            </div>
        </div>
      </form>
          <div class="promo_code_errors">
          </div>
      </div>
      <!-- Scripts for promo data proocessing -->
    	<script>
		$(".promo_change").hide();
		$(".promo_code_data").focus(function(){
			$(".promo_code_errors").empty();
			})
        $(".promo_apply").click(function(e){
			e.preventDefault();
			
			$(".promo_code_data").prop("disabled", true);
			$(".promo_apply").hide();
			$(".promo_change").show();
			
			
		 	var promo_code_data = $(".promo_code_data").val();
			if(promo_code_data == "" || promo_code_data == " "){
				swal({
					title: "",
					text: "Enter Promo Code First",
					});
					$(".promo_code_data").focus();
					return false;
	
				} else {
					$.ajax({
						url:"phpfiles/promo_data.php?promo_code="+promo_code_data,
						dataType:"text",
						type:"GET",
						success: function(data){
						$(".promo_code_errors").html(data);
						load_final_cart_data();
						}
					});
					}
					
			});
			$(".promo_change").click(function(e){
				e.preventDefault();
				$(".promo_change").hide();
				$(".promo_code_errors").empty();
				$(".promo_apply").show();
				$(".promo_code_data").prop("disabled", false);
				$(".promo_code_data").focus();
				});
			
        </script>
    
    
    
    
    <hr style="margin:0px">
    <div class="Cart_Cost_details" style="background-color:#FFFFFF; min-height:50px; text-align:center">
     			
               
              	<p style="padding-bottom:0px; padding-top:20px; margin-bottom:0px"> Loading... </p>
               
               
                
				<script>
					get_total_amount_cart();
                	load_final_cart_data();
                </script>
    
    </div>
    
    <hr style="margin:0px">
    <div class="payment_method_details" style="background-color:#FFFFFF">
    <table width="100%">
            <tr>
            	<th colspan="2" style="background-color:#515151; color:#FFFFFF; font-weight:500; text-transform:uppercase;padding-left:10px">Payment Method</th>
            </tr>
            <tr>
                <td style="padding:5px 10px 5px 15px">Cash On Delivery</td>
                
                <td style="padding-right:40px" align="right" class=""><input class="payment_method_id" type="radio" value="1" checked="checked"></td>
            </tr> 
     </table>
    </div>

     
    

 <div class="Shipping_details" style="background-color:#FFFFFF">
    <table width="100%" style="text-align:center;">
            <tr>
            	<th style="background-color:#515151; color:#FFFFFF; font-weight:500; text-transform:uppercase;padding-left:10px;">Shipping Method</th>
            </tr>
            
            <tr >
            	<td style="padding:5px 15px 5px 15px"><input type="text" class="form-control input-sm full_name" placeholder="Full name"></td>
            </tr>
            
            <tr>
            	<td style="padding:5px 15px 5px 15px"><input type="text" class="form-control input-sm dno" placeholder="Door No:"></td>
            </tr>
            <tr >
            	<td style="padding:5px 15px 5px 15px"><input type="text" class="form-control input-sm landmark" placeholder="Landmark (Optional)"></td>
            </tr>
            <tr >
            	<td style="padding:5px 15px 5px 15px"><input type="text" class="form-control input-sm street_sector" placeholder="Street / Sector / Block" maxlength="50"></td>
            </tr>
            <tr >
            	<td style="padding:5px 15px 5px 15px"><input type="text" class="form-control input-sm mblno" placeholder="Mobile Number" maxlength="10"></td>
            </tr>
            <tr >
            	<td style="padding:5px 15px 5px 15px">
                    <select class="form-control area_id" id="select" style="font-size:12px">
                      <option value="0">Please Select Area</option>
                      <?php 
					  	$fetch_delivery_list = mysql_query("select * from delivery_areas ORDER BY area_name");
					  	while($row = mysql_fetch_array($fetch_delivery_list)){
					  ?>
                    	
                    	<option value="<?php echo $row['id']; ?>"><?php echo strtoupper($row['area_name']); ?></option>
                    
                    <?php } ?>
                    </select>
        		</td>
            </tr>
            <tr >
            	<td style="padding:5px 15px 5px 15px"><input type="text" class="form-control input-sm city" value="Visakhapatnam" disabled></td>
            </tr>
            <tr >
            	<td style="padding:5px 15px 5px 15px">
                <button class="btn place_order" style="width:100%; background-color:#00B97D; color:#FFFFFF" onClick="" disabled>Place Order</button>
                </td>
            </tr>
     </table>
     <script>
	 jQuery.fn.ForceNumericOnly =
function()
{
    return this.each(function()
    {
        $(this).keydown(function(e)
        {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
                key == 8 || 
                key == 9 ||
                key == 13 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        });
    });
};
$(".mblno").focusout(function(e) {
	//var mobile_pattrn = new RegExp('^[7-9][0-9]{9}$');
    var firstnumber = this.value.charAt(0);
	var length_of_mobile_number = $(this).val().length;
	var mobile_number_starts = ['7','8','9'];
	if(length_of_mobile_number >9 ) {
		if(mobile_number_starts.indexOf(firstnumber) == -1){
			swal({
		title: "",
		text: "invalid Mobile Number",
		confirmButtonColor:"#E02839"
		});
			
			return false;
			}
		
	} else {
		swal({
		title: "",
		text: "Enter 10 digit mobile number",
		confirmButtonColor:"#E02839"
		});
			
		
		return false;
		}
});
	$(".mblno").ForceNumericOnly();
	 $(".place_order").click(function(){
		 var dno= $(".dno").val();
		 var landmark = $(".landmark").val();
		 var street_sector = $(".street_sector").val();
		 var mobile_no = $(".mblno").val();
		 var area_id = $(".area_id option:selected").val();
		 var city=$(".city").val();
		 var payment_method_id = $(".payment_method_id:checked").val(); 
		 var full_name= $(".full_name").val()
		 if(full_name == "" || full_name == " "){
			 swal({
					title: "",
					text: "Please Enter Full_Name",
				});
				$(".full_name").focus();
				return false;
		 }
		 if(dno == "" || dno == " "){
			 swal({
					title: "",
					text: "Please Enter Dno",
				});
				$(".dno").focus();
				return false;
		 }
		 
		  if(street_sector == "" || street_sector == " "){
			 swal({
						title: "",
						text: "Please Enetr Street or sector ",
				});
				$(".street_sector").focus();
				return false;
		 }
		 if(mobile_no == "" || mobile_no == " "){
			 swal({
						title: "",
						text: "Please Enter Your Mobile number ",
				});
				$(".mblno").focus();
				return false;
		 }
		 if($(".area_id option:selected").val() == 0){
			 swal({
						title: "",
						text: "Please Select your Area ",
				});
				$(".area_id").focus();
				return false;
		 }
		 
				 $.ajax({
						url:"phpfiles/order_placing.php?dno="+dno+"&full_name="+full_name+"&landmark="+landmark+"&street_sector="+street_sector+"&mobile_no="+mobile_no+"&area_id="+area_id+"&city="+city+"&payment_method_id="+payment_method_id,
						dataType:"text",
						type:"GET",
						success: function(data){
						//alert(data);	
						load_order_CnfAck(data);
						
						/* send order notication to admin */
						var mbl_no = "9966336336";
						var title = "New order arrived with id : "+data;
						var message ="Please check your Admin ";
						send_gcm_notification_to_user(mbl_no,title,message);

						}
					});
		 
		 
		 });
	 </script>
    </div>
	
</div>

<?php } else { ?>
<script>
var url_srting="last_step_to_completeOrder";
load_login_url("phpfiles/login.php?navigate_id="+2);


//$(".generatefooditemslist option:not(:first)").remove().end();	
</script>

<?php }  ?>