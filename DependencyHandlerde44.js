﻿(function($){$('.getbtn').click(function(){if($('.pp-cright').hasClass("activeview")){$('.pp-cright').slideUp();$('.pp-cright').removeClass("activeview")}else{$('.pp-cright').slideDown();$('.pp-cright').addClass("activeview")}});})(jQuery);
;;;(function($){$('.pp-specialoffers .owl-carousel').owlCarousel({loop:true,margin:20,responsiveClass:true,navText:["<i class='pe-7s-angle-left'></i>","<i class='pe-7s-angle-right'></i>"],responsive:{0:{items:1,nav:true},600:{items:4,nav:false},1000:{items:5,nav:true,loop:false}}});$('.mobmenu').click(function(){var linkID=$(this).attr("id");$('div.'+linkID).toggle(800);});})(jQuery);
;;;