// JavaScript Document
$(document).ready(function(e) {
 //load_page_data("phpfiles/product_data.php");

/*$(".page_content").delegate(".promo_apply","click", function(){
	alert("");
	}); 
var mbl_no = "7396533133";
var data = 23;
var title = "New order arrived with id : "+data;
var message ="Please check your Admin ";
send_gcm_notification_to_user(mbl_no,title,message);*/
	
window.onbeforeunload = function() {
    return "Leaving this page will reset the page";
};
$(".main_cat_slide_toggle").click(function(){
	$("#main_cat_list_side_bar").find(".toggler").trigger("click");
	$(".page_content").click(function(){
		$("#main_cat_list_side_bar").find(".toggler").trigger("click");
		});
	});

$(".slidebar_menu_links li a").click(function(){
	
	$(".sb-toggle-left").trigger('click');
	});	
$(document).ajaxStart(function() {
			waitingDialog.show();
			setTimeout(function() {
				 waitingDialog.hide();
			},30000);
			/* Custombox.open({
				target: '#loading_popup',
				effect: 'fadein',
				speed: '500',
				escKey: false,
				overlayClose: false,
				overlay: false,
			}); */
				 				 
});
$(document).ajaxStop(function () {
 waitingDialog.hide();
   /* Custombox.close({
		target: '#loading_popup',
		effect: 'fadein',
												
	});  */ 
  }); 	
 $(".top_logo,.back_navigation_element").hide();
	
//load_user_account();
load_main_page_data("phpfiles/homepage_content.php");

});
function user_status(){
	$.ajax({
			url:"phpfiles/user_menu_status.php",
			dataType:"text",
        	type:"GET",
			success: function(data){
			$(".user_menu").html(data);
			}
	});
	
	}
// all functions
function load_user_account(){
	$(".bottom_info_placer").hide();
	nav_status_data("");
	$(".top_header").hide();
	$(".bottom_wrapper").hide();
	$.ajax({
			url:"phpfiles/user_dashboard.php",
			dataType:"text",
        	type:"GET",
			success: function(data){
			$(".page_content").empty();
			$(".page_content").html(data);
			back_navigation_btn(1);
			$(".back_navigation_element").show();
				 $(".slide_menu_btn").hide();
			}
	});
	}

function load_order_list(){
	$(".bottom_info_placer").hide();
	nav_status_data("My Orders");
	$(".top_header").hide();
	$(".bottom_wrapper").hide();
	$.ajax({
			url:"phpfiles/orders_list.php",
			dataType:"text",
        	type:"GET",
			success: function(data){
			$(".page_content").empty();
			$(".page_content").html(data);
			back_navigation_btn(1);
			$(".back_navigation_element").show();
				 $(".slide_menu_btn").hide();
			}
	});
	}

function load_order_CnfAck(id){
	$(".bottom_info_placer").hide();
	nav_status_data("Your Order Status");
	$(".top_header").hide();
	$(".bottom_wrapper").hide();
	$.ajax({
			url:"phpfiles/order_confirmation_act.php?id="+id,
			dataType:"text",
        	type:"GET",
			success: function(data){
			$(".page_content").empty();
			$(".page_content").html(data);
			back_navigation_btn(1);
			$(".back_navigation_element").show();
				 $(".slide_menu_btn").hide();
			}
	});
	}

function back_navigation_btn(page_id){
	$(".back_navigation_element").attr('onclick','navigate_urls('+ page_id +')');
	
	}
function navigate_urls(id){
	user_status();
	switch(id){
		case 1 : load_main_page_data("phpfiles/homepage_content.php");
					break;
		case 2 : Load_confrm_order("phpfiles/last_step_to_completeOrder.php");
					break;
		case 3 : load_checkout_page("phpfiles/checkout_page.php");
					break;
		case 4 : load_order_list();
		}
	
}


function load_login_url(url_string){
	$(".bottom_info_placer").hide();
	nav_status_data("User Account");
	 $(".page_content").html("<div class='loader'><img src='../imgs/svg-loaders/puff.svg' width='60px' height='60px'/><h5 class='animated infinite fadeOut'>Loading...</h5></div>");
	$.ajax({
			url:url_string,
			dataType:"text",
        	type:"GET",
			success: function(data){
					//alert(data);
					$(".bottom_wrapper").hide();
					$(".page_content").empty();
					$(".page_content").html(data);
					$(".top_logo").show();
					 $(".back_navigation_element").show();
					   $(".slide_menu_btn").hide();
					   user_status();
				}
			});	  
	
	}
