<?php 
session_start();
require("phpfiles/phpincludes/config.inc");
dbConnect();
if(isset($_GET['mobile_no'])){
$mobile_no = mysql_real_escape_string($_GET['mobile_no']);
$userdata_query=mysql_query("select user_id from users where mobile_no = $mobile_no");
$userdata=mysql_fetch_array($userdata_query);
if(mysql_num_rows($userdata_query) == 1)
{
$_SESSION['user_id']=$userdata['user_id'];
}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<title>Ayyappa Grocery </title>
</head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/animate.css">
<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="../slidebar/example-styles.css">
<link rel="stylesheet" type="text/css" href="../slidebar/slidebars.css">
<!-- <link rel="stylesheet" type="text/css" href="../css/owl.carousel.css"> 
<link rel="stylesheet" type="text/css" href="../css/owl.theme.css">
 <link rel="stylesheet" type="text/css" href="../css/owl.transitions.css"> --> 
 <link rel="stylesheet" type="text/css" href="../plugins/owl.carousel2/assets/owl.theme.default.css">
 <link rel="stylesheet" type="text/css" href="../plugins/owl.carousel2/assets/owl.carousel.css"> 

<link rel="stylesheet" type="text/css" href="../css/mobilestyle.css">
<link rel="stylesheet" type="text/css" href="../js/toast_message/jquery.m.toast.css">
<link rel="stylesheet" type="text/css" href="../css/sweetalert.css">
<link rel="stylesheet" type="text/css" href="../css/custombox.min.css">
<link rel="stylesheet" type="text/css" href="../css/cutomboxmodaldemo.css">
<link rel="stylesheet" type="text/css" href="../css/BootSideMenu.css">

<script src="../js/jquery-1.11.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!--<script src="../js/owl.carousel.min.js"></script> -->


<script src="../js/wow.js"></script>
<script src="../slidebar/slidebars.js"></script>
<script src="../js/toast_message/jquery.m.toast.js"></script>
<script src="../js/sweetalert.min.js"></script>
<script src="../js/custombox.min.js"></script>
<script src="../js/BootSideMenu.js"></script>
<script src="../js/bootstrap-waitingfor.js"></script>
<script src="../plugins/owl.carousel2/owl.carousel.min.js"></script>
<script src="../js/jquerymobile.js"></script>
<script src="../js/mobilescript.js"></script>

<script>
	(function($) {
		$(document).ready(function() {
			$.slidebars();
			$(".loading").css("visibility","hidden");
		});
	}) (jQuery);
</script> 
            
 <style>
 .menu-tabs>li{
	float: none !important; 
	overflow: -moz-scrollbars-none;
	 }
.menu-tabs::-webkit-scrollbar {
display: none;
}
.list-group-item:last-child {
  margin-bottom: 0;
   border-bottom-right-radius: 0px; 
  border-bottom-left-radius: 0px; 
}
.list-group-item:first-child {
   border-top-right-radius: 0px; 
 border-top-left-radius: 0px;
}
.cart_status li {
    display: inline;
    float: left;
}

.sidebarnav>li>a {
	text-align:left !important;
	color:#000000;
	margin-bottom:0px;
	}
.sidebarnav>li {
	background-color:#FFFFFF
	}
.page_content{
	position:relative;
	
}
 </style>
<body bgcolor="#24384E">

<div id="sb-site">
	<div class="navbar navbar-default top_header_bar navbar-fixed-top" style="padding:10px 5px 10px 10px; min-height:45px;">
    <li class="sb-toggle-left slide_menu_btn" style="list-style:none;"><span class="fa fa-bars" style="color:#FFFFFF; font-size:18px; float:left; padding-top:0px"></span></li>
    <li class="back_navigation_element" style="list-style:none; float:left;"><span class="glyphicon glyphicon-chevron-left" style="color:#FFFFFF; font-size:18px;"></span></li>
     <li class="top_logo" style="list-style:none; float:left;"><p style="padding:0px; margin:0px 0px 0px 5px; color:#FFFFFF; font-size:16px; line-height:normal">AyyappaGrocery</li>
    
    <div style="float:right; line-height: 0;">
    <ul style="display: inline-block; margin-bottom:0px; padding-left: 0px;">
    <!--<li style="list-style:none; float:left; padding-right:10px"><span class="glyphicon glyphicon-user" style="color:#FFFFFF; font-size:18px;"></span></li> -->
    <li style="list-style:none; float:left; position:relative; margin-right:10px" onClick='load_checkout_page("phpfiles/checkout_page.php");'><span class="glyphicon glyphicon-shopping-cart" style="color:#FFFFFF; font-size:18px; padding-right:25px"></span><span class="badge total_cart_items" style="background-color:#000; position:absolute; right:10px; font-weight:600; font-size:9px">0</span></li>
    
   <!-- <li style="list-style:none; float:left; position:relative" class="dropdown">
          <a href="#" class="dropdown-toggle user_menu_toggle_btn" data-toggle="dropdown" role="button" aria-expanded="true"><span class="glyphicon glyphicon-option-vertical" style="color:#FFFFFF; font-size: 18px;"></span></a>
          <ul class="dropdown-menu user_menu" role="menu" style="left:-140px; top:150%; float:right">
          
           
          </ul>
        </li> -->
    </ul>
    </div>
    </div>
    <div class="top_adjestment" style="width:100%; min-height:45px"></div>
    
    <div class="jumbotron top_header" style="background-color:#e74c3c; margin:0px 0px 0px 0px; padding:10px 15px 5px 10px">
    <!--<h3 style="color:#FFFFFF; padding-left:20px">Ayyappa <br><span style="font-weight:400; font-size:16px; margin-top:-40px;  position: relative;top: -10px; padding-left:35px">SuperMarket</span></h3> -->
    <img src="../img/ayyappa-grocery-logo.png" height="64px" />
    </div>
    <div class="navbar navbar-default status_menu_bar">
    <!--<li class="main_cat_slide_toggle" style="list-style:none;"><span class="fa fa-bars" style="color:#FFFFFF; font-size:18px; float:left; padding-top:08px"></span></li> -->
    <h6 class="status_text" style="margin-top:0px; padding-left:10px; color:#FFFFFF;padding-top:10px; text-transform:capitalize">Welcome To Online Shopping</h6> 
    </div>
  
        <div class="page_content">
        
        		 <div class='loader'>
                	<img src='../imgs/svg-loaders/puff.svg' width='60px' height='60px'/>
                    <h5 class='animated infinite fadeOut'>Loading...</h5>
                </div>
                
                
        </div>
       

</div> <!-- container --> 


<!-- item container 
<div class="item_list_container">
<div class="list-group">
<a href="#" class="list-group-item">
  	<div class="img-rounded" style="width:60px; height:60px; float:left; background-color:#AAAAAA; margin-right:10px">
    </div>
    <h4 class="list-group-item-heading" style="font-size:16px; padding-bottom:2px; margin-bottom:1px">Oil Packet 200 Ltrs</h4>
    <p style="padding: 0px 0px 1px; font-size:9px; margin-bottom:0px"> Product Descrption </p>
    <div class="operations" style="position: relative;">
    <p style="float:left; margin-bottom:2px"><span class="fa fa-inr" style="font-weight:700; font-size:12px; padding-right:10px"> 600/-</span>  <span style="font-size:10px;">MRP:789</span></p>
    
    <p style="margin-bottom:0px">/-</p>
    <div class="quantity" style="position: absolute; bottom: 0px; right: 0px;">
     <button class="btn btn-primary btn-xs" style="margin-left:20px"><span class="glyphicon glyphicon-minus-sign"></span> </button>
     <span class="label label-default " style=" margin-left:2px; padding:1px 2px 1px 1px; background-color:#FFFFFF; color:#F52C2F; font-size:15px">1</span>
     <button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus-sign"></span> </button>
     </div>
    </div>
  </a>
 

</div>
</div>

-->





</div>
<div class="bottom_wrapper">

</div>
<div class="bottom_info_placer" style="background-color:#1565C0; position:fixed; bottom:0px; width:100%; z-index:1000; text-align:center; padding:2px 5px 2px 5px">
<p style="color:#FFFFFF; font-size:18px; margin:0px; font-weight:500" class="animated infinite fadeIn">Shop Over Rs.300 and Get Free Delivery</p>
</div> 
<div class="sb-slidebar sb-left" style="background-color:#2C3240; width:60% !important">
			 	
			
                <ul class="nav nav-justified pd-top-15 sidebarnav slidebar_menu_links" style="text-align:left">
                	<li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Offers</a></li>
                    <li><a href='#' onClick='load_login_url("phpfiles/login.php?navigate_id="+1);'>Login</a></li>
                    <li><a href="#" onClick="load_order_list();">My Orders</a></li>
                    <li><a href="#">Account Settings</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul> 
                
</div>



<div id="loading_popup" class="modal-demo" style="border-radius:0px; background-color:#FFFFFF; opacity:0.9">
            <div class="text" style="text-align:center; padding:0px">
               <img src="../imgs/svg-loaders/circles.svg" width="20px">
               <p style="padding:0px">Proccessing.. Please Wait..</p>
   			</div> 
</div>   

<div id="product_popup" class="modal-demo" style="padding:0px">
      <button type="button" class="close" onclick="Custombox.close({target:'#product_popup'});" style="color:#000000; z-index:1500">
          <span>&times;</span><span class="sr-only">Close</span>
      </button>
        <div class="text product_popup_container" style="padding:0px; min-height:100px">
          
   		</div> 
</div>
 <div class="modal fade" id="diwaliwish" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" style="margin-top:10%; background-color:#de3939; z-index:2000">
      <div class="modal-content" style="background-color:#de3939"">
        <div class="modal-body" style="margin:0px; padding:0px">
          <div class="row" style="margin:0px">
          	<div class="col-xs-12" style="margin:0px; padding:0px">
            	<img src="../img/diwali-pop-banner.jpg" width="100%"/>
            </div>
          </div>
        </div>
        <div class="modal-footer" style="text-align:center">
        	<h5 style="color:#FFFFFF">Have a Safe Diwali , Happy Shopping</h5>
          <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Continue Shopping</button>
        </div>
      </div>
    </div>
  </div>  

<script>
$.mobile.loading().hide();

jQuery(document).ready(function ($) {
        $('#tabs').tab();
    });
	//$("#diwaliwish").modal('show');
	
	$(".checkout").click(function(){
	$(".page").addClass("animated slideOutLeft");
	$(".page").empty();
	$(".user_menu_toggle_btn").click(function(e){
		 e.preventDefault();
		});
	});
	
	
	 
 


</script>

</body>

</html>
