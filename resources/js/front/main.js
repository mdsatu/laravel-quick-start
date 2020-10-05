$(document).ready(function(){

	// Scroll to Up
	$.scrollUp();

	// Mobile Menu Trigger
	$(document).on('click', '.menu_trigger', function(){
		let status = $(this).data('open');

		if (status == "hide"){
			$(this).data('open', 'show');
			$('.mobile_menu').addClass('active_mobile_menu');
		}else{
			$(this).data('open', 'hide');
			$('.mobile_menu').removeClass('active_mobile_menu');
		}
	});
});