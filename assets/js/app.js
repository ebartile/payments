$(document).foundation();
(function($) {
    "use strict"; 

    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });
	
	checkScroll();
	$(window).scroll(function() {    
		checkScroll();
	});
	
	/*Menu*/
	$('.top-bar-left .menu li.active').parents("li").addClass('is-current')
	
	/*Mobile Menu*/
	 $('#simple-menu').sidr({
		name: 'sidr-main',
        timing: 'ease-in-out',
        speed: 500,
		side: 'right',
		source: '#pp-menu',
		renaming: true
      });
	  $(window ).resize(function () {
      		$.sidr('close', 'sidr');
      });
	  $('.sidr-class-is-submenu-item a').click(function(){
		  $(this).next('.sidr-class-menu').toggle();
	  });
	  $('.sidr-class-is-dropdown-submenu-parent > a').attr("href","#");
	
	/*Animate Tabs*/
	$('.tabs').on('change.zf.tabs', function() {
		  var activeTab =  $(this).find('.is-active a').attr('href');
		  Foundation.Motion.animateIn($(''+activeTab), 'fade-in');
	  });	
	
	/*Functions*/
	function checkScroll(){
	  var scroll = $(window).scrollTop();
		if (scroll >= 50) {
			$("header.clear").removeClass("plain");
			$("header.clear #logo img").attr("src","/images/logo.png");
		} else {
			$("header.clear").addClass("plain");
			$("header.clear #logo img").attr("src","/images/logo-wh.png");
		}
  }
  
})(jQuery);

	