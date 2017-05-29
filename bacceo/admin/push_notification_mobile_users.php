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
    <div class="container">
    	<div class="row" style="background-color:#FFFFFF; margin-top:20px; margin-bottom:20px">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="float:none; margin:0 auto; text-align:center; margin:20px auto;">
            	<button class="btn btn-info ntf_for_shw_btn_allusers" style="width:250px; height:100px; text-align:center; text-wrap:normal; background-color:#03A9F4"><img  src="../img/user_group-512.png" width="30%" ><br>Send to All Users </button>
            	<button class="btn btn-info" style="width:250px; height:100px; text-align:center; text-wrap:normal"><span class="glyphicon glyphicon-user" style="font-size: 45px; margin: 10px 0px;"></span><br>Send to Seleted Users </button>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ntf_alluser_div" style="background-color:#FFFFFF; text-align:center; padding-bottom:10px">
            		<h4 style="color:#000000">Notifcation form for all Users</h4>
                    <hr style="margin:5px auto;border-width: 5px 0px 0px;">
                <div class="Pushnotification_formWrapper">
                	
                	<div class="form-group">
                     <input class="form-control ntf_title" id="focusedInput" placeholder="Title Of Message" type="text">
                    </div>
                    <div class="form-group">
                     <input class="form-control ntf_desc" id="focusedInput" placeholder="Message Discription" type="text">
                    </div>
                    <div class="form-group">
                     <input class="form-control ntf_img" id="focusedInput" placeholder="Image Url" type="text">
                    </div>
                    <!-- <div class="form-group">
                     <input class="form-control" id="focusedInput" placeholder="Title Of Message" type="text"> -->
                     <button class="btn btn-success send_notification_btn">Send <span class="glyphicon glyphicon-send"></span></button>
                    </div>
                </div>
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ntf_selec_user_div" style="background-color:#263238; text-align:center; padding-bottom:10px">
            		<h4 style="color:#FFFFFF">Notifcation form for Selected Users</h4>
                    <hr style="margin:5px auto;border-width: 5px 0px 0px;">
                <div class="Pushnotification_formWrapper">
                	
                	<div class="form-group">
                     <input class="form-control ntf_title_suser" id="focusedInput" placeholder="Title Of Message" type="text">
                    </div>
                    <div class="form-group">
                     <input class="form-control ntf_desc_suser" id="focusedInput" placeholder="Message Discription" type="text">
                    </div>
                    <!-- <div class="form-group">
                     <input class="form-control" id="focusedInput" placeholder="Title Of Message" type="text"> -->
                     <button class="btn btn-default send_notification_selected_users_btn"><span class="glyphicon glyphicon-send" style="font-size:30px"></span></button>
                    </div>
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



<script>
$(document).ready(function(e) {
    
	$(".ntf_alluser_div,.ntf_selec_user_div").hide();
	$(".ntf_for_shw_btn_allusers").click(function(){
		$(".ntf_alluser_div,.ntf_selec_user_div").hide();
		$(".ntf_alluser_div").show();
		$(".ntf_title").focus();
		});
	$(".send_notification_btn").click(function(){
		
		var ntf_title = $(".ntf_title").val();
		var ntf_desc = $(".ntf_desc").val();
		var ntf_img = $(".ntf_img").val();
		if(ntf_title.trim() =="" || ntf_desc.trim()==""){
			
			swal("","Please Fill notification Details");
			} else {
				$.ajax({
						url:"../mobile/gcm/send_push_notiification.php?ntf_title="+ntf_title+"&ntf_desc="+ntf_desc+"&ntf_img="+ntf_img,
						dataType:"text",
						type:"GET",
						success: function(data){
										
							swal("",data);
							 
						 
						}
				});     
			}	
		});
});
</script>

</body>

</html>
