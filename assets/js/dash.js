(function($) {
    "use strict"; /* Start of use strict*/
	
	/*Login*/
	if($('#personal-profile').is(':checked')) { 
		$(".signup-business").hide();
		$(".bs-benefits").hide();
		$(".signup-personal").show();
		$(".ps-benefits").show();
	}else{
		$(".signup-business").show();
		$(".bs-benefits").show();
		$(".signup-personal").hide();
		$(".ps-benefits").hide();
	}
	$(".profile input").click(function(){
		if($('#personal-profile').is(':checked')) { 
			$(".signup-business").hide();
			$(".bs-benefits").hide();
			$(".signup-personal").show();
			$(".ps-benefits").show();
		}else{
			$(".signup-business").show();
			$(".bs-benefits").show();
			$(".signup-personal").hide();
			$(".ps-benefits").hide();
		}
	});
	
	/*Sidemenu*/
	/*$('#simple-menu').sidr({
		name: 'sidr-main',
        timing: 'ease-in-out',
        speed: 500,
		side: 'right',
		source: '#pp-menu,#sidemenu',
		renaming: true
     });*/
	/*Submenu*/

		if($(window).width() <= 480) { 
			$("#leftpanel").attr("aria-expanded","false").hide();
		}else{
			$("#leftpanel").attr("aria-expanded","true").show();
		}
	
	
	var currurl = location.pathname;
	 $('#sidenav a[href="' + currurl + '"]').parent().addClass('current').addClass('active');
	var sidemenucid = $('.current.is-submenu-item').parent().attr("id");
	console.log("ID "+currurl+"-"+sidemenucid);
	$("li[aria-controls='"+sidemenucid+"']").attr("aria-expanded","true");
	$("#"+sidemenucid).show();
	
	//Simple Selling
	if (currurl.toLocaleLowerCase().indexOf("simpleselling")!=-1){		
		$('#sidenav #sm_050_22').attr("aria-expanded","true");
		$('#sidenav #sm_050_22 > ul').show();
	}

  /*Demo tabs*/
  $("#countryTabs" ).tabs();
  $("#methodsKETabs").tabs();
   $("#methodsUGTabs").tabs();
    $("#methodsTZTabs").tabs();
	 $("#methodsRWTabs").tabs();
	 $("#methodsMWTabs").tabs();
	
})(jQuery); // End of use strict

$( document ).ajaxComplete(function() {
  $('#simple-menu').sidr({
		name: 'sidr-main',
        timing: 'ease-in-out',
        speed: 500,
		side: 'right',
		source: '#sidr',
		renaming: true
     });
	 $('.sidr-class-is-submenu-item a').click(function(){
		  $(this).next('.sidr-class-menu').toggle();
	  });
	  $('.sidr-class-is-dropdown-submenu-parent > a').attr("href","#");
	  
	   /*Submenu*/
		var currurl = location.pathname;
		 $('#sidenav a[href="' + currurl + '"]').parent().addClass('current').addClass('active');
		var sidemenucid = $('.current.is-submenu-item').parent().attr("id");
		console.log("ID "+currurl+"-"+sidemenucid);
		$("li[aria-controls='"+sidemenucid+"']").attr("aria-expanded","true");
		$("ul#"+sidemenucid).css("display","block");
		$("ul#"+sidemenucid).show();
		
		//Simple Selling
		if (currurl.toLocaleLowerCase().indexOf("simpleselling")!=-1){		
			$('#sidenav #sm_050_22').attr("aria-expanded","true");
			$('#sidenav #sm_050_22 > ul').show();
		}
	  
	  $('.pp-preloader').delay(400).fadeOut(800);
	  
	 
	  
});
