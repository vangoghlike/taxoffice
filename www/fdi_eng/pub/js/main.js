/*$(function(){
    $(window).resize(function(){
        location.reload();
    });
});*/

//common
$(function(){
	function header_move() {
		var window_wd = $(window).width();

		if (window_wd < 931) {
			$(".gnb .gnb_main>li").click(function(){
				$(this).toggleClass("on");
				$(this).find(".gnb_sub").stop().slideToggle();
			});

			$(".aside").show();
			$(".topbtn_new").hide();

			//scroll aside top_btn
			/*$(window).scroll(function(){
				let scroll_top = $(window).scrollTop();
				
				if (scroll_top >= 0) {
					$(".topbtn_new").hide();
					$(".aside").show();
				} else {
					$(".topbtn_new").hide();
					(".aside").show();
				}
			});*/

		} else {
			$(".gnb").show();

			$(".gnb_main .gnb_menu").hover(function(){
				$(this).children(".gnb_sub").stop().fadeIn(500);
			},function(){
				$(this).children(".gnb_sub").stop().fadeOut(100);
			});

			//scroll aside top_btn
			$(window).scroll(function(){
				let scroll_top = $(window).scrollTop();

				if (scroll_top > 100) {
					$(".aside, .topbtn_new").fadeIn();
				} else {
					$(".aside, .topbtn_new").fadeOut();
				}
			});
		}
	}

	header_move();

    //resize
    $(window).resize(function(){
		header_move();
    });

    //language on
    $(".lang a").eq(1).addClass("on");

    $(".lang a").click(function(){
        $(".lang a").removeClass("on");
        $(this).addClass("on");
    });

    //top_btn
    $(".topbtn_new").click(function() {
        $('html, body').animate({scrollTop:0}, '300');
    });

    //mobile ham menu
    $(".ham").click(function() {
        $(this).toggleClass("on");
		$('.member_wrap, .lang.mo').toggleClass("on2");
		

        if ($(this).hasClass("on")) {
            $(".gnb, .search_wrap, .dimmed").fadeIn();
			$('.sbox_1230').css("display","none");
        } else {
            $(".gnb, .search_wrap, .dimmed").fadeOut();
			$('.sbox_1230').css("display","block");
        }
    });

    $(".dimmed").click(function() {
        $(".ham").removeClass("on");
        $(".gnb, .search_wrap, .dimmed").fadeOut();
    });

	// fdi control
	$('.fdi_inner_link').on('click', function(){
		$(this).closest('h3').find('.fdi_inner_link').removeClass('on');
		$(this).addClass('on');

		if ( $(this).hasClass('eng') ) {
			$('.workList.sp_wl.eng').show();
			$('.workList.sp_wl.ch').hide();
		} else if ( $(this).hasClass('ch') ) {
			$('.workList.sp_wl.ch').show();
			$('.workList.sp_wl.eng').hide();
		}
	});
});

//main
$(function(){
  /*  //v_quick slide on
   /* $(".v_quick .q_slide>a").eq(3).addClass("on");
    $(".v_quick .q_slide>a").click(function(){
        $(".v_quick .q_slide>a").removeClass("on");
        $(this).addClass("on");
    });

    //helper slide on
    $(window).on('load resize', function() { 	
		
        if ($(window).width() > 930) { 

            $(".i_slide a").click(function(){
                $(".i_slide a").removeClass("on");
                $(this).addClass("on");
            });
        }
    });
*/
    
    //info tab menu on
    $(".info .info_tab li").eq(0).addClass("on");
    $(".info .info_tab li").click(function(){
        $(".info .info_tab li").removeClass("on");
        $(this).addClass("on");
    });
});

//sub
$(function(){
    //sub tab menu on
   /* $(".sub_nav li").eq(0).addClass("on");*/

    $(".sub_nav li").click(function(){
        $(".sub_nav li").removeClass("on");
        $(this).addClass("on");
    });
});


$(document).ready(function(){
		$('.family_box211112').click(function(){
		$(this).siblings('.family_sbox').slideToggle(500);
		$('.family_box211112').toggleClass('on');
	});
	$('.mo_family_box').click(function(){
		$(this).siblings('.family_sbox').slideToggle(500);
		$('.mo_family_box').toggleClass('on');
	});

	/*$('.lang.mo').click(function(){
		$('.lang_mo_box').slideToggle(300);
		$('.lang.mo').toggleClass('on');
	});*/
})

$(document).ready(function(){
			$('.foot_family_box').click(function(){
				$('.foot_family_inner').slideToggle(500);
				$('.foot_family_top img').toggleClass('on');
			});

		});