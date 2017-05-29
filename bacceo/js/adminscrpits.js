$(document).ready(function(e) {
//$(".product_adding_wraper").hide();

/*************************************/
// Admin Login Script 
/************************************/
$(".admin_username, .admin_password").focusin(function(){
	$(".admin_login_error_status").empty();
	});
$(".admin_username, .admin_password").on({
  keydown: function(e) {
    if (e.which === 32)
      return false;
  },
  change: function() {
    this.value = this.value.replace(/\s/g, "");
  }
});
$(".admin_login_btn").click(function(e){
	e.preventDefault();
	
	var admin_username=$(".admin_username").val();
	var password = $(".admin_password").val();
	
	if(admin_username.length<1 && password.length<1){
		
		$(".admin_login_error_status").html("Username and Password Should not be Empty");
		return false;
		}
		$.ajax({
			url:"phpfiles/adminlogin_proccessor.php?username="+admin_username+"&password="+password,
			dataType:"text",
			type:"GET",
			success: function(data){
				//alert(data);
				if(data==1){
					top.location="../admin/admin.html";
					
					}else
					{
						top.location="../admin/adminlogin.html";
						}
			
			}
		});
	
	});
 
 
 
 
 
 
  
$(".super_menu_select_view").change(function(){
	
	var super_menu_id = $(".super_menu_select_view option:selected").val();
	
	if(super_menu_id==0){
		swal("","please select Super menu first");
		return false;
		}
	$(".editmode_toggle").prop('disabled',false);
	if($(".editmode_toggle").is(":checked")){
		var edit_mode = 1;
		}else { 
		var edit_mode = 0;
		}
		/*
		default discount_mode = 1 for percetage and 0 for Price
		*/
	if($(".discount_mode").is(":checked")){
		var discount_mode = 1;
		}else { 
		var discount_mode = 0;
		}	
	fetech_product_data(super_menu_id,0,0,edit_mode,discount_mode);
	
	});
$(".main_menu_select_view").change(function(){
	var super_menu_id = $(".super_menu_select_view option:selected").val();
	var main_menu_id=$(".main_menu_select_view option:selected").val();
	
	if(super_menu_id==0 || main_menu_id==0){
		swal("","please select Super menu first");
		return false;
		}
	if($(".editmode_toggle").is(":checked")){
		var edit_mode = 1;
		}else { 
		var edit_mode = 0;
		}
		/*
		default discount_mode = 0 for percetage and 1 for Price
		*/
	if($(".discount_mode").is(":checked")){
		var discount_mode = 1;
		}else { 
		var discount_mode = 0;
		}
		fetech_product_data(super_menu_id,main_menu_id,0,edit_mode,discount_mode);
	});
  
$(".submenu_select_view").change(function(){
	var super_menu_id = $(".super_menu_select_view option:selected").val();
	var main_menu_id=$(".main_menu_select_view option:selected").val();
	var submenu_id=$(".submenu_select_view option:selected").val();
	if($(".editmode_toggle").is(":checked")){
		var edit_mode = 1;
		}else { 
		var edit_mode = 0;
		}
		/*
		default discount_mode = 1 for percetage and 0 for Price
		*/
	if($(".discount_mode").is(":checked")){
		var discount_mode = 1;
		}else { 
		var discount_mode = 0;
		}
	fetech_product_data(super_menu_id,main_menu_id,submenu_id,edit_mode,discount_mode);
	
	});
  
  
  
  
  
  
  
 /****************************************/
 //Navgation Data fetch and insert to page
 /****************************************/ 
  	
$.ajax({
		url:"html_includes/nav_data.html",
		dataType:"text",
		type:"GET",
		success: function(data){
		$(".Nav_bar_admin").html(data);
		}
	});
	
	$('.mrp_price, .d_price').keypress(function(e) {
    var a = [];
    var k = e.which;
    
    for (i = 8; i < 58; i++)
        a.push(i);
    
    if (!(a.indexOf(k)>=0)){
           e.preventDefault();
        swal(""," only numbers are allowed in this field ");
    } 
	});
	/*$(".add_supe_menu_item").click(function(){
		Custombox.open({
					target: '#add_new_menu_item',
					effect: 'fade',
					speed: '500',
					});
	
	}); */
	fetch_menu_list_for_modify("super_menu",".super_menu_list",0)
	$(".add_super_menu_btn").click(function(){
		
		var value = $(".super_menu_name_field").val();
		if(value == "" || value == " "){
		swal("","please enter name of the menu");
			return false;
			} else {
				$(".super_menu_name_field").val("")
		add_menu("super_menu",value,0,".super_menu_list");
			
			}
		});
	



$(".main_menu_tab_toggle").click(function(){
	fetch_menu_list("super_menu",".super_menu_select_list",0)
	});

$(".super_menu_select_list").change(function(){
	var super_menu_id=$(".super_menu_select_list option:selected").val();
	fetch_menu_list_for_modify("main_menu",".main_menu_list",super_menu_id)
	
	});

$(".add_main_menu_btn").click(function(){
		
		var value = $(".main_menu_name_field").val();
		$(".main_menu_name_field").val("");
		if(value=="" || value == " "){
		swal("","please enter name of the menu");
			return false;
		} else {
			var super_menu_id=$(".super_menu_select_list option:selected").val();
		add_menu("main_menu",value,super_menu_id,".main_menu_list");
		fetch_menu_list_for_modify("main_menu",".main_menu_list",super_menu_id);
			
			}
		});

$(".sub_menu_tab_toggle").click(function(){
	fetch_menu_list("super_menu",".super_menu_select_list",0)
	
	});
	
	$(".super_menu_list_for_sub_m").change(function(){
		var super_menu_id=$(".super_menu_list_for_sub_m option:selected").val();
		//alert(super_menu_id);
		fetch_menu_list("main_menu",".main_menu_select_list",super_menu_id)
		
		});
	$(".main_menu_list_for_sub_m").change(function(){
	var main_menu_id=$(".main_menu_list_for_sub_m option:selected").val();
	fetch_menu_list_for_modify("submenu",".sub_menu_list",main_menu_id)
	});
	
	$(".add_sub_menu_btn").click(function(){
		
		var value = $(".sub_menu_name_field").val();
		if(value=="" || value == " "){
		swal("","please enter name of the menu");
			return false;
		} else {
			$(".sub_menu_name_field").val("");
		var main_menu_id=$(".main_menu_list_for_sub_m option:selected").val();
		add_menu("submenu",value,main_menu_id,".sub_menu_list");
		fetch_menu_list_for_modify("submenu",".sub_menu_list",main_menu_id);
			
			}
		});
	


	
    	$(".main_menu_select, .submenu_select").hide();
		fetch_menu_list("super_menu",".super_menu_select",0)
		$(".super_menu_select").change(function(){
			//$(".super_menu_select").prop('disabled', true);
			var id = $(".super_menu_select option:selected").val();
			if(id == 0){ return false;}
			fetch_menu_list("main_menu",".main_menu_select",id)
			
			});
		$(".main_menu_select").change(function(){
			//$(".main_menu_select").prop('disabled', true);
			var id = $(".main_menu_select option:selected").val();
			if(id == 0){ return false;}
			fetch_menu_list("submenu",".submenu_select",id)
			
			})
	
	
	$(".product_image_input").change(function(){
			
		   var file_data = $(".product_image_input").prop('files')[0];   
				var form_data = new FormData();                  
				form_data.append('file', file_data)
       			//alert(form_data);
				image_proces(form_data,120,120)
	});
	
	
	/**************************************/
	// New Delivery Area Insertion ////////
	/*************************************/
	$(".delivery_area_add_btn").click(function(){
		var area_name= $(".delivery_name_field").val()
		if(area_name.trim() ==""){
			swal("","Please enter area name");
				return false;
			}
		$.ajax({
				url:"phpfiles/delivery_area_adding.php?area_name="+area_name,
				dataType:"text",
				type:"GET",
				success: function(data){
				$(".delivery_name_field").val('');				
				swal("Successfully Added", "Delivery Area '"+data+"'");
				 get_delivery_areas();
				 
				}
				});     
		
		});
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*****************************************/
	//New product insertion script/////////////////
	/********************************************/
	
	$(".add_product_btn").click(function(e){
		e.preventDefault();
			var discount_mode = $(".discount_mode_insert").attr('data-discountmode');
			var product_name = $(".product_name").val();
			var s_desc =$(".small_desc").val();
			var p_qty = $(".p_qty").val();
			var super_menu_id = $(".super_menu_select option:selected").val()
			var cat_id = $(".submenu_select option:selected").val();
			var main_menu_id= $(".main_menu_select option:selected").val();
			var mrp_price = $(".mrp_price").val();
			if(discount_mode == '1'){
				var d_price = $(".d_price_in_percent").val();
				if(d_price.trim() == ""){
					d_price =0;
					}
				}
			if(discount_mode == '0'){
				var d_price = $(".d_price_in_price").val();
				if(d_price.trim() == ""){
					d_price =mrp_price;
					}
				}
			if(d_price.trim() == ""){ 
			swal({
			title: "",   
			text: "Please enter QTY of the Product",
			confirmButtonColor:"#E74C3C"
			});
			$(".d_price").focus();
			return false;
			}
			
			var in_stock = $('.in_stock').val();
			//alert(product_name+"/"+s_desc+"/"+cat_id+"/"+mrp_price+"/"+d_price);
			if(product_name == "" || product_name == " "){ 
			swal({
			title: "",   
			text: "Please enter valid or must insert name of the Product",
			confirmButtonColor:"#E74C3C"
			});
			$(".product_name").focus();
			return false;
			}
			if(p_qty.trim() == ""){
				swal({
			title: "",   
			text: "Please enter QTY of the Product",
			confirmButtonColor:"#E74C3C"
			});
			$(".p_qty").focus();
			return false;
				}
			if(super_menu_id == "" || super_menu_id == 0 ){
				swal("","must select any of Super Menu");
				return false;
			}
			if(main_menu_id == "" || main_menu_id == 0){
				swal("","must select any of Main Menu");
				return false;
			}
			if(cat_id == "" || cat_id == 0){
				swal("","must select any of cat");
				return false;
			}
			
			if(mrp_price == "" || mrp_price == " "){
				
				swal("","Please enter amount of the product");
			$(".mrp_price").focus();
			return false;
			}
			if($(".product_image_input").val() == ""){
				swal("","Please provide image for the product");
				return false;
			}
			if(in_stock == "" || in_stock==" "){
				swal("","Please provide stock of the product");
				return false;
				}
			swal({   
			title: "<small>Do u want to add it</small>",   
			//text: "Product Name: "+ product_name+"<br>"+"Product Desc: "+ s_desc+"<br>"+"Product Mrp: "+ mrp_price+"<br>",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#DD6B55",   
			confirmButtonText: "Yes, Add to system!",   
			cancelButtonText: "No, cancel!",   
			closeOnConfirm: false,   
			closeOnCancel: false,
			html: true,
			}, 
			function(isConfirm){   
			if (isConfirm) {
				$.ajax({
				url:"../mobile/phpfiles/new_product_adding.php?p_name="+product_name+"&s_desc="+s_desc+"&cat_id="+cat_id+"&mrp_price="+mrp_price+"&d_price="+d_price+"&in_stock="+in_stock+"&main_menu_id="+main_menu_id+"&supermenuid="+super_menu_id+"&discount_mode="+discount_mode+"&p_qty="+p_qty,
				dataType:"text",
				type:"GET",
				success: function(data){
								
				swal("Product Added Successfully.", "Product ID"+data);
				$('.product_adding_form')[0].reset(); 
				}
				});     
			  
			} else {     
			swal("Cancelled", "Product Not Added ", "error");   
			} 
			});
			
			
		});
});
//fetch menu data function
function fetch_menu_list(val,selector,id){
	$.ajax({
		url:"../mobile/phpfiles/fetch_menu.php?menu_table_name="+val+"&id="+id,
			dataType:"text",
        	type:"GET",
			success: function(data){
			var super_menu_list = $.parseJSON(data);
			
				$(selector).find('option:not(:first)').remove();
				for (i in super_menu_list){
					$(selector).append('<option value="'+super_menu_list[i].id+'">'+super_menu_list[i].name+'</option>');
					
				}
				
				$(selector).show();
			}
			
		});
	
	
}


