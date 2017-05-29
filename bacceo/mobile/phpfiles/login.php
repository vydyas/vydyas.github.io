<?php 
session_start();
require("phpincludes/config.inc");
dbConnect();
if(isset($_GET['navigate_id']) ){
	$navigate_id = $_GET['navigate_id'];
	
	
	}
?>
	

  <div class="tab-content">
    <div id="login" class="tab-pane fade in active">
             <div class="Register_wrapper" style="background-color:#FFFFFF;">
            <table width="100%" style="text-align:center;">
                    <tr>
                        <th style="background-color:#515151; color:#FFFFFF; font-weight:500; text-transform:uppercase;padding-left:10px;">Account Login</th>
                    </tr>
                    <form>
                    
                    <tr style="padding-top:20px;">
                        <td style="padding:5px 15px 5px 15px"><input type="text" class="form-control input-sm mobileno"  placeholder="Mobile No" maxlength="10" pattern="^[7-9][0-9]{9}$"></td>
                    </tr>
                    <tr >
                        <td style="padding:5px 15px 5px 15px"><input type="password" class="form-control input-sm password" placeholder="Login Password"></td>
                    </tr>
                    <tr class="err_login_row" >
                        <td style="padding:5px 15px 5px 15px"><p class="err_login_data" style="color:#ED0003"> </p></td>
                    </tr>
                    <tr >
                        <td style="padding:5px 15px 5px 15px"><button type="submit" class="btn Login" style="width:100%; background-color:#00BD85; color:#FFFFFF" >Login</button></td>
                    </tr>
                    <tr>
                    	<td align="center" style="text-align:center">Don't Have Account</td>
                       
                    </tr>
                    
                    <tr>
                    	<td style="padding:10px 15px 5px 15px"><a class="btn" style="width:100%; background-color:#F44447; color:#FFFFFF" data-toggle="tab" href="#register" >New User Registration</a></td>
                    </tr>
                    <tr>
                    	<td align="center" style="text-align:center">-- OR --</td>
                    </tr>
                    <tr>
                    	<td style="padding:5px 15px 5px 15px"><button class="btn guest_login" style="width:100%; background-color:#3584FF; color:#FFFFFF"  >Login as Guest</button></td>
                    </tr>
                    </form>
                    
             </table>
        </div>
    </div>
    <div id="register" class="tab-pane fade">
       <div class="Login_wrapper" style="background-color:#FFFFFF;">
            <table width="100%" style="text-align:center;">
                    <tr>
                        <th style="background-color:#515151; color:#FFFFFF; font-weight:500; text-transform:uppercase;padding-left:10px;">Account Register</th>
                    </tr>
                    <form class="register_form">
                    <tr style="padding-top:20px;" >
                        <td style="padding:5px 15px 5px 15px"><input type="text" class="form-control input-sm full_name" placeholder="Full Name" required></td>
                    </tr>
                    <tr>
                        <td style="padding:5px 15px 5px 15px"><input type="text" class="form-control input-sm mobile_no" placeholder="Mobile No" maxlength="10" required></td>
                    </tr>
                    <tr >
                        <td style="padding:5px 15px 5px 15px"><input type="password" class="form-control input-sm passwrd" placeholder="Choose Login Password" required></td>
                    </tr>
                    <tr >
                        <td style="padding:5px 15px 5px 15px"><input type="password" class="form-control input-sm cnf_pswrd" placeholder="Re-Confirm Your Password"></td>
                    </tr>
                    
                    <tr >
                        <td style="padding:5px 15px 5px 15px"><button type="submit" class="btn Register" style="width:100%; background-color:#FF1E22; color:#FFFFFF" onClick="">Register With US</button></td>
                    </tr>
                    <tr>
                    	<td><li class="active" style="float:right; list-style:none;padding-right:20px">Already Have a Account?<a class="login_tab_active" data-toggle="tab" href="#login">Click Here</a></li></td>
                    </tr>
                    
                    </form>
             </table>
        </div>
    </div>
   
  </div>
