if( window.console == undefined ){ console = { log : function(){} }; }


$(function(){


		// 메인슬라이드
		$('.mainSlide ul').bxSlider({
			auto: true,
			mode:'fade',
			speed:1300,
			autoControls: true,
			onSlideAfter: function(){
				 setTimeout(function(){
					$('.mainSlide .bx-start').trigger('click');
				 },1000);
			  }
		});

		// 메인탭
		$('.tabTit ul li a').on('click',function(e){
			e.preventDefault();
			var idx = $(this).parent().index();
			$(this).parent().addClass('on').siblings().removeClass('on');
			$('.tabContent > div').eq(idx).show().siblings().hide();

		})

		// 언어
		$('.langList .tit').on('click',function(e){
			$('.langList ul').stop().slideToggle('fast');

		})


});


//서브GNB 활성화
function subNav(idx){
	$('.subNav ul li').eq(idx).addClass('on');
}
function joinsubNav(idx){
	$('.joinsubNav li').eq(idx).addClass('on');
}