function Load_confrm_order(url_string) {
	$(".bottom_info_placer").hide();
	  $(".top_header").hide();
	  $(".bottom_wrapper").hide();
	  nav_status_data("Order Placing Form");
	  $(".page_content").html("<div class='loader'><img src='../imgs/svg-loaders/puff.svg' width='60px' height='60px'/><h5 class='animated infinite fadeOut'>Loading...</h5></div>");
	  var page_id= 1;
	var page_url_string ="'phpfiles/homepage_content.php'";
	back_navigation_btn(page_id,page_url_string); 
	$.ajax({
			url:url_string,
			dataType:"text",
        	type:"GET",
			success: function(data){
					
					
					$(".page_content").empty();
					$(".page_content").html(data);
					
					  get_total_cart_items();
					  $(".top_logo").show();
					   $(".back_navigation_element").show();
					   $(".slide_menu_btn").hide();
				}
			});	
			 
} 
function load_bottom_data_for_place_order(){
	$.ajax({
							url:"phpfiles/bottom_data_for_placeorder.php",
							dataType:"text",
							type:"GET",
							
							success: function(bottom_content){
							$(".bottom_wrapper").html(bottom_content);
							},
							complete: function(){
								get_total_amount_cart();
								}
														
						
					});
	}
function load_checkout_page(url_string) {
	  get_total_amount_cart();
	  $(".bottom_info_placer").hide();
	
	$.ajax({
			url:url_string,
			dataType:"text",
        	type:"GET",
			success: function(data){
					$(".bottom_wrapper").empty();
					$(".page_content").html(data);
					load_bottom_data_for_place_order();
					$(".top_header").hide();
					$(".bottom_wrapper").show();
					nav_status_data("Your Cart Items");
					$(".top_logo").show();
					$(".back_navigation_element").show();
					$(".slide_menu_btn").hide(); 
				}
			});	  

	
}





