
$(function(){

	if (typeof EventTarget !== "undefined") {
		let func = EventTarget.prototype.addEventListener;
		EventTarget.prototype.addEventListener = function (type, fn, capture) {
			this.func = func;
			if(typeof capture !== "boolean"){
				capture = capture || {};
				capture.passive = false;
			}
			this.func(type, fn, capture);
		};
	};

	//메인슬라이드
	var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
		loop: true,
		autoplay: 3000,
    });

	//비밀번호 탭
	$('.pwTab .top a').click(function(){
		var idx = $(this).index();
		$(this).addClass('on').siblings().removeClass('on');
		$('.pwTab .cont ul li').hide().eq(idx).show();
	})
	
	$(".seCst #select_box label").text("예약시간 선택하기");

	var select = $("select#color");
	
	select.change(function(){
		var select_name = $(this).children("option:selected").text();
		$(this).siblings("label").text(select_name);
	});

	//FAQ
	$('.faqList .qustion a').on('click',function(){
		$(this).parents('li').toggleClass('on');
		$(this).parent().siblings('.answer').slideToggle('fast');
		$(this).parents('li').siblings().removeClass('on').find('.answer').slideUp('fast');
	});

	//세무사선택
	$('.topInfo .selView .viewBtn').on('click',function(){
		if($(this).hasClass("open")){
			$(this).removeClass("open");
			$(this).addClass("close");
		}else if($(this).hasClass("close")){
			$(this).removeClass("close");
			$(this).addClass("open");
		}
		$(this).parent().parent().siblings('.viewInfo').slideToggle('fast');
		$(this).parent().parents('li').siblings().find('.viewInfo').slideUp('fast');
		$(this).parent().parents('li').siblings().find('.close').removeClass("close").addClass("open");
	});

	// 상담구분
	$('.selectBtns >div label').on('click', function(){
		if($(this).hasClass('call')){
			$('.option li.cst-se-hdMn').removeClass('block').addClass('none');
		}else if($(this).hasClass('mail')){
			$('.option li.cst-se-hdMn').removeClass('block').addClass('none');
		}else if($(this).hasClass('visit')){
			$('.option li.cst-se-hdMn').removeClass('none').addClass('block');
		}
	});
	var onVisit = function(){
		var bool = $('.selectBtns >div input#select3').prop('checked');
		if(bool == true){
			$('.option li.cst-se-hdMn').removeClass('none').addClass('block');
		}
	}
	setTimeout(onVisit, 100)


	$(document).on('click', '.act_logout', function() {
		if (confirm('로그아웃 하시겠습니까?')) location.href = '/common/member/logout.php?url=/m/';
		return false;
	});
	$(document).on('keyup', 'input[name=phone]', function() {
		$(this).val($(this).val().toTel());
	});

	$('.main_link_btn a, .mainLink ul li a, .gnb ul li a, .tax_tcs .option li a').on('click', function () {
		$('.loader_back').addClass('active');
		$(this).addClass('color');
	});
	
});

//메뉴 활성화
function gnbActive(idx){
	$('.gnb ul li').eq(idx).addClass('on');
}


//팝업 열기
function popArea(){
	$('.popArea').show();
}

//팝업 닫기
function popAreaClose(){
	$('.popArea').hide();
}