function fetch_menu_list_for_modify(table_name,selector,id){
	
	$.ajax({
		url:"../mobile/phpfiles/fetch_menu.php?menu_table_name="+table_name+"&id="+id,
			dataType:"text",
        	type:"GET",
			success: function(data){
			var super_menu_list = $.parseJSON(data);
			$(selector).empty();
				table_name="'"+table_name+"'";
				var new_selector_to_pass ="'"+selector+"'"
				if(super_menu_list[0].id==0){
				$(selector).append('<li class="list-group-item" data-id="'+super_menu_list[0].id+'"> '+super_menu_list[0].name+'</li>');
				}else{
					for (i in super_menu_list){
						$(selector).append('<li class="list-group-item" data-id="'+super_menu_list[i].id+'"> '+super_menu_list[i].name+'<span class="glyphicon glyphicon-remove-circle" style="float:right" onclick="delete_menu_item('+table_name+','+new_selector_to_pass+','+super_menu_list[i].id+')"></span></li>');
						
					}
				}
				
				//$(selector).show();
			}
			
		});
	
	
}
function delete_menu_item(table_name,selector,id){
	$.ajax({
		url:"phpfiles/delete_menu_item.php?menu_table_name="+table_name+"&id="+id,
			dataType:"text",
        	type:"GET",
			success: function(data){
			var status=$.parseJSON(data);
			if(status[0].status_id==1) {
				swal("",status[0].data);
								
				}
				if(status[0].status_id==2){
					
				fetch_menu_list_for_modify(table_name,selector,0);
				swal("","successfuly Deleted!");				
				}
				
			}
			
		});
	
	}

