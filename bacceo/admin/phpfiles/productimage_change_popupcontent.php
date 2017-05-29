<?php 
session_start();
require("../../mobile/phpfiles/phpincludes/config.inc");
require("../../mobile/phpfiles/phpincludes/phpfunctions.inc");
dbconnect();
$p_id = $_GET['p_id'];
$product_type = $_GET['product_type'];
$_SESSION['unique_id']=uniqid();

?>
		<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title" style="padding:2px 10px">Change Image of the Product "<?php echo get_name_of_product($p_id,$product_type) ?> "</h5>
          <hr style="margin-top:5px; margin-bottom:5px">
        </div>
        <div class="modal-body image_change_modal_body_content">
          <div class="row">
          	<div class="col-xs-6 col-md-6 col-sm-6 col-lg-6">
              <div class="img-rounded img_present" style="width:150px; height:150px; background:url('../<?php echo get_img_of_product($p_id,$product_type) ?>'); background-size: cover; margin:2px 10px 10px 15px; text-align:center"> Present Image</div>
            </div>
            <div class="col-xs-6 col-md-6 col-sm-6 col-lg-6" >
               <div class="img-rounded img_after" style="width:150px; height:150px; background:url('../imgs/product_imgs/Bb Royal Moong Dal, 500 gm Pouch13_19_37_12_06_15.jpg'); background-size: cover; margin:2px 10px 10px 15px; text-align:center; background-repeat:no-repeat">New Changed Image</div>
               <input type="file" class="image_change_file_input"/>
            </div>
          </div>
        </div>
        
       
        <div class="modal-footer image_change_modal_footer_content ">
        	<button type="button" class="btn btn-danger close_modal_image_change" data-dismiss="modal">Cancel</button>
          	<button type="button" class="btn btn-success save_changed_image_btn" disabled>Save</button>
          
        </div>
        <script>
			$(".img_after").hide();
			$(".image_change_file_input").change(function(){
			
		   var file_data = $(".image_change_file_input").prop('files')[0];   
				var form_data = new FormData();                  
				form_data.append('file', file_data)
       			//alert(form_data);
				 image_proccess_for_change_product_image (form_data,120,120);
				
			});
			function image_proccess_for_change_product_image (file,width,height){
				
				$.ajax({
					url:"../mobile/phpfiles/image_processor.php?file="+file+"&w="+width+"&h="+height,
					dataType: 'text',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: file,                         
					type: 'post',
					success:function(data){
							
							$(".img_after").css("background-size", "cover");
							$(".img_after").css("background", "url("+data+") no-repeat scroll 0% 0% /cover"); 
							$(".img_after").show();
							$(".save_changed_image_btn").prop('disabled', false);
							}
				});
		}
		$(".save_changed_image_btn").click(function(e){
			e.preventDefault();
			if($(".image_change_file_input").val() == ""){
				swal("","please select image first to save");
				return false;
				}
			$.ajax({
					url:"phpfiles/save_product_image_changes.php?p_id=<?php echo $p_id ?>&product_type=<?php echo $product_type?>",
					dataType:"text",
					type:"GET",
					success: function(data){
					if(data == 'success'){
						$(".image_change_modal_body_content").html("Successfully changed Product image");
						$(".save_changed_image_btn").hide();
						$(".close_modal_image_change").html('close');
						}
					}
			});  
			})
		</script>