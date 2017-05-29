<?php
session_start();
require("phpincludes/config.inc");
require("phpincludes/phpfunctions.inc");
dbConnect();
?>
<style>
#banner_slide .owl-controls .owl-nav {
	margin:0px;	
	}
#banner_slide .owl-controls .owl-dots .owl-dot span {
	width:7px;
	height:7px;
	}
</style>
<div id="banner_slide" class="homepage_top_slider">
   <?php
   $query = mysql_query("select * from homesliders ORDER BY `id` DESC");
   while($row = mysql_fetch_array($query)){
	  ?>
   	<div class="banners" style="width:100%;">
    	<div class="col-xs-12 col-sm-12 col-lg-12 col-md-12" style="padding:0px" onclick="product_popup(<?php echo $row['value'] ?>,<?php echo "'".$row['product_type']."'" ?>)">
        	<img src="../img/homepageslider/<?php echo $row['img_path']; ?>" width="100%"/>
        </div>
    </div>
    
    <?php }?>
   
 
</div>
<!--
<div class="news_banner" style=" min-height:20px; background-color:#FFFFFF; margin:0px 0px">
<marquee>This A New feed To scroll Continously</marquee>
 
</div>-->
<div class="row" style="margin-top:0px; padding:0px 0px 0px 0px; background-color:#FFFFFF;margin-left:0px; margin-right:0px">
    <!-- <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12" style="padding-left:0px; padding-right:0px; margin-top:5px" onClick="load_main_cat_data('phpfiles/main_cat_data.php',7,'Grocery');">
        <img src="../img/homepgeimages/grocery_banner.jpg" width="100%"/>
      
    </div> 
    <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12" style="padding-left:0px; padding-right:0px; margin-top:0px">
        <a href="AyyyappaGrocery.apk" download ><img src="../img/homepgeimages/appinstallbanner.png" width="100%"/></a>
      
    </div> -->
    

</div>
<div class="row" style="margin-top:5px; padding:10px 10px; background-color:#ECEFF1; margin-left:0px; margin-right:0px">
<div class="coursel_heading" style="padding:0px 20px 0px 0px">
	<h5>Grocery <button class="btn btn-sm btn-success" style="float:right; padding: 4px 6px;" onClick="load_main_cat_data('phpfiles/main_cat_data.php',7,'Grocery');">More</button></h5>
</div>
<div class="coursel_for_main_cat">
	<?php 
	$query = mysql_query("select * from main_menu where super_menu_id = 7");
	while($row = mysql_fetch_array($query))
	{
	?>
    <div class="coursel_item" >
    	<div class="col-xs-4 col-sm-4 col-md-4" style="min-height:120px; min-width:100px; background-color:#FFFFFF; padding:4px 4px 4px 4px; margin:0px ">
        	<div class="image" onClick="load_product_page_data('phpfiles/product_data.php',<?php echo $row['main_menu_id']; ?>,' <?php echo $row['name']; ?>',7);">
            	<img src="../imgs/cat_imgs/main_cat_imgs/<?php echo $row['image'] ?>" >
            </div>
            <div style="text-align:center">
            	<h6 style="text-transform:uppercase; margin-bottom:0px; margin-top:2px; font-size:12px"><?php echo $row['name'] ?></h6>
                <span style="font-size:9px"><?php echo $row['caption'] ?> </span>
                <h6 style="color:#4CAF50; margin-top:3px" onClick="load_product_page_data('phpfiles/product_data.php',<?php echo $row['main_menu_id']; ?>,' <?php echo $row['name']; ?>',7);">Shop Now</h6>
            </div>
        </div>
    </div>
   
<?php }?>
</div>
	
</div>
<div class="col-xs-12 col-sm-12 col-lg-12 col-md-12" style="padding-left:0px; padding-right:0px; margin-top:0px; padding-bottom:50px">
       <img src="../img/accptbanner.jpg" width="100%"/>
      
    </div>
<script>
$("#banner_slide").owlCarousel({
				animateOut: 'slideOutDown',
    			animateIn: 'flipInX',
				items:1,
				dots:true,
				singleItem:true,
				autoplay:true,
    			autoplayTimeout:5000,
				loop:true,
			});

$('.coursel_for_main_cat').owlCarousel({
    loop:true,
   //margin:10,
   dots:false,
   autoplay:true,
    autoplayTimeout:5000,
    //nav:true,
	responsive:{
        0:{
            items:3
        },
        400:{
            items:4
        },
       
    }
    
})
</script>
