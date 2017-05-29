<?php 
session_start();
require("phpfiles/phpincludes/config.inc");
dbConnect();

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

<script src="../js/bootstrap-waitingfor.js"></script>
<script src="../plugins/owl.carousel2/owl.carousel.min.js"></script>


<style>
@viewport {
    orientation: portrait;
}
</style>

<body style="background-color:#303030; background-image:url(../img/pattrn.png); ">
    <div class="row" style="margin:0px; padding:20px;">
        <div class="col-xs-5 col-md-5 col-lg-5 col-sm-5" style="text-align:center; margin-left:auto; margin-right:auto">
        	<img src="../img/app-icon512x512.png" width="110%"/>
        </div>
        <div class="col-xs-7 col-md-8 col-lg-7 col-sm-7">
        	<h5 style="font:andika; color:#FFFFFF; text-shadow:1px 1px 1px #E3E3E3; font-size:19px">Ayyapa Grocery</h5>
            <p style="color:#D9D9D9; font-size:15px; line-height:1.3">Online Grocery Shopping</p>
            <button class="btn btn-sm btn-success btn-block" onClick="window.open('https://play.google.com/store/apps/details?id=com.AyyappaGrocery.mobile.AyyappaGrocery')" target="_blank">Install Now</button>
        </div>
    </div>
    
    <div class="row" style="margin:0px">
    	<div class="mobile_app_banner">
        	<div class="mobilebanner" style="width:100%">
            	<img src="../img/app/1.png" width="50%"; height="50%">
            </div>
            <div class="mobilebanner" style="width:100%">
            	<img src="../img/app/2.png" width="50%"; height="50%">
            </div>
            <div class="mobilebanner" style="width:100%">
            	<img src="../img/app/3.png" width="50%"; height="50%">
            </div>
        </div>
    </div>
    <div class="row" style="width:100%; z-index:1000; text-align:center; margin:0px; color:#FFFFFF">
    	<div class="col-xs-12">
        	      	<button class="btn btn-danger btn-block" onClick="window.open('https://play.google.com/store/apps/details?id=com.AyyappaGrocery.mobile.AyyappaGrocery')" target="_blank">Download now</button>
                    	<span>From PlayStore</span>
                    <button class="btn btn-default btn-block" onClick="location.href='main.php'">Continue with mobile site</button>
                    
        </div>
    </div>
</body>
<script>
$(".mobile_app_banner").owlCarousel({
				animateOut: 'slideOutLeft',
    			animateIn: 'slideInRight',
				items:1,
				dots:true,
				singleItem:true,
				autoplay:true,
    			autoplayTimeout:5000,
				
			});
</script>
</html>
