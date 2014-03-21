jQuery(document).ready(function($) {
  var menu = $('#navigation-mobile'), //menu css class
		body = $('body'),
		container = $('#container'), //container css class
		push = $('.push'), //css class to add menu capability
		siteOverlay = $('.site-overlay'), //site overlay
		menuClass = "menu-left menu-open", //menu position & menu open class
		menuActiveClass = "menu-active", //css class to toggle site overlay
		containerClass = "container-push", //container open class
		pushClass = "push-push", //css class to add menu capability
		menuBtn = $('.menu-btn, .menu a'), //css classes to toggle the menu
		menuSpeed = 200, //jQuery fallback menu speed
		menuWidth = menu.width() + "px"; //jQuery fallback menu width
    
  function openmenuFallback(){
		body.addClass(menuActiveClass);
		menu.animate({left: "0px"}, menuSpeed);
		container.animate({left: menuWidth}, menuSpeed);
		push.animate({left: menuWidth}, menuSpeed); //css class to add menu capability
    siteOverlay.css({left:menuWidth});
  }

	function closemenuFallback(){
		body.removeClass(menuActiveClass);
		menu.animate({left: "-" + menuWidth}, menuSpeed);
		container.animate({left: "0px"}, menuSpeed);
		push.animate({left: "0px"}, menuSpeed); //css class to add menu capability
	}
		//jQuery fallback
		menu.css({left: "-" + menuWidth}); //hide menu by default
    console.log(menuWidth);
		container.css({"overflow-x": "hidden"}); //fixes IE scrollbar issue

		//keep track of menu state (open/close)
		var state = true;

		//toggle menu
		menuBtn.click(function() {
			if (state) {
				openmenuFallback();
				state = false;
			} else {
				closemenuFallback();
				state = true;
			}
		});

		//close menu when clicking site overlay
		siteOverlay.click(function(){ 
			if (state) {
				openmenuFallback();
				state = false;
			} else {
				closemenuFallback();
				state = true;
			}
		});
});