function add_menu(table_name,value,id, selector){
	$.ajax({
		url:"../mobile/phpfiles/menu_name_adding.php?menu_table_name="+table_name+"&id="+id+"&value="+value,
			dataType:"text",
        	type:"GET",
			success: function(data){
				$(selector).empty();
			fetch_menu_list_for_modify(table_name,selector,id)
				
				//$(selector).show();
			}
			
		});
	
	
}

// image proccesser function
function image_proces(file,width,height) {
	
	$.ajax({
			url:"../mobile/phpfiles/image_processor.php?file="+file+"&w="+width+"&h="+height,
			dataType: 'text',  // what to expect back from the PHP script, if anything
			cache: false,
			contentType: false,
			processData: false,
			data: file,                         
			type: 'post',
			success:function(data){
					
					$(".image_check").css("background-size", "cover");
					$(".image_check").css("background", "url("+data+") center"); 
					}
			});
		}
function fetech_product_data(super_menu_id,main_menu_id,submenu_id,edit_mode,discount_mode){
	$.ajax({
		url:"phpfiles/fetch_products_data.php?super_menu_id="+super_menu_id+"&main_menu_id="+main_menu_id+"&submenu_id="+submenu_id+"&editmode="+edit_mode+"&discount_mode="+discount_mode,
			dataType:"text",
        	type:"GET",
			success: function(data){
			$(".product_data").html(data);
			
				
			}
	});
	
	
	}
