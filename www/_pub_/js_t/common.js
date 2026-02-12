var ui = {
	init: function(){
		ui.subMenu();
		ui.gotoTop();
		ui.mobileMenu();
		ui.snb();
		ui.tabMenu();
	},
	subMenu: function(idx,idx2){
		var gnbmenu = $('.gnb>li').eq(idx);
		var gnbmenu2 = gnbmenu.find('.menu_wrap > .submenu > li').eq(idx2);
		var menu = $('.snb > li:eq(1)').find('.submenu > li').eq(idx);
		var menu2 = $('.snb > li:eq(2)').find('.submenu > li').eq(idx2);
		var menuTxt = menu.find('a').text();
		var menu2Txt = menu2.find('a').text();
		gnbmenu.addClass('active');
		gnbmenu2.addClass('active');
		menu.addClass('active');
		menu2.addClass('active');
		menu.parents('.menu').find('.toggle_btn').text(menuTxt);
		menu2.parents('.menu').find('.toggle_btn').text(menu2Txt);
		//gnbmenu.find('.submenu').addClass('menu_open').show();
	},
	gotoTop: function(){
		$('.btn_top').on('click',function(){
			$('html, body').animate({scrollTop : 0}, 400);
			return false;
		});
	},
	mobileMenu: function(){
		$('.header .btn_menu').on('click', function(e){
			e.preventDefault();
			if($('.gnb_wrap').is('.menu_open')){
				$('html').css('overflow-y','auto');
				$('.gnb_wrap').removeClass('menu_open');
			}else{
				$('html').css('overflow-y','hidden');
				$('.gnb_wrap').addClass('menu_open');
			}
		});
		
		$('.header .btn_close').on('click', function(e){
			e.preventDefault();
			$('html').css('overflow-y','auto');
			$('.gnb_wrap').removeClass('menu_open');
		});
		
		$('.header .gnb a').on('click',function(e){
			if($(window).width() < 1025 && $(this).is('.menu')){
				e.preventDefault();
			}
			var menu = $(this).next('.menu_wrap');
			if( menu.is('.menu_open') ){
				menu.stop().slideUp(300).removeClass('menu_open');
				$(this).parents('li').removeClass('active');
			}else{
				menu.stop().slideDown(300).addClass('menu_open');
				$(this).parents('li').addClass('active');
			}
		});
	},
	snb: function(){
		$('.snb .toggle_btn').each(function(){
			$(this).on('click', function(){
				if($(this).parents('.menu').is('.open')){
					$(this).parents('.menu').removeClass('open');
				}else{
					$(this).parents('.menu').addClass('open');
				}
			});
		});
	},
	tabMenu: function(){
		$('.tab_wrap .tabmenu a').on('click', function(){
			var tab = $(this).parents('.tab_wrap').find('.tab_container');
			var idx = $(this).parents('li').index();
			var tabCont = tab.children('.tab_content');
			
			$(this).parents('.tabmenu').find('li').removeClass('active');
			$(this).parents('li').addClass('active');
			tabCont.removeClass('active').eq(idx).addClass('active');
		});
	}
}

var popup = {
	init: function(){
		popup.show();
		popup.hide();
		popup.bgClick();
	},
	show: function(target){
		var $pop = $('#' + target);
		$pop.show();
		var nowScrollTop = $('body').scrollTop();
		$('body').css('overflow','hidden');
		$('body').scrollTop(nowScrollTop);
	},
	hide: function(target){
		if(typeof target == 'object'){
			$(target).parents('.popup').hide();
		}else{
			var $pop = $('#' + target);
			$pop.hide();
		}
		var nowScrollTop = $('body').scrollTop();
		$('body').scrollTop(nowScrollTop);
		$('body').css('overflow','auto');
	},
	bgClick: function(){
		$('.popup').on('click',function(e){
			if (e.target !== this)
				return;

			$(this).hide();
			$('body').css('overflow','auto');
		});
	}
}

$(document).ready(function(){
	ui.init();
	popup.init();
});

