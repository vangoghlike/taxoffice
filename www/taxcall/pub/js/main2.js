$(function(){
    $(window).resize(function(){
        location.reload();
    });
});

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
			$(".top_btn").hide();
			
			//scroll aside top_btn
			$(window).scroll(function(){
				let scroll_top = $(window).scrollTop();
				
				if (scroll_top >= 0) {
					$(".top_btn").hide();
					$(".aside").show();
				} else {
					$(".top_btn").hide();
					(".aside").show();
				}
			});

		} else {
			$(".gnb").show();

			$(".menu_wrap").hover(function(){
				$(this).children(".gnb_sub").stop().slideDown(500);
			},function(){
				$(this).children(".gnb_sub").stop().slideUp();
			});

			//scroll aside top_btn
			$(window).scroll(function(){
				let scroll_top = $(window).scrollTop();

				if (scroll_top > 500) {
					$(".aside, .top_btn").fadeIn();
				} else {
					$(".aside, .top_btn").fadeOut();
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
    $(".lang a").eq(0).addClass("on");

    $(".lang a").click(function(){
        $(".lang a").removeClass("on");
        $(this).addClass("on");
    });

    //top_btn
    $(".top_btn").click(function() {
        $('html, body').animate({scrollTop:0}, '300');
    });

    //mobile ham menu
    $(".ham").click(function() {
        $(this).toggleClass("on");

        if ($(this).hasClass("on")) {
            $(".gnb, .search_wrap, .member_wrap, .dimmed").fadeIn();
        } else {
            $(".gnb, .search_wrap, .member_wrap, .dimmed").fadeOut();
        }
    });
});

//main
$(function(){
    //v_quick slide on
    $(".v_quick .q_slide>a").eq(3).addClass("on");
    $(".v_quick .q_slide>a").click(function(){
        $(".v_quick .q_slide>a").removeClass("on");
        $(this).addClass("on");
    });

    //helper slide on
    $(window).on('load resize', function() { 	
        if ($(window).width() > 930) { 
            $(".i_slide a").eq(0).addClass("on");

            $(".i_slide a").click(function(){
                $(".i_slide a").removeClass("on");
                $(this).addClass("on");
            });
        }
    });
    
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
    $(".sub_nav li").eq(0).addClass("on");

    $(".sub_nav li").click(function(){
        $(".sub_nav li").removeClass("on");
        $(this).addClass("on");
    });
});

