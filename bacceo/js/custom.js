

	//alert("hiee");
	/*
	Dropdown
	=========================== */
	$('ul li.dropdown').hover(function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
		}, function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
	});
	
	/*
	Mobile navigation
	=========================== */
    //build dropdown
    $("<select />").appendTo(".navbar .nav-collapse .nav");
 
    //Default option "Voir les rubriques…"
    $("<option />", {
       "selected": "selected",
       "value"   : "",
       "text"    : "Select menu"
    }).appendTo(".navbar .nav-collapse .nav select"); 
 
    //Menu items
    $(".navbar .nav-collapse .nav li a").each(function() {
        var el = $(this);
        $("<option />", {
            "value"   : el.attr("href"),
            "text"    : el.text()
        }).appendTo(".navbar .nav-collapse .nav select");
    });
 
    //Link
    $(".navbar .nav-collapse .nav select").change(function() {
        window.location = $(this).find("option:selected").val();
    });

	/*
	Advanced search
	=========================== */	
	$("#advanced").hide();

	$('.advanced').click(function(){
		$("#advanced").slideToggle();
		return false; 
	});
		
	$('.advanced-close').click(function(){
		$("#advanced").slideToggle("normal")
	});
	
	/*
	Contact
	=========================== */	
	$("#dropdown-contact").hide();

	$('.contact').click(function(){
		$("#dropdown-contact").slideToggle();
		return false; 
	});
		
	$('.contact-close').click(function(){
		$("#dropdown-contact").slideToggle("normal")
	});
		
	/*
	Hidden
	=========================== */		
	$(".frame-hover, .caption-bg").css({'opacity':'0','filter':'alpha(opacity=0)'});

	
	/*
	Social and wrapper-bg hover
	=========================== */
	$('.social-link, .wrapper-bg').hover(
		function() {
			$(this).find('.frame-hover').stop().fadeTo(900, 0.2);
			$(this).find('.social-icon').stop().fadeTo(900, 0.7);
		},
		function() {
			$(this).find('.frame-hover').stop().fadeTo(900, 0);
			$(this).find('.social-icon').stop().fadeTo(900, 1);
		}
	)

	/*
	Image caption hover
	=========================== */
	$('.wrapper-bg').hover(
		function() {
			$(this).find('.caption-bg').stop().fadeTo(900, 0.5);
			$(".buy", this).stop().animate({top:'50%'},{queue:false,duration:550});
		},
		function() {
			$(this).find('.caption-bg').stop().fadeTo(900, 0);
			$(".buy", this).stop().animate({top:'-50%'},{queue:false,duration:550});
		}
	);
	