function nav_status_data(data){
	
	$(".status_text").html(data)
}
function load_main_page_data(url_string) {
	$(".bottom_info_placer").show();  
	$.ajax({
			url:url_string,
			dataType:"text",
        	type:"GET",
			success: function(data){
					//alert(data);
					$(".bottom_wrapper").hide();
					$(".page_content").empty();
					$(".page_content").html(data);
					
					  get_total_cart_items();
					   $(".top_logo").hide();
					   $(".back_navigation_element").hide();
					   $(".slide_menu_btn,.top_header").show();
					   user_status();
				}
			});
	var page_id= 1;
	
	back_navigation_btn(page_id);
	nav_status_data("Welcome to Online Shopping")	  
} 
function load_product_page_data(url_string,main_menu_id,page_name,super_menu_id) {
	$(".bottom_info_placer").hide();
	$.ajax({
			url:url_string+"?id="+main_menu_id+"&supermenu_id="+super_menu_id,
			dataType:"text",
        	type:"GET",
			success: function(data){
					$.ajax({
							url:"phpfiles/bottom_data_for_products.php",
							dataType:"text",
							type:"GET",
							success: function(bottom_content){
							$(".bottom_wrapper").html(bottom_content);
							}
					});
					$(".page_content").html(data);
					 $(".top_header").hide();
	  $(".menu_toggle_nav_status").show();
					//$(".product_items").addClass("wow flipInX")
					new WOW().init();
				nav_status_data(page_name);
				$(".bottom_wrapper").show();
				get_total_cart_items();
				 $(".top_logo").show();
				  $(".back_navigation_element").show();
				 $(".slide_menu_btn").hide();
				
				},
				complete: function(){
					$('#main_cat_list_side_bar').BootSideMenu({

					side:"left", // left or right
					
					autoClose:true // auto close when page loads
					
					});
				}
			});	 
			$(".back_navigation_element").attr("onclick","load_main_cat_data('phpfiles/main_cat_data.php',"+super_menu_id+",'"+page_name+"')"); 
}
function load_main_cat_data(url_string,id,page_name) {
 $(".bottom_wrapper").hide();
 page_name ="Grocery";
 $(".page_content").html("<div class='loader'><img src='../imgs/svg-loaders/puff.svg' width='60px' height='60px'/><h5 class='animated infinite fadeOut'>Loading...</h5></div>");
		$.ajax({
			url:url_string+"?id="+id,
			dataType:"text",
        	type:"GET",
			 
			success: function(data){
					
					//$(".page_content").addClass(" animated slideInRight");
					$(".page_content").html(data);
					nav_status_data(page_name);
					$(".top_logo").show();
					 $(".back_navigation_element").show();
					   $(".slide_menu_btn").hide();
					   $(".top_logo").hide();
					   $(".top_header, .status_menu_bar").show();
					   
				},
				
			});	
			var page_id= 1;
	var page_url_string ="'phpfiles/homepage_content.php'";
	back_navigation_btn(page_id,page_url_string); 
}
function add_to_cart(id,product_type){
		  
 $.ajax({
			url:"phpfiles/mobile_cart_phpfiles/mobile_checkcartitem.php?itemid="+id+"&product_type="+product_type,
			dataType:"text",
        	type:"GET",
			success: function(data){
				//alert(data);
				if(data == "add"){
					 $.ajax({
						url:"phpfiles/mobile_cart_phpfiles/mobile_cart_item_adding.php?itemid="+id+"&product_type="+product_type,
						dataType:"text",
						type:"GET",
						
						success: function(data){
								var message = '"'+data+'" is added in Cart';
								toast_message(message);
								set_this_quantity_lable(id,product_type);
								set_disabled_attr_for_cart_remove_button(id,product_type);
								get_total_cart_items();	
								
							}
					 });
						
					}else {
						
						 $.ajax({
							url:"phpfiles/mobile_cart_phpfiles/mobile_additemquantity.php?itemindex="+data+"&product_type="+product_type,
							dataType:"text",
							type:"GET",
							
							success: function(response){
								var status_data = $.parseJSON(response);
								if(status_data.id == 0){
							var message = '"'+status_data.message+'" Quantity Increased by 1';
								toast_message(message);	
							set_this_quantity_lable(id,product_type);
							get_total_cart_items();
							product_price_with_qunatity(id,product_type);
								} else {
									
									var message = '"'+status_data.message+'"';
								toast_message(message);	
							set_this_quantity_lable(id,product_type);
							get_total_cart_items();
							product_price_with_qunatity(id,product_type);
									}
							
							}
												  
						
						 });
						}
				
					
				
					
				}
			});	  
		  
		  
		 
}
function get_total_amount_cart(){
			$.ajax({
			url:"phpfiles/mobile_cart_phpfiles/mobile_total_cart_amount.php",
			dataType:"text",
        	type:"GET",
			success: function(data){
			var total_payable_amount =  parseFloat(data);
				
				
					if(data < 300 && data >0){
						
					$(".service_charge").html("30.00/-")
					total_payable_amount =  parseFloat(data) + Number(30);		
					//$(".total_amount_element").html(data + "+50<span style='font-size:10px; padding-left:5px'>delivery charges</span>");
					$(".total_amount_element").html(data);		
					} else { $(".total_amount_element").html(data +"/-");
					$(".service_charge").html("0.00/-") }
					
			$(".total_price_of_cart_final").html(data+"/-");
			$(".payable_amount").html(total_payable_amount.toFixed(2) +"/-")
				if(data>0){
				$(".cnfrm_order").html("Confirm Order");
				$(".cnfrm_order").prop("disabled", false);
				} else {
					$(".cnfrm_order").html("Sorry Your Cart is Empty");
					$(".cnfrm_order").prop("disabled", true);
					}
			}
			});
			  
}
function set_this_quantity_lable(id,product_type){
		$.ajax({
			url:"phpfiles/mobile_cart_phpfiles/mobile_check_cart_item_qunatity.php?itemid="+id+"&product_type="+product_type,
			dataType:"text",
        	type:"GET",
			success: function(data){
					
			
			var block_id =".cart_operations_block_"+id;
					$(block_id +" .item_cart_quantity_status").html(data)
				
				}
			});	 
			
}
function set_disabled_attr_for_cart_remove_button(id,product_type){
$.ajax({
					url:"phpfiles/mobile_cart_phpfiles/mobile_check_item_in_cart.php?itemid="+id+"&product_type="+product_type,
					dataType:"text",
					type:"GET",
					success: function(data){
					var block_id =".cart_operations_block_"+id;
					if(data==0){
					
				$(block_id +" .remove_from_cart").prop("disabled", false);
					} else {
					$(block_id +" .remove_from_cart").prop("disabled", true);
					}
					}
						});
				
				
}
function get_total_cart_items(){
	get_total_amount_cart();
	$.ajax({
		url:"phpfiles/mobile_cart_phpfiles/mobile_check_toal_no_cartitems.php",
		dataType:"text",
		type:"GET",
		success: function(data){
		
	$(".total_cart_items").html(data);
	if(data > 0){
		$(".checkout").prop("disabled",false);
		
		} else { 
		$(".checkout").prop("disabled",true); 
		}
		}
		 
	});
	}

