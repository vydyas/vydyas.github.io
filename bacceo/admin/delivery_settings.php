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
    		<div class="row" style="background-color:#FFFFFF">
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                	<h6>Delivery Areas</h6>
                    <hr>
                     <div class="form-group">
              
                          <div class="input-group">
                           
                            <input type="text" class="form-control delivery_name_field " placeholder="Delivery Area Name ">
                            <span class="input-group-btn">
                              <button class="btn btn-default delivery_area_add_btn " type="button">Add</button>
                            </span>
                          </div>
                        </div>
    				</div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                	<ul class="list-group delivery_area_list_ul">
                       <script> get_delivery_areas(); </script>
                    
                    </ul>
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
function delete_area(id) {
	
swal({   
	title: "Are you sure?",   
	text: "Do you want to delete this Delvery Area!",   
	type: "warning",   
	showCancelButton: true,   
	confirmButtonColor: "#DD6B55",   
	confirmButtonText: "Yes, delete it!",   
	closeOnConfirm: false 
	}, 
	function(){ 
		$.ajax({
				url:"phpfiles/delivery_area_deleting.php?id="+id,
				dataType:"text",
				type:"GET",
				success: function(data){
				get_delivery_areas();
				},
				complete: function(){
					swal({ title:"Deleted!", text:"Delivery Area deleted.", type:"success", timer: 1500,});
					}
			
			});
	
		
	});
}
</script>

</body>

</html>
