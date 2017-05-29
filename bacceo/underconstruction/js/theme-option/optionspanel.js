jQuery(document).ready(function($) {
	
	$('.options_toggle').bind('click', function() {
		if($('#panel').css('left') == '0px'){
			$('#panel').stop(false, true).animate({left:'-230px'}, 400, 'easeOutExpo');
		}else {
			$('#panel').stop(false, true).animate({left:'0px'}, 400, 'easeOutExpo');
		}	
	});

	
	$('#accent_color').ColorPicker({
		onSubmit: function(hsb, hex, rgb, el) {
			$(el).val(hex);
			$(el).ColorPickerHide();
		},
		onBeforeShow: function () {
			$(this).ColorPickerSetColor(this.value);
		},
		onChange: function (hsb, hex, rgb) {
			$('#accent_color').val(hex);
			$('#accent_color').css('backgroundColor', '#' + hex);
			accentColorUpdate(hex);
		}
	})
	.bind('keyup', function(){
		$(this).ColorPickerSetColor(this.value);
	});

	
function accentColorUpdate(hex){

	hex = '#'+hex;

	$('#custom_styles').html('<style>'+
		'a, a:hover, .color, .validation, .checkout:hover .cart, .cart:hover, .product-title h5 a:hover, .register, .not-empty { color:'+ hex +'; }' +
		'.default-bg, .navbar-brand, .navbar-brand:hover, .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus, .heading h4, .contact, .head span, a.contact-close, .btn-primary, .btn-primary:hover, .btn-primary.disabled, .btn-primary[disabled], fieldset[disabled] .btn-primary, .btn-primary.disabled:hover, .btn-primary[disabled]:hover, fieldset[disabled] .btn-primary:hover, .btn-primary.disabled:focus, .btn-primary[disabled]:focus, fieldset[disabled] .btn-primary:focus, .btn-primary.disabled:active, .btn-primary[disabled]:active, fieldset[disabled] .btn-primary:active, .btn-primary.disabled.active, .btn-primary[disabled].active, fieldset[disabled] .btn-primary.active , option:hover, a.advanced-close, .checkout, #toTopHover, span.price:hover, span.product-label, .buy span, .pagination > .active > a, .pagination > .active > span, .nav-tabs > li > a:hover, span.price-lg, .checkout:hover .register, .remove-cart:hover, .cart-bottom, .slidyContainer .movePrev:hover, .slidyContainer .moveNext:hover { background-color:'+ hex +';}' +
		'.navbar-nav > li > a:hover, .navbar-nav > li > a:focus,  .navbar-nav > .active > a, .navbar-nav > .active > a:hover, .navbar-nav > .active > a:focus,  .form-control:focus, fieldset:focus, textarea:focus, select:focus, input[type="text"]:focus, input[type="password"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="time"]:focus, input[type="week"]:focus, input[type="number"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="search"]:focus, input[type="tel"]:focus, input[type="color"]:focus, .uneditable-input:focus, .checkout:hover, .contact:hover, .sort-item select:focus, article blockquote, .media-object:hover, .cart-qty:focus, .slidyContainer .slidySlides figcaption { border-color:'+ hex +';}'+
		'</style>');
}

function bodybgColorUpdate(hex){
	$('body').css('background', '#'+hex);
}
	
});