function remove_from_cart(id,product_type){
$.ajax({
		url:"phpfiles/mobile_cart_phpfiles/mobile_cartitem_remove.php?itemid="+id+"&product_type="+product_type,
		dataType:"text",
		type:"GET",
		
		success: function(data){
		toast_message(data);	
		set_this_quantity_lable(id,product_type);
		set_disabled_attr_for_cart_remove_button(id,product_type);
		get_total_cart_items();
		product_price_with_qunatity(id,product_type);
		
		},
		
		
		
});
}
function toast_message(message){
	$.toast(message);
	
	}

function product_price_with_qunatity(id,product_type){
var block_id =".price_product_with_qunatity_"+id;
$(block_id).html("<img src='../imgs/svg-loaders/spinning-circles.svg' width='25px'/>");

$.ajax({
		url:"phpfiles/mobile_cart_phpfiles/price_with cart_quantity.php?itemid="+id+"&product_type="+product_type,
		async: "true",
		dataType:"text",
		type:"GET",
		success: function(data){
			
		
		$(block_id).html(data)
		}
		
});

	}
	
function direct_remove_from_cart(id,product_type){
$.ajax({
		url:"phpfiles/mobile_cart_phpfiles/mobile_cartitem_remove_direct.php?itemid="+id+"&product_type="+product_type,
		dataType:"text",
		type:"GET",
		success: function(data){
		toast_message(data);	
		//set_this_quantity_lable(id);
		//set_disabled_attr_for_cart_remove_button(id);
		var block_id =".cart_item_block_"+id;
		$(block_id).remove();
		get_total_cart_items();
		product_price_with_qunatity(id,product_type);
		get_total_amount_cart();
		}
});
}
function load_final_cart_data() {
							$.ajax({
							url:"phpfiles/final_cart_data_with_promo.php",
							dataType:"text",
							type:"GET",
							success: function(data){
							$(".Cart_Cost_details").html(data);
							$(".place_order").prop("disabled",false);
							}
						});
						$(".top_logo").show();
						 $(".back_navigation_element").show();
					   $(".slide_menu_btn").hide();
						}
					
function logout(){
	$.ajax({
		url:"phpfiles/logout.php",
		type:"GET",
		success: function(data){
			load_main_page_data("phpfiles/homepage_content.php");
			}
		
		});
	
	}
function product_popup(id,product_type){
	$(".product_popup_container").html("<div style ='text-align:center'><img style='margin-top:25px' src='../imgs/loading.GIF' width='10%'></div> ");
	product_popup_open();
	$.ajax({
		url:"phpfiles/product_popup_data.php?id="+id+"&product_type="+product_type,
		type:"GET",
		success: function(data){
			$(".product_popup_container").html(data);
			
			},
		
		});
	
	    
   
	
	}
function product_popup_open(){
	Custombox.open({
			
			target: '#product_popup',
			effect: 'fadein',
			speed: '500',
			escKey: false,
			overlayClose: false,
			overlay: false,
			}); 
	}
function send_gcm_notification_to_user(mbl_no,title,message){
	$.ajax({
			url:"gcm/sendnotification_user.php?user_mobile_no="+mbl_no+"&ntf_title="+title+"&ntf_desc="+message,
			dataType:"text",
        	type:"GET",
			success: function(data){
			alert(data);
			}
	});
	
	
	}