<script>
$(".mobile_no, .mobileno").on({
  keydown: function(e) {
    if (e.which === 32)
      return false;
  },
  change: function() {
    this.value = this.value.replace(/\s/g, "");
  }
});
$(".mobile_no, .mobileno").focusout(function(e) {
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
			//$(this).focus();
			return false;
			}
		
	} else {
		swal({
		title: "",
		text: "Enter 10 digit mobile number",
		confirmButtonColor:"#E02839"
		});
			//$(this).focus();
		
		return false;
		}
});
	$(".login_tab_active").click(function(){
		$("#login").addClass("in");
		});
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
$(".mobile_no, .mobileno").ForceNumericOnly();
$(".err_login_row").hide();
$("li a").click(function(){
	var id =$(this).attr('href');
	$('.tab-pane').removeClass("active");
	$(this).parent('.tab-pane').addClass('active');
	$(id).addClass('active');
	});
$(".Login").click(function(e){
	e.preventDefault();
var mobile_no = $(".mobileno").val();
var password = $(".password").val();
if(mobile_no == "" || mobile_no ==" " || mobile_no.length < 10){
	swal({
		title: "",
		text: "Enter your rigistered Mobile Number",
		confirmButtonColor:"#E02839"
		});
		$(".mobileno").focus();
		return false;
	
	}
if(password == "" || password ==" "){
	swal({
		title: "",
		text: "Must enter Password to login",
		confirmButtonColor:"#E02839"
		});
		$(".password").focus();
		return false;
	
	}
$.ajax({
			url:"phpfiles/login_proccessor.php?mobile_no="+mobile_no+"&pswrd="+password,
			dataType:"text",
        	type:"GET",
			success: function(data){
				if(data == 1){
				
				navigate_urls(<?php echo $navigate_id ?>);
				} else {
					$(".err_login_data").html(data);
					$(".err_login_row").show();
					
					}
					
				}
			});	 
});
$(".Register").click(function(){
	
	if($.trim($(".full_name").val()) == "" || $.trim($(".mobile_no").val())=="" || $.trim($(".passwrd").val()) =="" || $.trim($(".cnf_pswrd").val()) == "" ){
					swal({
						title: "",
						text: "All fields are required ",
						confirmButtonColor:"#E02839"
						});
		return false;
		} else if($(".passwrd").val().length <4){
		swal({
			title: "",
			text: "Password length more than 4 characters ",
			confirmButtonColor:"#E02839"
			});
		return false;
		} else if($(".passwrd").val() == $(".cnf_pswrd").val()){
		
		var full_name = $(".full_name").val();
		var mobile_no = $(".mobile_no").val();
		var pswrd = $(".passwrd").val();
		
			$.ajax({
				url:"phpfiles/new_registration_proccessor.php?full_name="+full_name+"&mobile_no="+mobile_no+"&pswrd="+pswrd,
				dataType:"text",
				type:"GET",
				success: function(data){
					//alert(data);
				if(data==1){	
				navigate_urls(<?php echo $navigate_id ?>);
				}
				else{
					swal({
						title: "",
						text: "Sorry!"+data,
						confirmButtonColor:"#E02839"
						});
					}
					}
				});	 
		
	} else { 
	swal({
		title: "",
		text: "password not match with confirm password",
		confirmButtonColor:"#E02839"
		});
		$(".passwrd").focus();
		return false;
	
	} 
	
	});	
	
	//Guest Login
	$(".guest_login").click(function(e){
		e.preventDefault();
		$.ajax({
				url:"phpfiles/guest_login_proccessor.php",
				dataType:"text",
				type:"GET",
				success: function(data){
					if(data==1){	
				navigate_urls(<?php echo $navigate_id ?>);
					}
					
				}
		});
		
		
		});
</script>