function delete_product(id){
	// deleteing ajax request code
	swal({   
	title: "Are you sure?",   
	text: "Do you want to delete this product !",   
	type: "warning",   
	showCancelButton: true,   
	confirmButtonColor: "#DD6B55",   
	confirmButtonText: "Yes, delete it!",   
	closeOnConfirm: false 
	}, 
	function(){ 
	$.ajax({
		url:"phpfiles/delete_product.php?id="+id,
			dataType:"text",
        	type:"GET",
			success: function(data){
				if(data=="success"){
					$("."+id).css("background-color","#FF0004");
					
					    $("."+id).slideUp(2000, function() {
          //Delete the old row
          				$("."+id).remove();
     					 });
					}
				},
				complete: function(){
					swal("Deleted!", "Your imaginary file has been deleted.", "success");
					}
		});  
	 });
	
	
	}
function orders_fetch(id){
	
	$.ajax({
		url:"phpfiles/order_fetch_data.php?status_id="+id,
		dataType:"text",
        type:"GET",
		success: function(data){
		$(".page_content").empty();	
		$(".page_content").html(data);
		}
		
	});
	
	
	}
function order_proccess(id){
	$.ajax({
		url:"phpfiles/order_detaile_process.php?order_id="+id,
		dataType:"text",
        type:"GET",
		beforeSend: function(){
			$(".order_data_wrapper").html('<div style="text-align:center"><img src="../imgs/svg-loaders/circles.svg" width="20px"></div>');
			},
		
		success: function(data){
		$(".order_data_wrapper").html(data);
		$('.product_popover').popover({
			html: true,
    		content: function () {
        		return $(this).next('.product_popover-content').html();
			}
			});
		},
		complete:popupopen('#order_processing_popup'),
	});
	
	
	
	
	}
function popupopen(selector){
		
		Custombox.open({
			target: selector,
			effect: 'slit',
			speed: '500',
			escKey: false,
			overlayClose: false,
			position : 'center,top',
			
			}); 
		
	}
function check_admin_user_session(){
	$.ajax({
		url:"phpfiles/user_session_status.php",
		dataType:"text",
        type:"GET",
		success: function(data){
		if(data==0){
			top.location="../admin/adminlogin.html"
			}
		}
		
	});
	
	}
function get_delivery_areas(){
	$.ajax({
		url:"phpfiles/fetch_delivery_area_list.php",
		dataType:"text",
        type:"GET",
		success: function(data){
		$(".delivery_area_list_ul").html(data);
		}
	
	});
}