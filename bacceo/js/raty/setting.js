$(function() {
				$('#start').raty({
				    start: function() {
				        return $(this).attr('data-rating');
				    }
				});
});