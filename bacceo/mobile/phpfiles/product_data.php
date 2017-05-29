<?php
session_start();
require("phpincludes/config.inc");
require("phpincludes/phpfunctions.inc");
dbConnect();
if(isset($main_menu_id)){
unset($main_menu_id);	
}
$main_menu_id=$_GET['id'];
$super_menu_id = $_GET['supermenu_id'];
$product_table_name_query = mysql_fetch_array(mysql_query('select * from super_menu where super_menu_id='.$super_menu_id));
$product_table_name = $product_table_name_query['table_name'];

?>



<div id="main_cat_list_side_bar">

  <div class="list-group cat_list_in_product_area" style="margin-top:20px">
 <script>
	var id = <?php echo $super_menu_id ?>;
	$.ajax({
			url:"phpfiles/main_cat_data.php?id="+id,
			dataType:"text",
        	type:"GET",
			 
			success: function(data){
			$(".cat_list_in_product_area").html(data);
			}
	});
	</script> 

  </div>

</div>



<?php


 $query_for_submenu_list_data_fetch =mysql_query("select * from submenu where main_menu_id =$main_menu_id");
 while($row = mysql_fetch_array($query_for_submenu_list_data_fetch)){
	 $submenu_ids[]=$row['submenu_id'];
	 }
	 //print_r($submenu_ids);
	  if(isset($submenu_ids)){
	?>
 

 <!-- data tabs creations -->
 <ul id="tabs" class="nav nav-tabs menu-tabs" data-tabs="tabs" style="margin-top:2px" data-mainmenuid="<?php echo $main_menu_id; ?>">
 
 <li class="active"><a href="#all" data-toggle="tab" aria-expanded="true">All Products</a></li>
 <?php
 if(isset($submenu_ids)){
	 
 	foreach($submenu_ids as $id){ ?>
 
 <li><a href="#<?php echo $id; ?>" data-toggle="tab" aria-expanded="false"><?php echo get_submenu_name($id); ?></a></li>
 
 
 <?php }
 }
 ?>       
 </ul> 
 
 <div id="my-tab-content " class="tab-content product_tabs_contents">  
 	<div class="tab-pane active" id="all">
          <?php 
		  /* this block for fetch all products of main menu cat*/
			$required_submenu_ids = implode("," , $submenu_ids);
			$query_for_product_data_fetch =mysql_query("select * from ".$product_table_name." where cat_id in ($required_submenu_ids) and show_status = 1 LIMIT 15");
			if(mysql_num_rows($query_for_product_data_fetch)>0) {
			?>
               
                <?php	
			while($row = mysql_fetch_array($query_for_product_data_fetch)){ ?>
					<div class="item_list_container product_items" style="overflow:hidden" data-id="<?php echo $row['p_id'] ?>">
                   	 <div class="list-group">
                            <a class="list-group-item" onClick="return false;">
                                <div class="img-rounded" style="background:url('<?php echo "../".$row['img_path']; ?>'); background-repeat: no-repeat;background-size: 60px 60px;" onClick="product_popup(<?php echo $row['p_id'] ?>,<?php echo "'" .$product_table_name."'" ?>)">
                                </div>
                                <?php if($row['sell_price']>0){ ?><div class="discount_lable" ><p>Save<br>Rs <?php echo sprintf('%.2f',($row['mrp']*($row['sell_price']/100)))?> /-</p></div> <?php } ?>
                                
                                <h4 class="list-group-item-heading" ><?php echo ucfirst(substr($row['name'], 0, 23))?></h4>
                                <p class="p_desc"> <span><i>Qty : <?php echo $row['qty']  ?></i></span> </p>
                                <div class="operations">
                                <p class="p_price"><span class="fa fa-inr" style="font-weight:700; font-size:12px; padding-right:10px"> <?php echo ($row['mrp']-($row['mrp']*($row['sell_price']/100)))?>/-</span><?php if($row['sell_price']>0){ ?> <span style="font-size:10px; font-weight:700;   text-decoration: line-through;">Rs:<?php echo $row['mrp']?> /-</span><?php } ?></p>
                                
                               <?php if(get_product_avail($row['p_id'],$product_table_name)>0){ ?>
                                <div class="quantity cart_operations_block_<?php echo $row['p_id']?>">
                                	
                                 <button class="btn btn-primary btn-xs remove_from_cart" style="padding: 3px 5px;"  onClick="remove_from_cart(<?php echo $row['p_id']?>,<?php echo "'" .$product_table_name."'" ?>); return false;"> <script>set_disabled_attr_for_cart_remove_button(<?php echo $row['p_id']?>,<?php echo "'" .$product_table_name."'" ?>);</script><span class="glyphicon glyphicon-minus-sign" style="font-size:14px"></span> </button>
                                 <span class="label label-default item_cart_quantity_status" ><script>set_this_quantity_lable(<?php echo $row['p_id']?>,<?php echo "'".$product_table_name."'" ?>);</script></span>
                                 <button class="btn btn-primary btn-xs add_to_cart" style="padding: 3px 5px;" onClick="add_to_cart(<?php echo $row['p_id']?>,<?php echo "'" .$product_table_name."'" ?>); return false;"><span class="glyphicon glyphicon-plus-sign" style="font-size:14px"></span> </button>
                                 
                                 </div>
                                 <?php } else { ?>
                                	<div class="quantity cart_operations_block_<?php echo $row['p_id']?>">
                                    	<span style="font-weight:400; color:#FF0004">Out of Stock</span>
                                    </div>
								<?php } ?>
                                </div>
                              </a>
                              
                         </div>
					</div> 
				
			<?php }
			} else { ?>
	 					
             <div class="item_list_container" >
               <div class="list-group">
                 <a href="#" class="list-group-item">
                 <h4 class="list-group-item-heading" style="text-align:center" >No Products under this Menu <br> Please Try Again Later</h4> 
                 </a>
               </div>
            </div> 
			<?php } ?>
                       
     </div>

 <?php 
 
  foreach($submenu_ids as $id){
 
 ?>
      
     <div class="tab-pane" id="<?php echo $id; ?>">
                 <?php 
		  /* this block for fetch products of submenu*/
			
			$query_for_product_data_fetch =mysql_query("select * from ".$product_table_name." where cat_id in ($id) and show_status = 1 LIMIT 15");
			if(mysql_num_rows($query_for_product_data_fetch)>0) {
				?>
                
                <?php
				
			while($row = mysql_fetch_array($query_for_product_data_fetch)){ ?>
					
                   <div class="item_list_container product_items" style="overflow:hidden" data-id="<?php echo $row['p_id'] ?>">
                   	 <div class="list-group">
                            <a class="list-group-item" onClick="return false;">
                                <div class="img-rounded" style="background:url('<?php echo "../".$row['img_path']; ?>'); background-repeat: no-repeat;background-size: 60px 60px;" onClick="product_popup(<?php echo $row['p_id'] ?>,<?php echo "'" .$product_table_name."'" ?>)">
                                </div>
                                <?php if($row['sell_price']>0){ ?><div class="discount_lable" ><p>Save<br>Rs <?php echo sprintf('%.2f',($row['mrp']*($row['sell_price']/100)))?> /-</p></div> <?php } ?>
                                
                                <h4 class="list-group-item-heading" ><?php echo ucfirst(substr($row['name'], 0, 20))?></h4>
                                <p class="p_desc"> <span><i>Qty : <?php echo $row['qty']  ?></i></span> </p>
                                <div class="operations">
                                <p class="p_price"><span class="fa fa-inr" style="font-weight:700; font-size:12px; padding-right:10px"> <?php echo ($row['mrp']-($row['mrp']*($row['sell_price']/100)))?>/-</span><?php if($row['sell_price']>0){ ?> <span style="font-size:10px; font-weight:700;   text-decoration: line-through;">Rs:<?php echo $row['mrp']?> /-</span><?php } ?></p>
                                
                               <?php if(get_product_avail($row['p_id'],$product_table_name)>0){ ?>
                                <div class="quantity cart_operations_block_<?php echo $row['p_id']?>">
                                	
                                 <button class="btn btn-primary btn-xs remove_from_cart"  onClick="remove_from_cart(<?php echo $row['p_id']?>,<?php echo "'" .$product_table_name."'" ?>); return false;"> <script>set_disabled_attr_for_cart_remove_button(<?php echo $row['p_id']?>,<?php echo "'" .$product_table_name."'" ?>);</script><span class="glyphicon glyphicon-minus-sign" style="font-size:14px"></span> </button>
                                 <span class="label label-default item_cart_quantity_status" ><script>set_this_quantity_lable(<?php echo $row['p_id']?>,<?php echo "'".$product_table_name."'" ?>);</script></span>
                                 <button class="btn btn-primary btn-xs add_to_cart" onClick="add_to_cart(<?php echo $row['p_id']?>,<?php echo "'" .$product_table_name."'" ?>); return false;"><span class="glyphicon glyphicon-plus-sign" style="font-size:14px"></span> </button>
                                 
                                 </div>
                                 <?php } else { ?>
                                	<div class="quantity cart_operations_block_<?php echo $row['p_id']?>">
                                    	<span style="font-weight:400; color:#FF0004">Out of Stock</span>
                                    </div>
								<?php } ?>
                                </div>
                              </a>
                              
                         </div>
					</div> 
				
			<?php }
			} else { ?>
	 					
             <div class="item_list_container" >
               <div class="list-group">
                 <a href="#" class="list-group-item">
                 <h4 class="list-group-item-heading" style="text-align:center" >No Products under this Menu <br> Please Try Again Later</h4>
                 
                 </a>
               </div>
            </div> 
	 <?php  }
		  ?>      
     </div>

 
 
 <?php }?>
  </div>
  <div class="load_more_button">
  <button class="btn btn-default btn-block load_more_btn">Load More </button>
  </div>
  <div class="adjucement_bottom" style="min-height:55px; width:100%">

		  </div> 
   
         
<?php } else { ?>

<div class="item_list_container" >
   <div class="list-group">
   	 <a href="#" class="list-group-item">
     <h4 class="list-group-item-heading" style="text-align:center" >No Products under this Menu <br> Please Try Again Later</h4>
     </a>
   </div>
</div> 
<?php } ?>
<?php
if(isset($submenu_ids)){
?>
<script>

$(".load_more_btn").click(function(e){
		e.preventDefault();
	  $(this).prop('disabled',true);
	  $('.load_more_btn').html('Loading ...');
	  var main_menu_id = $("#tabs").attr('data-mainmenuid');
	  //alert(main_menu_id);
      var currentId = $(".product_tabs_contents>.active").attr('id');
	  var last_product_Id = $(".product_tabs_contents>.active .product_items:last").attr('data-id');
		   $.ajax({
			url:"phpfiles/load_more_products.php?activeid="+currentId+"&main_menu_id="+main_menu_id+"&last_product_id="+last_product_Id+"&product_type=<?php echo $product_table_name?>",
			dataType:"text",
        	type:"GET",
			async:true,
			
			success: function(data){
			if(data.trim() == "")
			{
				$('.load_more_btn').html('No More Products');
				$('.load_more_btn').prop('disabled',true);
				
				}
			$('#'+currentId).append(data);
			
			},
			complete: function(){
				$('.load_more_btn').prop('disabled',false);
				$('.load_more_btn').html('Load More');
				}
			
			
			
		}); 		
});









var timer;
$(window).scroll(function () {
    clearTimeout(timer);
    timer = setTimeout(function() {
    var window_height = $(window).height();
    var window_scroll = $(window).scrollTop();
    var document_height = $(document).height();
		if (window_height + window_scroll == document_height) {
           
		  $(".load_more_btn").trigger('click');
        }
    }, 50);
});

/*
var excute_task = 0;
$(window).scroll(function(){
	
   if(excute_task == 0) {
	
	var window_height = $(window).height();
    var window_scroll = $(window).scrollTop();
    var document_height = $(document).height();
	// window_height + window_scroll > document_height-10 window_scroll == (document_height - window_height) 
	
    if(window_height + window_scroll == document_height ){
		excute_task = 1;  
			
	  var main_menu_id = $("#tabs").attr('data-mainmenuid');
	  //alert(main_menu_id);
      var currentId = $(".product_tabs_contents>.active").attr('id');
	  var last_product_Id = $(".product_tabs_contents>.active>.product_items:last-child").attr('data-id');
	  
	  //alert(last_product_Id);
	  $.ajax({
			url:"phpfiles/load_more_products.php?activeid="+currentId+"&main_menu_id="+main_menu_id+"&last_product_id="+last_product_Id,
			dataType:"text",
        	type:"GET",
			async:true,
			
			success: function(data){
			
			$('#'+currentId).append(data);
			
			},
			complete: excute_task=1,
			
		});
		

		
    } 
}
});*/ 
$(".product_tabs_contents").on("swipeleft",function(){
var swiped = $(this).find(".active").next().attr('id');
if(swiped){
$(".product_tabs_contents").children().removeClass("active");
//$(".menu-tabs").children().removeClass("active");
//$(".product_tabs_contents").find("#"+swiped).addClass("active");
$(".menu-tabs li ").find('a[href="#'+swiped+'"]').trigger('click');

} 
});
$(".product_tabs_contents").on("swiperight",function(){
var swiped = $(this).find(".active").prev().attr('id');
if(swiped){
$(".product_tabs_contents").children().removeClass("active");
//$(".menu-tabs").children().removeClass("active");
//$(".product_tabs_contents").find("#"+swiped).addClass("active");
$(".menu-tabs li ").find('a[href="#'+swiped+'"]').trigger('click');

} 
});

</script>

<?php

}
?>
