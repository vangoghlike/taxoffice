$(function() {
			// 조세뉴스는 적용이 느리므로 불러온뒤 슬라이더를 다시 부릅니다.
			

			var slider3_1 = $('.i_slide');  	
			slider3_1.addClass('i_slide');
			
			var slickOptions3 = { 		
				slide: '.item',	
				slidesToShow : 1.6,
				slidesToScroll : 1,
				arrows: false,
				dots: false,
				infinite : false,
			};

			if($(window).width() < 767) { 			
				slider3_1.not('.slick-initialized').slick(slickOptions3);

				var i_slide_ht = $("#i_inside_contents .slick-track").height(); 
				$(".more.mo").css("height", i_slide_ht + 'px');
				console.log("??");

			}else{
				slider3_1.filter('.slick-initialized').slick('unslick');	 			
						
			} 
			// 조세뉴스는 적용이 느리므로 불러온뒤 슬라이더를 다시 부릅니다.


});