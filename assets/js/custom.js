// IF JS IS ENABLED, REMOVE 'no-js' AND ADD 'js' CLASS
jQuery('html').removeClass('no-js').addClass('js');

jQuery(document).ready(function($) {

	//FITVIDS
	$("body").fitVids();

	//RESPONSIVE MENU
	$('#mobile-nav').meanmenu();
	  
	//FORM VALIDATION
	if (jQuery().validate) { jQuery("#commentform").validate(); }	
});