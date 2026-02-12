if( window.console == undefined ){ console = { log : function(){} }; }

$(function(){
	function isMobile(){
		return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
	}
	var width_size = window.innerWidth;
	resize_table_tf(width_size);

	// 메인탭
	$('.left.pc .tabTit ul li a').on('click',function(e){
		console.log('pc;');
		e.preventDefault();
		var idx = $(this).parent().index();
		$(this).parent().addClass('on').siblings().removeClass('on');
		$('.left.pc .tabContent > div').eq(idx).show().siblings().hide();

	});
	$('.left.mb .tabTit ul li a').on('click',function(e){
		console.log('mb;');
		e.preventDefault();
		var idx = $(this).parent().index();
		$(this).parent().addClass('on').siblings().removeClass('on');
		$('.left.mb .tabContent > div').eq(idx).show().siblings().hide();

	});

	// 언어
	$('.langList .tit').on('click',function(e){
		$('.langList ul').stop().slideToggle('fast');

	});
	// menu second over out
	$('.gnbWrap .gnbList > ul > li').on('mouseover', function () {
		if ( $(this).hasClass('active') === true ){
			console.log('no');
		} else {
			$(this).addClass('active');
			$('ul.gnb_2li_wrap').stop().slideUp(300);
			$(this).find('ul.gnb_2li_wrap').stop().slideDown(500);
		}
	});
	$('.gnbWrap .gnbList > ul > li').on('mouseout',function () {
		$(this).find('ul.gnb_2li_wrap').stop().slideUp();
		$(this).removeClass('active');
	});
	// // menu third over out
	// $('.has_3li').on('mouseover', function () {
	// 	console.log('as');
	// 	$(this).find('ul.gnb_3li_wrap').stop().show(500);
	// });
	// $('.has_3li').on('mouseout', function () {
	// 	$(this).stop().hide();
	// });

	// 상단메뉴 slide
	// $('.gnbList').on('mouseover', function(){
	// 	$('.gnb_all').stop().slideDown(600);
	// });
	// $('.gnb_all').on('mouseleave', function(){
	// 	$('.gnb_all').stop().slideUp(400);
	// });
	// $('.topHead').on('mouseover', function(){
	// 	$('.gnb_all').stop().slideUp(400);
	// });


	// cst-selim :: version1.00 :: menu color update
	var $snt7 = $(".subNavType2 ul li:nth-child(7) a").attr("href");
	var $snt14 = $(".subNavType2 ul li:nth-child(14) a").attr("href");
	var $snt15 = $(".subNavType2 ul li:nth-child(15) a").attr("href");
	var $menu27_a = $(".tabType01 ul li:nth-child(3) a").attr("href");
	var $menu243_a = $(".tabType01 ul li:nth-child(2) a").attr("href");
	var $menu244_a = $(".tabType01 ul li:nth-child(3) a").attr("href");
	var $mn209 = $(".gnbWrap .gnbList ul li:nth-child(2) a").attr("href");
	var $mn210 = $(".subNav ul li:first-child a").attr("href");
	// eng :: 190826
	var $en_mn44_a = $(".subNav ul li:nth-child(4) a");
	var $en_mn285_a = $(".tabType01 ul li:nth-child(5) a");
	var $en_mn286_a = $(".tabType01 ul li:nth-child(3) a");

	// mobile
	var $mb_mn209 = $(".gnb_mb_all ul.gnb_1li li:nth-child(3) a").attr("href");
	var $mb_mn210 = $(".gnb_mb_all ul.gnb_2li li:first-child a").attr("href");

	var $menu27 = $(".tabType01 ul li:nth-child(3)");
	var $mntcsl1 = $(".subNav.tp6 ul li:nth-child(1) a").attr("href");
	var $mncsl1 = $(".tabType01 ul li:nth-child(1) a").attr("href");
	var $mncsl2 = $(".tabType01 ul li:nth-child(2) a").attr("href");
	var $mncsl3 = $(".tabType01 ul li:nth-child(3) a").attr("href");

	if($snt7 == '/87/228'){
		$(".subNavType2 ul li:nth-child(7) a").attr("href","/ptax");
	}
	if($snt14 == '/7/204'){
		$(".subNavType2 ul li:nth-child(14)").addClass("highlight");
	}
	if($snt15 == '/7/205'){
		$(".subNavType2 ul li:nth-child(15)").addClass("highlight");
	}

	// 정보찾기
	$('.subNavType2 ul li.menu10 a').attr('href', '/88');
	$('.gnbWrap .gnbList > ul > li.menu209 .gnb_2li_wrap li:nth-child(6) a').attr('href', '/88');

	// 5월 소득세 이동 관련
	// if ( $('.subNavType2 .menu245 a').attr('href') == '/245' ) {
	// 	$('.subNavType2 .menu245 a').attr('href','/262');
	// }
	// if ( $('.menu209 .gnb_2li_wrap li:nth-child(2) a').attr('href') == '/245' ) {
	// 	$('.menu209 .gnb_2li_wrap li:nth-child(2) a').attr('href','/262');
	// }

	// menu 262 tab click
	$('.menu262_clk_wrap li a').on('click', function () {
		$_idx = $(this).closest('li').index();

		$(this).closest('.menu262_clk_wrap').find('li').removeClass('on');
		$(this).closest('.menu262_clk_tab').addClass('on');

		$('.workList .menu262_tab').removeClass('on');
		$('.workList .menu262_tab:eq(' + $_idx + ')').addClass('on');
	});

	// 상담센터 이동
	if ( $('.gnbWrap .gnbList > ul > li:nth-child(2) > a').attr('href') == '/209' ) {
		$('.gnbWrap .gnbList > ul > li:nth-child(2) > a').attr('href','/217');
	}

	if($menu27_a == '/27'){
		if($('.h3Wrap h3').text() == '자문 업무 범위')
			$('.h3Wrap h3').text($('.h3Wrap h3').text()+' (매월 자문 및 외부 세무조정 위임 업무)');
	}

	if($menu243_a == '/243'){
		if($('.h3Wrap h3').text() == 'Consulting service suggestion')
			$('.h3Wrap h3').text($('.h3Wrap h3').text()+' for medium sized companies');
	}
	if($menu244_a == '/244'){
		if($('.h3Wrap h3').text() == 'Consulting tasks')
			$('.h3Wrap h3').text($('.h3Wrap h3').text()+' (monthly consulting and external tax adjusting tasks)');
	}

	if ( $('.gnbWrap .gnbList ul li.menu6 a').attr('href') == '/6' ) {
		$('.gnbWrap .gnbList ul li.menu6 a').attr('href','/54');
	}


	$('#selim_mobile_back a').on('click', function(){
		history.back(-1);
	});

	if(isMobile() !== false){
		$('.mainLink li:nth-child(4) a').attr('href','/m');
		$('.mainLink li:nth-child(4) a').attr('target','_self');
	}
	var $subNav = $('.subNav');
	var $boardView = $('.viewWrap');
	$('.pdf-down').on('click', function(){
		var doc = new jsPDF();
		var specialElementHandlers = {
			'#editor': function (element, renderer) {
				return true;
			}
		}
		html2canvas($boardView,{
			useCORS: true,
			allowTaint: true,
			onrendered:function(canvas){
				var imgData = canvas.toDataURL('image/png');
				var doc = new jsPDF("p","mm");
				console.log(imgData);
				doc.addImage(imgData,'PNG',10,10);
				doc.save('selim-file.pdf');
			}
		});
	});
	// qna_dep 게시판 문의
	$('.reqTop .mem_href').on('click', function(){
		$('#frm_write input[name="sendmail"]').val( $(this).closest('.reqTop').find('input[name="mail_value"]').val() );
		$('.qna_ta').text( $(this).closest('.reqTop').find('.txtWrap a.mem_href span').text() );
		var thisPic = $(this).closest('.reqTop').find('a.mem_href img').attr('src');

		$('.tblType03.qna_dep_tbl').slideDown(400, "linear", function(){
			$('.tblType03.qna_dep_tbl .qna_pic img').attr('src', thisPic );

			var offset = $('.tblType03.qna_dep_tbl').offset();
			$('html, body').animate({scrollTop : (offset.top-150) }, 400);
			setTimeout(function(){
				$('.tblType03.qna_dep_tbl table td input[type=text].ip_sbj').focus();
			}, 300);
		});

		if ( $('.qna_dep_btn').hasClass('off') ) {
			$('.qna_dep_btn').removeClass('off');
		}
	});

	// qna_dep 게시판 문의
	$('.mem_href.btn_counsel').on('click', function(){

		if ( $(this).hasClass('tax') ) {
			$('#frm_write input[name="sendmail"]').val( $('.managerTab.tax li:first-child').find('input[name="mail_value"]').val() );
			$('.qna_ta').text( $(this).find('span').text() );
			var thisPic = $('.managerTab.tax li:first-child').find('a.mem_href img').attr('src');
		} else {
			$('#frm_write input[name="sendmail"]').val( $('.managerTab.pay li:first-child').find('input[name="mail_value"]').val() );
			$('.qna_ta').text( $(this).find('span').text() );
			var thisPic = $('.managerTab.pay li:first-child').find('a.mem_href img').attr('src');
		}

		$('.tblType03.qna_dep_tbl').slideDown(400, "linear", function(){
			$('.tblType03.qna_dep_tbl .qna_pic img').attr('src', thisPic );

			var offset = $('.tblType03.qna_dep_tbl').offset();
			$('html, body').animate({scrollTop : (offset.top-150) }, 400);
			setTimeout(function(){
				$('.tblType03.qna_dep_tbl table td input[type=text].ip_sbj').focus();
			}, 300);
		});

		if ( $(this).hasClass('tax') ) {
			$('.managerTabWrap').find('.managerTab.pay li').removeClass('on');
			$('.managerTabWrap').find('.managerTab.tax li').removeClass('on');
			$('.managerTabWrap').find('.managerTab.tax li:eq(0)').addClass('on');
		} else if ( $(this).hasClass('pay') ) {
			$('.managerTabWrap').find('.managerTab.pay li').removeClass('on');
			$('.managerTabWrap').find('.managerTab.tax li').removeClass('on');
			$('.managerTabWrap').find('.managerTab.pay li:eq(0)').addClass('on');
		} else {
			$('.managerTabWrap').find('.managerTab li').removeClass('on');
			$('.managerTabWrap').find('.managerTab li:eq(0)').addClass('on');
		}

		if ( $('.qna_dep_btn').hasClass('off') ) {
			$('.qna_dep_btn').removeClass('off');
		}
	});

	// qna_dep 게시판 문의 카드형
	$('.managerTabWrap .managerTabList li a').on('click', function() {
		$index = $(this).closest('li').index();

		$(this).closest('ul').find('li').removeClass('on');
		$(this).closest('li').addClass('on');

		$(this).closest('.managerTabWrap').find('.managerTab li').removeClass('on');
		$(this).closest('.managerTabWrap').find('.managerTab li:eq('+$index+')').addClass('on');
	});
	$('.managerTabWrap .reqTop .mem_href').on('click', function(){
		$('#frm_write input[name="sendmail"]').val( $(this).closest('.reqTop').find('input[name="mail_value"]').val() );
		$('.qna_ta').text( $(this).closest('.reqTop').find('.txtWrap a.mem_href span').text() );
		var thisPic = $(this).closest('.reqTop').find('a.mem_href img').attr('src');

		$parentIndex = $(this).closest('li').index();
		$(this).closest('.managerTabWrap').find('.managerTabList li').removeClass('on');
		$(this).closest('.managerTabWrap').find('.managerTabList li:eq('+$parentIndex+')').addClass('on');


		if ( $(this).closest('ul').hasClass('tax') ) {
			$('.managerTabWrap').find('.managerTab.pay li').removeClass('on');
			$('.managerTabWrap').find('.managerTab.tax li').removeClass('on');
		} else if ( $(this).closest('ul').hasClass('pay') ) {
			$('.managerTabWrap').find('.managerTab.pay li').removeClass('on');
			$('.managerTabWrap').find('.managerTab.tax li').removeClass('on');
		} else {
			$(this).closest('ul').find('li').removeClass('on');
		}
		$(this).closest('li').addClass('on');

		$('.tblType03.qna_dep_tbl').slideDown(400, "linear", function(){
			$('.tblType03.qna_dep_tbl .qna_pic img').attr('src', thisPic );

			var offset = $('.tblType03.qna_dep_tbl').offset();
			$('html, body').animate({scrollTop : (offset.top-150) }, 400);
			setTimeout(function(){
				$('.tblType03.qna_dep_tbl table td input[type=text].ip_sbj').focus();
			}, 300);
		});
	});

	// 사용자명 클릭
	$('.hdInfoBtn').on('click', function(){
		if ( $(this).parent().find('.topUserInfo').hasClass('on') ) {
			$(this).parent().find('.topUserInfo').removeClass('on');
			$(this).parent().find('.topUserInfo').addClass('off');
		}else if ( $(this).parent().find('.topUserInfo').hasClass('off') ) {
			$(this).parent().find('.topUserInfo').removeClass('off');
			$(this).parent().find('.topUserInfo').addClass('on');
		}
	});

	// 모바일 메뉴 오픈 버튼
	var mb_mn_open = false;

	$('.gnb_menu_btn.mb').on('click', function(e) {
		if( mb_mn_open == false) {
			$('.gnb_mb_all').stop().animate({
				left: "0",
			}, 300, function () {
				// Animation complete.
				$('.wrap .deepBg').show();
				$('.gnb_menu_btn.mb').fadeOut(300);
				$('.gnb_close_btn.mb').fadeIn(300);
			});
		}else{
			$('.gnb_mb_all').stop().animate({
				left: "-100%",
			}, 500, function () {
				// Animation complete.
				$('.wrap .deepBg').hide();
				$('.gnb_menu_btn.mb').fadeIn(300);
				$('.gnb_close_btn.mb').fadeOut(300);
			});
		}
		mb_mn_open = !mb_mn_open;
	});
	$('.wrap .deepBg').on('click', function() {
		$('.gnb_mb_all').stop().animate({
			left: "-100%",
		}, 300, function () {
			// Animation complete.
			$('.wrap .deepBg').hide();
			$('.gnb_menu_btn.mb').fadeIn(300);
			$('.gnb_close_btn.mb').fadeOut(300);
		});
		mb_mn_open = false;
	});
	$('.gnb_1li .gnb_1li_more').on('click', function() {
		$(this).closest('li').find('.gnb_2li').slideToggle();
		if($(this).text() == "+")
			$(this).text("-");
		else
			$(this).text("+");
	});
	$('.gnb_2li .gnb_2li_more').on('click', function() {
		$(this).closest('li').find('.gnb_3li').slideToggle();
		if($(this).text() == "+")
			$(this).text("-");
		else
			$(this).text("+");
	});

	// tb_contract_list 테이블 empty td colspan 설정하기.
	$(".tblType03 table tr td.td_cont").attr("colspan",4);

	$(window).resize(function (){
		// width값을 가져오기
		width_size = window.innerWidth;
		resize_table_tf(width_size);
	});
	function resize_table_tf(web_width){
		if(web_width >= 1025){
			// menu
			$('.mb:not(.left)').hide();
			$('.wrap .deepBg').hide();
			$('.gnb_mb_all').css({"left":"-100%"});
			mb_mn_open = false;
			// qna & apply
			$(".mb_col_wr").append($(".tblType03 table tr.mb_col_em .mb_col_move"));
			$(".tblType03 table tr.mb_col_wr td").attr("colspan",1);
			// apply
			$(".mb_col_pw").append($(".tblType03 table tr.mb_col_pc .mb_col_move"));
			$(".tblType03 table tr.mb_col_pw td").attr("colspan",1);
			$(".mb_col_iw").append($(".tblType03 table tr.mb_col_ic .mb_col_move"));
			$(".tblType03 table tr.mb_col_iw td").attr("colspan",1);
		}else{
			// menu
			$('.mb').show();
			// qna & apply
			$(".mb_col_em").append($(".tblType03 table tr.mb_col_wr .mb_col_move"));
			$(".tblType03 table tr.mb_col_em td").attr("colspan",3);
			// apply
			$(".mb_col_pc").append($(".tblType03 table tr.mb_col_pw .mb_col_move"));
			$(".tblType03 table tr.mb_col_pc td").attr("colspan",3);
			$(".mb_col_ic").append($(".tblType03 table tr.mb_col_id .mb_col_move"));
			$(".tblType03 table tr.mb_col_ic td").attr("colspan",3);
		}
	}

	// webzine board
	// $wpwHeight = $('.webzine-page__wrap').height();
	// $wpwHeightScale = parseInt( $('.webzine-page__wrap').css('padding-bottom').substr(0,2) ) / 100;
	//
	// if ( $wpwHeightScale != '' && $wpwHeightScale != null ) {
	// 	$('.viewWrap.webzine .viewContent').css({"height": ( ( parseInt( $wpwHeight ) * $wpwHeightScale )  + 50 ) + 'px'});
	// }

	// 업무의뢰 콘텐츠 메뉴 style
	$('.tabType01 ul li a strong').closest('li').addClass('emphasis');
	$('.tabType02 ul li a strong').closest('li').addClass('emphasis');

	$('.subNav ul li a strong').closest('li').addClass('emphasis')



	// sector board
	if ( $('#sector_yn').val() == 'Y') {
		$('.sector-sbj__area .type_y').fadeIn();
	}
	$('#sector_yn').on('change', function(){
		switch ( $('#sector_yn').val() ) {
			case 'Y' :
				$('.sector-sbj__area .type_y').fadeIn();
				break;
			case 'N' :
				$('.sector-sbj__area .type_y').fadeOut();
				break;
			default :
				break;
		}
	});
	$('.sector-sbj__area .type_y tag').on('click', function(){
		$('input[name="subject"]').val($(this).text());
	});

	// consulting
	$('.host_conts_onoff_btn').on('click', function(){
		$('.host_contents').stop().slideToggle(300);
		if ( $('.host_contents').hasClass('off') ) {
			$(this).find('small').text('Close');
			$('.host_contents').removeClass('off');
			$('.host_contents').addClass('on');
		} else {
			$(this).find('small').text('Open');
			$('.host_contents').removeClass('on');
			$('.host_contents').addClass('off');
		}

	});

	// 모바일 뒤로가기
	$(".gnb_back_btn.mb").on("click", function(){
		history.back();
		return false;
	});


	// 모바일메뉴 메인상단
	$("ul.mm1dp > li.2dptm").on("click", function(){
		$(this).closest("ul.mm1dp").find("ul.mm2dp").stop().slideUp();
		$(this).find("ul.mm2dp").stop().slideToggle(300);
	});


	// biz_wise 카테고리 변경
	$('#biz_wise_cate_idno').on('change', function(){
		console.log($(this).val());
		if ( $(this).val() ) {
			$('.no_select_txt').fadeOut(300);
			$('ul.wise_select_li').addClass('visible');
			$('ul.wise_select_li').removeClass('hidn');

			switch ( $(this).val() ) {
				case '35' :
					$('input[name="wise_c_idno"]').val('wisdom');
					break;
				case '36' :
					$('input[name="wise_c_idno"]').val('edu');
					break;
				case '37' :
					$('input[name="wise_c_idno"]').val('health');
					break;
				case '38' :
					$('input[name="wise_c_idno"]').val('leader');
					break;
				case '39' :
					$('input[name="wise_c_idno"]').val('manage');
					break;
				default :
					$('input[name="wise_c_idno"]').val('wisdom');
					break;
			}
		} else {
			$('.no_select_txt').fadeIn(300);
			$('ul.wise_select_li').addClass('hidn');
			$('ul.wise_select_li').removeClass('visible');
		}
	});

	// file down load
	$('.no_login_down').on('click', function(){
		alert('로그인 후 첨부파일 다운로드 가능합니다');
		return false;
	});

	// print
	$('.bbs_print_btn').on('click',function(){
		if ( $(this).hasClass('nouser') ) {
			alert('로그인 후 인쇄 이용 가능합니다');
			return false;
		} else {
			console.log('txt:',$('.subContent .h3Wrap h3').text());
			var _temp_top_HTML_ = '';
			var _temp_body_HTML_ = '';
			if ( $('.subContent .h3Wrap h3').text() != '' ) {
				_temp_top_HTML_ = "<h3>"+$('.subContent .h3Wrap h3').text()+"</h3>";
			} else {
				_temp_top_HTML_ = "<h3>"+$('.subContent .subTopInfo .h2Wrap h2').text()+"</h3>";
			}
			if ( $('.viewWrap').eq(0).hasClass('viewWrap01') ) {
				_temp_body_HTML_ = document.getElementsByClassName("viewWrap")[0].innerHTML;
				_temp_body_HTML_ += document.getElementsByClassName("viewWrap")[1].innerHTML;
			} else {
				_temp_body_HTML_ = document.getElementsByClassName("viewWrap")[0].innerHTML;
			}
			//var _temp_foot_HTML_ = document.getElementsByClassName("h1Wrap")[0].innerHTML;
			const innerHTMLs_foot = "<footer class='watermark'>" + "<img src='/pub/images/logo2.png' alt='세림세무법인'/>" + "</footer>";
			const innerHTMLs = "<div class='printWrap' style='width:21cm; height: 29.7cm;'>" + "<div class='h3Wrap print'>" + _temp_top_HTML_ + "</div>"
				+ "<div class='viewWrap'>" + _temp_body_HTML_ + "</div>" + "<div class='ft_bottom print'>" + innerHTMLs_foot + "</div>"  + "</div>";
			const popupWindow = window.open("", "_blank", "width=1000,height=800");
			popupWindow.document.write("<!DOCTYPE html>"+
				"<html>"+
				"<head>"+
				"<meta charset='UTF-8'>"+
				"<title>세림세무법인</title>"+
				"<link rel='stylesheet' type='text/css' href='/pages/default/css/common.css?v=2024020202006' media='all' />"+
				"</head>"+
				"<body>"+innerHTMLs+"</body>"+
				"</html>");
			popupWindow.document.close();
			popupWindow.focus();
			//1초후 새 창 프린트
			window.setTimeout(function () {
				popupWindow.print();
				popupWindow.close();
			}, 1000);
		}
	});
	$('.con_print_btn').on('click',function(){
		if ( $(this).hasClass('nouser') ) {
			alert('로그인 후 인쇄 이용 가능합니다');
			return false;
		} else {
			console.log('txt:',$('.subContent .h3Wrap h3').text());
			var _temp_top_HTML_ = '';
			var _temp_body_HTML_ = '';
			if ( $('.subContent .h3Wrap h3').text() != '' ) {
				_temp_top_HTML_ = "<h3>"+$('.subContent .h3Wrap h3').text()+"</h3>";
			} else {
				_temp_top_HTML_ = "<h3>"+$('.subContent .subTopInfo .h2Wrap h2').text()+"</h3>";
			}
			if ( $('.workList').length ) {
				_temp_body_HTML_ = document.getElementsByClassName("workList")[0].innerHTML;
			} else {
				_temp_body_HTML_ = document.getElementsByClassName("contStart")[0].innerHTML;
			}
			//var _temp_foot_HTML_ = document.getElementsByClassName("h1Wrap")[0].innerHTML;
			// const innerHTMLs_head = "<header>" + "세림세무법인" + "</header>";
			const innerHTMLs_foot = "<footer class='watermark'>" + "<img src='/pub/images/logo2.png' alt='세림세무법인'/>" + "</footer>";
			const innerHTMLs = "<div class='printWrap' style='width:21cm; height: 29.7cm;'>" + "<div class='h3Wrap print'>" + _temp_top_HTML_ + "</div>"
				+ "<div class='viewWrap'>" + _temp_body_HTML_ + "</div>" + "<div class='ft_bottom print'>" + innerHTMLs_foot + "</div>"  + "</div>";
			const popupWindow = window.open("", "_blank", "width=1000,height=800");
			popupWindow.document.write("<!DOCTYPE html>"+
				"<html>"+
				"<head>"+
				"<title>세림세무법인</title>"+
				"<link rel='stylesheet' type='text/css' href='/pages/default/css/common.css?v=2024020202006' media='all' />"+
				"</head>"+
				"<body>"+innerHTMLs+"</body>"+
				"</html>");
			popupWindow.document.close();
			popupWindow.focus();
			//1초후 새 창 프린트
			window.setTimeout(function () {
				popupWindow.print();
				popupWindow.close();
			}, 1000);
		}
	});

	$('.consult_print_btn').on('click',function(){
		console.log('txt:',$('.subContent .h3Wrap h3').text());
		var _temp_top_HTML_ = '';
		var _temp_body_HTML_ = '';
		if ( $('.subContent .h3Wrap h3').text() != '' ) {
			_temp_top_HTML_ = "<h3>"+$('.subContent .h3Wrap h3').text()+"</h3>";
		} else {
			_temp_top_HTML_ = "<h3>"+$('.subContent .subTopInfo .h2Wrap h2').text()+"</h3>";
		}
		_temp_body_HTML_ = document.getElementsByClassName("contStart")[0].innerHTML;
		var _temp_foot_HTML_ = document.getElementsByClassName("h1Wrap")[0].innerHTML;
		const innerHTMLs_foot = "<footer class='watermark'>" + "<img src='/pub/images/logo2.png' alt='세림세무법인'/>" + "</footer>";
		const innerHTMLs = "<div class='printWrap' style='width:21cm; height: 29.7cm;'>" + "<div class='h3Wrap print'>" + _temp_top_HTML_ + "</div>"
			+ "<div class='viewWrap'>" + _temp_body_HTML_ + "</div>" + "<div class='ft_bottom print'>" + _temp_foot_HTML_ + "</div>"  + "</div>";
		const popupWindow = window.open("", "_blank", "width=1000,height=800");
		popupWindow.document.write("<!DOCTYPE html>"+
			"<html>"+
			"<head>"+
			"<title>세림세무법인</title>"+
			"<link rel='stylesheet' type='text/css' href='/pages/default/css/common.css'  media='all' />"+
			"</head>"+
			"<body>"+innerHTMLs+"</body>"+
			"</html>");
		popupWindow.document.close();
		popupWindow.focus();
		//1초후 새 창 프린트
		window.setTimeout(function () {
			popupWindow.print();
			popupWindow.close();
		}, 1000);
	});


	// ===============================
	// 공통 설정
	// ===============================
	var kakaoAppKey    = '74546251e56d8047240891a67beafc9c';
	var loginUrl       = '/member/login.php';
	var redirectParam  = 'url'; // login.php?url=현재페이지 이런 식으로 사용할 파라미터 이름

	// Kakao SDK 초기화
	if (window.Kakao) {
		try {
			if (!Kakao.isInitialized()) {
				Kakao.init(kakaoAppKey);
			}
		} catch (e) {
			// 필요 시만 디버깅
		}
	}

	// 로그인 유도 + 리다이렉트
	function goLoginWithRedirect() {
		var msg = '로그인 후 이용 가능한 기능입니다.\n'
			+ '현재 페이지 주소를 유지한 채 로그인 페이지로 이동할까요?';
		var ok = window.confirm(msg);
		if (!ok) return false;

		var currentUrl = window.location.href;
		var connector  = (loginUrl.indexOf('?') === -1) ? '?' : '&';
		var target     = loginUrl + connector + redirectParam + '=' + encodeURIComponent(currentUrl);

		window.location.href = target;
		return false;
	}

	// 공유 제목 추출 (프린트 로직과 동일)
	function getShareTitle() {
		var $h3 = $('.subContent .h3Wrap h3');
		var $h2 = $('.subContent .subTopInfo .h2Wrap h2');

		if ($h3.length && $.trim($h3.text()) !== '') {
			return $.trim($h3.text());
		}
		if ($h2.length && $.trim($h2.text()) !== '') {
			return $.trim($h2.text());
		}
		return '세무Chat 답변';
	}

	// 공유 썸네일 이미지 추출
	function getShareImage($btn) {
		var $img = $('.contStart .workList img').first();

		if (!$img.length) {
			$img = $('.viewContent img').first();
		}

		var src = '';
		if ($img.length) {
			src = $img.attr('src') || '';
		}

		// 화면에서 못 찾으면 data-thumb 사용
		if (!src && $btn && $btn.length) {
			src = $btn.data('thumb') || '';
		}

		if (!src) return '';

		// 절대경로 아니면 도메인 붙이기
		if (src.indexOf('http://') === 0 || src.indexOf('https://') === 0) {
			return src;
		}

		var origin = window.location.origin || (window.location.protocol + '//' + window.location.host);
		if (src.charAt(0) !== '/') {
			src = '/' + src;
		}
		return origin + src;
	}

	// 공유 버튼
	$('#kakao-link-btn').on('click', function (e) {
		e.preventDefault();

		var $btn        = $(this);
		var loginStatus = $btn.data('login-status'); // "yes" / "no"

		// 비로그인 시: 로그인 리다이렉트 안내
		if ($btn.hasClass('nouser') || loginStatus === 'no') {
			goLoginWithRedirect();
			return;
		}

		// Kakao 사용 불가능 시
		if (!window.Kakao || !Kakao.isInitialized() || !Kakao.Share) {
			alert('카카오 공유를 사용할 수 없습니다. 잠시 후 다시 시도해 주세요.');
			return;
		}

		var shareUrl = window.location.href;
		var title    = getShareTitle();
		var desc     = '세림세무법인의 세금 관련 정보를 공유합니다.';
		var imageUrl = getShareImage($btn);

		if (!imageUrl) {
			alert('공유할 이미지를 찾을 수 없습니다.');
			return;
		}

		Kakao.Share.sendDefault({
			objectType: 'feed',
			content: {
				title: title,
				description: desc,
				imageUrl: imageUrl,
				link: {
					mobileWebUrl: shareUrl,
					webUrl: shareUrl
				}
			},
			buttons: [
				{
					title: '세림세무법인 세금 관련 정보 보기',
					link: {
						mobileWebUrl: shareUrl,
						webUrl: shareUrl
					}
				}
			]
		});
	});


	// lazy load
	// $('img.lazy').lazyload();
});

//서브GNB 활성화
function subNav(idx){
	$('.subNav ul li').eq(idx).addClass('on');
}