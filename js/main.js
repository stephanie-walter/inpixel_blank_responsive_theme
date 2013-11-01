jQuery(document).ready(function($) {

	// Make the menu keyboard accessible !!
	$(".main-menu a").focus(function() {
        $(this).parents("li").addClass("hover");
    	}).blur(function() {
        $(this).parents("li").removeClass("hover");
    });

	// Make the menu responsive 
 	$('body').addClass('js');

 	//  add .has-subnav to parents of .sub-menu
 	$('.sub-menu, .children').closest('li').addClass('has-subnav');

 	//  add the menu link to click
 	$('div.menu').prepend('<button type="button" class="menu-link navtoggle">Menu</button>');

 	// Keyboard menu
 	$(".menu-link ").focus(function() {
    	$(this).addClass('keyboardactive');       
    }); 	
	$(".menu > li:last-child a, .menu > ul > li:last-child a ").blur(function() {		
    	$(".menu-link ").removeClass('keyboardactive active');       
    }); 


 	//  The click function for the Responsive Menu
	$(".menu-link").click(function (e) {
		e.preventDefault();
		$(this).removeClass("keyboardactive");
		$(this).toggleClass("active");
    });

    

	// To enable sub-menus to be open
	var add_toggle_links = function() { 		
	 	if ($('.menu-link').is(":visible")){
	 		if ($(".toggle-link").length > 0){
	 		}
	 		else{
	 			$('.has-subnav > a').after('<span class="toggle-link"> Open submenu </span>');
	 			$('.toggle-link').click(function(e) {		
					var $this = $(this);
					$this.toggleClass('active').siblings('ul').toggleClass('active');
				});	
	 		}
	 	}
		else{
			$('.toggle-link').empty();
		}
    }

	add_toggle_links();

	$(window).bind("resize", add_toggle_links);

});