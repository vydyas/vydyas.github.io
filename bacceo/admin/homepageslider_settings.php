<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Untitled Document</title>
</head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/animate.css">
<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="../slidebar/example-styles.css">
<link rel="stylesheet" type="text/css" href="../slidebar/slidebars.css">
<link rel="stylesheet" type="text/css" href="../css/adminstyles.css">
<link rel="stylesheet" type="text/css" href="../css/jqueryui.css">
<link rel="stylesheet" type="text/css" href="../css/sweetalert.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap-editable.css">
<link rel="stylesheet" type="text/css" href="../css/custombox.min.css">
<link rel="stylesheet" type="text/css" href="../css/cutomboxmodaldemo.css">

<script src="../js/jquery-1.11.0.min.js"></script>

<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.isotope.js"></script>
<script src="../js/wow.js"></script>
<script src="../slidebar/slidebars.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/sweetalert.min.js"></script>
<script src="../js/bootstrap-editable.min.js"></script>
<script src="../js/custombox.min.js"></script>
<script src="../js/adminscrpits.js"></script>
<script>
check_admin_user_session();
</script>
<style>
.navbar-inverse .navbar-nav .open .dropdown-menu>li>a {
  color: #000000 !important;
}
.navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:hover, .navbar-inverse .navbar-nav>.active>a:focus {
  color: #FFFFFF;
  background-color: #e74c3c;
 
}
.navbar-inverse {
	background-color:#e74c3c;
	 margin-bottom:0px !important;
}
.navbar-inverse .navbar-brand {
  color: #E0E0E0;
}
.navbar-inverse .navbar-nav>li>a {
  color: #FFFFFF;
}
.navbar-inverse .navbar-nav>li>a {
  color: #FFFFFF;
}
.navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus {
  background-color: #c0392b;
  color: #ffffff;}
  .navbar-inverse .navbar-nav .open .dropdown-menu>li>a {
  color: #FFFFFF;
}
</style>
 
<body  style="background-color:#34495e">

<nav class="navbar navbar-inverse Nav_bar_admin" style="border-radius: 0px">
  
</nav>
<div class="page_content">
	<div class="container" style="background-color:#FFFFFF">
    		<div class="row">
            	<div class="col-lg-2 col-md-2" style="text-align:right">
                	<h5>Slider for </h5>
                </div>
                <div class="col-lg-3 col-md-3">
                	<div class="form-group" style="margin-bottom:0px">
                   <select class="form-control slider_for" id="select">
                   		<option value="0" selected>Select For</option>
                      <option value="mobile">Mobile</option>
                      <option value="WebSite">WebSite</option>
                      
                   </select>
                    
                	</div>
                </div>
            </div>
            <hr>
    		<div class="row">
            	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="border-right-width:medium; border-right-color:#C3C3C3; border-right-style:solid">
                	<form>
                    	<div class="form-group">
                			<input class="form-control input-sm slider_name" type="text" placeholder="Slider Name" >
              		  	</div>
                        <div class="form-group">
                			<input class="slider_file" type="file"  accept="image/jpg,image/png,image/jpeg," >
              		  	</div>
                        <div class="form-group" style="margin-bottom:0px">
                           <select class="form-control type_of_navigation" id="select">
                           	  <option value="0" selected>Select cat. of slider</option>
                              <option value="info">Information Only</option>
                              <option value="product">Product</option>
                              <option value="main_cat">Main Menu</option>
                              <option value="sub_cat">Sub Menu</option>
                           </select>
                        
                        </div>
                        <div class="form-group product_value_input_div">
                			<input class="form-control input-sm product_value_for_slider" type="text" placeholder="Product ID " >
              		  	</div>
                         <div class="form-group main_menu_selectbox_div" style="margin-bottom:0px">
                               <select class="form-control main_menu_for_slider" id="select">
                                <option selected value="0"> Please Select Main Menu</option>
                                  
                               </select>
                       
                    	</div>
                        <div class="form-group sub_menu_selectbox_div" style="margin-bottom:0px">
                           <select class="form-control sub_menu_for_slider" id="select">
                              <option value="0">Please Select Sub Menu</option>
                              
                              
                           </select>
                    
                		</div>
                        <div class="row" style="margin:auto; text-align:center; margin-bottom:20px; margin-top:20px">
                            <button class="btn btn-success add_slider_btn">insert</button>
                            <button class="btn btn-danger reset_form_btn">Cancel</button>
                        </div>
                    
                    </form>
                
                </div>
            	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                	<div class="row slider_list_container">
                       	
                    
                    </div>
                
                </div>
            </div>
        
        </div>
    </div>


<!-- modals -->
<div id="loading_popup" class="modal-demo" style="border-radius:0px; background-color:#FFFFFF; opacity:0.9">
      <div class="text" style="text-align:center; padding:0px">
           <img src="../imgs/svg-loaders/circles.svg" width="20px">
           <p style="padding:0px">Proccessing.. Please Wait..</p>
   	  </div> 
</div>   





</body>
<script>
$(".product_value_input_div, .main_menu_selectbox_div, .sub_menu_selectbox_div").hide();
$(".slider_for").change(function(){
	var forpage = $(".slider_for option:selected").val();
	if(forpage == 0){
	$(".slider_list_container").empty();
	return false;
	}
	//alert(forpage);
	generate_list_of_sliders(forpage);
	});
$(".type_of_navigation").change(function(){
	var type_of_nav = $(".type_of_navigation option:selected").val();
	if(type_of_nav == 0){
		$(".product_value_input_div, .main_menu_selectbox_div, .sub_menu_selectbox_div").hide();
		return false;
		}
	if(type_of_nav== 'product'){
		$(".product_value_input_div, .main_menu_selectbox_div, .sub_menu_selectbox_div").hide();
		$(".product_value_input_div").show();
		}
	if(type_of_nav== 'main_cat'){
		$(".product_value_input_div, .main_menu_selectbox_div, .sub_menu_selectbox_div").hide();
		fetch_menu_list('main_menu','.main_menu_for_slider',7)
		$(".main_menu_selectbox_div").show();
		}
	if(type_of_nav== 'sub_cat'){
		$(".product_value_input_div, .main_menu_selectbox_div, .sub_menu_selectbox_div").hide();
		fetch_menu_list('main_menu','.main_menu_for_slider',7)
		$(".main_menu_selectbox_div").show();
		$(".main_menu_for_slider").change(function(){
			var id = $(".main_menu_for_slider option:selected").val();
			fetch_menu_list('submenu','.sub_menu_for_slider',id)
			$(".sub_menu_selectbox_div").show();
			});
		
		}
	if(type_of_nav== 'info'){
		$(".product_value_input_div, .main_menu_selectbox_div, .sub_menu_selectbox_div").hide();
	}
	});
	// ADD SLIDER DATA TO DB 
	$(".add_slider_btn").click(function(e){
		e.preventDefault();
		var slider_for = $(".slider_for option:selected").val();
		if(slider_for == 0){
			swal(""," Please select slider For Mobile / Website ");
			return false;
			} else {
				var slider_name = $(".slider_name").val();	
				if(	slider_name.trim() ==""){
					swal(""," Please Enter Name of slider  ");
					return false;
					
					} else {
					 
							if($(".slider_file").val() == ""){
								swal(""," Please Choose a image file  ");
								return false;
							}
							else {
							var file = $(".slider_file").val();
							var ext = file.substr( (file.lastIndexOf('.') +1) ).toLowerCase();
							if(ext != 'jpg'){
								swal(""," Please select valid image file JPG");
								return false;
								
								} else {
									var file_data = $(".slider_file").prop('files')[0];   
									var form_data = new FormData();                  
									form_data.append('file', file_data);
									
									
									}
								if($(".type_of_navigation option:selected").val() == 0){
									swal(""," Please select type of slider");
									return false;
									
									} else {
										var type_of_navigation = $(".type_of_navigation option:selected").val();
										if(type_of_navigation == 'product'){
											var value = $(".product_value_for_slider").val();
											if(value.trim() == ""){
												swal(""," Please enter product id for navigate to it");
												return false;
												}
											
										}else if(type_of_navigation == 'main_cat'){
												var value = $(".main_menu_for_slider option:selected").val();
												if(value == 0){
													swal(""," Please Select main menu");
													return false;
													}
										}else if(type_of_navigation == 'sub_cat'){
											var value = $(".main_menu_for_slider option:selected").val();
											if(	value == 0){
												swal(""," Please Select submenu");
													return false;
												
											}	
													
										}else if(type_of_navigation == 'sub_cat'){
											var value =0;
											} 
										
										$.ajax({
											url:"phpfiles/homesliderinsert.php?form_data="+form_data+"&slider_name="+slider_name+"&forpage="+slider_for+"&type_of_navigation="+type_of_navigation+"&value="+value,
											dataType:"text",
											cache: false,
											contentType: false,
											processData: false,
											data: form_data,                         
											type: 'post',
											success: function(data){
											
											swal(""," Succefull Inserted");
											generate_list_of_sliders(slider_for); 
											}
										});
										
									}
							
							}
						}
				
			}
		
		});
function generate_list_of_sliders(forpage){
	$.ajax({
			url:"phpfiles/generate_sliderlist.php?forpage="+forpage,
			dataType:"text",
			type:"GET",
			success: function(data){
			$(".slider_list_container").html(data);
			}
		});
	}
function delete_slider(id){
	$.ajax({
			url:"phpfiles/delete_slider.php?id="+id,
			dataType:"text",
			type:"GET",
			success: function(data){
			swal(""," Deleted Sucessfull");
			var forpage = $(".slider_for option:selected").val();
			generate_list_of_sliders(forpage);
			}
		});
	}
</script>
</html>
